<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\FacilityModel;
use Input;
use Session;
use Validator;
use Auth;
use Image;
use File;
use DB;

class FacilityController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /*
    |-----------------------------------
    | get view Facility
    |-----------------------------------
    */
    public function index() {
        $data['title']              = 'Facilities MANAGEMENT';
        $clsFacilityModel                = new FacilityModel();
        $data['facilities']              = $clsFacilityModel->getAllFacility();
        return view('backend.facilities.index', $data);
    }

    /*
    |-----------------------------------
    | get view add Facility
    |-----------------------------------
    */
    public function add() {
        $data['title']              = 'Facilities MANAGEMENT';
        $clsFacility            = new FacilityModel();
        $data['order_max'] = $clsFacility->get_max_order() + 1;
        return view('backend.facilities.add',$data);
    }

    /*
    |-----------------------------------
    | post view add Facility
    |-----------------------------------
    */
    public function postAdd() {
        $clsFacility            = new FacilityModel();
        $validator = Validator::make(Input::all(), $clsFacility->Rules(), $clsFacility->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.facilities.add')->withErrors($validator)->withInput();
        }

        $data['name']                           = Input::get('name');
        $data['description']                    = Input::get('description');
        $data['order']                          = Input::get('order');

        if( Input::hasFile('image') ){
            $ext = Input::file('image')->getClientOriginalExtension();
            $file = Input::get('name') ? trim(Input::get('name')) : rand(time(), 999);
            $fileName = $file.'.'.$ext;
            Image::make(Input::file('image')->getRealPath())->save(public_path().'/upload/facilities/'.$fileName);
            $data['image'] = '/upload/facilities/'.$fileName;
        } 

        $data['last_user']                      = Auth::user()->id;
        $data['created_at']                     = date('Y-m-d H:i:s');
        $data['last_kind']                      = INSERT;

        if ( $clsFacility->insert($data) ) {
            Session::flash('success', trans('common.msg_facility_add_success'));
        } else {
            Session::flash('danger', trans('common.msg_facility_add_danger'));
        }

        return redirect()->route('backend.facilities.index');
    }

    /*
    |-----------------------------------
    | get view edit Facility
    |-----------------------------------
    */
    public function edit($id) {
        $clsFacility            = new FacilityModel();
        $data['title']          = 'Facilities MANAGEMENT';
        $data['facility']       = $clsFacility->get_by_id($id);
        $data['id']             = $id;
        return view('backend.facilities.edit', $data);
    }

    /*
    |-----------------------------------
    | post view edit Facility
    |-----------------------------------
    */
    public function postEdit($id) {
        $clsFacility            = new FacilityModel();
        $rules                  = $clsFacility->Rules();

        if( Input::hasFile('image') ){
            $Rules              = $rules;
        }else{
            unset($rules['image']);
            $Rules              = $rules;
        }

        $validator = Validator::make(Input::all(), $Rules, $clsFacility->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.facilities.edit', $id)->withErrors($validator)->withInput();
        }

        $data['name']                           = Input::get('name');
        $data['description']                    = Input::get('description');
        $data['order']                          = Input::get('order');

        if( Input::hasFile('image') ){

            $data_image = DB::table('facilities')->first();
            if(!empty($data_image->image)){
                $fileDel = $data_image->image;
                if(File::isFile($fileDel)){
                    \File::delete($fileDel);
                }
            }

            $ext = Input::file('image')->getClientOriginalExtension();
            $file = Input::get('name') ? trim(Input::get('name')) : rand(time(), 999);
            $fileName = $file.'.'.$ext;
            Image::make(Input::file('image')->getRealPath())->save(public_path().'/upload/facilities/'.$fileName);
            $data['image'] = '/upload/facilities/'.$fileName;
        } 

        $data['last_user']                      = Auth::user()->id;
        $data['last_kind']                      = UPDATE;
        $data['updated_at']                     = date('Y-m-d H:i:s');

        if ( $clsFacility->update($id, $data) ) {
            Session::flash('success', trans('common.msg_facility_edit_success'));
            return redirect()->route('backend.facilities.index');
        } else {
            Session::flash('danger', trans('common.msg_facility_edit_danger'));
            return redirect()->route('backend.facilities.edit', $id);
        }
    }

    /*
    |-----------------------------------
    | delete Facility
    |-----------------------------------
    */
    public function del($id) {
        $clsFacility                = new FacilityModel();
        $data['last_ip']            = CLIENT_IP_ADRS;
        $data['last_user']          = Auth::user()->id;
        $data['last_kind']          = DELETE;

        $data_image = DB::table('facilities')->first();
        if(!empty($data_image->image)){
            $fileDel = $data_image->image;
            if(File::isFile($fileDel)){
                \File::delete($fileDel);
            }
        }

       if ( $clsFacility->update($id, $data) ) {
            Session::flash('success', trans('common.msg_facility_del_success'));
        } else {
            Session::flash('danger', trans('common.msg_facility_del_danger'));
        }
        return redirect()->route('backend.facilities.index');
    }


}