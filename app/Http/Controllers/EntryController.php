<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OAuthService;

class EntryController extends Controller
{

    protected $AuthService;

    public function __construct(OAuthService $AuthService){
        $this->AuthService = $AuthService;
    }

    public function index(Request $request){
        return view('entry');
    }

    public function ioi_index(Request $request){
        $token = $request->session()->all();
        $Info = $this->AuthService->getInfo($token);
        $url = $this->AuthService->getUrl();
        return view("ioi.index", ['OAuth_url' => $url] );
    }

    public function cpr_index(Request $request){
        $token = $request->session()->all();
        $Info = $this->AuthService->getInfo($token);
        $url = $this->AuthService->getUrl();
        return view("ioi.index", ['OAuth_url' => $url] );
    }
}
