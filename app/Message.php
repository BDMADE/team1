<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    public function inbox(){
        return $this->belongsToMany('App\Inbox');
    }
    
    public function member(){
        return $this->belongsToMany('App\Member');
    }
    
    //this function will be used for who send message;
    public function mailer(){
        return $this->belongsToMany('App\Member');
    }

}
