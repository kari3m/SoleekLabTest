<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client;

class CountryController extends Controller
{
  public function index()
  {
    $hapi = new HolidayAPI\v1('94bd25ca-c7d4-4d03-b57b-1d95cbbed372');

    $parameters = array(
      // Required
      'country' => 'US',
      'year'    => 2016,
      // Optional
      // 'month'    => 7,
      // 'day'      => 4,
      // 'previous' => true,
      // 'upcoming' => true,
      // 'public'   => true,
      // 'pretty'   => true,
    );
    $response = $hapi->holidays($parameters);

    $countries = array('aa','bb','cc');
    return response()->json($response);
  }
  public function getAllCountries(){

// $client = new \GuzzleHttp\Client();
//   $response = $client->request('GET', 'https://restcountries.eu/rest/v2/all');
//   $response = $response->getBody()->getContents();
//   echo '<pre>';
//   print_r($response);
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://restcountries.eu/rest/v2/all",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Postman-Token: c296553a-8a16-4461-b0c9-c4065794323a",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return response()->json($response);
    }
  }
}
