<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['name'] = "Social Links";
        $data['sociallinks'] = SocialLink::orderBy('order', 'ASC')->get();
        return view('backend.pages.features.sociallinks.index', compact(['page', 'data']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page['name'] = "Create Social Link";
        return view('backend.pages.features.sociallinks.create', compact(['page']));

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
            'name' => ['required', 'string'],
            'link' => ['required', 'url'],
            'order' => ['nullable', 'numeric'],
        ]);

        $newLink = new SocialLink;
        $newLink->name = $request->get('name');
        $newLink->link = $request->get('link');
        $newLink->order = $request->get('order');
        $newLink->order == null ? $newLink->order = 0 : null;

        $newLink->save();

        return redirect()->route('backend.features.sociallinks.index')->with('success', 'Created Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $socialLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLink $socialLink)
    {
        $page['name'] = "Edit Social Link";
        $data['sociallink'] = $socialLink;
        return view('backend.pages.features.sociallinks.edit', compact('data', 'page'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialLink $socialLink)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'link' => ['required', 'url'],
            'order' => ['nullable', 'numeric'],
        ]);

        $socialLink->name = $request->get('name');
        $socialLink->link = $request->get('link');
        $socialLink->order = $request->get('order');
        $socialLink->order == null ? $socialLink->order = 0 : null;

        $socialLink->save();

        return redirect()->route('backend.features.sociallinks.index')->with('success', 'Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return back()->with('success', "Deleted Successfully.");

    }
}
