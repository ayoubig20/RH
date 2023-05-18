<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


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
    public function contact(Request $request)
    {
        $details = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
        
        Mail::to('dev.fullstack.inz@gmail.com')->send(new SendRequest($details));
    
        return redirect('/')->with('success', 'Votre message a été envoyé avec succès.');
    }
}
