<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\TechStack;
use App\Models\WorkHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function main()
    {
        $page['name'] = "Main Dahboard";
        $data['user'] = Auth::user();
        $data['backend_metircs'] = array(
            [
                'recent' => array(
                    'title' => "Skills In Last 30 Days",
                    'value' => Skill::whereBetween('created_at',
                        [Carbon::now()->subMonth(), Carbon::now()]
                    )->count(),
                ),
                'total' => array(
                    'title' => "Total Skills",
                    'value' => Skill::count(),
                ),
            ],
            [
                'recent' => array(
                    'title' => "Tech Stacks In Last 30 Days",
                    'value' => TechStack::whereBetween('created_at',
                        [Carbon::now()->subMonth(), Carbon::now()]
                    )->count(),
                ),
                'total' => array(
                    'title' => "Total Tech Stacks",
                    'value' => TechStack::count(),
                ),
            ],
            [
                'recent' => array(
                    'title' => "Social Links In Last 30 Days",
                    'value' => SocialLink::whereBetween('created_at',
                        [Carbon::now()->subMonth(), Carbon::now()]
                    )->count(),
                ),
                'total' => array(
                    'title' => "Total Social Links",
                    'value' => SocialLink::count(),
                ),
            ],
            [
                'recent' => array(
                    'title' => "Work History In Last 30 Days",
                    'value' => WorkHistory::whereBetween('created_at',
                        [Carbon::now()->subMonth(), Carbon::now()]
                    )->count(),
                ),
                'total' => array(
                    'title' => "Total Work History",
                    'value' => WorkHistory::count(),
                ),
            ],
            [
                'recent' => array(
                    'title' => "Projects In Last 30 Days",
                    'value' => Project::whereBetween('created_at',
                        [Carbon::now()->subMonth(), Carbon::now()]
                    )->count(),
                ),
                'total' => array(
                    'title' => "Total Projects",
                    'value' => Project::count(),
                ),
            ],
        );
        return view('backend.pages.dashboard.main', compact(['page', 'data']));
    }
}
