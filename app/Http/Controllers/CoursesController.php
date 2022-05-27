<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

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

    public function insertImageCourse (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cd_professor' => 'required|string',
            'ds_nome' => 'required|string',
            'me_ementa' => 'required|string',
            'me_resumo' => 'required|string',
            'cd_imagem' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "error" => 'Faltou algum campo'
            ), 400);
        }

        $curso = Courses::create(array_merge(
            $validator->validated(),
        ));

        return response()->json([
            'status' => true,
            'message' => 'Curso cadastrado com sucesso',
            'user' => $curso
        ], 201);
    }
}