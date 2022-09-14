<?php

namespace App\Http\Controllers;

use App\Models\WorkHistory;
use Illuminate\Http\Request;

class WorkHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['name'] = "Work History";
        $data['workhistories'] = WorkHistory::orderBy('order', 'ASC')->get();
        return view('backend.pages.features.workhistories.index', compact(['page', 'data']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page['name'] = "Create Work History";
        return view('backend.pages.features.workhistories.create', compact(['page']));

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
            'order' => ['nullable', 'numeric'],
        ]);

        $newWorkHistory = new WorkHistory;
        $newWorkHistory->title = $request->get('title');
        $newWorkHistory->duration = $request->get('duration');
        $newWorkHistory->description = $request->get('description');
        $newWorkHistory->order = $request->get('order');
        $newWorkHistory->order == null ? $newWorkHistory->order = 0 : null;

        $newWorkHistory->save();

        return redirect()->route('backend.features.workhistories.index')->with('success', 'Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkHistory  $workHistory
     * @return \Illuminate\Http\Response
     */
    public function show(WorkHistory $workHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkHistory  $workHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkHistory $workHistory)
    {
        $page['name'] = "Edit Work History";
        $data['workhistory'] = $workHistory;
        return view('backend.pages.features.workhistories.edit', compact('data', 'page'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkHistory  $workHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkHistory $workHistory)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'duration' => ['required', 'string'],
            'description' => ['required', 'string'],
            'order' => ['nullable', 'numeric'],
        ]);

        $workHistory->title = $request->get('title');
        $workHistory->duration = $request->get('duration');
        $workHistory->description = $request->get('description');
        $workHistory->order = $request->get('order');
        $workHistory->order == null ? $workHistory->order = 0 : null;

        $workHistory->save();

        return redirect()->route('backend.features.workhistories.index')->with('success', 'Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkHistory  $workHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkHistory $workHistory)
    {
        $workHistory->delete();
        return back()->with('success', "Deleted Successfully.");

    }
}
