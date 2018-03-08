<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationRequest;
use App\IOIReservation;
use App\Userinfo;
class IOIReservationController extends Controller
{

    public function __construct(){
        $this->middleware('login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Userinfo::isAdmin()-get())
        $records = Userinfo::where('identity_code',session('id'))->first()->reservation->toArray();
        return view('ioi.reservations', compact("records"));
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
    public function store(StoreReservationRequest $request)
    {
        //要檢查例外，還沒建立使用者的時候
        IOIReservation::Create([
            'event_id' => $request->event_id,
            'userinfo_id' => Userinfo::user()->first()->id,
        ]);
        return redirect('ioi');
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
        //要驗證是否為本人的場次
        //不可刪除從前的場次
        //刪除警告 改用https://getbootstrap.com/docs/4.0/components/modal/
        IOIReservation::where('event_id', $id)->first()->delete();
        return back();
    }
}
