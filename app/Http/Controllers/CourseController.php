<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException as SqlError;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $codigo = $request->all();
        $curso = Courses::filter($codigo)->get();
        // $curso = Courses::connection('mysql2')->filter($codigo)->get();

        if (!empty($codigo)) {
            $prof = $codigo['cd_professor'];
            $message = "Cursos cadastrados para o professor $prof";
        }else{
            $prof = '';
            $message = "Todos os cursos cadastrados";
        }

        if ($curso->count() == 0) {
            return response()->json([
                "success" => false,
                "message" => 'Professor não cadastrado!',
            ], 400);
        }
        
        return response()->json([
            'success' => true,
            'message' => "$message",
            'data' => $curso
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {

        try {
            $result = Courses::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Curso cadastrado com sucesso',
                'data' => $result
            ], 201);

        } catch (SqlError $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return response()->json([
                    "success" => false,
                    "message" => 'Dados duplicados!',
                ], 400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Courses::find($id);

        if (!$course)
        {
            return response()->json([
                "success" => false,
                "message" => 'Curso não encontrado',
            ], 400);
        }

        $course->cd_curso;

        return response()->json([
            "success" => true,
            "message" => 'Curso encontrado',
            "data" => $course
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
