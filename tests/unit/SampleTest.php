<?php

class SampleTest extends \PHPUnit\Framework\TestCase
{

	public function testRestApi(){
		$this->assertTrue(true);
		//Create new  http request with GUZZLE HTTP library
		$client = new \GuzzleHttp\Client();
		//Define url of rest api and request method
		$response = $client->request('GET', 'api.openweathermap.org/data/2.5/weather?q=London&appid=c0f764ce5e4c25576b8d6325fc223810&units=metric');
		//Collect data from Rest API
		$body = $response->getBody();
		//Convert JSON encoded data into its original PHP data
		$data = json_decode($body);
		//Check if Rest Api call works(is it200 http request status)
		$this->assertEquals(200, $response->getStatusCode());
		//check is city from Rest Api is London
		$this->assertStringContainsString('London', $data->name);

	}	


}