<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function list(Request $request) 
    {
        $prof = $request->input('cd_professor');

        $response = Courses::where('cd_professor', $prof)->get();
        
        return response()->json(['data'=>$response],200);
    }

    public function showById (Request $request)
    {
        $curso = $request->input('cd_curso');

        $response = Courses::where('cd_curso', $curso)->get();
        
        return response()->json(['data'=>$response],200);
    }
}