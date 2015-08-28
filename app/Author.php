<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {

	//
        public function message(){
        return $this->belongsToMany('App\Message');
    }

}
