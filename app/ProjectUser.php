<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //
    protected $table='projects_has_users';
    protected $fillable=['project_id', 'user_id'];
    public $timestamps=false;

    public function projects(){
        return $this->belongsTo('App\User');
    }

    public function feedbackType(){
        return $this->belongsTo('App\Project');
    }
}
