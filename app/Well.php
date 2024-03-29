<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Well extends Model
{
    protected $fillable = ['name', 'town', 'longitude', 'latitude'];

    public function field()
    {
        return $this->belongsTo('App\Field');
    }

    public function sandControls()
    {
        return $this->hasMany('App\SandControl');
    }

    public function fluidOccurrence()
    {
        return $this->hasOne('App\FluidOccurrence');
    }
}
