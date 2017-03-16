<?php namespace App\Http\Models;
use DB;

class EmailSignatureModel
{
    protected $table = 'mail_signature';
    protected $primaryKey = 'id';

    public function Rules()
    {
        return array(
                'content'                        => 'required'
                );
    }

    public function Messages()
    {
        return array(
                'content.required'               => trans('validation.error_content_required'),
                );
    }

    //insert e-mail signature
    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    //update e-mail signature
    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    //get e-mail signature
    public function getEmailSignature()
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->first();
    }

}