var map;
var directionsDisplay;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: {lat: 38.906013, lng: -77.037691},
// Australia.
    });


    var directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer({
        map: map,
        suppressMarkers: true
    });
    var directionsService1 = new google.maps.DirectionsService;
    directionsDisplay1 = new google.maps.DirectionsRenderer({
        map: map,
        suppressMarkers: true
    });
    var directionsService2 = new google.maps.DirectionsService;
    directionsDisplay2 = new google.maps.DirectionsRenderer({
        map: map,
        suppressMarkers: true
    });


    // directionsDisplay.addListener('directions_changed', function() {
    //     computeTotalDistance(directionsDisplay.getDirections());
    // });

    displayRoute('The Ritz-Carlton, Washington, DC', 'The Ritz-Carlton, Washington, DC', directionsService,
        directionsDisplay, [{location: 'Arlington Cemetery Metro Station'}, {location: 'Ronald Reagan Washington National Airport'}], "Car 1");

    displayRoute('The Ritz-Carlton, Washington, DC', 'The Ritz-Carlton, Washington, DC', directionsService1,
        directionsDisplay1, [{location: 'Arlington Cemetery Metro Station'}, {location: 'Dulles International Airport'}], "Car 2");


    displayRoute('The Ritz-Carlton, Washington, DC', 'The Ritz-Carlton, Washington, DC', directionsService2,
        directionsDisplay2, [{location: 'Arlington Cemetery Metro Station'}, {location: 'Capitol Hill, Washington, DC, USA'}], "Car 3");
}

var marker;
var marker2;
var marker3;

var speed = "";
var polyline;
var stepIndex = 0;
var legIndex = 0;

var route;
var startPos;
var speed = 120; // km/h

var delay = 100;

var infowindow;
;


function getTime(timeInMiliseconds) {
    var mint = parseInt((timeInMiliseconds / 1000) / 60);
    var seconds = parseInt((timeInMiliseconds / 1000) % 60);

    return mint + " Mints " + seconds + " Sec";
}

function IsTargetIsStop(mPosition) {
    for (i = 0; i < route.legs.length; i++) {
        if (Compare(route.legs[i].steps[0].start_location.lat(), mPosition.lat()) && Compare(route.legs[i].steps[0].start_location.lng(), mPosition.lng())) {
            return true;
        }
    }
    return false;
}


function displayRoute(origin, destination, service, display, waypoints, markerTitle) {
    service.route({
        origin: origin,
        destination: destination,
        waypoints: waypoints,
        travelMode: 'DRIVING',

        avoidTolls: true
    }, function (response, status) {
        if (status === 'OK') {
            // display.setDirections(response);
            polyline = getPolyLines(response.routes[0].overview_polyline, markerTitle);
            polyline.setMap(map);


            arrayOfLatLng = null;
            arrayOfLatLng = polyline.getPath().b;
            mPosition = response.routes[0].legs[legIndex].steps[stepIndex].start_location;


            firstMarker = new google.maps.Marker({
                map: map,
                position: mPosition,
                icon: ""
            });

            startPos = mPosition;
            map.setCenter(mPosition);
            route = response.routes[0];
            stopMarker = new google.maps.Marker({
                map: map,
                position: route.legs[0].end_location,
                icon: "red.png"
            });
            var stopMarker1, infowindow1, opened=true, opened1 = true;
            if (route.legs[1].end_address == 'Ronald Reagan Washington National Airport (DCA), Arlington, VA 22202, USA') {
                stopMarker1 = new google.maps.Marker({
                    map: map,
                    position: route.legs[1].end_location,
                    icon: "red.png"
                });
                infowindow1 = new google.maps.InfoWindow({
                    content: "<div id='car11'></div>"
                });
                stopMarker1.addListener('click', function () {
                    if(opened){
                        infowindow1.close(map, stopMarker1);
                        opened = false;
                    }
                    else{
                        infowindow1.open(map, stopMarker1);
                        opened = true;
                    }
                });

            }
            else if (route.legs[1].end_address == 'Dulles International Airport (IAD), 1 Saarinen Cir, Dulles, VA 20166, USA') {
                debugger;
                stopMarker1 = new google.maps.Marker({
                    map: map,
                    position: new google.maps.LatLng(38.955560000000006, -77.45048000000001 ),
                    icon: "red.png"
                });
                infowindow1 = new google.maps.InfoWindow({
                    content: "<div id='car21'></div>"
                });
                stopMarker1.addListener('click', function () {
                    if(opened){
                        infowindow1.close(map, stopMarker1);
                        opened = false;
                    }
                    else{
                        infowindow1.open(map, stopMarker1);
                        opened = true;
                    }
                });
            }
            else if (route.legs[1].end_address == 'Capitol Hill, Washington, DC, USA') {
                stopMarker1 = new google.maps.Marker({
                    map: map,
                    position: route.legs[1].end_location,
                    icon: "red.png"
                });
                infowindow1 = new google.maps.InfoWindow({
                    content: "<div id='car31'></div>"
                });
                stopMarker1.addListener('click', function () {
                    if(opened){
                        infowindow1.close(map, stopMarker1);
                        opened = false;
                    }
                    else{
                        infowindow1.open(map, stopMarker1);
                        opened = true;
                    }
                });
            }
            infowindow = new google.maps.InfoWindow({
                content: "<div id='car1'></div></br><div id='car2'></br></div><div id='car3'></div>"
            });


            stopMarker.addListener('click', function () {
                if(opened1){
                    infowindow.close(map, stopMarker);
                    opened1 = false;
                }
                else{
                    infowindow.open(map, stopMarker);
                    opened1 = true;
                }
            });

            infowindow1.open(map, stopMarker1);

            marker = new google.maps.Marker({
                icon: "caricon.png",
                map: map,
                label: markerTitle
            });
            marker.setPosition(mPosition);

            animateMarker(marker, arrayOfLatLng, speed, stopMarker, stopMarker1, markerTitle);
        } else {
            alert('Could not display directions due to: ' + status);
        }
    });
}
function animateMarker(marker, coords1d, km_h, stopMarker, stopMarker1, markerTitle) {


    marker.addListener('position_changed', function () {

        var distance = CalculateDistance(coords1d, marker.position, stopMarker.position);
        var distance1 = CalculateDistance(coords1d, marker.position, stopMarker1.position);

        if(markerTitle=='Car 2'){
            var distance1 = CalculateDistance(coords1d, marker.position, stopMarker1.position);

        }
        if (distance != 0) {
            var timeinmilliseconds = ((distance / 1000) / km_h) * 60 * 60 * 1000;
            var time = getTime(timeinmilliseconds);
            try {

                if (markerTitle == 'Car 1') {
                    document.getElementById('car1').innerHTML = 'Shuttle  1 will arrive in ' + time;
                }
                else if (markerTitle == 'Car 2') {
                    document.getElementById('car2').innerHTML = 'Shuttle  2 will arrive in ' + time;
                    document.getElementById('car3').innerHTML = 'Shuttle  3 will arrive in ' + time;
                }
                else {
                    document.getElementById('car3').innerHTML = 'Shuttle 3 will arrive in ' + time;
                }
            }
            catch (e) {
                console.log(e);

            }
        }
        if (distance1 != 0) {
            var timeinmilliseconds = ((distance1 / 1000) / km_h) * 60 * 60 * 1000;
            var time = getTime(timeinmilliseconds);

            try {
                if (markerTitle == 'Car 1') {
                    document.getElementById('car11').innerHTML = 'Shuttle  1 will arrive in ' + time;
                }
                else if (markerTitle == 'Car 2') {
                    document.getElementById('car21').innerHTML = 'Shuttle  2 will arrive in ' + time;

                }
                else {
                    document.getElementById('car31').innerHTML = 'Shuttle 3 will arrive in ' + time;
                }
            }
            catch (e) {
                console.log(e);
            }

        }


    });

    var coords1 = null;
    coords1 = coords1d;
    var target = 0;
    var km_h = km_h || 50;
    coords1.push(startPos);
    // var car1 = car || "Car 1";

    // var timeInMilliSeconds = ((distnaceMeter/1000)/km_h) * 60 *60 *1000;

    function goToPoint() {

        var lat = marker.position.lat();
        var lng = marker.position.lng();
        var step = (km_h * 1000 * delay) / 3600000; // in meters
        var dest;
        if (Array.isArray(coords1[target])) {
            dest = new google.maps.LatLng(
                coords1[target][0], coords1[target][1]);
        }
        else {
            dest = new google.maps.LatLng(
                coords1[target].lat(), coords1[target].lng());
        }

        var distance =
            google.maps.geometry.spherical.computeDistanceBetween(
                dest, marker.position); // in meters

        var numStep = distance / step;
        var i = 0;
        var deltaLat = (dest.lat() - lat) / numStep;
        var deltaLng = (dest.lng() - lng) / numStep;

        function moveMarker() {
            lat += deltaLat;
            lng += deltaLng;
            i += step;

            if (i < distance) {
                marker.setPosition(new google.maps.LatLng(lat, lng));
                setTimeout(moveMarker, delay);
            }
            else {
                marker.setPosition(dest);

                target++;
                if (target == (coords1.length - 1)) {
                    target = 0;
                }
                if (IsTargetIsStop(dest)) {
                    setTimeout(goToPoint, 3000);

                }
                else {
                    setTimeout(goToPoint, delay);

                }

            }
            var car = "M17.402,0H5.643C2.526,0,0,3.467,0,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759c3.116,0,5.644-2.527,5.644-5.644 V6.584C23.044,3.467,20.518,0,17.402,0z M22.057,14.188v11.665l-2.729,0.351v-4.806L22.057,14.188z M20.625,10.773 c-1.016,3.9-2.219,8.51-2.219,8.51H4.638l-2.222-8.51C2.417,10.773,11.3,7.755,20.625,10.773z M3.748,21.713v4.492l-2.73-0.349 V14.502L3.748,21.713z M1.018,37.938V27.579l2.73,0.343v8.196L1.018,37.938z M2.575,40.882l2.218-3.336h13.771l2.219,3.336H2.575z M19.328,35.805v-7.872l2.729-0.355v10.048L19.328,35.805z";
            var icon = {
                path: car,
                scale: .7,
                strokeColor: 'white',
                strokeWeight: .10,
                fillOpacity: 1,
                fillColor: '#404040',
                offset: '5%',
                // rotation: parseInt(heading[i]),
                anchor: new google.maps.Point(10, 25) // orig 10,50 back of car, 10,0 front of car, 10,25 center of car
            };
            icon.rotation = google.maps.geometry.spherical.computeHeading(new google.maps.LatLng(lat, lng), new google.maps.LatLng(lat + deltaLat, lng + deltaLng));
            marker.setIcon(icon);
        }

        moveMarker();
    }

    goToPoint();
}

function SearchInArray(coords, position) {



    var poly=new google.maps.Polyline({
        path:coords,
    });
    if(google.maps.geometry.poly.isLocationOnEdge(position, poly, .00001)){

        for (i = 0; i < coords.length; i++) {

            j=0;
            if(i-1>=0){
                j = i-1;
            }

            if (CompareLatLng(coords[i], position, 10)) {
                return i;
            }
        }
        return -1;
    }
debugger;
    return -1;

}
function CompareLatLng(latlng1, latlng2, tolerance) {

    var distance = google.maps.geometry.spherical.computeDistanceBetween(latlng1,latlng2);

    if(distance<tolerance){
        return true;
    }
    else{
        false;
    }
    //
    //
    // if (Compare(latlng1.lat(), latlng2.lat()) && Compare(latlng1.lng(), latlng2.lng())) {
    //     return true;
    // }
    // return false;
}
function CalculateDistance(coords, markerPosition, endPosition) {

    var endIndex = SearchInArray(coords, endPosition);
    var startIndex = SearchInArray(coords, markerPosition);

    if (endIndex == -1 || startIndex == -1) {
        return 0;
    }
    distance = 0;
    for (i = startIndex; i <= endIndex; i++) {
        j = 0;
        if (startIndex > 0) {
            j = i - 1;
        }
        if (i >= coords.length) {
            break;
        }
        try {
            dest = new google.maps.LatLng(
                coords[i].lat(), coords[i].lng());
            fromDest = new google.maps.LatLng(
                coords[j].lat(), coords[j].lng());

            distance +=
                google.maps.geometry.spherical.computeDistanceBetween(
                    dest, fromDest);
        }
        catch (e) {
            debugger;
        }

    }
    return distance;
}

function getPolyLines(enocoded, carType) {

    var decodedPoints =
        google.maps.geometry.encoding.decodePath(enocoded);

    var color = '';
    if (carType == 'Car 1') {
        color = '#fb0a0a';
    }
    else if (carType == 'Car 2') {
        color = 'blue';
    }
    else {
        color = 'green';
    }
    return new google.maps.Polyline({
        path: decodedPoints,
        strokeColor: color,
        strokeOpacity: 1,
        strokeWeight: 5

    });
}

function computeTotalDistance(result) {
    var total = 0;
    var myroute = result.routes[0];
    for (var i = 0; i < myroute.legs.length; i++) {
        total += myroute.legs[i].distance.value;
    }
    total = total / 1000;
    document.getElementById('total').innerHTML = total + ' km';
}




function Compare(val1, val2) {
    if (val1 + 0.0001 >= val2.toFixed(4) && val1 - 0.0001 <= val2.toFixed(4)) {
        return true;
    }
    return false;
}



// function animateMarker2(marker2, coordsx, km_h)
// {
//
//     var coords = null;
//     coords = coordsx;
//     console.log('called');
//     console.log(coords.length);
//     var target = 0;
//     var km_h = km_h || 50;
//     coords.push([startpos.lat(), startpos.lng()]);
//
//     function goToPoint()
//     {
//         var lat = marker2.position.lat();
//         var lng = marker2.position.lng();
//         var step = (km_h * 1000 * delay) / 3600000; // in meters
//         var dest;
//         if(Array.isArray(coords[target])){
//             dest = new google.maps.LatLng(
//                 coords[target][0], coords[target][1]);
//         }
//         else{
//             dest = new google.maps.LatLng(
//                 coords[target].lat(), coords[target].lng());
//         }
//
//         var distance =
//             google.maps.geometry.spherical.computeDistanceBetween(
//                 dest, marker2.position); // in meters
//
//         var numStep = distance / step;
//         var i = 0;
//         var deltaLat = (dest.lat() - lat) / numStep;
//         var deltaLng = (dest.lng() - lng) / numStep;
//
//         function moveMarker()
//         {
//             lat += deltaLat;
//             lng += deltaLng;
//             i += step;
//
//             if (i < distance)
//             {
//                 marker2.setPosition(new google.maps.LatLng(lat, lng));
//                 setTimeout(moveMarker, delay);
//             }
//             else
//             {   marker2.setPosition(dest);
//
//                 target++;
//                 if (target == (coords.length-1)){
//                     target=0;
//                 }
//                 if(IsTargetIsStop(dest)){
//                     setTimeout(goToPoint, 3000);
//
//                 }
//                 else{
//                     setTimeout(goToPoint, delay);
//
//                 }
//
//             }
//             var car = "M17.402,0H5.643C2.526,0,0,3.467,0,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759c3.116,0,5.644-2.527,5.644-5.644 V6.584C23.044,3.467,20.518,0,17.402,0z M22.057,14.188v11.665l-2.729,0.351v-4.806L22.057,14.188z M20.625,10.773 c-1.016,3.9-2.219,8.51-2.219,8.51H4.638l-2.222-8.51C2.417,10.773,11.3,7.755,20.625,10.773z M3.748,21.713v4.492l-2.73-0.349 V14.502L3.748,21.713z M1.018,37.938V27.579l2.73,0.343v8.196L1.018,37.938z M2.575,40.882l2.218-3.336h13.771l2.219,3.336H2.575z M19.328,35.805v-7.872l2.729-0.355v10.048L19.328,35.805z";
//             var icon = {
//                 path: car,
//                 scale: .7,
//                 strokeColor: 'white',
//                 strokeWeight: .10,
//                 fillOpacity: 1,
//                 fillColor: '#404040',
//                 offset: '5%',
//                 // rotation: parseInt(heading[i]),
//                 anchor: new google.maps.Point(10, 25) // orig 10,50 back of car, 10,0 front of car, 10,25 center of car
//             };
//             icon.rotation = google.maps.geometry.spherical.computeHeading(new google.maps.LatLng(lat, lng), new google.maps.LatLng(lat+deltaLat, lng+deltaLng));
//             marker2.setIcon(icon);
//         }
//         moveMarker();
//     }
//     goToPoint();
// }
//
// function animateMarker3(marker3, coords3, km_h)
// {
//     var coords = null;
//     coords = coords3;
//     console.log('called');
//     console.log(coords.length);
//     var target = 0;
//     var km_h = km_h || 50;
//     coords.push([startPos.lat(), startPos.lng()]);
//
//     function goToPoint()
//     {
//         var lat = marker3.position.lat();
//         var lng = marker3.position.lng();
//         var step = (km_h * 1000 * delay) / 3600000; // in meters
//         var dest;
//         if(Array.isArray(coords[target])){
//             dest = new google.maps.LatLng(
//                 coords[target][0], coords[target][1]);
//         }
//         else{
//             dest = new google.maps.LatLng(
//                 coords[target].lat(), coords[target].lng());
//         }
//
//         var distance =
//             google.maps.geometry.spherical.computeDistanceBetween(
//                 dest, marker3.position); // in meters
//
//         var numStep = distance / step;
//         var i = 0;
//         var deltaLat = (dest.lat() - lat) / numStep;
//         var deltaLng = (dest.lng() - lng) / numStep;
//
//         function moveMarker()
//         {
//             lat += deltaLat;
//             lng += deltaLng;
//             i += step;
//
//             if (i < distance)
//             {
//                 marker3.setPosition(new google.maps.LatLng(lat, lng));
//                 setTimeout(moveMarker, delay);
//             }
//             else
//             {   marker3.setPosition(dest);
//
//                 target++;
//                 if (target == (coords.length-1)){
//                     target=0;
//                 }
//                 if(IsTargetIsStop(dest)){
//                     setTimeout(goToPoint, 3000);
//
//                 }
//                 else{
//                     setTimeout(goToPoint, delay);
//
//                 }
//
//             }
//             var car = "M17.402,0H5.643C2.526,0,0,3.467,0,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759c3.116,0,5.644-2.527,5.644-5.644 V6.584C23.044,3.467,20.518,0,17.402,0z M22.057,14.188v11.665l-2.729,0.351v-4.806L22.057,14.188z M20.625,10.773 c-1.016,3.9-2.219,8.51-2.219,8.51H4.638l-2.222-8.51C2.417,10.773,11.3,7.755,20.625,10.773z M3.748,21.713v4.492l-2.73-0.349 V14.502L3.748,21.713z M1.018,37.938V27.579l2.73,0.343v8.196L1.018,37.938z M2.575,40.882l2.218-3.336h13.771l2.219,3.336H2.575z M19.328,35.805v-7.872l2.729-0.355v10.048L19.328,35.805z";
//             var icon = {
//                 path: car,
//                 scale: .7,
//                 strokeColor: 'white',
//                 strokeWeight: .10,
//                 fillOpacity: 1,
//                 fillColor: '#404040',
//                 offset: '5%',
//                 // rotation: parseInt(heading[i]),
//                 anchor: new google.maps.Point(10, 25) // orig 10,50 back of car, 10,0 front of car, 10,25 center of car
//             };
//             icon.rotation = google.maps.geometry.spherical.computeHeading(new google.maps.LatLng(lat, lng), new google.maps.LatLng(lat+deltaLat, lng+deltaLng));
//             marker3.setIcon(icon);
//         }
//         moveMarker();
//     }
//     goToPoint();
// }