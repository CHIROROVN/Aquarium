<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\UserModel;
use Input;
use Session;
use Validator;
use Hash;
use Auth;


class UsersController extends BackendController
{
    /*
    |-----------------------------------
    | get view users list
    |-----------------------------------
    */
    public function index() {
        $data['title']      = 'USERS MANAGEMENT';
        $clsUserM  = new UserModel();
        $data['users'] = $clsUserM->getAllUser();
        return view('backend.users.list', $data);
    }

    /*
    |-----------------------------------
    | get view users add
    |-----------------------------------
    */
    public function add() {
        $data['title']              = 'USERS MANAGEMENT';
        return view('backend.users.add', $data);
    }

    /*
    |-----------------------------------
    | post users add
    |-----------------------------------
    */
    public function postAdd() {
        $clsUser            = new UserModel();
        $validator = Validator::make(Input::all(), $clsUser->Rules(), $clsUser->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.users.add')->withErrors($validator)->withInput();
        }

        $data['remember_token']                 = Input::get('_token');
        $data['first_name']                     = Input::get('first_name');
        $data['last_name']                      = Input::get('last_name');
        $data['email']                          = Input::get('email');
        $data['password']                       = Hash::make(Input::get('password'));
        $data['power']                          = Input::get('power');
        $data['status']                         = (Input::get('status') == 'on') ? 1 : null;

        $data['last_ip']                        = CLIENT_IP_ADRS;
        $data['last_login']                     = date('y-m-d H:i:s');
        $data['last_user']                      = Auth::user()->id;
        $data['last_kind']                      = INSERT;

        if ( $clsUser->insert($data) ) {
            Session::flash('success', trans('common.msg_user_add_success'));
        } else {
            Session::flash('danger', trans('common.msg_user_add_danger'));
        }

        return redirect()->route('backend.users.list');

    }

    /*
    |-----------------------------------
    | get view users edit
    |-----------------------------------
    */
    public function edit($id) {
        $data['title']              = 'USERS MANAGEMENT';
        $clsUser            = new UserModel();
        $data['user']       = $clsUser->get_by_id($id);
        return view('backend.users.edit', $data);
    }

    /*
    |-----------------------------------
    | post users edit
    |-----------------------------------
    */
    public function postEdit($id) {
        $clsUser            = new UserModel();
        $user               = $clsUser->get_by_id($id);
        $email               = $user->email;

        $rules              = $clsUser->RulesEdit();

        if(Input::get('email') == $email){
            unset($rules['email']);
        }

        $validator = Validator::make(Input::all(), $rules, $clsUser->MessagesEdit());

        if ($validator->fails()) {
            return redirect()->route('backend.users.edit', $id)->withErrors($validator)->withInput();
        }

        $data['remember_token']                 = Input::get('_token');
        $data['first_name']                     = Input::get('first_name');
        $data['last_name']                      = Input::get('last_name');
        $data['email']                          = Input::get('email');
        $data['power']                          = Input::get('power');
        $data['status']                         = (Input::get('status') == 'on') ? 1 : null;

        $data['last_ip']                        = CLIENT_IP_ADRS;
        $data['last_login']                     = date('y-m-d H:i:s');
        $data['last_user']                      = Auth::user()->id;
        $data['last_kind']                      = UPDATE;

        if ( $clsUser->update($id, $data) ) {
            Session::flash('success', trans('common.msg_user_edit_success'));
            return redirect()->route('backend.users.list');
        } else {
            Session::flash('danger', trans('common.msg_user_edit_danger'));
            return redirect()->route('backend.users.edit', $id);
        }
    }

    /*
    |-----------------------------------
    | delete user
    |-----------------------------------
    */
    public function del($id){
        $clsUser            = new UserModel();
        $data['last_ip']                = CLIENT_IP_ADRS;
        $data['last_user']              = Auth::user()->id;
        $data['last_kind']              = DELETE;

       if ( $clsUser->update($id, $data) ) {
            Session::flash('success', trans('common.msg_users_del_success'));
        } else {
            Session::flash('danger', trans('common.msg_users_del_danger'));
        }
        return redirect()->route('backend.users.list');
    }

    /*
    |-----------------------------------
    | get change password
    |-----------------------------------
    */
    public function changePass(){
        $data['title']              = 'USERS MANAGEMENT';
        return view('backend.users.change_pass', $data);
    }

    /*
    |-----------------------------------
    | post change password
    |-----------------------------------
    */
    public function postChangePass(){
        //$data['title']              = 'USERS MANAGEMENT';
        $clsUser            = new UserModel();

        $validator = Validator::make(Input::all(), $clsUser->RulesChangePwd(), $clsUser->MessagesChangePwd());

        if ($validator->fails()) {
            return redirect()->route('backend.users.change_pass')->withErrors($validator)->withInput();
        }

        $data['password']               = Hash::make(Input::get('new_pass'));
        $data['last_ip']                = CLIENT_IP_ADRS;
        $data['last_login']             = date('y-m-d H:i:s');
        $data['last_user']              = Auth::user()->id;
        $data['last_kind']              = UPDATE;

       if ( $clsUser->update(Auth::user()->id, $data) ) {
            Session::flash('success', trans('common.msg_change_pass_success'));
        } else {
            Session::flash('danger', trans('common.msg_change_pass_danger'));
        }
        return redirect()->route('backend.users.change_pass');
    }
}