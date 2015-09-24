<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table='feedbacks';
    protected $fillable=['project_id', 'user_id', 'rating', 'comment', 'long', 'lat', 'photo', 'video', 'created_at', 'updated_at'];

    public function projects(){
        return $this->belongsTo('App\Project');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }

}
