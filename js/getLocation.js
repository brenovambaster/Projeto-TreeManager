let x = document.getElementById("lat");
let y = document.getElementById("long");
let z = document.getElementById("location");

function getLocation() {
    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Seu browser não suporta Geolocalização.";
    }
}

function showPosition(position) {
    cords = {
        'lat': position.coords.latitude,
        'long': position.coords.longitude
    };
    x.value = cords.lat;
    y.value = cords.long;
    console.log(lat)
}

function showError(error) {


    switch (error.code) {
        case error.PERMISSION_DENIED:
            $('#location').css('display', 'block');
            break;
    }

}