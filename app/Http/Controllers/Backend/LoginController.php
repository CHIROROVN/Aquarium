<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\BackendController;
use App\User;
use App\Http\Models\UserModel;
use Request;
use Session;
use Validator;
use Illuminate\Support\Facades\Auth;
use Html;
use Illuminate\Support\Facades\Input;

class LoginController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data['title'] = 'XANH TUOI TROPICAL FISH CO.,LTD';
        return view('backend.users.login', $data);
    }

    public function postLogin()
    {
        $clsUser            = new UserModel();
        $validator = Validator::make(Input::all(), $clsUser->RulesLogin(), $clsUser->MessagesLogin());

        if ($validator->fails()) {
            return redirect()->route('backend.users.login')->withErrors($validator)->withInput();
        }

        $login0 = array(
            'email'             => Input::get('email'),
            'password'          => Input::get('password'),
            'last_kind'         => INSERT,
            'status'            => 1,
        );
        
        $login1 = array(
            'email'             => Input::get('email'),
            'password'          => Input::get('password'),
            'last_kind'         => UPDATE,
            'status'            => 1,
        );
        if (Auth::attempt($login0, false)) {
            return redirect()->route('backend.dashboard.index');
        } elseif (Auth::attempt($login1, false)) {
            return redirect()->route('backend.dashboard.index');
        } else {
            Session::flash('error', 'Username or password incorrect.');
            return redirect()->route('backend.users.login')->withErrors($validator)->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('backend.users.login');
    }
}