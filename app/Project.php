<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table='projects';
    protected $fillable=['name', 'description', 'photo', 'video'];

    public function projectUser(){
        return $this->hasMany('App\ProjectUser');
    }

    public function feedback(){
        return $this->hasMany('App\Feedback');
    }

    public function creator(){
        return $this->belongsTo('App\User');
    }
}
