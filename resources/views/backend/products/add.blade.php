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
                    <header><div class="icons"><i class="icon-plus"></i></div>
                    <h5>Product Add</h5>
                    </header>
                        <div class="body">
                        {!! Form::open( ['id' => 'frmProductAdd', 'class' => 'form-horizontal frm-margin-top','method' => 'post', 'route' => 'backend.products.add', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Category</label>
                                    <div class="col-lg-3">
                                        <select class="form-control" name="cat" tabindex="1" style="text-align: center;">
                                            <option value="" @if(old('cat') == '') selected="" @endif>----- All -----</option>
                                            @if(!empty($cats))
                                            @foreach ($cats as $key=>$cat)
                                                <option value="{{$key}}" @if(old('cat') == $key) selected="" @endif>{{$cat}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->first('power')) 
                                            <span class="help-block" for="power">※{!! $errors->first('power') !!} </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-lg-4">Name <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="2" type="text" name="name" placeholder="Product Name" value="{{old('name')}}">
                                        @if ($errors->first('name')) 
                                        <span class="help-block" for="name">※{!! $errors->first('name') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Description <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="3" type="text" name="description" placeholder="Product Description">
                                        @if ($errors->first('description')) 
                                        <span class="help-block" for="password">※{!! $errors->first('description') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">E-mail <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="11" type="text" name="email" placeholder="example@email.com">
                                        @if ($errors->first('email')) 
                                        <span class="help-block" for="email">※{!! $errors->first('email') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Password <span class="required">※</span></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="11" type="password" name="password" placeholder="Password">
                                        @if ($errors->first('password')) 
                                        <span class="help-block" for="password">※{!! $errors->first('password') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Confirm Password</label>
                                    <div class="col-lg-3">
                                        <input class="form-control" tabindex="11" type="password" name="conf_password" placeholder="Confirm Password">
                                        @if ($errors->first('conf_password')) 
                                        <span class="help-block" for="conf_password">※{!! $errors->first('conf_password') !!} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Permission</label>
                                    <div class="col-lg-2">
                                        <select class="form-control" name="power" tabindex="11">
                                            <option value="1">Administrator</option>
                                            <option value="2">Staff</option>
                                            <option value="3">Guest</option>
                                        </select>
                                        @if ($errors->first('power')) 
                                            <span class="help-block" for="power">※{!! $errors->first('power') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Status</label>
                                    <div class="col-lg-8">
                                        <input checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" type="checkbox" name="status">
                                        @if ($errors->first('status')) 
                                        <span class="help-block" for="status">※{!! $errors->first('status') !!} </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Primary Picture</label>
                                    <div class="col-lg-8">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="{{ asset('') }}public/backend/img/no_image.jpg" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Picture -->
                                <div class="panel panel-default">
                                      <div class="panel-heading">
                                        <p>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="btn btn-info btn-sm">
                                              <span class="glyphicon glyphicon-picture"></span> Picture
                                            </a>
                                      </p> 
                                      </div>
                                      <div id="collapse2" class="panel-collapse collapse">
                                        <div class="panel-body form-group-item">
<!-- Upload -->
                                        <div class="form-group">
                                            <div class="col-lg-8">
                                                <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-right: 3px;">
                                                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-success btn-sm"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                                                        <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-8">
                                                <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-right: 3px;">
                                                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-success btn-sm"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                                                        <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-8">
                                                <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-right: 3px;">
                                                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-success btn-sm"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                                                        <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-8">
                                                <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-right: 3px;">
                                                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-success btn-sm"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                                                        <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-8">
                                                <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-right: 3px;">
                                                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-success btn-sm"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                                                        <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

<!-- /Upload -->

                                        </div>

                                </div>

                                        
                                      </div>
                                <!-- </div> -->
                            <!-- /Picture -->


                            <!-- Seo -->
                                <div class="panel panel-default">
                                      <div class="panel-heading">
                                        <p>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#seo" class="btn btn-info btn-sm">
                                              <span class="glyphicon glyphicon-search"></span> Seo
                                            </a>
                                      </p> 
                                      </div>
                                      <div id="seo" class="panel-collapse collapse">
                                        <div class="panel-body">

                                        </div>
                                      </div>
                                </div>
                            <!-- /Seo -->
                              
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