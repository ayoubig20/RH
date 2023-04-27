<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Home Page - Employees Mangement";
        return view('home.index')->with("viewData", $viewData);
    }
    public function about()
    {
        $viewData = [];
        $viewData["title"] = "About us - Employees Mangement";
        $viewData["subtitle"] = "About us";
        $viewData["description"] = "This is an about page ...";
        $viewData["author"] = "Developed by: Kamal Nadir";
        return view('home.about')->with("viewData", $viewData);
    }
}
