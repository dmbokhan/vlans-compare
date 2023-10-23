<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-xs-3">
                <span>Port</span>
            </th>
            <th class="col-xs-9">
                <span>Vlan IDs</span>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $port => $port_vlans)
            @if (count($port_vlans) > 0)
                <tr class="danger">
            @else
                <tr class="success">
            @endif
            <td class="col-xs-6">
                <b>{{ $port }}</b>
            </td>
            <td class="col-xs-6">
                @foreach ($port_vlans as $vlan)
                    {{ $vlan }}
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>