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
        $page['title'] = "";

        $page['meta'] = [
            // General
            ['name' => 'title',
                'content' => ''],
            ['name' => 'description',
                'content' => ''],
            ['name' => 'keywords',
                'content' => ''],
            ['name' => 'author',
                'content' => ''],
            ['name' => 'copyright',
                'content' => ''],
            ['name' => 'robots',
                'content' => ''],

            // OpenGraph
            ['property' => 'og:title',
                'content' => 'Title here'],
            ['property' => 'og:locale',
                'content' => ''],
            ['property' => 'og:description',
                'content' => ''],
            ['property' => 'og:url',
                'content' => ''],
            ['property' => 'og:site_name',
                'content' => ''],
            ['property' => 'og:type',
                'content' => ''],
            ['property' => 'og:image',
                'content' => ''],
            ['property' => 'og:image:secure_url',
                'content' => ''],
            ['property' => 'og:image:width',
                'content' => ''],
            ['property' => 'og:image:height',
                'content' => ''],
            ['property' => 'og:image:alt',
                'content' => ''],
            ['property' => 'og:image:type',
                'content' => ''],

            // Twitter
            ['name' => 'twitter:card',
                'content' => ''],
            ['name' => 'twitter:title',
                'content' => ''],
            ['name' => 'twitter:description',
                'content' => ''],
            ['name' => 'twitter:site',
                'content' => ''],
            ['name' => 'twitter:creater',
                'content' => ''],
            ['name' => 'twitter:image',
                'content' => ''],
            ['name' => 'twitter:image:alt',
                'content' => ''],

            // Google+
            ['itemprop' => 'name',
                'content' => ''],
            ['itemprop' => 'description',
                'content' => ''],
            ['itemprop' => 'image',
                'content' => ''],
        ];

        $data['sociallinks'] = SocialLink::orderBy('order', 'ASC')->get();
        $data['techstacks'] = TechStack::orderBy('order', 'ASC')->get();
        $data['skills'] = Skill::orderBy('order', 'ASC')->get();
        $data['workhistories'] = WorkHistory::orderBy('order', 'ASC')->get();
        $data['projects'] = Project::orderBy('created_at', 'DESC')->take(5)->get();

        return view('frontend.home', compact(['data', 'page']));
    }

    public function projects_index()
    {
        $page['title'] = "";

        $page['meta'] = [
            // General
            ['name' => 'title',
                'content' => ''],
            ['name' => 'description',
                'content' => ''],
            ['name' => 'keywords',
                'content' => ''],
            ['name' => 'author',
                'content' => ''],
            ['name' => 'copyright',
                'content' => ''],
            ['name' => 'robots',
                'content' => ''],

            // OpenGraph
            ['property' => 'og:title',
                'content' => 'Title here'],
            ['property' => 'og:locale',
                'content' => ''],
            ['property' => 'og:description',
                'content' => ''],
            ['property' => 'og:url',
                'content' => ''],
            ['property' => 'og:site_name',
                'content' => ''],
            ['property' => 'og:type',
                'content' => ''],
            ['property' => 'og:image',
                'content' => ''],
            ['property' => 'og:image:secure_url',
                'content' => ''],
            ['property' => 'og:image:width',
                'content' => ''],
            ['property' => 'og:image:height',
                'content' => ''],
            ['property' => 'og:image:alt',
                'content' => ''],
            ['property' => 'og:image:type',
                'content' => ''],

            // Twitter
            ['name' => 'twitter:card',
                'content' => ''],
            ['name' => 'twitter:title',
                'content' => ''],
            ['name' => 'twitter:description',
                'content' => ''],
            ['name' => 'twitter:site',
                'content' => ''],
            ['name' => 'twitter:creater',
                'content' => ''],
            ['name' => 'twitter:image',
                'content' => ''],
            ['name' => 'twitter:image:alt',
                'content' => ''],

            // Google+
            ['itemprop' => 'name',
                'content' => ''],
            ['itemprop' => 'description',
                'content' => ''],
            ['itemprop' => 'image',
                'content' => ''],
        ];

        $data['projects'] = Project::orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.projects.index', compact(['page', 'data']));
    }

    public function projects_show($slug)
    {
        $page['title'] = "";

        $page['meta'] = [
            // General
            ['name' => 'title',
                'content' => ''],
            ['name' => 'description',
                'content' => ''],
            ['name' => 'keywords',
                'content' => ''],
            ['name' => 'author',
                'content' => ''],
            ['name' => 'copyright',
                'content' => ''],
            ['name' => 'robots',
                'content' => ''],

            // OpenGraph
            ['property' => 'og:title',
                'content' => 'Title here'],
            ['property' => 'og:locale',
                'content' => ''],
            ['property' => 'og:description',
                'content' => ''],
            ['property' => 'og:url',
                'content' => ''],
            ['property' => 'og:site_name',
                'content' => ''],
            ['property' => 'og:type',
                'content' => ''],
            ['property' => 'og:image',
                'content' => ''],
            ['property' => 'og:image:secure_url',
                'content' => ''],
            ['property' => 'og:image:width',
                'content' => ''],
            ['property' => 'og:image:height',
                'content' => ''],
            ['property' => 'og:image:alt',
                'content' => ''],
            ['property' => 'og:image:type',
                'content' => ''],

            // Twitter
            ['name' => 'twitter:card',
                'content' => ''],
            ['name' => 'twitter:title',
                'content' => ''],
            ['name' => 'twitter:description',
                'content' => ''],
            ['name' => 'twitter:site',
                'content' => ''],
            ['name' => 'twitter:creater',
                'content' => ''],
            ['name' => 'twitter:image',
                'content' => ''],
            ['name' => 'twitter:image:alt',
                'content' => ''],

            // Google+
            ['itemprop' => 'name',
                'content' => ''],
            ['itemprop' => 'description',
                'content' => ''],
            ['itemprop' => 'image',
                'content' => ''],
        ];

        $data['project'] = Project::where('slug', '=', $slug)->firstOrFail();
        return view('frontend.pages.projects.show', compact(['page', 'data']));
    }
}
