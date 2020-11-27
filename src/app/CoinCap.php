<?php

namespace src\app;

class CoinCap {
    private function request($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url); //set url

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // true = return string

        return curl_exec($curl);

        curl_close($curl);
    }

    public function get_json_data()
    {
        $api_url = 'https://api.coincap.io/v2/assets';
        $api_result  = $this->request($api_url);
        file_put_contents(dirname(dirname(dirname(__FILE__))) . "/data/data.json", $api_result);



        return $api_result;
    }
}