<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {

        //$projects = Project::with(['type', 'technologies', 'user'])->orderByDesc('id')->get();
        $projects = Project::with(['type', 'technologies', 'user'])->orderByDesc('id')->paginate(6);

        return response()->json([
            'success' => true,
            'projects' => $projects,
        ]);
    }
}
