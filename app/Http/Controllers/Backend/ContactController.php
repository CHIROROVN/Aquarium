<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\ContactModel;
use Auth;
use Session;

class ContactController extends BackendController
{

    /*
    |-----------------------------------
    | get list contact
    |-----------------------------------
    */
    public function index() {
        $data['title']             = 'Xanh Tuoi';
        $clsContact                = new ContactModel();
        $data['contacts']          = $clsContact->getAllContact();
        return view('backend.contacts.index', $data);
    }

    /*
    |-----------------------------------
    | get view contact
    |-----------------------------------
    */
    public function view($id) {
        $this->read($id);
        $data['title']             = 'Xanh Tuoi';
        $clsContact                = new ContactModel();
        $data['contact']          = $clsContact->getById($id);
        return view('backend.contacts.view', $data);
    }

    /*
    |-----------------------------------
    | delete contact
    |-----------------------------------
    */
    public function del($id){
        $clsContact                     = new ContactModel();
        $data['last_ip']                = CLIENT_IP_ADRS;
        $data['last_user']              = Auth::user()->id;
        $data['last_kind']              = DELETE;

       if ( $clsContact->update($id, $data) ) {
            Session::flash('success', trans('common.msg_contact_del_success'));
        } else {
            Session::flash('danger', trans('common.msg_contact_del_danger'));
        }
        return redirect()->route('backend.contacts.index');
    }

    /*
    |-----------------------------------
    | count contact
    |-----------------------------------
    */
   static function countContact(){
        $clsContact                = new ContactModel();
        return $clsContact->getCountContact();
    }

    /*
    |-----------------------------------
    | read contact
    |-----------------------------------
    */
    public function read($id){
        $clsContact                     = new ContactModel();
        $data['read']                   = NULL;
        $data['last_user']              = Auth::user()->id;
        $clsContact->update($id, $data);
    }
}
