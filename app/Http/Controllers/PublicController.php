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

        $var['name'] = get_setting('user_name');
        $var['title'] = $var['name'] . " | Portfolio";
        $var['locale'] = 'en_US';
        $var['description'] = get_setting('user_bio');
        $var['keywords'] = get_setting('user_keywords');

        $image_info = getimagesize(get_setting('user_avatar'));
        $var['avatar'] = get_public_path() . get_setting('user_avatar');
        $var['avatar_width'] = $image_info[0];
        $var['avatar_height'] = $image_info[1];
        $var['avatar_mime'] = $image_info['mime'];
        $var['avatar_alt'] = $var['name'] . "'s avatar image";

        $data['sociallinks'] = SocialLink::orderBy('order', 'ASC')->get();
        $data['techstacks'] = TechStack::orderBy('order', 'ASC')->get();
        $data['skills'] = Skill::orderBy('order', 'ASC')->get();
        $data['workhistories'] = WorkHistory::orderBy('order', 'ASC')->get();
        $data['projects'] = Project::orderBy('created_at', 'DESC')->take(5)->get();

        $page['title'] = $var['title'];

        $page['meta'] = [
            // General
            ['name' => 'title',
                'content' => $var['title']],
            ['name' => 'description',
                'content' => $var['description']],
            ['name' => 'keywords',
                'content' => $var['keywords']],
            ['name' => 'author',
                'content' => $var['name']],
            ['name' => 'copyright',
                'content' => $var['name']],
            ['name' => 'robots',
                'content' => 'index,follow'],
            // OpenGraph
            ['property' => 'og:title',
                'content' => $var['title']],
            ['property' => 'og:locale',
                'content' => $var['locale']],
            ['property' => 'og:description',
                'content' => $var['description']],
            ['property' => 'og:url',
                'content' => get_current_path()],
            ['property' => 'og:site_name',
                'content' => $var['title']],
            ['property' => 'og:type',
                'content' => 'document'],
            ['property' => 'og:image',
                'content' => $var['avatar']],
            ['property' => 'og:image:secure_url',
                'content' => $var['avatar']],
            ['property' => 'og:image:width',
                'content' => $var['avatar_width']],
            ['property' => 'og:image:height',
                'content' => $var['avatar_height']],
            ['property' => 'og:image:alt',
                'content' => $var['avatar_alt']],
            ['property' => 'og:image:type',
                'content' => $var['avatar_mime']],

            // Twitter
            ['name' => 'twitter:card',
                'content' => 'summary_large_image'],
            ['name' => 'twitter:title',
                'content' => $var['title']],
            ['name' => 'twitter:description',
                'content' => $var['description']],
            ['name' => 'twitter:site',
                'content' => "@" . get_setting('user_twitter_handle')],
            ['name' => 'twitter:creater',
                'content' => "@" . get_setting('user_twitter_handle')],
            ['name' => 'twitter:image',
                'content' => $var['avatar']],
            ['name' => 'twitter:image:alt',
                'content' => $var['avatar_alt']],

            // Google+
            ['itemprop' => 'name',
                'content' => $var['title']],
            ['itemprop' => 'description',
                'content' => $var['description']],
            ['itemprop' => 'image',
                'content' => $var['avatar']],
        ];

        return view('frontend.home', compact(['data', 'page']));
    }

    public function projects_index()
    {
        $var['name'] = "Projects | " . get_setting('user_name');
        $var['title'] = $var['name'] . " | Portfolio";
        $var['locale'] = 'en_US';
        $var['description'] = "Projects | " . get_setting('user_bio');
        $var['keywords'] = get_setting('user_keywords');

        $image_info = getimagesize(get_setting('user_avatar'));
        $var['avatar'] = get_public_path() . get_setting('user_avatar');
        $var['avatar_width'] = $image_info[0];
        $var['avatar_height'] = $image_info[1];
        $var['avatar_mime'] = $image_info['mime'];
        $var['avatar_alt'] = $var['name'] . "'s avatar image";

        $data['projects'] = Project::orderBy('created_at', 'DESC')->get();

        $page['title'] = $var['title'];

        $page['meta'] = [
            // General
            ['name' => 'title',
                'content' => $var['title']],
            ['name' => 'description',
                'content' => $var['description']],
            ['name' => 'keywords',
                'content' => $var['keywords']],
            ['name' => 'author',
                'content' => $var['name']],
            ['name' => 'copyright',
                'content' => $var['name']],
            ['name' => 'robots',
                'content' => 'index,follow'],
            // OpenGraph
            ['property' => 'og:title',
                'content' => $var['title']],
            ['property' => 'og:locale',
                'content' => $var['locale']],
            ['property' => 'og:description',
                'content' => $var['description']],
            ['property' => 'og:url',
                'content' => get_current_path()],
            ['property' => 'og:site_name',
                'content' => $var['title']],
            ['property' => 'og:type',
                'content' => 'document'],
            ['property' => 'og:image',
                'content' => $var['avatar']],
            ['property' => 'og:image:secure_url',
                'content' => $var['avatar']],
            ['property' => 'og:image:width',
                'content' => $var['avatar_width']],
            ['property' => 'og:image:height',
                'content' => $var['avatar_height']],
            ['property' => 'og:image:alt',
                'content' => $var['avatar_alt']],
            ['property' => 'og:image:type',
                'content' => $var['avatar_mime']],

            // Twitter
            ['name' => 'twitter:card',
                'content' => 'summary_large_image'],
            ['name' => 'twitter:title',
                'content' => $var['title']],
            ['name' => 'twitter:description',
                'content' => $var['description']],
            ['name' => 'twitter:site',
                'content' => "@" . get_setting('user_twitter_handle')],
            ['name' => 'twitter:creater',
                'content' => "@" . get_setting('user_twitter_handle')],
            ['name' => 'twitter:image',
                'content' => $var['avatar']],
            ['name' => 'twitter:image:alt',
                'content' => $var['avatar_alt']],

            // Google+
            ['itemprop' => 'name',
                'content' => $var['title']],
            ['itemprop' => 'description',
                'content' => $var['description']],
            ['itemprop' => 'image',
                'content' => $var['avatar']],
        ];

        return view('frontend.pages.projects.index', compact(['page', 'data']));
    }

    public function projects_show($slug)
    {
        $data['project'] = Project::where('slug', '=', $slug)->firstOrFail();

        $var['name'] = get_setting('user_name');
        $var['title'] = $data['project']->title . " | Project | " . $var['name'];
        $var['locale'] = 'en_US';
        $var['description'] = $data['project']->short_description;

        $var['tags'] = json_decode($data['project']->tags);

        $var['keywords'] = "";

        foreach ($var['tags'] as $key => $value) {
            $var['keywords'] = $var['keywords'] . $value->value . ",";
        }
        $var['keywords'] = substr($var['keywords'], 0, -1);

        $image_info = getimagesize($data['project']->cover_img);
        $var['avatar'] = get_public_path() . $data['project']->cover_img;
        $var['avatar_width'] = $image_info[0];
        $var['avatar_height'] = $image_info[1];
        $var['avatar_mime'] = $image_info['mime'];
        $var['avatar_alt'] = "Project image of " . $data['project']->title;

        $page['title'] = $var['title'];

        $page['meta'] = [
            // General
            ['name' => 'title',
                'content' => $var['title']],
            ['name' => 'description',
                'content' => $var['description']],
            ['name' => 'keywords',
                'content' => $var['keywords']],
            ['name' => 'author',
                'content' => $var['name']],
            ['name' => 'copyright',
                'content' => $var['name']],
            ['name' => 'robots',
                'content' => 'index,follow'],
            // OpenGraph
            ['property' => 'og:title',
                'content' => $var['title']],
            ['property' => 'og:locale',
                'content' => $var['locale']],
            ['property' => 'og:description',
                'content' => $var['description']],
            ['property' => 'og:url',
                'content' => get_current_path()],
            ['property' => 'og:site_name',
                'content' => $var['title']],
            ['property' => 'og:type',
                'content' => 'document'],
            ['property' => 'og:image',
                'content' => $var['avatar']],
            ['property' => 'og:image:secure_url',
                'content' => $var['avatar']],
            ['property' => 'og:image:width',
                'content' => $var['avatar_width']],
            ['property' => 'og:image:height',
                'content' => $var['avatar_height']],
            ['property' => 'og:image:alt',
                'content' => $var['avatar_alt']],
            ['property' => 'og:image:type',
                'content' => $var['avatar_mime']],

            // Twitter
            ['name' => 'twitter:card',
                'content' => 'summary_large_image'],
            ['name' => 'twitter:title',
                'content' => $var['title']],
            ['name' => 'twitter:description',
                'content' => $var['description']],
            ['name' => 'twitter:site',
                'content' => "@" . get_setting('user_twitter_handle')],
            ['name' => 'twitter:creater',
                'content' => "@" . get_setting('user_twitter_handle')],
            ['name' => 'twitter:image',
                'content' => $var['avatar']],
            ['name' => 'twitter:image:alt',
                'content' => $var['avatar_alt']],

            // Google+
            ['itemprop' => 'name',
                'content' => $var['title']],
            ['itemprop' => 'description',
                'content' => $var['description']],
            ['itemprop' => 'image',
                'content' => $var['avatar']],
        ];

        return view('frontend.pages.projects.show', compact(['page', 'data']));
    }
}
