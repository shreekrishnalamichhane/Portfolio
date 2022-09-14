<?php

namespace App\Http\Controllers;

use App\Models\TechStack;
use Illuminate\Http\Request;

class TechStackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['name'] = "Tech Stacks";
        $data['techstacks'] = TechStack::orderBy('order', 'ASC')->get();
        return view('backend.pages.features.techstacks.index', compact(['page', 'data']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page['name'] = "Create Tech Stack";
        return view('backend.pages.features.techstacks.create', compact(['page']));

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
            'techstack' => ['required', 'string'],
            'order' => ['nullable', 'numeric'],
        ]);

        $newSkill = new TechStack;
        $newSkill->techstack = $request->get('techstack');
        $newSkill->order = $request->get('order');
        $newSkill->order == null ? $newSkill->order = 0 : null;

        $newSkill->save();

        return redirect()->route('backend.features.techstacks.index')->with('success', 'Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TechStack  $techStack
     * @return \Illuminate\Http\Response
     */
    public function show(TechStack $techStack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TechStack  $techStack
     * @return \Illuminate\Http\Response
     */
    public function edit(TechStack $techStack)
    {
        $page['name'] = "Edit Techstack";
        $data['techstack'] = $techStack;
        return view('backend.pages.features.techstacks.edit', compact('data', 'page'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TechStack  $techStack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TechStack $techStack)
    {
        $request->validate([
            'techstack' => ['required', 'string'],
            'order' => ['nullable', 'numeric'],
        ]);

        $techStack->techstack = $request->get('techstack');
        $techStack->order = $request->get('order');
        $techStack->order == null ? $techStack->order = 0 : null;

        $techStack->save();

        return redirect()->route('backend.features.techstacks.index')->with('success', 'Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TechStack  $techStack
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechStack $techStack)
    {
        $techStack->delete();
        return back()->with('success', "Deleted Successfully.");
    }
}
