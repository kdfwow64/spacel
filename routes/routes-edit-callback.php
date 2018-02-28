<?php
  $servername = "107.170.194.72";
  $username = "trackmyshuttle";
  $password = "trackmyshuttle";
  $dbname = "trackmyshuttle";
  $con = new mysqli($servername, $username, $password, $dbname);
  // Check connection

  if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
  }
  $con->query("SET NAMES 'utf8'");
  $con->query("SET CHARACTER SET utf8");

  $last_modified_datetime=date("Y-m-d H:i:s");

  if($_POST["action"]=='load'){
    $sql="select id,name,color,length,coordinates from route order by name";
    $result=$con->query($sql);
    $route_array = array();
    if($result){
        while ($row = $result->fetch_assoc()){
            array_push($route_array,$row);
        }
    }else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $sql="select route,name,type,address,lat,lng from marker order by route";
    $result=$con->query($sql);
    $marker_array = array();
    if($result){
        while ($row = $result->fetch_assoc()){
            array_push($marker_array,$row);
        }
    }else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $json_response=array(
        'route_data'=>$route_array,
        'marker_data'=>$marker_array
    );
    echo json_encode($json_response);
    $con->close();
    exit;
  }
  if($_POST["action"]=='delete'){
      $id=$_POST["id"];
      $name=$_POST["name"];
      $sql = "DELETE FROM route WHERE id=".$id;
      $result=$con->query($sql);
      if(!$result){
          echo "Error: " . $sql . "<br>" . $con->error;
      }
      //delete route markers
      $sql="DELETE FROM marker WHERE route='{$name}'";
      $result=$con->query($sql);
      if(!$result){
          echo "Error: " . $sql . "<br>" . $con->error;
      }
      $con->close();
      exit;
  }
  if ($_POST["table"] == 'route') {
        $data = json_decode($_POST["data"], true);
        $route_data=$data["route_data"];
        $id = $route_data["id"];
        $name =mysqli_real_escape_string($con,$route_data["name"]);
        $color = mysqli_real_escape_string($con,$route_data["color"]);
        $length=$route_data["length"];
        $coordinates = $route_data["coordinates"];
        if ($_POST["action"] == 'add') {
            $sql="SELECT * FROM route WHERE name='{$name}'";
            $result=$con->query($sql);
            $num_rows=mysqli_num_rows($result);
            if($num_rows>0){
                $json_response = array("result" => "fail");
                echo json_encode($json_response);
                $con->close();
                exit;
            }
            $sql = "INSERT INTO route(name,color,length,coordinates,last_modified_datetime) ";
            $sql .= "VALUES('{$name}','{$color}',{$length},'{$coordinates}','{$last_modified_datetime}');";
            $result = $con->query($sql);
            if ($result) {
                $json_response = array("result" => "success","id" => $con->insert_id);
                echo json_encode($json_response);
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
            //add route markers
            $marker_data=$data["marker_data"];
            for($i=0;$i<count($marker_data);$i++){
                $marker_name=$marker_data[$i]["name"];
                $type=$marker_data[$i]["type"];
                $address=$marker_data[$i]["address"];
                $lat=$marker_data[$i]["lat"];
                $lng=$marker_data[$i]["lng"];
                $sql = "INSERT INTO marker(route,name,type,address,lat,lng,last_modified_datetime) ";
                $sql .= "VALUES('{$name}','$marker_name','{$type}','{$address}',{$lat},{$lng},'{$last_modified_datetime}');";
                $result=$con->query($sql);
                if(!$result){
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
            }
            $con->close();
            exit;
        }else if($_POST["action"] == 'update') {
            $sql="SELECT * FROM route WHERE id<>{$id} and name='{$name}'";
            $result=$con->query($sql);
            $num_rows=mysqli_num_rows($result);
            if($num_rows>0){
                $json_response = array("result" => "fail");
                echo json_encode($json_response);
                $con->close();
                exit;
            }
            $sql="SELECT * FROM route WHERE id={$id}";
            $result=$con->query($sql);
            $row = $result->fetch_assoc();
            $pre_name=$row["name"];

            $sql="UPDATE route SET ";
            $sql.="name='".$name."',";
            $sql.="color='".$color."',";
            $sql.="length=".$length.",";
            $sql.="coordinates='".$coordinates."',";
            $sql.="last_modified_datetime='".$last_modified_datetime."' ";
            $sql.="WHERE id=".$id;
            $result=$con->query($sql);
            if($result){
                $json_response = array("result" => "success");
                echo json_encode($json_response);
            }else{
                echo "Error: " . $sql . "<br>" . $con->error;
            }
            //update route markers
            if($name!=$pre_name){
                  $sql="UPDATE marker SET ";
                  $sql.="route='".$name."',";
                  $sql.="last_modified_datetime='".$last_modified_datetime."' ";
                  $sql.="WHERE route='{$pre_name}'";
                  $result=$con->query($sql);
                  if(!$result){
                      echo "Error: " . $sql . "<br>" . $con->error;
                  }
            }
            $con->close();
            exit;
        }
    }
?>
