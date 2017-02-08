<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;

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
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
        $this->validate($request, [
            'name'      => 'required',
            'surname'   => 'required',
            'category'   => 'required',
            'email'     => 'required|email|max:100|unique:users',
            'password'  =>  'required|min:6'
        ]);

        $data = $request;

        $user = new User;
        $user->name = strtolower($data['name']);
        $user->surname = strtolower($data['surname']);
        //$user->photo = $data['name'];
        $user->category = $data['category'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);

        if ($user->save()) {
            return redirect('login');
        } else {
            return 'registration incorrect';
        }

    }

    public function getLogout(){
        $this->auth->logout();

        Session::flush();

        return view('forms.login');
    }

}
