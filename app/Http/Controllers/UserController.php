<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userinfo;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware("admin");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Userinfo::where('privilege' , '>', 0)->get();
        return view("user",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->identity_code == NULL || $request->name == NULL)
        {
            $status = "欄位不可為空白";
            return response()->json(compact("status"));
        }

        $status = "success";
        $user = Userinfo::where('identity_code',$request->identity_code)->where('name',$request->name)->first();
        if($user === NULL)
        {
            Userinfo::create($request->all());
        }
        else if($user->privilege == $request->privilege)
            $status = "管理員已存在";
        else
        {
            $user->privilege = $request->privilege;
            $user->save();
        }
        return response()->json(compact("status"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = Userinfo::findOrFail($id);
        $user->privilege = 0;
        $user->save();
        
        return response()->json(['status' => 'success']);
    }
}
