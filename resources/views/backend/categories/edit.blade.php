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
                    <h5>Category Edit</h5>
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

                        {!! Form::open( ['id' => 'frmCatEdit', 'class' => 'form-horizontal frm-margin-top','method' => 'post', 'route' => ['backend.categories.edit', $category->id], 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Name <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="1" type="text" name="name" placeholder="Category Name" value="@if(old('name')){{old('name')}}@else{{$category->name}}@endif">
                                        @if ($errors->first('name')) 
                                        <span class="help-block" for="name">※{!! $errors->first('name') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Orders <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="2" type="text" name="order" placeholder="Order" style="text-align: center;width: 80px;" value="@if(old('order')){{old('order')}}@else{{$category->order}}@endif">
                                        @if ($errors->first('order')) 
                                        <span class="help-block" for="password">※{!! $errors->first('order') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="form-actions gbutton col-lg-10">
                                        <button type="submit" class="btn btn-primary">&nbsp; <i class="icon-save icon-white"></i> Save &nbsp;</button>
                                        <button type="reset" class="btn btn-default"> &nbsp;<i class="icon-refresh icon-white"></i> Reset &nbsp;</button>
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