<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $guarded = [];

    public function scopeActif($query)
    {
       return $query->where("status",1)->get();
    }
    
    public function scopeInactif($query)
    {
       return $query->where("status",0)->get();
    }

    public function entreprise()
    {
        return $this->belongsTo('App\Entreprise');
    }
}
