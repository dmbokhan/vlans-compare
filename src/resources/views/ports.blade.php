@foreach ($devices as $device)
    @foreach ($devices_port_data[$device['device_id']] as $port_id => $port)
        <option value="{{ $port_id }}">[{{ $device->hostname }}] {{ $port }}</option>
    @endforeach
@endforeach