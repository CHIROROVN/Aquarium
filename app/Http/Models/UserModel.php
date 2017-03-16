<?php namespace App\Http\Models;
use DB;
use Auth;
use Hash;
use Validator;
use Input;

class UserModel
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function RulesLogin()
    {
        return array(
                'email'                             => 'required',
                'password'                          => 'required'
                );
    }

    public function MessagesLogin()
    {
        return array(
                'email.required'                    => trans('validation.error_username_required'),
                'email.email'                       => trans('validation.error_email_format'),
                'password.required'                 => trans('validation.error_password_required'),
                );
    }

    public function Rules()
    {
        return array(
                'first_name'                        => 'required',
                'last_name'                         => 'required',
                'email'                             => 'required|email|unique:users',
                'password'                          => 'required|min:4',
                'conf_password'                     => 'same:password',
                );
    }

    public function Messages()
    {
        return array(
                'first_name.required'               => trans('validation.error_first_name_required'),
                'last_name.required'                => trans('validation.error_last_name_required'),
                'email.required'                    => trans('validation.error_email_required'),
                'email.email'                       => trans('validation.error_email_format'),
                'email.unique'                      => trans('validation.error_email_unique'),
                'password.required'                 => trans('validation.error_password_required'),
                'password.min'                      => trans('validation.error_password_min'),
                'conf_password.same'                => trans('validation.error_conf_password'),
                );
    }

        public function RulesEdit()
    {
        return array(
                'first_name'                        => 'required',
                'last_name'                         => 'required',
                'email'                             => 'required|email|unique:users',
                );
    }

    public function MessagesEdit()
    {
        return array(
                'first_name.required'               => trans('validation.error_first_name_required'),
                'last_name.required'                => trans('validation.error_last_name_required'),
                'email.required'                    => trans('validation.error_email_required'),
                'email.email'                       => trans('validation.error_email_format'),
                'email.unique'                      => trans('validation.error_email_unique'),
                );
    }

    public function RulesChangePwd()
    {
        Validator::extend('checkHashedPass', function($attribute, $value, $parameters)
        {
            if( ! Hash::check( $value , $parameters[0] ) )
            {
                return false;
            }
            return true;
        });

        return array(
                'old_pass'                          => 'required|checkHashedPass:' . Auth::user()->password,
                'new_pass'                          => 'required|min:4',
                'conf_new_pass'                     => 'same:new_pass'
                );
    }

    public function MessagesChangePwd()
    {
        return array(
                'old_pass.required'                 => trans('validation.error_old_pass_required'),
                'old_pass.checkHashedPass'          => trans('validation.error_old_pass_checkHashedPass'),
                'new_pass.required'                 => trans('validation.error_new_pass_required'),
                'new_pass.min'                      => trans('validation.error_new_pass_min'),
                'conf_new_pass.same'                => trans('validation.error_conf_new_pass_same'),
                );
    }


    //get all user list
    public function getAllUser(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('updated_at', 'desc')->get();
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('id', $id)->first();
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
}
