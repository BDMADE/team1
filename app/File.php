<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

    public function members(){
        
        return $this->belongsToMany('App\Member');
        
    }
    
    
    public function extensions(){
        
        return $this->belongsToMany('App\Extension');
    }

}
