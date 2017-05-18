<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\Classe;
use App\CourseModel;
use App\Level;
use Validator;
use Session;
use Storage;
use DB;

class StudentController extends Controller{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        return view('students.index');
    }

    public function create(){
        $courses  = CourseModel::all();
        
        return view('students.newstudent', ['cursos' => $courses]);
    }

    public function getLevelsByCourse($course){
        $levels   = DB::table('levels')
                            ->join('classes', 'classes.id_level', '=', 'levels.id')
                            ->where('classes.id_course', '=', $course)
                            ->select('levels.id', 'levels.level')
                            ->get();

        $data = json_encode($levels);

        return $data;
    }


    public function storeTutor(Request $request) {
        $lastTutor = DB::table('tutors')->max('id');
        $newTutor  = $lastTutor + 1; 
        $this->validate($request, [
            'name'         => 'required',
            'surname'      => 'required',
            'lastname'     => 'required',
            'relationship' => 'required',
            'job'          => 'required',
            'cellphone'    => 'required',
            'phone'        => 'required',
            'familiar'     => 'required',
            'phoneAlt'     => 'required',
            'street'       => 'required',
            'number'       => 'required',
            'between'      => 'required',
            'colony'       => 'required',
        ]);
        $data = $request;
        $addTutor = DB::table('tutors')
                                ->insert(
                                        [
                                         'namet'            => strtolower($data['name']), 
                                         'surname1'         => strtolower($data['surname']),
                                         'surname2'         => strtolower($data['lastname']),
                                         'job'              => $data['job'],
                                         'cellphonet'       => $data['cellphone'],
                                         'phone'            => $data['phone'],
                                         'relationship'     => $data['relationship'],
                                         'phone_alt'        => $data['phoneAlt'],
                                         'relationship_alt' => $data['familiar']
                                        ]
        );
        if ($addTutor) {
            $addAddres = DB::table('address')
                                        ->insert([
                                                    'user_id' => $newTutor,
                                                    'street'  => $data['street'],
                                                    'number'  => $data['number'],
                                                    'between' => $data['between'],
                                                    'colony'  => $data['colony'],
                                                    'city'    => 'Felipe Carrillo Puerto',
                                                    'zipcode' => '0',
                                                    'state'   => 'Quintana Roo',
                                                    'country' => 'México'
                                                ]);
            if ($addAddres) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            return redirect('500');
        }   
    }

    public function storeStudent(Request $request) {
        $Tutor = DB::table('tutors')->max('id');
        $this->validate($request, [
            'name'         => 'required',
            'surname'      => 'required',
            'lastname'     => 'required',
            'birthdate'    => 'required',
            'genre'        => 'required',
            'civilstatus'  => 'required',
            'cellphone'    => 'required',
            'streetst'     => 'required',
            'numberst'     => 'required',
            'betweenst'    => 'required',
            'colonyst'     => 'required',
            'reference'    => 'required',
            'anotations'   => 'required',
        ]);

        $data = $request;


        //Processing Picture
        $avatar = $request->file('photo');
        $input = array('image' => $avatar);
        $rules = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:6000');
        $validate = Validator::make($input, $rules);
        //Processing the image file
        $filename = $avatar->getClientOriginalName();
        $mime     = $avatar->getClientOriginalExtension();
        $newname  = $data['name']."&".$data['surname'].".".$mime;

        \Storage::disk('avatars')->put($newname, \File::get($avatar));

        //Calculate Age
        list($anio,$mes,$dia) = explode("-", $data['birthdate']);
        $year_dif = date("Y") - $anio;
        $month_dif = date("m") - $mes;
        $day_dif  = date("d") - $dia;

        if (($day_dif < 0 && $month_dif == 0) || ($month_dif < 0)){
            $year_dif--;
        } 
    

        $addStudent = DB::table('students')
                            ->insert([
                                      'tutor_id' => $Tutor,
                                      'name'     => $data['name'],
                                      'surname'  => $data['surname'],
                                      'lastname' => $data['lastname'],
                                      'bithdate' => $data['bithdate'],
                                      'age'      => $year_dif,
                                      'genre'    => $data['genre'],
                                      'civil_status' => $data['civilstatus'],
                                      'cellphone' => $data['cellphone'],
                                      'sickness'  => $data['seckness'],
                                      'medication' => $data['medication'],
                                      'homestay'   => $data['homestay'],
                                      'comments'   => $data['anotations'],
                                      'status'     => 1,
                                      'avatar'     => $newname]);

        if ($addStudent) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function getAddress() {
        $tutor = DB::table('tutors')->max('id');
        $getAddress = DB::table('address')
                                ->select('street','number', 'between', 'colony')
                                ->where('user_id', '=', $tutor)
                                ->get();
        
        if ($getAddress) {
            $data = json_encode($getAddress);
            return $data;
        } else {
            return 0;
        }
        
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }

}
