<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInfo;
use App\Models\Skill;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $personalInfo = PersonalInfo::first();
        $skills = Skill::all();
        $certificates = Certificate::all();
        $experiences = Experience::all();
        $projects = Project::all();

        return view('portfolio', compact(
            'personalInfo',
            'skills',
            'certificates',
            'experiences',
            'projects'
        ));
    }
}
