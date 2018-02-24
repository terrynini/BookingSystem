<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OAuthService;
use Carbon\Carbon;
class ReservationController extends Controller
{
    protected $AuthService;

    public function __construct(OAuthService $AuthService){
        $this->AuthService = $AuthService;
    }
    
    public function index(Request $request){
        $token = $request->session()->all();
        $Info = $this->AuthService->getInfo($token);
        $url = $this->AuthService->getUrl();
        return view("body.body_index", ['OAuth_url' => $url, 'info' => $Info] );
    }

    public function auth(Request $request){
        $token = $this->AuthService->getToken();
        $token['get_time'] = Carbon::now();
        session($token);
        return redirect()->route('body_index');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('body_index');
    }
}
