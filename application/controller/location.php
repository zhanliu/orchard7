<?php

class Location extends Controller
{

    public function index()
    {

    }

    public function getDistance($x, $y) {
        $store_x = 0;
        $store_y = 0;
        $address = "";
        $nearest_distance = 10000;
        $nearest_store_id = 0;

        $store_model = $this->loadModel('StoreModel');
        $stores = $store_model->getAllStores();

        $stats_model = $this->loadModel('StoreStatsModel');
        $amount_of_stores = $stats_model->getAmountOfStores();

        if ($amount_of_stores > 0) {

            foreach($stores as $store) {
                $store_x = $store->lat;
                $store_y = $store->lng;

                $distance = $this->distance($store_x, $store_y, $x, $y);
                // fix the bug, if distance is exactly the same, make them close to each other
                if ($distance == 0) {
                    $distance = 0.0001;
                }

                if ($distance < $nearest_distance) {
                    $nearest_distance = $distance;
                    if ($nearest_distance < DELIVERY_DISTANCE) {
                        $address = $store->city . $store->district . $store->address1 . $store->address2;
                        $nearest_store_id = $store->id;
                    }
                }
            }

        }

        $result = array ('distance'=>$nearest_distance,'store_id'=>$nearest_store_id,'address'=>$address);

        echo json_encode($result);


    }

    public function rad($d)
    {
        return $d * 3.1415926535898 / 180.0;
    }

    public function distance($lat1, $lng1, $lat2, $lng2)
    {
        $EARTH_RADIUS = 6378.137;
        $radLat1 = $this->rad($lat1);
        $radLat2 = $this->rad($lat2);
        $a = $radLat1 - $radLat2;
        $b = $this->rad($lng1) - $this->rad($lng2);
        $s = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)));

        return round($s * 10000 * $EARTH_RADIUS) / 10000;
    }
}