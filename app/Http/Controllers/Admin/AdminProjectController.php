<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\CategoryProject;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class AdminProjectController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "List projects";
        $projects = Project::all();
        $viewData['categorys']=CategoryProject::all();
        //  return view('admin.projects.index', compact('projects', 'viewData'));
        if($request->has('view') && $request->get('view') == 'card') {
            return view('admin.projects.indexCards', ['viewData' => $viewData,'projects'=>$projects]);
        } else {
            return view('admin.projects.indexList', ['viewData' => $viewData,'projects'=>$projects]);
        }  
      }

    
    public function show(Project $project)
    {
        $viewData = [];
        $viewData["title"] = "List projects";

        return view('admin.projects.show', compact('project', 'viewData'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // validate single image
            'document' => 'file|mimes:doc,pdf|max:2048', // validate single document
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // create new project
        $project = new Project;
        $project->name = $request->name;
        $project->category = $request->category;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->description = $request->description;
        // $project->setImage("1.png");
        $project->save();

        $project->save();

        // process uploaded image
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image'); // get the uploaded file
        //     // generate unique filename
        //     $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        //     // save image to disk
        //     $image->storeAs('images/projectsImages', $filename);
        //     // create new image record for the project
        //     $project->setImage($filename);
        // }
        if (!$request->hasFile('image')) {
            $project->image = 'project-2.png';
        } else {
            // Save the uploaded image to storage
            $imageName = uniqid() . '.' . $request->file('image')->extension();
            Storage::disk('public')->put(
                'assets/projects/' . $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $project->image  = $imageName;
        }
        $project->save();

        // process uploaded document
        if ($request->hasFile('document')) {
            $document = $request->file('document'); // get the uploaded file
            // generate unique filename
            $filename = uniqid() . '.' . $document->getClientOriginalExtension();
            // save document to disk
            $document->storeAs('public/documents', $filename);
            // create new document record for the project
            $project->setDocument($filename);
        }
        $project->save();

        // redirect to projects index page
        return redirect()->route('admin.projects.index');
    }


    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }
    // public function edit($id)
    // {
    //     return view('admin.projects.edit', ['project' => $project]);
    // }

    public function update(Request $request,Project $id)
    {
        // Validate form input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'budget' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'document' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'nullable',
        ]);
    
        // Find the project 
        $project = Project::findOrFail($id);
    
        // Update project data
        $project->name = $request->input('name');
        $project->category = $request->input('category');
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');
        $project->budget = $request->input('budget');
        $project->description = $request->input('description');
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = $project->getId() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public', $imageName);
            $project->setImage($imageName);
        }
    
        // Handle document upload
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            if ($document->isValid()) {
                $filename = time() . '_' . $document->getClientOriginalName();
                $document->move(public_path('documents'), $filename);
                $project->documents()->delete(); // delete existing documents
                $project->setDocument($filename);
            }
        }
    
        // Save project data
        $project->update($validatedData);
    
        // Redirect to project index with success message
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }
    // public function update(Request $request, Project $project)
    // {
    //     $validatedData = $request->all();
    //     $project->update($validatedData);

    //     return redirect()->route('projects.index', $project->id)
    //         ->with('success', 'Projet mis à jour avec succès.');
    // }
    public function destroy(Project $Project)
    {
        $Project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project supprimé avec succès.');
    }
}
