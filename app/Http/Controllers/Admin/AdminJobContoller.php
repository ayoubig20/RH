<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;

class AdminJobContoller extends Controller
{
    public function index()
    {
        $viewData['jobs'] = Job::all();
        $viewData['departments'] = Department::all();
        return view('admin.jobs.index', compact('viewData'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        // validate the form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'department_id' => 'required|exists:departments,id'
        ]);

        // create a new job using the validated data
        $job = Job::create($validatedData);

        // redirect the user to the jobs index page
        return redirect('/admin/jobs')->with('success', 'Job created successfully!');
    }

    public function show(Job $job)
    {
        return view('admin.jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        // validate the form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'department_id' => 'required|exists:departments,id'
        ]);

        // update the job using the validated data
        $job->update($validatedData);

        // redirect the user to the jobs index page
        return redirect('/admin/jobs')->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        // delete the job from the database
        $job->delete();

        // redirect the user to the jobs index page
        return redirect('/admin/jobs')->with('success', 'Job deleted successfully!');
    }
}
