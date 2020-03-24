<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Project;
use App\Category;

class ProjectsAPIController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index() {
        $projects = Project::with(['category' => function($q) {
            $q->select('id', 'label');
        }])->select('projects.*')->get();
        $categories = Category::select('id', 'label')->where([['isProjectCategory', true], ['isActive', true]])->get();
        $payload = array(
            "projects" => $projects,
            "categories" => $categories
        );

        return response()->json($payload);
    }

    public function show($id) {
        return response()->json(Project::find($id));
    }

    public function update(Request $request, Project $project) {
        // dd($request->input('used_techs'));
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:150',
            'image' => 'nullable',
            'imageFile' => 'nullable|image|max:1999',
            'website_url' => 'nullable',
            'github_url' => 'nullable',
            'video_url' => 'nullable',
            'category_id' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('imageFile')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images/projects', $fileNameToStore);
            $data['image'] = '/storage/images/projects/' . $fileNameToStore;
        }

        $project->update($data);

        $projects = Project::with(['category' => function($q) {
            $q->select('id', 'label');
        }])->select('projects.*')->get();

        $payload = ["message" => 'success', "projects" => $projects];

        return response()->json($payload, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:150',
            'image' => 'required|image|max:1999',
            'website_url' => 'nullable',
            'github_url' => 'nullable',
            'video_url' => 'nullable',
            'category_id' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images/projects', $fileNameToStore);
        } else {
            return response()->json(['error' => 'File is required']);
        }

        $data = $request->all();
        $data['used_techs'] = $data['used_techs'];
        $data['image'] = '/storage/images/projects/' . $fileNameToStore;
        $newProject = Project::insert($data);

        $projects = Project::with(['category' => function($q) {
            $q->select('id', 'label');
        }])->select('projects.*')->get();

        $payload = ["message" => 'success', "projects" => $projects];

        return response()->json($projects, 201);
    }

    public function destroy(Project $project) {
        $path = pathinfo($project->image, PATHINFO_BASENAME);

        Storage::delete('public/images/projects/' . $path);
        
        $project->delete();

        $projects = Project::with(['category' => function($q) {
            $q->select('id', 'label');
        }])->select('projects.*')->get();

        return response()->json($projects, 200);
    }
}
