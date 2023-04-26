<?php

namespace App\Http\Controllers\Employee;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\CategoryProject;
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
            return view('admin.projects.indexCards', ['viewData' => $viewData, 'projects' => $projects]);
        } else {
            return view('admin.projects.indexList', ['viewData' => $viewData, 'projects' => $projects]);
        }
    }
}
