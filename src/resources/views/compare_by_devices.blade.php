<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="col-xs-3">
                <span>Hostname</span>
            </th>
            <th class="col-xs-9">
                <span>Vlan IDs</span>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $hostname => $device_vlans)
            @if (count($device_vlans) > 0)
                <tr class="danger">
            @else
                <tr class="success">
            @endif
            <td class="col-xs-3">
                <b>{{ $hostname }}</b>
            </td>
            <td class="col-xs-9">
                @foreach ($device_vlans as $vlan)
                    {{ $vlan }}
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>