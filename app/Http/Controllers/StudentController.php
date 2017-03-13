<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use DB;

class StudentController extends Controller{

    public function index(){
        return view('students.index');
    }

    public function create(){
        return view('students.newstudent');
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
                return 1;
            } else {
                return 0;
            }
        } else {
            return redirect('500');
        }   
    }

    public function getAddress() {
        $tutor = DB::table('tutors')->max('id');
        $getAddress = DB::table('address')
                                ->select('street','number', 'between', 'colony')
                                ->where('user_id', '=', $tutor)
                                ->get();
        $data = json_encode($getAddress);
        return $data;
    }

    public function storeStudent(Request $request) {
        $Tutor = DB::table('tutors')->max('id');

        $data = $request;

        $this->validate($request, [
            'name'         => 'required',
            'surname'      => 'required',
            'lastname'     => 'required',
            'birthdate'    => 'required',
            'genre'        => 'required',
            'civilstatus'  => 'required',
            'cellphone'    => 'required',
            'street'       => 'required',
            'number'       => 'required',
            'between'      => 'required',
            'colony'       => 'required',
            'reference'    => 'required',
            'anotations'   => 'required',
        ]);
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
