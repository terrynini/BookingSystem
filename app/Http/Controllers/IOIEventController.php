<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IOIEvent;
use Carbon\Carbon;
class IOIEventController extends Controller
{
    public function __construct(){
        $this->middleware('admin',['except' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $json = [];
        if( isset($request->start) && isset($request->end) )
        {
            //show period for fullcalendar
            $events = IOIEvent::whereBetween('begin_at',[ $request->start, $request->end])->get();
            foreach ($events as $event){
                $e = IOIEvent::findOrFail($event->id);
                $color = $e->reservation == NULL ? 'green' : 'red';
                if($e->timer->gt(Carbon::now()))
                    $color = "orange";
                $eventobject = ['title' => $event->id,
                                'start'=> $event->begin_at->toDateTimeString(),
                                'end' => $event->begin_at->addMinutes(10)->toDateTimeString(),
                                'color' => $color,
                                'textColor' => 'white'
                                ];
                $json[] = $eventobject;
            }
        }
        else
        {
            //show all available event
            $list = IOIEvent::available()->get();
            foreach($list as $ele){
                if($ele->reservation == NULL )
                    $json[] = ['name' => $ele->id, 'value' => $ele->id];
            }
        }
        return response()->json($json);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ioi.events_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $begin_at = Carbon::createFromFormat("Y-m-d\TH:i", $request->begin_at);
        for($rw = 0;$rw<$request->repeat_week;$rw++)
            for($rd = 0;$rd<$request->repeat_day;$rd++)
                for($re = 0;$re<$request->repeat;$re++)
                    IOIEvent::create(['timer'=>Carbon::createFromFormat("Y-m-d\TH:i",$request->timer),
                    'begin_at'=>$begin_at
                    ->copy()
                    ->addMinutes($request->period*$re)
                    ->addDays($rd)
                    ->addWeeks($rw),
                    ]);

        return redirect('ioi/events/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        //
    }
}
