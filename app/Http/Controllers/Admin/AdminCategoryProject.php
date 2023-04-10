<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\CategoryProject;
use App\Http\Controllers\Controller;

class AdminCategoryProject extends Controller
{
    //
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "List Category Project";
        $viewData['categorys']= CategoryProject::all();
        return view("admin.category.index")->with("viewData", $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $viewData=[];
        $viewData["title"]='create Department';
        return redirect('/admin/category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {        
        CategoryProject::validate($request);
        $cat = new CategoryProject();
        $cat->setName($request->input("name"));
        $cat->save();
        session()->flash('Add', 'Section added successfully');

        return redirect()->route("admin.category.index");
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
        $viewData = [];
        $viewData["title"] = " Edit Categry ";
        $viewData['categorys']= CategoryProject::findOrFail($id);
        return view("admin.category.edit")->with("viewData", $viewData);
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
    $this->validate($request, [
        "name" => "required|max:255|unique:departments,name,$id",
    ], [
        'name.required' => 'Please enter the Category Projectname.',
        'name.unique' => 'The department name has already been taken.',
    ]);    
    
    $CategoryProject = CategoryProject::findOrFail($id);
    $CategoryProject->setName($request->input("name"));
    $CategoryProject->save();
    
    return redirect()->route("admin.category.index");
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryProject::destroy($id);
        return back();
    }
}
