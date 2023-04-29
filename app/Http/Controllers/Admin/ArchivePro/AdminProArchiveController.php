<?php

namespace App\Http\Controllers\Admin\ArchivePro;

use App\Models\Project;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\CategoryProject;
use App\Http\Controllers\Controller;

class AdminProArchiveController extends Controller
{
    //

    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "List projects";
        $projects = Project::onlyTrashed()->get();
        $viewData['categorys'] = CategoryProject::all();
        return view('admin.projects.archive.index', compact('projects', 'viewData'));
        // return $request;
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
    public function update(Request $request)
    {
        $id = $request->id;
        Project::withTrashed()->where('id', $id)->restore();
        session()->flash('restore_project');
        return redirect('/admin/projects');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::withTrashed()->where('id', $id)->first();
        $project->forceDelete();
        session()->flash('delete_project');
        return back();
    }
    public function deleteAll(Request $request)
    {
        $delete_all_id = json_decode($request->ids);
    
        $project= Project::withTrashed()->whereIn('id', $delete_all_id);
        $project->forceDelete();
        session()->flash('delete_project');
        return back();
    }
}
