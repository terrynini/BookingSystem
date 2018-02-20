<?php

namespace App\Services;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class OAuthService
{
    protected $API_url;
    protected $API_token;
    protected $Client_id; 
    protected $ClientSecret;
    
    public function __construct(){
        $this->API_url = config('OAuth.API_url');
        $this->API_token = config('OAuth.API_token');
        $this->Client_id = config('OAuth.Client_id');
        $this->ClientSecret = config('OAuth.ClientSecret');
    }

    public function getInfo(){
        if(isset($_GET['code'])){
            $client = new Client(); //GuzzleHttp\Client
            $url = 'https://api.cc.ncu.edu.tw/oauth/oauth/token?'
                    .'grant_type=authorization_code&code='.$_GET['code']
                    .'&client_id='.$this->Client_id.'&client_secret='.$this->ClientSecret;
            
            try{
                $response = $client->request('POST', $url, [
                ]);
            }catch (\Exception $e){
                return null;
            }
            return var_dump($response); 
        }
        return null;
    }

    public function getUrl(){
        return $this->API_url;
    }
}
