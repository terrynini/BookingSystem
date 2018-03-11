<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    protected $fillable = ['name','type','email','identity_code','department','group','title','phone','privilege'];
    //
    public function scopeMatchAdmin($query){
        return $query->where('identity_code', session('id'))->where('name',session('name'))->where('privilege','>','0');
    }
    
    public function scopeMatchSuAdmin($query){
        return $query->where('identity_code', session('id'))->where('name',session('name'))->where('privilege','>','1');
    }

    public function scopeUser($query){
        return $query->where('identity_code', session('id'))->where('name',session('name'))->firstOrFail();
    }
    
    public function reservation()
    {
        return $this->hasMany('App\IOIReservation','userinfo_id');
    }
}
