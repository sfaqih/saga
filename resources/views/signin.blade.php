<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App Favicon -->
    <link rel="shortcut icon" href="admin/images/favicon.ico">

    <!-- App title -->
    <title>SAGA DIGITAL STUDIO</title>
    <!-- App CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/css/core.css" rel="stylesheet" type="text/css" />
    <link href="admin/css/components.css" rel="stylesheet" type="text/css" />
    <link href="admin/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="admin/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="admin/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="admin/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="admin/js/modernizr.min.js"></script>
    <style type="text/css">
        #customBtn {
            display: inline-block;
            background: white;
            color: #444;
            width: 350px;
            border-radius: 5px;
            border: thin solid #888;
            box-shadow: 1px 1px 1px grey;
            white-space: nowrap;
            margin-bottom: 15px;
        }

        #customBtn:hover {
            cursor: pointer;
        }

        span.label {
            font-family: serif;
            font-weight: normal;
        }

        span.icon {
            background: url('/images/g-normal.png') transparent 5px 50% no-repeat;
            display: inline-block;
            vertical-align: middle;
            width: 42px;
            height: 42px;
        }

        span.buttonText {
            display: inline-block;
            vertical-align: middle;
            padding-left: 0px;
            padding-right: 42px;
            font-size: 14px;
            font-weight: bold;
            /* Use the Roboto font that is loaded in the <head> */
            font-family: 'Roboto', sans-serif;
        }

    </style>
</head>

<body>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="text-center">
            <h5 class="text-muted m-t-0 font-600">{{ _('SAGA DIGITAL STUDIO') }}</h5>
        </div>
        <div class="m-t-40 card-box">
            <div class="text-center">
                
                    <div id="customBtn" class="customGPlusSignIn">
                        <span class="icon"></span>
                        <span class="buttonText">
                            
                            <a href="{{ url('auth/google') }}" style="color: #444;">Sign in with Google</a>
                        </span>
                    </div>
                
                
                <p></p>
                <h4 class="text-uppercase font-bold m-b-0">{{ _('OR') }}</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" placeholder="Email"
                                value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group text-center m-t-30">
                        <div class="col-xs-12">
                            <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                                {{ _('Sign In') }} </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- end card-box-->

        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="text-muted"> {{ _("Don't have an account? ") }} <a href=" {{ route('register') }} "
                        class="text-primary m-l-5"><b> {{ _('Sign Up') }} </b></a></p>
            </div>
        </div>

    </div>
    <!-- end wrapper page -->



    <script>
        var resizefunc = [];

    </script>

    <!-- jQuery  -->
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/detect.js"></script>
    <script src="admin/js/fastclick.js"></script>
    <script src="admin/js/jquery.slimscroll.js"></script>
    <script src="admin/js/jquery.blockUI.js"></script>
    <script src="admin/js/waves.js"></script>
    <script src="admin/js/wow.min.js"></script>
    <script src="admin/js/jquery.nicescroll.js"></script>
    <script src="admin/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="admin/js/jquery.core.js"></script>
    <script src="admin/js/jquery.app.js"></script>

</body>

</html>
