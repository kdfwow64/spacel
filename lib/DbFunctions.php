<?php

error_reporting(E_ALL);


class DbFunctions
{

    private $db;

    public function __construct()
    {

        $this->db = new DB();
    }
    public function sync_data()
    {
        try {
            $this->db->delete("live_routes_data", '');
            $this->db->delete("live_route_detail", '');
            $this->db->fetch_data('id, name,coordinates,  color, length, last_modified_datetime', 'route');
            $routes = $this->db->getResultSet();
            $shuttleNumber = 1;
            foreach ($routes as $route) {
                $routeData = array();
                $routeData['color'] = $route->color;
                $routeData['coordinates'] = $route->coordinates;
                $routeData['shuttleName'] = 'Shuttle ' . $shuttleNumber;
                $shuttleNumber++;
//                $data['coordinates'] = $route->coordinates;
                $routeData['length'] = $route->length;
                $routeData['last_modified_datetime'] = $route->last_modified_datetime;

                $this->db->insert_data($routeData, 'live_routes_data');
                $routeId = $this->db->getLastInsertedId();

                $this->db->fetch_data('id, route, type, address, lat, lng, last_modified_datetime', 'marker', ' Where route=\'' . $route->name . '\'');
                $markers = $this->db->getResultSet();
                foreach ($markers as $marker) {
                    $routeDetail = array();
                    $routeDetail['type'] = $marker->type;
                    $routeDetail['routeId'] = $routeId;
                    $routeDetail['address'] = $marker->address;
                    $routeDetail['latitude'] = $marker->lat;
                    $routeDetail['longitude'] = $marker->lng;
                    $routeDetail['last_modified_datetime'] = $marker->last_modified_datetime;
                    $this->db->insert_data($routeDetail, 'live_route_detail');


                }

            }
            $this->db->fetch_data('id, name,  color, length, last_modified_datetime', 'route');


        } catch (Exception $e) {
            dev_print_exit($e);
        }
    }

    public function getShuttleRecord()
    {
        try {
            $this->db->fetch_data('*', 'live_routes_data');
            $routesData = $this->db->getResultSet();
            $dataset = array();

            $i = 0;
            foreach ($routesData as $route) {
                $this->db->fetch_data('address, type, latitude, longitude', 'live_route_detail', 'where routeId = ' . $route->id);
                $route->wayPoints = $this->db->getResultSet();




                $dataset[$i] = $route;
                $i++;
            }
//            dev_print_exit($dataset);

            return json_encode($dataset);

        } catch (Exception $e) {
            return json_encode(['status' => false, 'message' => 'Some problem inserting data to database', 'exception' => $e->getMessage()]);

        }

    }

    public function OnlyShuttles()
    {
        try {
            $this->db->fetch_data('id, shuttleName', 'live_routes_data');
            $shuttleInfo = $this->db->getResultSet();
            return json_encode($shuttleInfo);
        } catch (Exception $e) {
            return json_encode(['status' => false, 'message' => 'Some problem inserting data to database', 'exception' => $e->getMessage()]);
        }
    }


    public function insertWayPoint($routeId, $waypoint, $isStop)
    {
        try {
            $data = array();
            $data["routeId"] = $routeId;
            $data["waypoint"] = $waypoint;
            $data["isstop"] = $isStop;
            $this->db->insert_data($data, 'routesdetail');

            return json_encode(['status' => true, 'message' => 'Successfully Added WayPoint']);
        } catch (Exception $e) {
            return json_encode(['status' => false, 'message' => 'Some problem inserting data to database', 'exception' => $e->getMessage()]);

        }
    }

    public function createRoute($startPoint, $endPoint, $shuttleName)
    {
        try {
            $data = array();
            $data["startingPoint"] = $startPoint;
            $data["endPoint"] = $endPoint;
            $data["shuttleName"] = $shuttleName;
            $this->db->insert_data($data, 'routesdata');

            return json_encode(['status' => true, 'message' => 'Successfully Created Rooute']);
        } catch (Exception $e) {
            return json_encode(['status' => false, 'message' => 'Some problem inserting data to database', 'exception' => $e->getMessage()]);

        }
    }


    public function test()
    {
        return "Hello";
    }

}




