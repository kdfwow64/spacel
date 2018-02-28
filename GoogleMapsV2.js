    var map;
    var directionsDisplay;
    $(document).ready(function () {
        initMap();
    });


    function loadMaps() {
        $(document).on("click", "#shuttleInfoBtn", function (e) {
            if ($("#shuttleOptions").css("display") == 'none') {
                $("#shuttleOptions").css("display", "block");
                $("#wayPointsOption").css("display", "none");

            }
            else {

                $("#shuttleOptions").css("display", "none");
            }

        });
        $(document).on("click", "#addWayPoint", function (e) {
            if ($("#wayPointsOption").css("display") == 'none') {
                $("#wayPointsOption").css("display", "block");
                $("#shuttleOptions").css("display", "none");

            }
            else {

                $("#wayPointsOption").css("display", "none");
            }

        });
        $(document).on("click", "#addStop", function (e) {
            addStop();
        });
        $.ajax({
            url: 'api.php?action=getShuttleData',
            method: "POST",
            success: function (response) {

                for (i = 0; i < response.length; i++) {
                    route = response[i];
                    showOnMap(route);
                }

            }
        });
    }


    function showOnMap(route) {
        var directionsService = new google.maps.DirectionsService;
        directionsDisplay = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: true
        });
        waypoints = [];
        if (route.wayPoints.length > 0) {
            for (l = 0; l < route.wayPoints.length; l++) {
                if(route.wayPoints[l].isLatLng==1){
                    waypoints.push({location: new google.maps.LatLng(route.wayPoints[l].lat, route.wayPoints[l].lng) });
                }
                else{
                    waypoints.push({location: route.wayPoints[l].waypoint});
                }
            }
        }

        displayRoute(route.startingPoint, route.startingPoint, directionsService,
            directionsDisplay, waypoints, route.shuttleName, route);

    }

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: {lat: 38.906013, lng: -77.037691},
        });
        var centerControlDiv = document.createElement('div');
        var centerControl = new CenterControl(centerControlDiv, map);
        centerControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);
        loadMaps();
    }

    var marker = [];
    var stopMarker = [];
    var wayPointsMarker = [];
    var infoWindows = [];

    var speed = "";
    var polyline = [];
    var stepIndex = 0;
    var legIndex = 0;

    var route;
    var randomid;
    var startPos;
    var speed = 100; // km/h

    var delay = 100;

    var infowindow;
    ;


    function getTime(timeInMiliseconds) {
        var mint = parseInt((timeInMiliseconds / 1000) / 60);
        var seconds = parseInt((timeInMiliseconds / 1000) % 60);

        return mint + " mins";
    }

    function IsTargetIsStop(mPosition, shuttleName) {
        shuttleId = shuttleName.replace("Shuttle ", "");
        localArray = stopMarker[shuttleId];
        if(Array.isArray(localArray)){

            for (i = 0; i < localArray.length; i++) {

                if(CompareLatLng(localArray[i].position, mPosition, 10)){

                    return true;
                }
                //
                // if (Compare(route.legs[i].steps[0].start_location.lat(), mPosition.lat()) && Compare(route.legs[i].steps[0].start_location.lng(), mPosition.lng())) {
                //     //return true if location found to be successor of previous quesiotns.
                //     return true;
                // }
            }
        }
        //Only to stop on stops
        return false;
    }


    function displayRoute(origin, destination, service, display, waypoints, markerTitle, shuttleData) {
        var id = shuttleData.id;
        randomid = id;
        service.route({
            origin: origin,
            destination: destination,
            waypoints: waypoints,
            travelMode: 'DRIVING',

            avoidTolls: true
        }, function (response, status) {
            if (status === 'OK') {
                // display.setDirections(response);
                polyline[id] = getPolyLines(response.routes[0].overview_polyline, markerTitle);
                polyline[id].setMap(map);
                arrayOfLatLng = null;
                arrayOfLatLng = polyline[id].getPath().b;
                mPosition = response.routes[0].legs[legIndex].steps[stepIndex].start_location;


                firstMarker = new google.maps.Marker({
                    map: map,
                    position: mPosition,
                    icon: ""
                });

                startPos = mPosition;
                map.setCenter(mPosition);
                route = response.routes[0];
                var indexK = 0;
                var opened = false;
                var localInfoWindows = [];
                var localStopMarker = [];

                if (shuttleData.wayPoints.length > 0) {
                    for (k = 0; k < shuttleData.wayPoints.length; k++) {
                        wayPoint = shuttleData.wayPoints[k];

                        waypointPosition = route.legs[k + 1].start_location;
                        if (wayPoint.isstop==1) {
                            localStopMarker[indexK] = {};
                            localStopMarker[indexK] = new google.maps.Marker({
                                map: map,
                                position: waypointPosition,
                                icon: "red.png"
                            });
                            localInfoWindows[indexK] = {};
                            localInfoWindows[indexK] = new google.maps.InfoWindow({
                                content: "<div id='shuttle" + id + "" + indexK + "'></div>"
                            });

                            indexK++;
                        }
                        else {
                            wayPoint = new google.maps.Marker({
                                map: map,
                                position: waypointPosition,
                                icon: "waypoint.png"
                            });
                        }
                    }
                    infoWindows[id] = localInfoWindows;
                    stopMarker[id] = localStopMarker;

                }

                if(infoWindows[id].length>0){
                        for(k=0; k<infoWindows[id].length; k++){

                            if(k==0){
                                stopMarker[id][0].addListener('click', function (event) {
                                    if (opened) {
                                        infoWindows[id][0].close(map, stopMarker[id][0] );
                                        opened = false;
                                    }
                                    else {
                                        infoWindows[id][0].open(map, stopMarker[id][0]);
                                        opened = true;
                                    }
                                });
                            }
                            else if(k==1){
                                stopMarker[id][1].addListener('click', function (event) {
                                    if (opened) {
                                        infoWindows[id][1].close(map, stopMarker[id][1] );
                                        opened = false;
                                    }
                                    else {
                                        infoWindows[id][1].open(map, stopMarker[id][1]);
                                        opened = true;
                                    }
                                });
                            }
                            else if(k==2){
                                stopMarker[id][2].addListener('click', function (event) {
                                    if (opened) {
                                        infoWindows[id][2].close(map, stopMarker[id][2] );
                                        opened = false;
                                    }
                                    else {
                                        infoWindows[id][2].open(map, stopMarker[id][2]);
                                        opened = true;
                                    }
                                });
                            }


                    }
                }

                //
                // // if (route.legs[0].end_address == 'Dulles International Airport (IAD), 1 Saarinen Cir, Dulles, VA 20166, USA') {
                // //     stopMarker1 = new google.maps.Marker({
                // //         map: map,
                // //         position: new google.maps.LatLng(38.955560000000006, -77.45048000000001),
                // //         icon: "red.png"
                // //     });
                // //     infowindow1 = new google.maps.InfoWindow({
                // //         content: "<div id='car21'></div>"
                // //     });
                // //     stopMarker1.addListener('click', function () {
                // //         if (opened) {
                // //             infowindow1.close(map, stopMarker1);
                // //             opened = false;
                // //         }
                // //         else {
                // //             infowindow1.open(map, stopMarker1);
                // //             opened = true;
                // //         }
                // //     });
                // // }
                //
                //
                // stopMarker.addListener('click', function () {
                //     if (opened1) {
                //         infowindow.close(map, stopMarker);
                //         opened1 = false;
                //     }
                //     else {
                //         infowindow.open(map, stopMarker);
                //         opened1 = true;
                //     }
                // });
                // infowindow1.open(map, stopMarker1);
                //Custom Controlls


                marker[id] = new google.maps.Marker({
                    icon: "caricon.png",
                    map: map,
                    label: markerTitle
                });
                marker[id].setPosition(mPosition);
                animateMarker(marker[id], arrayOfLatLng, speed, stopMarker[id], markerTitle, id);
            } else {
                alert('Could not display directions due to: ' + status);
            }
        });
    }


    function animateMarker(marker, coords1d, km_h, stopMarker, markerTitle, id) {


        marker.addListener('position_changed', function () {

            try {

                for (indexIJ = 0; indexIJ < stopMarker.length; indexIJ++) {
                    var distance = CalculateDistance(coords1d, marker.position, stopMarker[indexIJ].position);
                    if (distance != 0) {
                        var timeinmilliseconds = ((distance / 1000) / km_h) * 60 * 60 * 1000;
                        var time = getTime(timeinmilliseconds);
                        document.getElementById('shuttle' + id + "" + indexIJ).innerHTML = 'Shuttle  ' + id + ' arrive in ' + time;
                    }
                }
            }

            catch (e) {
                // console.log(e);
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
                if (IsTargetIsStop(dest, marker.label)) {
                    setTimeout(goToPoint, 30000);

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


        var poly = new google.maps.Polyline({
            path: coords,
        });
        if (google.maps.geometry.poly.isLocationOnEdge(position, poly, .00001)) {

            for (i = 0; i < coords.length; i++) {

                j = 0;
                if (i - 1 >= 0) {
                    j = i - 1;
                }

                if (CompareLatLng(coords[i], position, 10)) {
                    return i;
                }
            }
            return -1;
        }
        return -1;

    }

    function CompareLatLng(latlng1, latlng2, tolerance) {

        var distance = google.maps.geometry.spherical.computeDistanceBetween(latlng1, latlng2);

        if (distance < tolerance) {
            return true;
        }
        else {
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
            }

        }
        return distance;
    }

    function getPolyLines(enocoded, carType) {

        var decodedPoints =
            google.maps.geometry.encoding.decodePath(enocoded);

        var color = '';
        if (carType == 'Shuttle 1') {
            color = '#fb0a0a';
        }
        else if (carType == 'Shuttle 2') {
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

    function CenterControl(controlDiv, map) {

        // Set CSS for the control border.
        var controlUI = document.createElement('div');
        controlUI.id = "shuttleInfoBtn";
        controlUI.className="mapButton";
        controlUI.style.cursor = 'pointer';

        controlUI.title = 'Click to recenter the map';
        controlDiv.appendChild(controlUI);



        var anotherUI = document.createElement('div');
        anotherUI.id = "addWayPoint";
        anotherUI.className="mapButton";

        anotherUI.style.marginLeft = '20px';
        anotherUI.title = 'Add Waypoint to Shuttle';
        controlDiv.appendChild(anotherUI);

        // Set CSS for the control interior.
        var controlText = document.createElement('img');
        // controlText.style.color = 'rgb(25,25,25)';
        // controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
        // controlText.style.fontSize = '16px';
        // controlText.style.lineHeight = '38px';
        //
        controlText.src = "bus.png";
        controlText.height = "64";
        // controlText.innerHTML = 'Shuttles Info';

        controlUI.appendChild(controlText);

        var anotherText = document.createElement('img');
        anotherText.src = "gps.png";
        anotherText.height = "64";

        anotherUI.appendChild(anotherText);

        // // Setup the click event listeners: simply set the map to Chicago.
        // controlUI.addEventListener('click', function() {
        //     debugger;
        // });
        lazzyLoadShuttleData(controlDiv, 1);
        lazzyLoadShuttleData(controlDiv, 0);

    }

    function shuttlevisibleChanged(id) {
        if ($("#shuttle" + id).is(':checked')) {
            polyline[id].setMap(map);
            marker[id].setMap(map);
        }
        else {
            polyline[id].setMap(null);
            marker[id].setMap(null);
        }
    }

    function createShuttleList(data) {
        html = '<label style="color:white; font-size:16px;">Arriving Soon</label></br>';
        for (i = 0; i < data.length; i++) {
            shuttle = data[i];
            html += '<input type="checkbox" id="shuttle' + shuttle.id + '" onchange="shuttlevisibleChanged(' + shuttle.id + ')" checked/>' + shuttle.shuttleName + '<label for="shuttle\' + shuttle.id + \'"></label></br>';
        }
        return html;


    }
    function createWayPointOption(data){


        html = '<label style="color: #ffffff; font-size: 16px;">Add Stop or WayPoint</label></br>';

        html += '<input type="text" id="address" class="textPopup" /></br>';
        html += '<select id="typeOfPoint" class="selectPopup">' +
                '<option value="-1">Select Stop or Way Point</option> ' +
                '<option value="0">WayPoint</option> ' +
                '<option value="1">Stop</option> ' +
            '</select></br>';
        html += '<select id="shuttle" class="selectPopup">' +
                '<option>Select a Shuffle</option>';
        for(i=0; i< data.length; i++){
            html+= '<option value="'+data[i].id+'">'+data[i].shuttleName+'</option>';
        }
        html += '</select></br>';


        html+= '<button class="btn btn-info" id="addStop" style="width: 70%;margin-left: 35px;margin-top: 10px;align-content: center;padding-left: 40px;">Add Stop</button>'

        return html;
    }

    function addStop(){
        var addrs = $('#address').val();
        var type = $('#typeOfPoint').val();
        var shuttle = $('#shuttle').val();
        if(shuttle!=-1 && type!=-1 && addrs!=""){
            $.ajax({
                url: 'api.php?action=insertWayPoint',
                data:{
                    routeId: shuttle,
                    waypoint: addrs,
                    isstop: type
                },
                method: "POST",
                success: function(response){
                    if(response.status){
                        console.log(response.message);
                        location.reload();
                    }
                    else{
                        alert("Error Occured");

                        debugger;
                    }
                },
                error: function(data){
                    debugger;
                }
            });
        }
        else{
            alert("Please fill all the fields");
        }
        console.log(addrs + "--" + type + "--"+shuttle);
        // alert('this is alert');
    }


    function lazzyLoadShuttleData(controlDiv, mode) {
        $.ajax({
            url: 'api.php?action=shuttlesInfo',
            method: 'POST',
            success: function (data) {
               if(mode===1){
                   controlDiv.innerHTML = '\n' +
                       '<div id="shuttleOptions" style="display: none" class="popup">\n' +
                       createShuttleList(data) + '</div>' + controlDiv.innerHTML;
               }
               else{
                   controlDiv.innerHTML = '\n' +
                       '<div id="wayPointsOption" style="display: none" class="popup waypoint">\n' +
                       createWayPointOption(data) + '</div>' + controlDiv.innerHTML;
               }
            }
        });
    }