<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name', 'identity_code', 'privilege'];


    public function scopeIsAdmin($query){
        return $query->where('identity_code', session('id'));
    }
}
