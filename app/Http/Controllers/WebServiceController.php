<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProjectListForUser($id){

        /*$projectList = DB::table('projects')
            ->select('projects.name', 'projects.id', 'projects.photo')
            ->where('projects_has_users.users_id', '=', $id)
            ->where('projects_has_users.projects_id', '=', 'projects.id')
            ->get();*/
        /*$projectList = DB::table('projects')
            ->join('projects_has_users', 'projects.id', '=', 'projects_has_users.projects_id')
            ->join('projects_has_users', $id, '=', 'projects_has_users.users_id')
            ->select('projects.name', 'projects.id', 'projects.photo')
            ->get();*/

//        /*$projectList = DB::table('projects')
//            ->join('projects_has_users', 'projects.id', '=', 'projects_has_users.projects_id')
//            ->join('users', 'users.id', '=', $id)
//            ->select('projects.name', 'projects.id', 'projects.photo')
//            ->get();*/

        $user = \App\User::find($id);
        $projectList = $user->projectUser;

        return $projectList;
    }

    public function projectStatistic($id){
        /*$projectStatistic = DB::table('projects')
            ->where('finalized', 1)
            ->avg('');*/

        /*$projectDetails=$project=\App\Project::find($id);
        $projectReviwers=$project->feedback->count();
        return compact('projectDetails', 'projectReviwers');*/

        /*$projectDescription = DB::table('projects')
            ->select('name', 'description', 'photo')
            ->where('projects.id', '=', $id)
            ->get(); //promjeni project_id

        $projectUserNum=\App\Project::find($id);
        $projectUserNum->projectUser->count(); ////promjeni project_id

        $projectFeedbackNum=\App\Project::find($id);
        $projectFeedbackNum->feedback->count(); ////promjeni project_id*/


        $projectRating = \App\Project::find($id);
        $projectRating->feedback->avg('rating'); ////promjeni project_id
        return compact('projectRating');
    }

    public function usersFeedbacks($id){
        $usersFeedback=\App\User::find($id);
        $usersFeedback->feedback;
        return $usersFeedback; //Unknown column 'feedbacks.user_id'
    }

    public function userInfo($id){
        $userInfo=\App\User::where('email', '=', $id)->firstOrFail();
        return $userInfo; //radi
    }

    /**
     * za dani projekt tko je kreator
     * @param $id
     * @return mixed
     */
    public function projectCreator($id){
        $project=\App\Project::find($id);
        $project->creator();

        $creator=\App\User::find($project->creator);
        return $creator; //radi
    }
}

