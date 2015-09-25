<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WebServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProjectListForUser($email)
    {
        $user = \App\User::where('email', '=', $email)->first();
        $usersProjects = $user->projectUser;
        $projectList=array();
        foreach($usersProjects as $project){
            $projectList[]=\App\Project::find($project->project_id);
        }
        return $projectList;
    }

    public function projectStatistic($id)
    {

        $project = \App\Project::find($id);
        $projectUserNum = $project->projectUser->count();
        $projectFeedbackNum = $project->feedback->count();
        $creator = \App\User::find($project->creator);
        $averageRating = $project->feedback()
            ->select(DB::raw('avg(rating) as rating'))
            ->first();

        return compact('project', 'projectUserNum', 'projectFeedbackNum', 'projectRating', 'creator', 'averageRating');

    }

    public function usersFeedbacks($email)
    {
        $usersFeedback = \App\User::where('email', '=', $email)->first();
        $usersFeedback->feedback;
        return $usersFeedback;
    }

    public function userInfo($email)
    {
        $userInfo = \App\User::where('email', '=', $email)->firstOrFail();
        return $userInfo;
    }

    public function projectCreator($id)
    {
        $project = \App\Project::find($id);
        $project->creator();

        $creator = \App\User::find($project->creator);
        return $creator;
    }

    public function getLogin($email, $password)
    {
        //$matchThese = ['email' => htmlspecialchars(trim($email)), 'password' => htmlspecialchars(trim($password))];
        $user = \App\User::where('email', '=', $email)->first();
        if(Hash::check($password, $user->password)){
            return compact('user');
        }else
            return 'no';
    }

    public function getRegister($email, $password, $first_name, $last_name)
    {
        $user=new User();
        $user->email=htmlspecialchars(trim($email));
        $user->password=bcrypt(htmlspecialchars(trim($password)));
        $user->first_name=htmlspecialchars(trim($first_name));
        $user->last_name=htmlspecialchars(trim($last_name));
        $user->role_id=2;
        if($user->save()){
            \App\User::where('email', '=', $email)->first();
            return compact('user');
        }else
            return "no";
    }

    public function feedbackStore($score, $comment, $geoLat, $geoLong, $photoData, $userEmail, $projectId){
        $feedback=new Feedback();
        $feedback->project_id=htmlspecialchars(trim($projectId));
        $feedback->rating=htmlspecialchars(trim($score));
        $feedback->comment=htmlspecialchars(trim($comment));
        $feedback->long=htmlspecialchars(trim($geoLong));
        $feedback->lat=htmlspecialchars(trim($geoLat));

        /*$feedback->photo=htmlspecialchars(trim($photoData));
        $data=$photoData;
        $data = str_replace('data:image/jpeg;base64,', '', $data);
        $data = str_replace(' ', '+', $data);
        $data = base64_decode($data);
        $file = '/public/upload/images/'. uniqid() . '.jpeg';
        $success = file_put_contents($file, $data);
        if($success){
            $feedback->photo=$file;
        }else{
            $feedback->photo=null;
        }*/
        $user=\App\User::where('email', '=', htmlspecialchars(trim($userEmail)))->first();
        //dd($user->id);
        $feedback->user_id=$user->id;
        if($feedback->save()) {
            return 'ok';
        }else
            return 'no';
    }
}

