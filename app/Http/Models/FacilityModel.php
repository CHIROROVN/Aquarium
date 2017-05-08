<?php namespace App\Http\Models;
use DB;

class FacilityModel
{
    protected $table        = 'facilities';
    protected $primaryKey   = 'id';

    public function Rules()
    {
        return array(
                'name'                              => 'required',
                'order'                             => 'required|numeric',
                'image'                             => 'required|image|mimes:jpeg,bmp,png,jpg|max:5000',
                );
    }

    public function Messages()
    {
        return array(
                'name.required'                     => trans('validation.error_facility_name_required'),
                'order.required'                    => trans('validation.error_facility_order_required'),
                'order.numeric'                     => trans('validation.error_facility_order_numeric'),
                'image.required'                    => trans('validation.error_facility_image_required'),
                'image.image'                       => trans('validation.error_facility_image_image'),
                'image.mimes'                       => trans('validation.error_facility_image_mimes'),
                'image.max'                         => trans('validation.error_facility_image_max'),
                );
    }

    //get all facility list
    public function getAllFacility(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('order', '=', 'asc')->paginate(PAGINATION);
    }

    public function getListFacility(){
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
