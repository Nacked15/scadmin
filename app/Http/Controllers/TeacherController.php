<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Validator;
use App\Teacher;
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
        $this->validate($request, [
            'name'      => 'required',
            'surname'   => 'required',
            'email'     => 'required|email|max:100|unique:users',
            'phone'  =>  'required|min:6',
            'password'  =>  'required|min:6'
        ]);

        $data = $request;

        $user = new User;
        $user->name = strtolower($data['name']);
        $user->surname = strtolower($data['surname']);
        $user->category = 3;
        $user->email = strtolower($data['email']);
        $user->phone = $data['phone'];
        $user->password = bcrypt($data['password']);

        if ($user->save()) {
            return redirect('teachers');
        } else {
            return redirect('teachers');
        }
    }

    public function edit($teacher)
    {
        $getTeacher = DB::table('users')
        						->select('id','photo', 'name', 'surname','email','phone')
        						->where('id', '=', $teacher)
        						->get();
        $data = json_encode($getTeacher);
        return $data;
    }
}
