<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model {

    public function files(){
        
        return $this->belongsToMany('App\File');
        
    }

}
