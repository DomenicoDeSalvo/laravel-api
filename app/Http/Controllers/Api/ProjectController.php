<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        
        $per_page = $request->perPage ?? 10;
        $results = Project::with('type', 'technologies')->paginate(10);

        return response()->json([
            'results' => $results
        ]);
    }
}
