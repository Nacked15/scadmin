<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\CourseModel;
use App\Level;
use DB;

class CourseController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
 
    public function index() {
        $courses = CourseModel::all();
        return view('cursos.index', ['cursos' => $courses]);
    }

    public function create(Request $request) {
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

    public function edit($curso) {
        $curso = CourseModel::find($curso);
        $data = json_encode($curso);
        return $data;
    }

    public function update(Request $request) {
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

    public function destroy(CourseModel $course) {
        $course->delete();

        return redirect('/courses');
    }

    /**
     * END COURSES SECTION
     */
    
    public function showLevels() {
        $levels = Level::all();
        return view('cursos.levels', ['levels' => $levels]);
    }

    public function createLevel(Request $request) {
        $this->validate($request, [
            'level'      => 'required|max:255',
            'description'   => 'max:255'
        ]);

        $data = $request;

        $level = new Level;
        $level->level = $data['level'];
        $level->description= $data['description'];


        if ($level->save()) {
            return redirect('levels');
        } else {
            return redirect('500');
        } 
    }

    public function getLevel($level) {
        $this_level = Level::find($level);
        $data = json_encode($this_level);
        return $data;
    }

    public function updateLevel(Request $request) {
        $idlevel = $request->numlevel;
        $level = Level::find($idlevel);
        $cont = count($level);
        if ($cont === 1) {
            $level->level        = $request->editlevel;
            $level->description  = $request->editdescription;

            if($level->save()) {
                return redirect('levels');
            } else {
                return redirect('500');
            }
        } else {
            return redirect('500');
        } 
    }

    public function deleteLevel(Request $request) {
        $id = $request->idLevel;
        $delete = DB::table('levels')->where([
                                                ['id','=', $id]
                                            ])
                                    ->delete();

        $cont = count($delete);
        if ($cont === 1) {
            return redirect('levels');
        } else { 
            return redirect('500');
        }
    }
}
