@extends('layouts.librenmsv1')

@section('title', 'vlans-compare')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-xs-12">

                    <h2>VlansCompare</h2>

                    <div class="alert alert-warning">Плагин VlansCompare сравнивает вланы на устройствах по данным в LibreNMS, которые могут обновляться с задержкой или отсутствовать.</div>

                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="/plugins/vlans-compare#devices" data-toggle="tab" aria-expanded="true">Сравнение между устройствами</a></li>
                            <li><a href="/plugins/vlans-compare#ports" data-toggle="tab">Сравнение между портами</a></li>
                        </ul>
                    </div>

                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-body">
                            <div class="tab-content">

                                <div id="devices" class="tab-pane fade in active">
                                    <div class="row" style="height: 100%;">
                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Выбрать устройства</h3>
                                                </div>
                                                <div class="panel-body text-center" style="height: 55vh;">
                                                    <form onsubmit="event.preventDefault(); requestDevices(this);">
                                                        @csrf
                                                        <input type="hidden" id="action" name="action" value="compare_by_devices" />
                                                        <select multiple name="devices[]" size="20" class="form-control" style="height: 90%;">
                                                            @foreach ($devices as $device)
                                                                <option value="{{ $device->device_id }}">{{ $device->hostname }}</option>
                                                            @endforeach
                                                        </select>
                                                        <button type="submit" class="btn btn-success m-3" style='margin-top: 5px;' name="Submit">Сравнить</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Результат</h3>
                                                </div>
                                                <div class="panel-body" id="result_devices" style="overflow-y: scroll; height: 55vh;">
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>


                                <div id="ports" class="tab-pane fade">
                                    <form id="form_compare_by_ports" onsubmit="event.preventDefault(); requestPorts(this);">
                                        @csrf
                                        <input type="hidden" id="action" name="action" value="compare_by_ports" />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Выбрать устройства</h3>
                                                    </div>
                                                    <div class="panel-body text-center">
                                                        <select onchange="event.preventDefault(); getPorts(form_compare_by_ports);" multiple name="devices[]" class="js-example-basic-multiple" style="width: 100%;">
                                                            @foreach ($devices as $device)
                                                                <option value="{{ $device->device_id }}">{{ $device->hostname }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="height: 100%;">
                                            <div class="col-md-4">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Выбрать порты</h3>
                                                    </div>
                                                    <div class="panel-body text-center" style="height: 42vh;">
                                                        <select id="select_ports" multiple name="ports[]" class="form-control" style="height: 90%;">
                                                        </select>
                                                        <button type="submit" class="btn btn-success m-3" style='margin-top: 5px;' name="Submit">Сравнить</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Результат</h3>
                                                    </div>
                                                    <div class="panel-body" id="result_ports" style="overflow-y: scroll; height: 42vh;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                     </div>

                </div>

                </div>

             </div>
        </div>
    </div>

<script type="text/javascript">
    function requestDevices(data) {
        var formData = new FormData(data);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/plugins/vlans-compare");
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

        xhr.onload = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('result_devices').innerHTML = xhr.responseText;
            } else {
                console.log('error');
            }
        };

        xhr.send(formData);
    }

    function requestPorts(data) {
        var formData = new FormData(data);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/plugins/vlans-compare");
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

        xhr.onload = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('result_ports').innerHTML = xhr.responseText;
            } else {
                console.log('error');
            }
        };

        xhr.send(formData);
    }

    function getPorts(data) {
        var formData = new FormData(data);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/plugins/vlans-compare/get-ports");
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

        xhr.onload = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('select_ports').innerHTML = xhr.responseText;
            } else {
                console.log('error');
            }
        };

        xhr.send(formData);
    }

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection

