<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OAuthService;
use App\Userinfo;
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
        $url = $this->AuthService->getUrl();
        $token = $request->session()->all();

        if(session("id") === NULL && session("access_token")!== NUll){
            $this->AuthService->getInfo($token);
            //check if a new user,try to complete  userinfo
            $user = Userinfo::where('identity_code',session('id'))->where('name',session('name'))->first();
            if($user === NULL)
            {
                $user = new Userinfo;
                $user->name = session('name');
                $user->type = session('type');
                $user->identity_code = session('id');
                $user->department = session('unit');
                $user->group = session('group');
                $user->title = session('title');
                $user->privilege = 0;
                $user->save();
            } 
            else
            {
                $user->type = session('type');
                $user->department = session('unit');
                $user->group = session('group');
                $user->title = session('title');
                $user->save();
            }
        }
        return view("ioi.index", ['OAuth_url' => $url] );
    }

    public function cpr_index(Request $request){
        $token = $request->session()->all();
        $Info = $this->AuthService->getInfo($token);
        $url = $this->AuthService->getUrl();
        return view("cpr.index", ['OAuth_url' => $url] );
    }
}
