<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table='feedbacks';
    protected $fillable=['projects_id', 'feedback_types_id', 'users_id', 'rating', 'comment', 'long', 'lat', 'photo', 'video'];

    public function projects(){
        return $this->belongsTo('App\Project');
    }

    public function feedbackType(){
        return $this->belongsTo('App\FeedbackType');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }

}
