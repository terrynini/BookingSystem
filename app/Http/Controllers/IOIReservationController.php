<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IOIReservation;
use App\IOIEvent;
use App\Userinfo;
use Carbon\Carbon;

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
        if(Userinfo::MatchAdmin()->count())
        {
            $records = IOIReservation::latest()->get()->toArray();
        }
        else
        {
            $records = Userinfo::user()->reservation->toArray();
        }   
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
    public function store(Request $request)
    {
        if($request->event_id === NULL || !is_numeric($request->event_id) )
            return response()->json(["status" => "未指定場次"]);

        $status = "success";
        //該月只有一個
        $record = Userinfo::user()->reservation;  
        $event = IOIEvent::findOrFail($request->event_id);
        foreach($record as $ele){
            if($ele->event->begin_at->month == $event->begin_at->month 
                && $ele->event->begin_at->year == $event->begin_at->year)
            {
                $status = "您在該月已有預約：場次".$ele->event->id;
            }

        }
        //還沒有人預約
        if($event->reservation !== NULL)
            $status = "該場次已被預約";
        //還沒有違規
        $count = 0;
        foreach($record as $ele){
            if($ele->checked_in_at === NULL 
                && $ele->event->begin_at->lt(Carbon::now())
                && $ele->event->begin_at->gt(Carbon::now()->subMonths(6)))
                $count += 1;
        }
        if($count >= 3)
            $status = "半年內有三次未簽到";
        //還在時限
        if(IOIEvent::available()->find($request->event_id) === NULL)
        {
            $status = "不能預約當天的場次";
        }

        //要檢查例外，還沒建立使用者的時候
        if($status === "success")
        {
            IOIReservation::Create([
                'event_id' => $request->event_id,
                'userinfo_id' => Userinfo::user()->first()->id,
            ]);
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
        if(Userinfo::MatchAdmin()->count())
            $reservation = IOIReservation::findOrFail($id);
        else
            $reservation = Userinfo::user()->reservation()->findOrFail($id);

        if($reservation->event->begin_at->gt(Carbon::now())){
            $reservation->delete();
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'bad']);
    }
}
