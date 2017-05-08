<?php namespace App\Http\Models;
use DB;

class ContactModel
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';

    //get all contact list
    public function getAllContact(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('updated_at', 'desc')->paginate(PAGINATION);
    }

    //update contact
    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    //get contact by id
    public function getById($id)
    {
        return DB::table($this->table)->where('id', $id)->first();
    }

    //get count contact unread
    public function getCountContact(){
        return DB::table($this->table)
        ->where('last_kind', '<>', DELETE)
        ->where('read', '=', 1)
        ->count();;
    }

}