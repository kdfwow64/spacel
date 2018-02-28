<?php
error_reporting(E_ALL);


require('lib/functions.php');
require('lib/DB.php');
require('lib/DbFunctions.php');



$func = new DbFunctions();



$action = $_GET['action'];
header('Content-Type: application/json');

if($action=='getShuttleData'){

    echo $func->getShuttleRecord();
    exit;
}
else if($action=='insertWayPoint'){
    $routeId = $_POST['routeId'];
    $waypoint = $_POST['waypoint'];
    $isStop = $_POST['isstop'];
    echo $func->insertWayPoint($routeId, $waypoint, $isStop);
}
else if($action=='insertRoute'){
    $startPoint = $_POST['startPoint'];
    $endPoint = $_POST['endPoint'];
    $shuttleName = $_POST['shuttleName'];
    echo $func->createRoute($startPoint, $endPoint, $shuttleName);
}
else if($action='shuttlesInfo'){
    echo $func->OnlyShuttles();
}
else{
    echo 'Un Authorized Access';
}