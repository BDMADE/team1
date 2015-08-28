<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    public function files(){
        return $this->belongsToMany('App\File');
    }
    
    
    public function  extension(){
        
        return $this->hasOne('App\Extension');
        
    }
    
    
}
