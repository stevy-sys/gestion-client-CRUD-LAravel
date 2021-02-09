<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $guarded = [];

    public function scopeActif($query)
    {
       return $query->where("status",1);
    }
    
    public function scopeInactif($query)
    {
       return $query->where("status",0);
    }

    public function scopeClientOfUser($query)
    {
        return $query->where('user_id',Auth::user()->id);
    }

    public function entreprise()
    {
        return $this->belongsTo('App\Entreprise');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
