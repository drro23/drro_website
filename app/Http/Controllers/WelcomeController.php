<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::all();
        return view('welcome')->with('projects', $projects);
    }
}
