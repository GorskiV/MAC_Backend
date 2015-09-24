<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    //
    protected $table='project_types';
    protected $fillable=['name'];

    public function feedback(){
        return $this->hasMany('App\Projects');
    }
}
