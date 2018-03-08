<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class IOIEvent extends Model
{
    protected $table = "ioi_events";
    protected $fillable = ['begin_at','timer','deleted_at'];
    protected $dates = ['begin_at','timer','deleted_at'];
    
    public function reservation()
    {
        return $this->hasOne('App\IOIReservation','event_id');
    }
}
