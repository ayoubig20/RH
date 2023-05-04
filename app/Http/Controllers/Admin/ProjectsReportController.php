<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsReportController extends Controller
{
    public function index()
    {

        return view('admin.report.index');
    }

    public function searchProjects(Request $request)
    {
        $rdio = $request->rdio;
    
        // case search by status of project
        if ($rdio == 1) {
            // case if don't select date
            if ($request->type != 'all') {
                $projects = Project::select('*')->where('status', '=', $request->type)->get();
            } else {
                $projects = Project::all();
            }
            $type = $request->type;
            return view('admin.report.index', compact('type'))->withDetails($projects);
        } else {
            // case select date
            if ($request->type != 'all') {
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $type = $request->type;
    
                $projects = Project::whereBetween('start_date', [$start_at, $end_at])
                            ->where('status', '=', $request->type)
                            ->get();
    
                return view('admin.report.index', compact('type', 'start_at', 'end_at'))->withDetails($projects);
            } else {
                // case search by id
                $projects = Project::select('*')->where('id', '=', $request->projectId)->get();
                return view('admin.report.index')->withDetails($projects);
            }
        }
    }
}
