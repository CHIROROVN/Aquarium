<?php namespace App\Http\Models;
use DB;

class CategoryModel
{
    protected $table        = 'categories';
    protected $primaryKey   = 'id';

    public function Rules()
    {
        return array(
                'name'                              => 'required',
                'order'                             => 'required|numeric',
                );
    }

    public function Messages()
    {
        return array(
                'name.required'                     => trans('validation.error_category_name_required'),
                'order.required'                    => trans('validation.error_category_order_required'),
                'order.numeric'                     => trans('validation.error_category_order_numeric'),
                );
    }

    //get all category list
    public function getAllCat(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('order', '=', 'asc')->paginate(PAGINATION);
    }

    public function getListCat(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('order', '=', 'asc')->pluck('name', 'id');
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('id', $id)->first();
    }

    public function get_max_order()
    {
        return DB::table($this->table)->max('order');
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
}
