<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\SettingModel;
use DB;
use File;
use Input;
use Image;
use Session;
use Validator;
use Auth;
use Storage;

class SettingController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /*
    |-----------------------------------
    | get view setting website
    |-----------------------------------
    */
    public function setting() {
        $data['title']             = 'SETTING WEBSITE INFORMATION';
        $clsSetting                = new SettingModel();
        $data['setting']           = $clsSetting->getSetting();
        return view('backend.settings.index',$data);
    }

    /*
    |-----------------------------------
    | post view setting website
    |-----------------------------------
    */
    public function postSetting() {
        $clsSetting                = new SettingModel();
        $id                        = Input::get('id');
        $validator = Validator::make(Input::all(), $clsSetting->Rules(), $clsSetting->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.settings.index')->withErrors($validator)->withInput();
        }

        if (Input::hasFile('logo')){
            //Delete logo old
            $dataOld = DB::table('settings')->select('logo')->where('last_kind', '<>', DELETE)->first();
            if(!empty($dataOld)){
                if(!empty($dataOld->logo)){
                    $logoDel = $dataOld->logo;
                    if(File::isFile($logoDel)){
                        \File::delete($logoDel);
                    }
                }
            }

            $path = public_path().'/upload/logo/';
            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true);
            }

            $extLogo = Input::file('logo')->extension();
            $fileName = 'logo'.'.'.$extLogo;
            Image::make(Input::file('logo')->getRealPath())->resize(140, 120)->save(public_path().'/upload/logo/'.$fileName);

            $data['logo'] = '/upload/logo/'.$fileName;
        }

        if (Input::hasFile('favicon')){
            //Delete favicon old
            $favOld = DB::table('settings')->select('favicon')->where('last_kind', '<>', DELETE)->first();
            if(!empty($favOld)){
                if(!empty($favOld->favicon)){
                    $favDel = $favOld->favicon;
                    if(File::isFile($favDel)){
                        \File::delete($favDel);
                    }
                }
            }

            $pathFavicon = public_path().'/upload/favicon/';
            if(!File::exists($pathFavicon)) {
                File::makeDirectory($pathFavicon, $mode = 0777, true);
            }

            $extFavicon = Input::file('favicon')->extension();
            $favName = 'favicon'.'.'.$extFavicon;
            Image::make(Input::file('favicon')->getRealPath())->resize(30, 30)->save(public_path().'/upload/favicon/'.$favName);
            
            $data['favicon'] = $favName;
        }

        $data['title']                          = Input::get('title');
        $data['meta_key']                       = Input::get('meta_key');
        $data['meta_desc']                      = Input::get('meta_desc');
        $data['company_name']                   = Input::get('company_name');
        $data['company_addrs']                  = Input::get('company_addrs');
        $data['phone']                          = Input::get('phone');
        $data['fax']                            = Input::get('fax');
        $data['title_map']                      = Input::get('title_map');
        $data['last_ip']                        = CLIENT_IP_ADRS;
        $data['last_user']                      = Auth::user()->id;
        $data['last_kind']                      = UPDATE;
        $data['created_at']                     = date('Y-m-d H:i:s');
        $data['updated_at']                     = date('Y-m-d H:i:s');

        if(!empty($id)){
            $clsSetting->update($id, $data);
            Session::flash('success', trans('common.msg_email_signature_success'));
        }else {
            unset($data['updated_at']);
            $clsSetting->insert($data);
            Session::flash('success', trans('common.msg_email_signature_success'));
        }
        return redirect()->route('backend.settings.index');
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