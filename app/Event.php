<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','start_date','end_date','role'];

    public function rendezvous()
    {
        return $this->hasMany('App\Rendezvou');
    } 
    public function roleevent()
    {
        return $this->belongsTo('App\Role','role');
    } 
    public function client()
    {
        return $this->belongsTo('App\Client','client_id');
    } 
}
