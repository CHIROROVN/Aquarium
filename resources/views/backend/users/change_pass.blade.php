@extends('backend.backend')
@section('content')
    <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title">{{@$title}}</h2>
                    </div>
                </div>
                <hr />
                <div class="col-lg-12">
                    <div class="box">
                    <header><div class="icons"><i class="icon-key"></i></div>
                    <h5>Change Password</h5>
                    </header>
                        <div class="body">
                        @if($message = Session::get('danger'))
                            <div id="error" class="message">
                                <a id="close" title="Message"  href="#" onClick="document.getElementById('error').setAttribute('style','display: none;');">&times;</a>
                                <span>{{$message}}</span>
                            </div>
                        @elseif($message = Session::get('success'))
                            <div id="success" class="message">
                                <a id="close" title="Message"  href="javascript::void(0);" onClick="document.getElementById('success').setAttribute('style','display: none;');">&times;</a>
                                <span>{{$message}}</span>
                            </div>
                        @endif

                        {!! Form::open( ['id' => 'frmChangePass', 'class' => 'form-horizontal frm-margin-top','method' => 'post', 'route' => 'backend.users.change_pass', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Old Password <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="1" type="Password" name="old_pass" placeholder="Old Password">
                                        @if ($errors->first('old_pass')) 
                                        <span class="help-block" for="old_pass">※{!! $errors->first('old_pass') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Password <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="2" type="Password" name="new_pass" placeholder="New Password">
                                        @if ($errors->first('new_pass')) 
                                        <span class="help-block" for="new_pass">※{!! $errors->first('new_pass') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Confirm Password</label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="3" type="Password" name="conf_new_pass" placeholder="Confirm New Password">
                                        @if ($errors->first('conf_new_pass')) 
                                        <span class="help-block" for="email">※{!! $errors->first('conf_new_pass') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="form-actions gbutton col-lg-10">
                                        <button type="submit" tabindex="4" class="btn btn-primary">&nbsp;<i class="icon-exchange icon-white"></i> Change&nbsp;</button>
                                        <button type="reset" tabindex="5" class="btn btn-default">&nbsp;<i class="icon-refresh icon-white"></i> Reset&nbsp;</button>
                                    </div>
                                </div>
                            </form>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--END PAGE CONTENT -->
@endsection