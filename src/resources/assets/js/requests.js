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
