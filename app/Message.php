<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    public function inbox(){
        return $this->belongsToMany('App\Inbox');
    }
    
    public function member(){
        return $this->belongsToMany('App\Member');
    }
    
    public function author(){
        return $this->belongsToMany('App\Author');
    }
    
    
}
