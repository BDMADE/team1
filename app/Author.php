<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {

	//
        public function message(){
        return $this->belongsTo('App\Message');
    }
    
    public function member(){
        return $this->belongsToMany('App\Member');
    }
    

}
