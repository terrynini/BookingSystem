<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IOIReservation extends Model
{
    use SoftDeletes;
    protected $table = "ioi_reservations";
    protected $fillable = ['userinfo_id','event_id','cancel_at','checked_in_at'];
    protected $dates =['cancel_at','checked_in_at','deleted_at'];
    
    public function event()
    {
        return $this->belongsTo('App\IOIEvent','event_id');
    }

    public function userinfo()
    {
        return $this->belongsTo('App\Userinfo','userinfo_id');
    }
}
