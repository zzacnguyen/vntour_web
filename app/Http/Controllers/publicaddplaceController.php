<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use GuzzleHttp\Client;




class publicaddplaceController extends Controller
{
    public function getaddplace()
    {
    	$city = $this::loadTinh();
    	return view('VietNamTour.content.addplace', compact('city'));
    }

    //load tinh
    public function loadTinh()
    {
    	$client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"loadCity")->getBody();
        return json_decode($response);
    }

    //load district theo id tinh thanh pho
    public function loadDistrict($idCity)
    {
    	$client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"loadDistrict/{$idCity}")->getBody();
        return json_decode($response);
    }

    //load ward
    public function loadWard($idDistrict)
    {
    	$client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost/vntour_api/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET',"loadWard/{$idDistrict}")->getBody();
        return json_decode($response);
    }
}
