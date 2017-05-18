<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Validator;
use Session;
use Storage;
use App\User;

class TeacherController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $teachers = DB::table('users')->where('category', '=', 3)->get();
        return view('teachers.index', ['maestros' => $teachers]);
    }

    public function create(Request $request){
        $avatar = $request->file('avatar');
        $input = array('image' => $avatar);
        $rules = array('image' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:7000');
        $this->validate($request, [
            'name'      => 'required',
            'surname'   => 'required',
            'email'     => 'required|email|max:100|unique:users',
            'phone'     =>  'required|min:6',
            'password'  =>  'required|min:6'
        ]);

        $data = $request;
        $filename = $avatar->getClientOriginalName();
        $mime     = $avatar->getClientOriginalExtension();
        $newname  = "teacher_".$data['name'].".".$mime;
        \Storage::disk('avatars')->put($newname, \File::get($avatar));

        $user = new User;
        $user->name = strtolower($data['name']);
        $user->surname = strtolower($data['surname']);
        $user->category = 3;
        $user->email = strtolower($data['email']);
        $user->phone = $data['phone'];
        $user->avatar = $newname;
        $user->password = bcrypt($data['password']);

        if ($user->save()) {
            return redirect('teachers');
        } else {
            return redirect('teachers');
        }
    }

    public function edit($teacher){ 
        $getTeacher = DB::table('users')
        						->select('id','avatar', 'name', 'surname','email','phone','password')
        						->where('id', '=', $teacher)
        						->get();
        $data = json_encode($getTeacher);
        return $data;
    }

    public function update(Request $request){
    	$idTeacher = $request->teacher;

        $data = $request;
        $update = DB::table('users')->where([
                                            ['id','=', $idTeacher]
                                        ])
                                  	->update([
                                        'name'     => $data['editname'],
                                        'surname'  => $data['editsurname'],
                                        'category' => 3, 
                                        'email'    => $data['editemail'],
                                        'phone'    => $data['editphone']
                                    ]);

        $cont = count($update);
        if ($cont === 1) {
            return redirect('teachers');
        } else { 
            return redirect('teachers');
        }
    }

    public function destroy(Request $request)
    {
        $teacher = $request->deleteteacher;
        $delete = DB::table('users')->where([
                                                ['id','=', $teacher]
                                            ])
                                    ->delete();

        $cont = count($delete);
        if ($cont === 1) {
            return redirect('teachers');
        } else { 
            return redirect('teachers');
        }
    }
}
