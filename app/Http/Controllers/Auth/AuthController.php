<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\User;
use Session;
use Validator;
use Storage;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
        // $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getLogin()
    {
        return view('forms.login');
    }

    protected function postLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            return redirect('home');
        }

        return view('forms.login')->with('msjerror','credenciales incorrectas');
    }

    public function getRegister(){
        return view('forms.register');
    }

    public function postRegister(Request $request){
        $avatar = $request->file('avatar');
        $input = array('image' => $avatar);
        $rules = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:6000');
        $validate = Validator::make($input, $rules);
        $this->validate($request, [
            'name'      => 'required',
            'surname'   => 'required',
            'category'  => 'required',
            'email'     => 'required|email|max:100|unique:users',
            'password'  =>  'required|min:6'
        ]);

        if (!$validate->fails()) {
            $data = $request;
            $randon = rand(10, 9999);
            //Processing the image file
            $filename = $avatar->getClientOriginalName();
            $mime     = $avatar->getClientOriginalExtension();
            $newname  = $data['name']."&".$randon.".".$mime;

            \Storage::disk('avatars')->put($newname, \File::get($avatar));

            $user = new User;
            $user->name     = strtolower($data['name']);
            $user->surname  = strtolower($data['surname']);
            $user->avatar   = $newname;
            $user->category = $data['category'];
            $user->email    = $data['email'];
            $user->password = bcrypt($data['password']);

            if ($user->save()) {
                return redirect('login');
            } else {
                return redirect('500');
            }
        } else {
            return redirect('500');
        }

    }

    public function getLogout(){
        $this->auth->logout();
        // Auth::Logout();
        Session::flush();
        return redirect('/');
    }

}
