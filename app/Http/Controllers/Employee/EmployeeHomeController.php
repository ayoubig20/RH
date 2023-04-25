<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeHomeController extends Controller
{
    //
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Admin - Online Store";
        return view('employee.home.index')->with("viewData", $viewData);
    }
}
