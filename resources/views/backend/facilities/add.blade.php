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
                    <header><div class="icons"><i class="icon-book"></i></div>
                    <h5>Facilities Add</h5>
                    </header>
                        <div class="body">
                        {!! Form::open( ['id' => 'frmFaicilityAdd', 'class' => 'form-horizontal frm-margin-top','method' => 'post', 'route' => 'backend.facilities.add', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Name <span class="required">※</span></label>
                                    <div class="col-lg-5">
                                        <input class="form-control" tabindex="1" type="text" name="name" value="{{old('name')}}" placeholder="Facility Name">
                                        @if ($errors->first('name')) 
                                        <span class="help-block" for="name">※{!! $errors->first('name') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Description <span class="required">※</span></label>
                                    <div class="col-lg-5">
                                        <textarea class="form-control" tabindex="2" rows="5" id="description" name="description" placeholder="Facility Description">{{old('description')}}</textarea>
                                        @if ($errors->first('description')) 
                                        <span class="help-block" for="description">※{!! $errors->first('description') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Picture <span class="required">※</span></label>
                                    <div class="col-lg-8">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="@if( old('image') ) {{old('image')}} @else {{ asset('') }}public/backend/img/no_image.jpg @endif " alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-file btn-primary"><span class="fileupload-new">Select Image</span><span class="fileupload-exists">Change</span><input type="file" name="image" value="{{old('image')}}" /></span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                        @if ($errors->first('image')) 
                                        <span class="help-block" for="password">※{!! $errors->first('image') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Orders <span class="required">※</span></label>
                                    <div class="col-lg-5">
                                        <input class="form-control" tabindex="2" type="text" name="order" placeholder="Order" style="text-align: center;width: 80px;" value="{{@$order_max}}">
                                        @if ($errors->first('order')) 
                                        <span class="help-block" for="password">※{!! $errors->first('order') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="form-actions gbutton col-lg-10">
                                        <button type="submit" class="btn btn-primary">&nbsp;&nbsp;<i class="icon-save icon-white"></i> Save&nbsp;&nbsp;</button>
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