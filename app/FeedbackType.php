<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackType extends Model
{
    //
    protected $table='feedback_types';
    protected $fillable=['name'];

    public function feedback(){
        return $this->hasMany('App\Feedback');
    }
}
