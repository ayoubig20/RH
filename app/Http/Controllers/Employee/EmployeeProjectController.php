<?php

namespace App\Http\Controllers\Employee;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\CategoryProject;
use App\Models\ProjectsAttachmnets;
use App\Http\Controllers\Controller;

class EmployeeProjectController extends Controller
{
    //
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "List projects";
        $employeeId = auth()->user()->id;
        $projects = Project::where('assigned_to', $employeeId);
        $viewData['categorys'] = CategoryProject::all();
        //  return view('admin.projects.index', compact('projects', 'viewData'));
        if ($request->has('status')) {
            $status = $request->input('status');
            if ($status === 'Panding') {
                $projects = $projects->where('status', 'Panding');
            } elseif ($status === 'In progress') {
                $projects  = $projects->where('status', 'In progress');
            } elseif ($status === 'Finshed') {
                $projects = $projects->where('status', 'Finshed');
            }
        }
        if ($request->has('view') && $request->get('view') == 'card') {
            return view('employee.projects.indexCards', ['viewData' => $viewData, 'projects' => $projects]);
        } else {
            return view('employee.projects.indexList', ['viewData' => $viewData, 'projects' => $projects]);
        }
    }
    public function show($id)
    {
        $viewData = [];

        $project = Project::findOrFail($id);
        $attachments = ProjectsAttachmnets::where('project_id', $project->id)->get();


        return view('employee.projects.show', compact('project', 'viewData', 'attachments'));
    }
}
