<?php

class Location extends Controller
{

    public function index()
    {

    }

    public function getDistance($x, $y) {

        $vip_x = 23.121748;
        $vip_y = 113.291059;
        $distance = $this->distance($vip_x, $vip_y, $x, $y);
        // fix the bug, if distance is exactly the same, make them close to each other
        if ($distance == 0) {
            $distance = 0.0000001;
        }

        echo json_encode($distance);
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