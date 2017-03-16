<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('') }}public/backend/css/login.css">
    <link href="{{ asset('') }}public/backend/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,900,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- For-Mobile-Apps-and-Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //For-Mobile-Apps-and-Meta-Tags -->
    <script src="{{ asset('') }}public/backend/js/jquery.min.js"></script>
    <script>$(document).ready(function(c) {
        $('.alert-close').on('click', function(c){
            $('.sign-up-agileinfo').fadeOut('slow', function(c){
                $('.sign-up-agileinfo').remove();
            });
        });   
    });
    </script>
    <script>$(document).ready(function(c) {
        $('.alert-close1').on('click', function(c){
            $('.sign-in-w3ls').fadeOut('slow', function(c){
                $('.sign-in-w3ls').remove();
            });
        });   
    });
    </script>
</head>
<body>
    <h1>Admin Panel Login</h1>
    <div class="container">
        <div id="wrapper">
            <div class="sign-in-w3ls">
                <h4 class="title-login">Please sign in to get access.</h4>
                @if($message = Session::get('error'))
                <div id="error" class="message">
                    <a id="close" title="Message"  href="javascript::void(0);" onClick="document.getElementById('error').setAttribute('style','display: none;');">&times;</a>
                    <span>{{$message}}</span>
                </div>
              @endif
                {!! Form::open(array('route' => ['backend.users.login', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8'])) !!}
                    <input type="text" class="name" name="email" placeholder="Username">
                    <div class="show-error">
                        @if ($errors->first('email')) {!! $errors->first('email') !!} @endif
                    </div>
                    <input type="password" class="password" name="password" placeholder="Password">
                    <div class="show-error">
                        @if ($errors->first('password')) {!! $errors->first('password') !!} @endif
                    </div>
                    <div class="clear"></div>
                    <div class="btn-login">
                    <input type="submit" value="Sign In">
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="clear"></div>
        <div class="footer-agilew3">
            <p> &copy; 2017 Xanh Tuoi Tropical Fish Co.,Ltd. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>