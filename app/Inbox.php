<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model {

    public function messages(){
        return $this->belongsToMany('App\Message');
    }

}
