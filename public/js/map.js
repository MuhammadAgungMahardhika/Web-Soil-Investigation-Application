let base_url = "http://127.0.0.1:8000"; //untuk php spark serve
let lat = -0.2294096;
let lng = 100.5977331;
// let base_url = 'http://192.168.100.172:80/Codeigniter4-Framework/desa-wisata-apar-pariaman/public/' //Untuk mobile
let userPosition, userMarker, directionsRenderer, infoWindow, circle, map;
let markerArray = [];
let selectedShape, selectedMarker, drawingManager, dataLayer;
// let mapStyles = [
//     {
//         featureType: "poi",
//         elementType: "labels",
//         stylers: [{ visibility: "off" }],
//     },
// ];

function initMap() {
    showMap(); //show map , polygon, legend
    directionsRenderer = new google.maps.DirectionsRenderer(); //render route
    mata_angin(); // mata angin compas on map
    highlightCurrentManualLocation();
}
function showMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: lat, lng: lng },
        zoom: 12,
        clickableIcons: false,
    });
    // remove unecessary button when in mobile
    if (window.location.pathname.split("/").pop() == "mobile") {
        map.setOptions({ mapTypeControl: false });
    }
}

// highlight current and manual location before click the button
function highlightCurrentManualLocation() {
    google.maps.event.addListener(map, "click", (event) => {
        if (userPosition == null) {
            $("#currentLocation").addClass("highligth");
            $("#manualLocation").addClass("highligth");
            setTimeout(() => {
                $("#currentLocation").removeClass("highligth");
                $("#manualLocation").removeClass("highligth");
            }, 400);
        }
    });
}
function panTo(lat, lng) {
    map.panTo(lat, lng);
}

//show info on map
function showInfoOnMap(data, url) {
    const objectMarker = new google.maps.Marker({
        position: { lat: parseFloat(data.lat), lng: parseFloat(data.lng) },
        icon: checkIcon(url),
        opacity: 0.8,
        title: "info marker",
        map: map,
    });
    moveCamera(14);
    markerArray.push(objectMarker);
    objectMarker.addListener("click", () => {
        openInfoWindow(objectMarker, infoMarkerData(data, url));
    }); //open infowindow when click
    openInfoWindow(objectMarker, infoMarkerData(data, url));
    showSondirTable(data.id, data.number);
}

function showSondirTable(id, number) {
    $("#row-sondir-table").css("display", "block");
    $("#tbody-sondir").html("");
    $("#s-table-name").html("Sonding " + number);
    $.ajax({
        url: base_url + "/" + "sondir" + "/" + id,
        method: "get",
        dataType: "json",
        success: function (response) {
            let jhp_temp = 0;
            response.result.forEach((element) => {
                let a = element.hp - element.nk;
                let a2 = 2 * a;
                let jhp = jhp_temp + a2;
                $("#tbody-sondir").append(
                    `
                    <tr class="table-hover">
                            <td class="text-center">${element.depth}</td>
                            <td class="text-center">${element.nk}</td>
                            <td class="text-center">${element.hp}</td>
                            <td class="text-center">${a}</td>
                            <td class="text-center">${a2}</td>
                            <td class="text-center">${jhp}</td>
                    </tr>
                   `
                );
                jhp_temp = jhp_temp + a2;
            });

            $("#tfoot-sondir").html(
                `
                <tr>
                    <td colspan="1">Keterangan</td>
                    <td colspan="5">${
                        response.description ? response.description : ""
                    }</td>
                </tr>
                <tr>
                    <td colspan="1">Pelaksana</td>
                    <td colspan="5">${
                        response.executor ? response.executor : ""
                    }</td>
                </tr>
                <tr>
                    <td colspan="1">Operator</td>
                    <td colspan="5">${
                        response.operator ? response.operator : ""
                    }</td>
                </tr>
               `
            );
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        },
    });
}
//loping all marker
function loopingAllMarker(datas, url) {
    for (let i = 0; i < datas.length; i++) {
        addMarkerToMap(datas[i], url);
    }
}
//user manual marker
function manualLocation() {
    Swal.fire({
        text: "Select your position on map",
        icon: "success",
        showClass: { popup: "animate__animated animate__fadeInUp" },
        timer: 1200,
        confirmButtonText: "Oke",
    });

    google.maps.event.addListener(map, "click", (event) => {
        clearRoute();
        addUserMarkerToMap(event.latLng);
    });
}

// add geom on map
function addMarkerGeom(geoJson, color = null, pass = null) {
    // Construct the polygon.
    const a = { type: "Feature", geometry: geoJson };
    const geom = new google.maps.Data();
    geom.addGeoJson(a);
    geom.setStyle({
        fillColor: color,
        strokeWeight: 0.3,
        strokeColor: "#00b300",
        fillOpacity: 0.3,
        clickable: false,
    });
    if (!pass) {
        geomArray.push(geom);
    } else {
        geomNearby = geom;
    }
    geom.setMap(map);
}
// clear geom on map
function clearGeom(pass = null) {
    if (!pass) {
        for (i in geomArray) {
            geomArray[i].setMap(null);
        }
        geomArray = [];
    }
}
// clear apar geom on map
function clearAparGeom(pass = null) {
    if (geomAparArray) {
        for (i in geomAparArray) {
            geomAparArray[i].setMap(null);
            geomAparArray = null;
        }
    }
}

// move camera
function moveCamera(z = 16) {
    map.moveCamera({ zoom: z });
}
// add callroute
function calcRoute(lat, lng) {
    let destinationCord = { lat: lat, lng: lng };
    let directionsService = new google.maps.DirectionsService();
    if (!userPosition) {
        return Swal.fire({
            text: "Please determine your position first!",
            icon: "warning",
            showClass: {
                popup: "animate__animated animate__fadeInUp",
            },
            timer: 1500,
            confirmButtonText: "Oke",
        });
    }
    var request = {
        origin: userPosition,
        destination: destinationCord,
        travelMode: "WALKING",
    };

    directionsService.route(request, function (response, status) {
        if (status == "OK") {
            directionsRenderer.setMap(map);
            directionsRenderer.setDirections(response);
        } else {
            return Swal.fire({
                text: "Sorry, Cannot recognize your rute! :( ",
                icon: "error",
                confirmButtonText: "Oke",
            });
        }
    });
    //Show detail rute at element you want
    // display.setPanel(document.getElementById());
}
// clear route
function clearRoute() {
    if (directionsRenderer) {
        return directionsRenderer.setMap(null);
    }
}
//check object marker icon
function checkIcon(icon) {
    if (icon == "sondir") {
        return (icon = {
            url: base_url + "/images/marker-icon/marker-sondir.png",
        });
    }
}

function infoMarkerData(data, url) {
    let id = data.id;
    let number = data.number;
    let recom = data.recommendation;
    let lat = data.lat;
    let lng = data.lng;
    let infoMarker;

    infoMarker = `<h6 class="text-center mb-2">Sondir : ${number}</h6>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Lat : ${lat}</li>
        <li class="list-group-item">Lng : ${lng}</li>
        <li class="list-group-item">
        Recom :
        ${recom == 1 ? "(Bor Pile) Pondasi Dalam" : "(Sumuran) Pondasi Dangkal"}
        </li>
    </ul>
    <div class="col-md text-center" id="infoWindowDiv" ><a role ="button" title ="route here" class="btn btn-outline-primary" onclick ="calcRoute(${lat},${lng})"> <i class ="fa fa-road"> </i></a ></div>`;

    return infoMarker;
}

// add Object Marker on Map
function addMarkerToMap(data, url = null) {
    let lat = parseFloat(data.lat);
    let lng = parseFloat(data.lng);

    const objectMarker = new google.maps.Marker({
        position: { lat: lat, lng: lng },
        opacity: 0.8,
        title: "info object",
        animation: google.maps.Animation.DROP,
        map: map,
    });

    objectMarker.addListener("click", () => {
        openInfoWindow(objectMarker, data.name);
    });
}
// clear object marker on map
function clearMarker(pass = null) {
    for (i in markerArray) {
        markerArray[i].setMap(null);
    }
    markerArray = [];

    if (!pass) {
        clearMarkerNearby();
    }
}
function clearMarkerNearby() {
    if (markerNearby) {
        markerNearby.setMap(null);
        markerNearby = null;
    }
    if (geomNearby) {
        geomNearby.setMap(null);
        geomNearby = null;
    }
}

//open infowindow
function openInfoWindow(marker, content = "Info Window") {
    if (infoWindow != null) {
        infoWindow.close();
    }
    infoWindow = new google.maps.InfoWindow({ content: content });
    infoWindow.open({ anchor: marker, map, shouldFocus: false });
}
//close infowindow
function clearInfoWindow() {
    if (infoWindow) {
        infoWindow.close();
    }
}
//CurrentLocation on Map
function currentLocation() {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };

                clearRoute();
                addUserMarkerToMap(pos);
                userPosition = pos;
                panTo(userPosition);
            },
            () => {
                handleLocationError(true, currentWindow, map.getCenter());
            }
        );
    } else {
        handleLocationError(false, currentWindow, map.getCenter());
    } // Browser doesn't support Geolocation
}
//Browser doesn't support Geolocation
function handleLocationError(browserHasGeolocation, currentWindow, pos) {
    currentWindow.setPosition(pos);
    currentWindow.setContent(
        browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
    );
    currentWindow.open(map);
}
// Add user marker
function addUserMarkerToMap(location) {
    if (userMarker) {
        userPosition = location;
        userMarker.setPosition(userPosition);
    } else {
        userPosition = location;
        userMarker = new google.maps.Marker({
            position: userPosition,
            opacity: 0.8,
            title: "your location",
            animation: google.maps.Animation.DROP,
            draggable: false,
            map: map,
        });

        content = `Your Location <div class="text-center"></div>`;
        userMarker.addListener("click", () => {
            openInfoWindow(userMarker, content);
        });
    }
}
// delete user marker
function clearUser() {
    if (userMarker) {
        userMarker.setMap(null);
        userMarker = null;
    }
}

// add mata angin
function mata_angin() {
    const legendIcon = `${base_url}/images/marker-icon/`;
    const centerControlDiv = document.createElement("div");
    centerControlDiv.style.marginLeft = "10px";
    centerControlDiv.style.marginBottom = "-10px";
    centerControlDiv.innerHTML = `<div class="mb-4"><img src="${legendIcon}mata_angin.png" width="25"></img><div>`;
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(
        centerControlDiv
    );
}

//add legend to map
function legend() {
    const legendIcon = `${base_url}/images/marker-icon/`;
    $("#legendButton").empty();
    $("#legendButton").append(
        '<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hide Legend" class="btn icon btn-primary mx-1" id="legend-map" onclick="hideLegend()"><span class="material-symbols-outlined">visibility_off</span></a>'
    );

    let legend = document.createElement("div");
    legend.id = "legendPanel";
    let content = [];
    content.push('<h6 class="text-center">Legend</h6>');
    content.push(
        `<p><img src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png" width="15"></img> User</p>`
    );
    content.push(
        `<p><img src="${legendIcon}marker-sondir.png" width="15"></img> Sondir</p>`
    );
    legend.innerHTML = content.join("");
    legend.index = 1;
    map.controls[google.maps.ControlPosition.LEFT_TOP].push(legend);
}
//Hide legend
function hideLegend() {
    $("#legendPanel").remove();
    $("#legendButton").empty();
    $("#legendButton").append(
        '<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="show legend" class="btn icon btn-primary mx-1" id="legend"  onclick="legend()"><span class="material-symbols-outlined">visibility</span></a>'
    );
}

//---------------------------------------------admin drawing manager------------------------------------------------
// Remove selected shape on maps
function clearGeomArea() {
    document.getElementById("geo-json").value = "";
    if (selectedShape) {
        selectedShape.setMap(null);
        selectedShape = null;
    } else {
        clearGeom();
    }
}

// Initialize drawing manager on maps
function initDrawingManager(url = null) {
    drawingManager = new google.maps.drawing.DrawingManager();
    let color;
    if (url == "atraction") {
        color = "#C45A55";
    }
    if (url == "event") {
        color = "#8EFFCD";
    }
    if (url == "culinary_place") {
        color = "#FA786D";
    }
    if (url == "souvenir_place") {
        color = "#ED90C4";
    }
    if (url == "worship_place") {
        color = "#42CB6F";
    }
    if (url == "facility") {
        color = "#3b6af9";
    }
    const drawingManagerOpts = {
        // drawingMode: google.maps.drawing.OverlayType.MARKER,
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [
                google.maps.drawing.OverlayType.MARKER,
                google.maps.drawing.OverlayType.POLYGON,
            ],
        },
        markerOptions: { icon: checkIcon(url) },
        polygonOptions: {
            fillColor: color,
            strokeWeight: 2,
            strokeColor: color,
            editable: true,
        },
        map: map,
    };
    drawingManager.setOptions(drawingManagerOpts);
    if (url) {
        google.maps.event.addListener(
            drawingManager,
            "overlaycomplete",
            function (event) {
                switch (event.type) {
                    case google.maps.drawing.OverlayType.MARKER:
                        drawingMarker = event;
                        setMarker(event.overlay, url);
                        break;
                    case google.maps.drawing.OverlayType.POLYGON:
                        setPolygon(event.overlay);
                        break;
                }
            }
        );
    }
}

function setMarker(shape, url = null) {
    let lat = shape.getPosition().lat().toFixed(8);
    let lng = shape.getPosition().lng().toFixed(8);
    //clear marker
    for (i in markerArray) {
        markerArray[i].setMap(null);
    }
    if (selectedMarker) {
        selectedMarker.setMap(null);
        selectedMarker = null;
    }
    selectedMarker = shape;
    document.getElementById("latitude").value = lat;
    document.getElementById("longitude").value = lng;
}

function setPolygon(shape) {
    clearGeom();
    if (selectedShape) {
        selectedShape.setMap(null);
        selectedShape = null;
    }
    selectedShape = shape;
    dataLayer = new google.maps.Data();
    dataLayer.add(
        new google.maps.Data.Feature({
            geometry: new google.maps.Data.Polygon([
                selectedShape.getPath().getArray(),
            ]),
        })
    );
    dataLayer.toGeoJson(function (object) {
        document.getElementById("geo-json").value = JSON.stringify(
            object.features[0].geometry
        );
    });
}
