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
                    <header><div class="icons"><i class="icon-user"></i></div>
                    <h5>User Edit</h5>
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
                        {!! Form::open( ['id' => 'frmUserEdit', 'class' => 'form-horizontal frm-margin-top','method' => 'post', 'route' => ['backend.users.edit',$user->id], 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
                                <div class="form-group">
                                    <label class="control-label col-lg-4">First Name <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="11" type="text" name="first_name" placeholder="First Name" value="@if(!empty(old('first_name'))){{old('first_name')}}@else{{$user->first_name}}@endif">
                                        @if ($errors->first('first_name')) 
                                        <span class="help-block" for="first_name">※{!! $errors->first('first_name') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Last Name <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="11" type="text" name="last_name" placeholder="Last Name" value="@if(!empty(old('last_name'))){{old('last_name')}}@else{{$user->last_name}}@endif">
                                        @if ($errors->first('last_name')) 
                                        <span class="help-block" for="password">※{!! $errors->first('last_name') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">E-mail <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="11" type="text" name="email" placeholder="example@email.com" value="@if(!empty(old('email'))) {{old('email')}}@else{{$user->email}}@endif">
                                        @if ($errors->first('email')) 
                                        <span class="help-block" for="email">※{!! $errors->first('email') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Permission</label>
                                    <div class="col-lg-2">
                                    <select class="form-control" name="power" tabindex="11">
                                        <option value="1" @if(old('power') == '1' || $user->power == '1') selected="" @endif >Admin</option>
                                        <option value="2" @if(old('power') == '2' || $user->power == '2') selected="" @endif >Staff</option>
                                        <option value="3" @if(old('power') == '3' || $user->power == '3') selected="" @endif >Guest</option>
                                    </select>
                                    @if ($errors->first('power')) 
                                        <span class="help-block" for="power">※{!! $errors->first('power') !!} </span>
                                    @endif
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Status</label>
                                    <div class="col-lg-8">
                                        <input type="checkbox" @if(old('status') == 'on' || $user->status == 1) checked="" @endif data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Enabled" data-off="Disabled" name="status">
                                        @if ($errors->first('status')) 
                                        <span class="help-block" for="status">※{!! $errors->first('status') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="form-actions gbutton col-lg-10">
                                        <button type="submit" class="btn btn-primary">&nbsp;&nbsp;<i class="icon-save icon-white"></i> Update&nbsp;&nbsp;</button>
                                        <button type="reset" class="btn btn-default">&nbsp;&nbsp;<i class="icon-refresh icon-white"></i> Reset&nbsp;&nbsp;</button>
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