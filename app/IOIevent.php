<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class IOIevent extends Model
{
    protected $table = "ioi_events";
    protected $fillable = ['begin_at'];

    public function setBeginAtAttribute($date){
        $this->attributes['begin_at'] = Carbon::createFromFormat('Y-m-d\TH:i', $date);
    }
    
}
