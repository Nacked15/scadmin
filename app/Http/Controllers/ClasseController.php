<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Classe;
use App\CourseModel;
use App\Level;
use App\User;
use App\Schedul;
use Validator;
Use DB;

class ClasseController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $courses  = CourseModel::all();
        $levels   = Level::all();
        $days     = DB::table('days')->get();
        $teachers = DB::table('users')->where('category', '=' ,3)
                                      ->select('id', 'name', 'surname')
                                      ->get();
        $classes  = DB::table('classes')
            ->join('courses', 'courses.id',       '=', 'classes.id_course')
            ->join('levels', 'levels.id',         '=', 'classes.id_level')
            ->join('schedulles', 'schedulles.id', '=', 'classes.id_schedull')
            ->select('classes.id', 'classes.id_teacher', 'courses.name', 'levels.level', 'schedulles.year', 'schedulles.date_init', 'schedulles.date_end', 'schedulles.hour_init', 'schedulles.hour_end')
            ->orderBy('classes.id')
            ->get();
        $classDays = DB::table('schedulles')
                    ->join('schedull_days', 'schedull_days.id_schedull', '=', 'schedulles.id')
                    ->join('days', 'schedull_days.id_day', '=', 'days.id')
                    ->select('schedulles.id', 'days.day')
                    ->get();
        return view('classes.index', ['cursos'   => $courses, 
                                      'niveles'  => $levels,
                                      'days'     => $days,
                                      'maestros' => $teachers,
                                      'clases'   => $classes,
                                      'dias'     => $classDays]);
    }

    public function create(Request $request) {
        $max = DB::table('schedulles')->max('id');
        $schedull = $max + 1;
        
        $this->validate($request, [
            'course'   => 'required',
            'level'    => 'required',
            'ciclo'    => 'required',
            'dateInit' => 'required',
            'dateEnd'  => 'required',
            'hourInit' => 'required',
            'hourEnd'  => 'required'
        ]);

        $data = $request;

        $clase = new Classe;
        $clase->id_course   = $data['course'];
        $clase->id_level    = $data['level'];
        $clase->id_schedull = $schedull;
        $clase->id_teacher  = 0;
        $clase->status      = 1;

        if ($clase->save()) {
            $setSchedull = DB::table('schedulles')
                                                ->insert(
                                                        [
                                                         'year'      => $data['ciclo'], 
                                                         'date_init' => $data['dateInit'],
                                                         'date_end'  => $data['dateEnd'],
                                                         'hour_init' => $data['hourInit'],
                                                         'hour_end'  => $data['hourEnd']
                                                        ]
            );
            foreach ($request->days as $day) {
                DB::table('schedull_days')->insert(
                                                   [
                                                    'id_schedull' => $schedull, 
                                                    'id_day'      => $day
                                                   ]
                );
            }
            return redirect('classes');
        } else {
            return redirect('500');
        }
    }

    public function setTeacher(Request $request) {
        $this->validate($request, [
            'setMaestro' => 'required',
            'clase_id'   => 'required'
        ]);

        $data = $request;
        $update = DB::table('classes')
                    ->where([
                                ['id','=', $data['clase_id']]
                            ])
                    ->update([
                                'id_teacher' => $data['setMaestro']
                            ]);
        $cont = count($update);
        if ($cont === 1) {
            return redirect('classes');
        } else { 
            return redirect('500');
        }
    }

    public function edit($id) {
        //
    }

    public function update(Request $request) {
        //
    }

    public function destroy($id)
    {
        
    }
}
