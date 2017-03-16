<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Input;
use Session;
use Html;

class DashboardController extends BackendController
{
    /*
    |-----------------------------------
    | get view home
    |-----------------------------------
    */
    public function index() {
        $data['title']             = 'Xanh Tuoi';
        return view('backend.dashboard.index', $data);
    }

}