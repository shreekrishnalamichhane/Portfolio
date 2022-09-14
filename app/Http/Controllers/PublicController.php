<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\TechStack;
use App\Models\WorkHistory;

class PublicController extends Controller
{
    public function home()
    {
        $data['sociallinks'] = SocialLink::orderBy('order', 'ASC')->get();
        $data['techstacks'] = TechStack::orderBy('order', 'ASC')->get();
        $data['skills'] = Skill::orderBy('order', 'ASC')->get();
        $data['workhistories'] = WorkHistory::orderBy('order', 'ASC')->get();
        $data['projects'] = Project::orderBy('created_at', 'DESC')->take(5)->get();

        return view('frontend.home', compact(['data']));
    }

    public function projects_index()
    {
        $page['title'] = "";
        $data['projects'] = Project::orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.projects.index', compact(['page', 'data']));
    }

    public function projects_show($slug)
    {
        $page['title'] = "";
        $data['project'] = Project::where('slug', '=', $slug)->firstOrFail();
        return view('frontend.pages.projects.show', compact(['page', 'data']));
    }
}
