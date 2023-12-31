<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\CategoryProject;
use App\Jobs\DeleteExpiredProject;
use App\Models\ProjectsAttachmnets;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "List projects";
        $projects = Project::paginate(8);
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


    public function show($id)
    {
        $viewData = [];

        $project = Project::withTrashed()->findOrFail($id);
        $attachments = ProjectsAttachmnets::where('project_id', $project->id)->get();


        return view('admin.projects.show', compact('project', 'viewData', 'attachments'));
    }

    public function create()
    {
        session()->flash('Add', 'Project added successfully');

        return view('admin.projects.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'category_id' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // validate single image
            'document' => 'file|mimes:doc,pdf|max:2048', // validate single document
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',

        ]);

        // create new project
        $project = new Project;
        $project->name = $request->name;
        $project->category_id = $request->category_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->description = $request->description;
        $project->budget = $request->budget;
        $project->save();

        $project->save();
        if (!$request->hasFile('image')) {
            $project->image = 'project-default.png';
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
        //     if ($request->hasFile('document')) {
        //         $document = $request->file('document'); // get the uploaded file
        //         // generate unique filename
        //         $filename = uniqid() . '.' . $document->getClientOriginalExtension();
        //         // save document to disk
        //         $document->storeAs('public/documents', $filename);
        //         // create new document record for the project
        //         $project->setDocument($filename);
        //     }
        //     $project->save();

        //     // redirect to projects index page
        // }
        if ($request->hasFile('document')) {
            $project_id = Project::latest()->first()->id;
            $document = $request->file('document');
            if ($document->isValid()) {
                $extension = $document->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $document->move(public_path('Attachments/' . $project_id), $filename);

                $attachments = new ProjectsAttachmnets();
                $attachments->file_name = $filename; // use the new filename instead of the original filename
                $attachments->Created_by = Auth::user()->name;
                $attachments->project_id = $project_id;
                $attachments->save();
            }
        };
        $projects = Project::all();
        $viewData['categorys'] = CategoryProject::all();
        //  return view('admin.projects.index', compact('projects', 'viewData'));
        if ($request->has('view') && $request->get('view') == 'card') {
            session()->flash('Add', 'Project added successfully');
            return view('admin.projects.indexCards', ['viewData' => $viewData, 'projects' => $projects]);
        } else {
            session()->flash('Add', 'Project added successfully');
            return view('admin.projects.indexList', ['viewData' => $viewData, 'projects' => $projects]);
        }
        // return $request;
    }

    public function edit(Request $request, Project $project, $id)
    {
        // $project = Project::findOrFail($id);
        session()->flash('edit', 'Project updated successfully');
        return view('admin.projects.edit', compact('project'));
        //  return $request;
    }


    public function update(Request $request, Project $project)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'category_id' => 'required',
        'budget' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'document' => 'nullable|mimes:pdf,doc,docx|max:2048',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'description' => 'nullable',
    ]);

    // Update the project details
    $project->fill($validatedData);

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
            $extension = $document->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $document->move(public_path('Attachments/' . $project->getId()), $filename);

            $attachment = new ProjectsAttachmnets();
            $attachment->file_name = $filename; // use the new filename instead of the original filename
            $attachment->Created_by = Auth::user()->name;
            $attachment->project_id = $project->getId();
            $attachment->save();
        }
    }

    // Check if the project status is updated to "Finshed"
    if ($request->status === 'Finshed') {
        $project->delete_deadline = Carbon::now()->addDays(3); // set delete deadline to 3 days from now
        $project->save();

        // Queue the job to delete the project and its associated files after the delete deadline
        DeleteExpiredProject::dispatch($project)->delay($project->delete_deadline);
    }

    $project->save();

    return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
}

    public function destroy(Project $project, Request $request)
    {
        $projectFile = $request->has('id_file');
        if ($projectFile) {
            $id = $request->id;
            $project = Project::where('id', $id)->first();
            $attachment = ProjectsAttachmnets::find($request->id_file)->first();
            if ($attachment) {
                $file_path = $project->id . '/' . $attachment->file_name;
                Storage::disk('public_uploads')->delete($file_path);
                $attachment->delete();
                session()->flash('success', " attachement deleted successfully");
                return redirect()->route('admin.projects.index');
            }
        } else {
            $attachment = ProjectsAttachmnets::where('project_id', $project->id)->first();
            if ($attachment) {
                $file_path = $project->id . '/' . $attachment->file_name;
                Storage::disk('public_uploads')->delete($file_path);
                $attachment->delete();
            }
            $project->delete();
            session()->flash('success', "project and its associated file archived successfully");
            return redirect()->route('admin.projects.index')->with('success', 'Project archived successfully.');
        }
        // return $request;
    }
    

    public function get_file($id, $file_name)
    {
        $path = Storage::disk('public_uploads')->path($id . '/' . $file_name);
        return response()->download($path);
    }

    public function open_file($id, $file_name)
    {
        $path = Storage::disk('public_uploads')->path($id . '/' . $file_name);
        return response()->file($path);
    }
    public function statusUpdate($id, Request $request)
{
    $project = Project::findOrFail($id);

    // Check if the project status is updated to "Finshed"
    if ($request->status === 'Finshed') {
        $project->delete_deadline = Carbon::now()->addDays(3); // set delete deadline to 3 days from now
        $project->save();

        // Queue the job to delete the project and its associated files after the delete deadline
        DeleteExpiredProject::dispatch($project)->delay($project->delete_deadline);
    }

    $project->update([
        'status' => $request->status,
    ]);

    session()->flash('Status_Update', 'Status updated successfully');
    return back();
}
}
