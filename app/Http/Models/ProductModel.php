<?php namespace App\Http\Models;
use DB;

class ProductModel
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function Rules()
    {
        return array(
                'name'                        => 'required',
                );
    }

    public function Messages()
    {
        return array(
                'name.required'               => trans('validation.error_product_name_required'),
                );
    }

    //get all products list
    public function getAllProduct(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('order', 'desc')->orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->get();
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
