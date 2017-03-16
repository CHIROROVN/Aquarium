<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\EmailSignatureModel;

use Input;
use Session;
use Validator;
use Hash;
use Auth;


class SystemsController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /*
    |-----------------------------------
    | get email signature
    |-----------------------------------
    */
    public function signature() {
        $clsEmailSignature         = new EmailSignatureModel();
        $data['signature']         = $clsEmailSignature->getEmailSignature();
        $data['title']             = 'SYSTEM MANAGEMENT';
        return view('backend.systems.signature',$data);
    }

    /*
    |-----------------------------------
    | post email signature
    |-----------------------------------
    */
    public function postSignature() {
        $clsEmailSignature         = new EmailSignatureModel();
        $id         = Input::get('id');
        $validator = Validator::make(Input::all(), $clsEmailSignature->Rules(), $clsEmailSignature->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.systems.signature')->withErrors($validator)->withInput();
        }

        $data['id']                 = Input::get('id');
        $data['remember_token']                 = Input::get('_token');
        $data['content']                        = Input::get('content');
        $data['last_ip']                        = CLIENT_IP_ADRS;
        $data['last_user']                      = Auth::user()->id;
        $data['last_kind']                      = UPDATE;

        if(!empty($id)){
            $clsEmailSignature->update($id, $data);
            Session::flash('success', trans('common.msg_email_signature_success'));
        }else{
            if ( $clsEmailSignature->insert($data) ) {
                Session::flash('success', trans('common.msg_email_signature_success'));
            } else {
                Session::flash('danger', trans('common.msg_email_signature_danger'));
            }
        }
        return redirect()->route('backend.systems.signature');
    }
}