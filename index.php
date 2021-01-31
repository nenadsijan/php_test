<?php
//Make a connection with composer
require 'vendor/autoload.php';

class London 
{
	public function getWeather(){	
		//Create new  http request with GUZZLE HTTP library
		$client = new \GuzzleHttp\Client();
		//Define url of rest api and request method
		$response = $client->request('GET', 'api.openweathermap.org/data/2.5/weather?q=London&appid=c0f764ce5e4c25576b8d6325fc223810&units=metric');
		//Collect data from Rest API
		$body = $response->getBody();
		//Convert JSON encoded data into its original PHP data
		$data = json_decode($body);
		//Collect name of city
		$city=$data->name;
		//Collect overall temperature
		$overallTemperature=intval($data->main->temp);
		//Collect temperature description
		$temperatureDescription='';
		foreach ($data->weather as $value) {
			$temperatureDescription=$value->main;
		}
		//Print collected data
		echo  $city . ', '. $temperatureDescription . ', ' . $overallTemperature . ' ' . 'degrees Celsius';
	}
}

$londonObject = new London();
$londonObject->getWeather();
