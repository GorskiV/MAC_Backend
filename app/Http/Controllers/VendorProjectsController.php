<?php

namespace App\Http\Controllers;

use App\ProjectUser;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $user = \Auth::user();
        $project = \App\Project::find($id);
        $users = DB::statement('select users.* from users join projects_has_users on users.id = projects_has_users.user_id where'. $id.'=projects_has_users.project_id and users.role_id=2');
        dd($users);
        return view('owner.project.adduser', compact(['projects', 'user']));
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
}
