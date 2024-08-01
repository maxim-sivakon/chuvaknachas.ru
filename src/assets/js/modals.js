// modal location
function initLocation() {
    var selectGeoLocationMb = document.getElementById("select-geo-location-mb");
    var selectGeoLocationPc = document.getElementById("select-geo-location-pc");
    var modalLocationCloseBtn = document.getElementById("modal-location-close-btn");
    var mainLocation = document.getElementById("main-location");
    var mainLocationBlur = document.querySelector('#main-location > .body-blur');

    selectGeoLocationMb.onclick = function () {
        mainLocation.style.display = 'block';
    }
    selectGeoLocationPc.onclick = function () {
        mainLocation.style.display = 'block';
    }
    modalLocationCloseBtn.onclick = function () {
        mainLocation.style.display = 'none';
    }
    mainLocationBlur.onclick = function () {
        mainLocation.style.display = 'none';
    }
}

document.addEventListener('readystatechange', function () {
    if (document.readyState === "complete") {
        initLocation();
    }
});