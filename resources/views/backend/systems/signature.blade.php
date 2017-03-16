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
                    <h5>Email Signature</h5>
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

                        {!! Form::open( ['id' => 'frmEmailSignature', 'class' => 'form-horizontal frm-margin-top','method' => 'post', 'route' => 'backend.systems.signature']) !!}
                                <div class="form-group">
                                    <div class="col-lg-11 mail_signature">
                                    <input type="hidden" name="id" value="{{@$signature->id}}">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <textarea id="wysihtml5" class="wysihtml5" name="content" placeholder="E-mail Signature"><?php echo html_entity_decode($signature->content); ?></textarea>
                                        @if ($errors->first('content')) 
                                        <span class="help-block" for="content">※{!! $errors->first('content') !!} </span>
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
