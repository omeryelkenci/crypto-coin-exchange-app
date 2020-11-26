<?php 


class CryptoDataController 
{
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
		
		return $api_result;
	}
}


