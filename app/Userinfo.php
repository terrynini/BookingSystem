<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //
    public function scopeIsAdmin($query){
        return $query->where('identity_code', session('id'))->where('privilege','>','0');
    }

    public function scopeUser($query){
        return $query->where('identity_code', session('id'));
    }
    public function reservation()
    {
        return $this->hasMany('App\IOIReservation','userinfo_id');
    }
}
