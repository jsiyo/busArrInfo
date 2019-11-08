<?php
class BusArrInfo {
    public $data        = array();
    public $stationId   = 'YOUR STATIONID';
    private $serviceKey = 'YOUR SERVICEKEY';
    private $params     = array();

    public function __construct($stationId = null) {
        if (is_null($stationId) == false) {
            $this->stationId    = $stationId;
        }
        return $this->setValue();
    }

    public function setValue() {
        $arr    = array(
            'serviceKey' => $this->serviceKey,
            'stId' => $this->stationId
        );

        foreach ($arr as $key => $value) {
            if (empty($value) == true) {
                exit('ERROR');
            }
            $this->params[$key] = trim($value);
        }

        return $this->getData();
    }

    public function getData() {
        if (empty($this->params) == true) {
            return false;
        } else {
            $url    = 'http://ws.bus.go.kr/api/rest/arrive/getLowArrInfoByStId?';
            foreach ($this->params as $key => $value) {
                if ($key == 'serviceKey') {
                    $url    .= $key."={$value}";
                } else {
                    $url    .= "&".urlencode($key)."=".urlencode($value);
                }
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            $response   = curl_exec($ch);
            curl_close($ch);
            if (empty($response) == false) {
                return $this->data  = simplexml_load_string($response);
            }
        }
    }
}
