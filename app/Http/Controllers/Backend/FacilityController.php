<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Input;
use Session;
use Validator;

class FacilityController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /*
    |-----------------------------------
    | get view Facilitys
    |-----------------------------------
    */
    public function index() {
        $data['title']             = 'Xanh Tuoi';
        return view('backend.facilitys.index');
    }

    /*
    |-----------------------------------
    | get view add Facilitys
    |-----------------------------------
    */
    public function addFacility() {
        $data['title']             = 'Xanh Tuoi';
        return view('backend.facilitys.index');
    }

        /*
    |-----------------------------------
    | post view add Facilitys
    |-----------------------------------
    */
    public function postAddFacility() {

    }

        /*
    |-----------------------------------
    | get view edit Facilitys
    |-----------------------------------
    */
    public function editFacility() {
        $data['title']             = 'Xanh Tuoi';
        return view('backend.facilitys.index');
    }

        /*
    |-----------------------------------
    | post view edit Facilitys
    |-----------------------------------
    */
    public function postEditFacility() {
        
    }


}