<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OAuthService;

class ReservationController extends Controller
{
    protected $AuthService;

    public function __construct(OAuthService $AuthService){
        $this->AuthService = $AuthService;
    }
    
    public function index(Request $request){
        $code = $this->AuthService->getInfo();
        $url = $this->AuthService->getUrl();
        return view("index", ['code' => $code, 'OAuth_url' => $url] );
    }
}
