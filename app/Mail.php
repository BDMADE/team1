<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model {

    public function members(){
        
        return $this->belongsToMany('app\Member');
        
    }

}
