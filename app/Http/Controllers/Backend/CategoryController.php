<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\CategoryModel;
use Input;
use Session;
use Validator;
use Auth;

class CategoryController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /*
    |-----------------------------------
    | get view Category
    |-----------------------------------
    */
    public function index() {
        $data['title']              = 'CATEGORIES MANAGEMENT';
        $clsCatModel                = new CategoryModel();
        $data['categories']              = $clsCatModel->getAllCat();
        return view('backend.categories.index', $data);
    }

    /*
    |-----------------------------------
    | get view add Category
    |-----------------------------------
    */
    public function add() {
        $data['title']              = 'CATEGORIES MANAGEMENT';
        $clsCat            = new CategoryModel();
        $data['order_max'] = $clsCat->get_max_order() + 1;
        return view('backend.categories.add',$data);
    }

        /*
    |-----------------------------------
    | post view add Category
    |-----------------------------------
    */
    public function postAdd() {
        $clsCat            = new CategoryModel();
        $validator = Validator::make(Input::all(), $clsCat->Rules(), $clsCat->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.categories.add')->withErrors($validator)->withInput();
        }

        $data['name']                           = Input::get('name');
        $data['order']                          = Input::get('order');

        $data['last_user']                      = Auth::user()->id;
        $data['last_kind']                      = INSERT;

        if ( $clsCat->insert($data) ) {
            Session::flash('success', trans('common.msg_cat_add_success'));
        } else {
            Session::flash('danger', trans('common.msg_cat_add_danger'));
        }

        return redirect()->route('backend.categories.index');
    }

    /*
    |-----------------------------------
    | get view edit Category
    |-----------------------------------
    */
    public function edit() {
        $data['title']             = 'Xanh Tuoi';
        return view('backend.categories.edit');
    }

    /*
    |-----------------------------------
    | post view edit Category
    |-----------------------------------
    */
    public function postEdit() {
        
    }

    /*
    |-----------------------------------
    | delete Category
    |-----------------------------------
    */
    public function del() {
        return view('backend.categories.del');
    }


}