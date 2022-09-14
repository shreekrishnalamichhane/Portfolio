<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['name'] = "Projects";
        $data['projects'] = Project::all();
        return view('backend.pages.features.projects.index', compact(['page', 'data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page['name'] = "Create Project";
        return view('backend.pages.features.projects.create', compact(['page']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'duration' => ['required', 'string'],
            'description' => ['required', 'string'],
            'source' => ['nullable', 'url'],
            'demo' => ['nullable', 'url'],
        ]);

        $newProject = new Project;
        $newProject->title = $request->get('title');
        $newProject->slug = random_slug(20);
        $newProject->duration = $request->get('duration');
        $newProject->description = $request->get('description');
        $newProject->source = $request->get('source');
        $newProject->demo = $request->get('demo');

        $newProject->save();

        return redirect()->route('backend.features.projects.index')->with('success', 'Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $page['name'] = "Edit Project";
        $data['project'] = $project;
        return view('backend.pages.features.projects.edit', compact('data', 'page'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'duration' => ['required', 'string'],
            'description' => ['required', 'string'],
            'source' => ['nullable', 'url'],
            'demo' => ['nullable', 'url'],
        ]);

        $project->title = $request->get('title');
        $project->duration = $request->get('duration');
        $project->description = $request->get('description');
        $project->source = $request->get('source');
        $project->demo = $request->get('demo');

        $project->save();

        return redirect()->route('backend.features.projects.index')->with('success', 'Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('success', "Deleted Successfully.");

    }
}
