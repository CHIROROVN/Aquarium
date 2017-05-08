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
                    <header><div class="icons"><i class="icon-globe"></i></div>
                    <h5>Frontend Information</h5>
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

                        {!! Form::open( ['id' => 'frmSetting', 'class' => 'form-horizontal frm-margin-top','method' => 'post', 'route' => 'backend.settings.index', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
                        		<input type="hidden" name="id" value="{{@$setting->id}}">
                                <div class="form-group">
                                    <label class="control-label col-lg-3">Title</label>
                                    <div class="col-lg-5">
                                        <input class="form-control" tabindex="1" type="text" name="title" placeholder="Title Website" value="{{$setting->title}}">
                                        @if ($errors->first('title')) 
                                        <span class="help-block" for="title">※{!! $errors->first('title') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Meta Key</label>
                                    <div class="col-lg-5">
                                        <input class="form-control" tabindex="2" type="text" name="meta_key" placeholder="Meta Key" value="{{$setting->meta_key}}">
                                        @if ($errors->first('meta_key')) 
                                        <span class="help-block" for="meta-key">※{!! $errors->first('meta_key') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Meta Description</label>
                                    <div class="col-lg-5">
                                        <textarea class="form-control" tabindex="3" rows="5" id="meta_desc" name="meta_desc" placeholder="Meta Description">{{$setting->meta_desc}}</textarea>
                                        @if ($errors->first('meta_desc')) 
                                        <span class="help-block" for="meta_desc">※{!! $errors->first('meta_desc') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Company Name</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" tabindex="4" type="text" name="company_name" placeholder="Company Name" value="{{$setting->company_name}}">
                                        @if ($errors->first('company_name')) 
                                        <span class="help-block" for="company_name">※{!! $errors->first('company_name') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Company Address</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" tabindex="5" type="text" name="company_addrs" placeholder="Company Address" value="{{$setting->company_addrs}}">
                                        @if ($errors->first('company_addrs')) 
                                        <span class="help-block" for="company_addrs">※{!! $errors->first('company_addrs') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Phone</label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="6" type="text" name="phone" placeholder="Phone" value="{{$setting->phone}}">
                                        @if ($errors->first('phone')) 
                                        <span class="help-block" for="phone">※{!! $errors->first('phone') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Fax</label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="6" type="text" name="fax" placeholder="Phone" value="{{$setting->fax}}">
                                        @if ($errors->first('fax')) 
                                        <span class="help-block" for="fax">※{!! $errors->first('fax') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Logo</label>
                                    <div class="col-lg-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="{{ asset('') }}public/backend/img/no_image.jpg" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="logo" /></span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                        @if ($errors->first('logo')) 
                                        <span class="help-block" for="logo">※{!! $errors->first('logo') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Favicon</label>
                                    <div class="col-lg-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="{{ asset('') }}public/backend/img/no_image.jpg" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="favicon" /></span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                        @if ($errors->first('favicon')) 
                                        <span class="help-block" for="favicon">※{!! $errors->first('favicon') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Title Map</label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="6" type="text" name="title_map" placeholder="Title Map" value="{{$setting->title_map}}">
                                        @if ($errors->first('title_map')) 
                                        <span class="help-block" for="title_map">※{!! $errors->first('title_map') !!} </span>
                                        @endif
                                    </div>
                                </div>
								<div class="form-group">
								<label class="control-label col-lg-3">Embed Google Map</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" tabindex="7" rows="6" id="map" name="map" placeholder="Meta Description">{{$setting->map}}</textarea>
                                        @if ($errors->first('map')) 
                                        <span class="help-block" for="map">※{!! $errors->first('map') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="form-actions gbutton col-lg-10">
                                        <button type="submit" tabindex="4" class="btn btn-primary">&nbsp;<i class="icon-save icon-white"></i> Save&nbsp;</button>
                                        <!-- <button type="reset" tabindex="5" class="btn btn-default">&nbsp;<i class="icon-refresh icon-white"></i> Reset&nbsp;</button> -->
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
