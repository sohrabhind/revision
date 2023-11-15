<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Home Page";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {

        $viewData = [];
        $viewData["title"] = "About us";
        $viewData["subtitle"] = "About us";
        $viewData["description"] = "This is an about page ...";
        $viewData["author"] = "Developed by: Your Name";
        return view('home.about')->with("viewData", $viewData);
    }

    public function dashboard() {
        $viewData = [];
        $viewData["title"] = "Home Page";
        return view('dashboard.index')->with("viewData", $viewData);
    }
}
