<?php

namespace App\Services;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class OAuthService
{
    protected $API_token;
    protected $Client_id; 
    protected $ClientSecret;

    public function __construct(){
        $this->API_token = config('OAuth.API_token');
        $this->Client_id = config('OAuth.Client_id');
        $this->ClientSecret = config('OAuth.ClientSecret');
    }

    public function getToken(){
        if(isset($_GET['code'])){
            $client = new Client(); //GuzzleHttp\Client
            $url = 'https://api.cc.ncu.edu.tw/oauth/oauth/token';
            try{
                $response = $client->request('POST', $url, 
                ['form_params' => [
                    'grant_type' => 'authorization_code',
                    'code' => $_GET['code'],
                    'client_id' => $this->Client_id,
                    'client_secret' => $this->ClientSecret,
                ]]);
            }catch (\Exception $e){
                return null;
            }
            return json_decode($response->getBody(),true); 
        }
        return null;
    }

    public function refreshToken(){
        return null;
    }

    public function getInfo($token){
            if($token == null)
                return "fail";
            $client = new Client();
            $url = 'https://api.cc.ncu.edu.tw/personnel/v1/info';
            try{
                $response = $client->request('GET', $url, 
                ['headers' => [
                    'Authorization' => "Bearer ".$token['access_token'],
                ]]);
            }catch (\Exception $e){
                return null;
            }
            session(json_decode($response->getBody(),true));
            //return  json_decode($response->getBody(),true);
    }

    public function getUrl(){
        $url = "https://api.cc.ncu.edu.tw/oauth/oauth/authorize?".
               "response_type=code&scope=user.info.basic.read&client_id=".$this->Client_id;
        return $url;
    }
}
