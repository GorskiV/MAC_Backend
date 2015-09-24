<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table='projects';
    protected $fillable=['name', 'description', 'photo', 'video', 'feedback_types_id'];

    public function projectUser(){
        return $this->hasMany('App\ProjectUser');
    }

    public function feedback(){
        return $this->hasMany('App\Feedback');
    }

    public function creator(){
        return $this->belongsTo('App\User');
    }

    public function projectType(){
        return $this->belongsTo('App\ProjectType');
    }
}
