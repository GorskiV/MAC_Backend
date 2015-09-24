<?php

namespace App\Http\Controllers;

use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class VendorProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $projects = \App\Project::where('creator', '=', $user->id)->get();
        return view('owner.projects', compact(['projects', 'user']));
    }

    public function addUsersToProject($id){
        $projectId = $id;
        $user = \Auth::user();
        $project = \App\Project::find($id);
        $users = User::where('role_id', '=', '2')->get();
        $project_users = ProjectUser::where('project_id', '=', $id)->get();
        $result = [];

        if(!count($project_users)){
            foreach ($users as $u) {
                $result[] = $u;
            }
        }else {
            foreach ($project_users as $p) {
                foreach ($users as $u) {
                    if ($u->id != $p->user_id) {
                        $result[] = $u;
                    }
                }
            }
        }
        return view('owner.project.adduser', compact('projectId', 'user', 'result'));
    }

    public function storeUsersToProject(){
        $id = Input::get('id');
        $users = Input::get('users');
        foreach($users as $u){
            $project_user = new ProjectUser();
            $project_user->project_id = $id;
            $project_user->user_id = $u;
            $project_user->save();
        }

        return redirect('vendor/my-projects');
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
        $user = \Auth::user();
        $project = \App\Project::find($id);
        $users = \App\Project::find($id)->projectUser;

        $projectUsers = [];
        foreach($users as $u){
            $projectUsers[] =  \App\User::find($u->user_id);
        }
        return view('owner.project.index', compact('project', 'user', 'projectUsers'));
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
}
