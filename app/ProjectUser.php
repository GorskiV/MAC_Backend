<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //
    protected $table='projects_has_users';
    protected $fillable=['projects_id', 'users_id'];

    public function projects(){
        return $this->belongsTo('App\User');
    }

    public function feedbackType(){
        return $this->belongsTo('App\Project');
    }
}
