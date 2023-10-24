<?php

namespace Dmbokhan\VlansCompare\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Models\Device;
use App\Models\Vlan;
use App\Models\Port;
use App\Models\PortVlan;

class VlansCompareController extends Controller
{
    public function index()
    {
        $devices = Device::orderBy("hostname")->get();

        return view('vlans-compare::index', [
            'devices' => $devices,
        ]);
    }

    public function post_request(Request $request)
    {

        if ($_POST['action'] == 'compare_by_devices') {

            $devices_vlan_data = array();  // Gather devices vlans data from DB
            foreach ($_POST['devices'] as $device_id) {
                $device_vlans_object = Vlan::where('device_id', $device_id)->get('vlan_vlan');
                $vlans_list = [];
                foreach ($device_vlans_object as $value) {
                    $vlans_list[] = $value['vlan_vlan'];
                }
                $devices_vlan_data[$device_id] = $vlans_list;
            }

            $all_vlans = [];  // Gather all vlans from choosen devices
            foreach ($devices_vlan_data as $vlans) {
                $all_vlans = array_merge($all_vlans, $vlans);
            }
            $all_vlans = array_values(array_unique($all_vlans, SORT_REGULAR));

            $result = [];
            foreach ($devices_vlan_data as $device_id => $vlans) {
                $device = Device::where('device_id', $device_id) -> first();
                $result[$device['hostname']] = array_diff($all_vlans,$vlans);
            }

            $response = view('vlans-compare::compare_by_devices', [
                'result' => $result,
            ]);

        }

        if ($_POST['action'] == 'compare_by_ports') {

            $ports_vlan_data = array();  // Gather ports vlans data from DB
            foreach ($_POST['ports'] as $port_id) {
                $port_vlans_object = PortVlan::where('port_id', $port_id)->get('vlan');
                $vlans_list = [];
                foreach ($port_vlans_object as $value) {
                    $vlans_list[] = $value['vlan'];
                }
                $ports_vlan_data[$port_id] = $vlans_list;
            }

            $all_vlans = [];  // Gather all vlans from choosen ports
            foreach ($ports_vlan_data as $vlans) {
                $all_vlans = array_merge($all_vlans, $vlans);
            }
            $all_vlans = array_values(array_unique($all_vlans, SORT_REGULAR));

            $result = [];
            foreach ($ports_vlan_data as $port_id => $vlans) {
                $port_data = Port::where('port_id', $port_id) -> first();
                $device_data = Device::where('device_id', $port_data['device_id']) -> first();
                $port = Port::where('port_id', $port_id) -> first();
                $key = "[{$device_data['hostname']}] {$port_data['ifName']}";
                $result[$key] = array_diff($all_vlans,$vlans);
            }

            $response = view('vlans-compare::compare_by_ports', [
                'result' => $result,
            ]);
        }

        return $response;
    }

    public function get_ports(Request $request)
    {
        $devices_port_data = array();  // Gather devices ports data from DB
        foreach ($_POST['devices'] as $device_id) {
            $device_ports_object = Port::where('device_id', $device_id)->orderBy("ifName")->get(['port_id','ifName']);
            $ports_list = [];
            foreach ($device_ports_object as $value) {
                $ports_list[$value['port_id']] = $value['ifName'];
            }
            $devices_port_data[$device_id] = $ports_list;
        }

        return view('vlans-compare::ports', [
            'devices' => Device::whereIn('device_id', $_POST['devices'])->get(),
            'devices_port_data' => $devices_port_data,
        ]);
    }
}
