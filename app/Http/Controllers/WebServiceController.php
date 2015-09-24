<?php

namespace App\Http\Controllers;

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

    public function getProjectListForUser($id)
    {

        $user = \App\User::find($id);
        $projectList = \App\Project::where('creator', '=', $user->id)->firstOrFail();

        return $projectList;
    }

    public function projectStatistic($id)
    {

        $project = \App\Project::find($id);
        $projectUserNum = $project->projectUser->count();
        $projectFeedbackNum = $project->feedback->count();
        $creator = \App\User::find($project->creator);
        $averageRating = $project->feedback()
            ->select(DB::raw('avg(rating)'))
            ->first();

        return compact('project', 'projectUserNum', 'projectFeedbackNum', 'projectRating', 'creator', 'averageRating');

    }

    public function usersFeedbacks($id)
    {
        $usersFeedback = \App\User::find($id);
        $usersFeedback->feedback;
        return $usersFeedback;
    }

    public function userInfo($id)
    {
        $userInfo = \App\User::where('email', '=', $id)->firstOrFail();
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
            return 'ok';
        }else
            return 'no';
    }

    public function getRegister($email, $password)
    {
        $user=new User();
        $user->email=htmlspecialchars(trim($email));
        $user->password=bcrypt(htmlspecialchars(trim($password)));
        $user->role_id=2;
        if($user->save()){
            return "ok";
        }else
            return "no";
    }
}

