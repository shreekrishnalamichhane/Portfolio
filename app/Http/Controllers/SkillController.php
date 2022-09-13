<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['name'] = "Skills";
        $data['skills'] = Skill::orderBy('order', 'ASC')->get();
        return view('backend.pages.features.skills.index', compact(['page', 'data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page['name'] = "Create Skill";
        return view('backend.pages.features.skills.create', compact(['page']));
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
            'skill' => ['required', 'string'],
            'order' => ['nullable', 'numeric'],
        ]);

        $newSkill = new Skill;
        $newSkill->skill = $request->get('skill');
        $newSkill->order = $request->get('order');
        $newSkill->order == null ? $newSkill->order = 0 : null;

        $newSkill->save();

        return redirect()->route('backend.features.skills.index')->with('success', 'Created Successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        $page['name'] = "Edit Skill";
        $data['skill'] = $skill;
        return view('backend.pages.features.skills.edit', compact('data', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'skill' => ['required', 'string'],
            'order' => ['nullable', 'numeric'],
        ]);

        $skill->skill = $request->get('skill');
        $skill->order = $request->get('order');
        $skill->order == null ? $skill->order = 0 : null;

        $skill->save();

        return redirect()->route('backend.features.skills.index')->with('success', 'Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', "Deleted Successfully.");
    }
}
