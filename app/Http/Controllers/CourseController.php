<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\CourseModel;

class CourseController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = CourseModel::all();
        return view('cursos.index', ['cursos' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'course'      => 'required|max:255',
            'description'   => 'max:255'
        ]);

        $data = $request;

        $course = new CourseModel;
        $course->name = $data['course'];
        $course->description= $data['description'];


        if ($course->save()) {
            return redirect('courses');
        } else {
            return redirect('500');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($curso)
    {
        $curso = CourseModel::find($curso);
        $data = json_encode($curso);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idcurso = $request->numcurso;
        $curso = CourseModel::find($idcurso);
        $cont = count($curso);
        if ($cont === 1) {
            $curso->name        = $request->curso;
            $curso->description = $request->descripcion;

            if($curso->save()) {
                return redirect('courses');
            } else {
                return redirect('500');
            }
        } else {
            return redirect('500');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseModel $course)
    {
        $course->delete();

        return redirect('/courses');
    }
}
