<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\ContactModel;
use Input;
use Session;
use Html;

class ChatController extends BackendController
{

    /*
    |-----------------------------------
    | get chat room
    |-----------------------------------
    */
    public function index() {
        $data['title']             = 'Xanh Tuoi';
        return view('backend.chats.index', $data);
    }

}