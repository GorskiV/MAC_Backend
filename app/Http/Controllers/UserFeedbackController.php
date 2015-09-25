<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        $usersProjects = $user->projectUser;
        $projectList = array();
        foreach ($usersProjects as $project) {
            $projectList[] = \App\Project::find($project->project_id);
        }

        return view('user.feedback.index', compact('user', 'projectList'));
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
    public function store($id, FeedbackRequest $request)
    {

        $feedback=new Feedback();
        $feedback->rating=$request->count;
        $feedback->comment=$request->comment;
        $feedback->user_id=\Auth::user()->id;
        $feedback->project_id=$request->projectID;

        $myStr = str_random(10);
        if(Input::has('photo')){
            $imageName = $request->name . '_' . $myStr . '_' . \Auth::user()->id . '.' . $request->file('photo')->getClientOriginalExtension();
            $imageName = $string = str_replace(' ', '', $imageName);
            $imagePath = '/upload/images/' . $imageName;
            $request->file('photo')->move(
                base_path() . '/public/upload/images/', $imageName
            );

            $feedback->photo = $imagePath;
        }
        if($feedback->save()) {
            return redirect('user/feedback/'.$request->projectID);
        }else
            return 'no';
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
        $feedbacks = \App\Feedback::where('user_id', '=', $user->id)->orWhere('project_id', '=', $id)->get();

        return view('user.feedback.projectfeedback', compact('project', 'user', 'feedbacks'));
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
