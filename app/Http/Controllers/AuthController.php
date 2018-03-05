<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OAuthService;
use Carbon\Carbon;

class AuthController extends Controller
{
    protected $AuthService;

    public function __construct(OAuthService $AuthService){
        $this->AuthService = $AuthService;
    }

    public function auth(Request $reuqest){
        $url = $this->AuthService->getUrl();
        return redirect($url);
    }

    public function token(Request $request){
        $token = $this->AuthService->getToken();
        $token['get_time'] = Carbon::now();
        session($token);
        return redirect()->route('ioi_index');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('ioi_index');
    }
}
