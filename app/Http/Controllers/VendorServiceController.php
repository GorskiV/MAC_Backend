<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VendorServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        return view('owner.project.service', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Requests\ProductRequest $request)
    {
        $user = \Auth::user();
        $productType=2;

        $project = new Project();
        $project->creator = $user->id;
        $project->feedback_types_id=$productType;
        $project->name = $request->name;
        $project->description = $request->description;

        $myStr = str_random(10);
        $imageName = $request->name. '_' . $myStr.'_'. $user->id . '.' .$request->file('photo')->getClientOriginalExtension();
        $imageName = $string = str_replace(' ', '', $imageName);
        $imagePath = '/upload/images/' . $imageName;
        $request->file('photo')->move(
            base_path() . '/public/upload/images/', $imageName
        );

        $project->photo = $imagePath;

        if($project->save()){
            return redirect('vendor/my-projects');
        };

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
