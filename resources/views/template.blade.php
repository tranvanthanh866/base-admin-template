<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A simple admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Zircos - Responsive Admin Dashboard Template</title>

        <!-- App css -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="/assets/plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="/assets/js/modernizr.min.js"></script>
        <style>
            .float-right {
                float: right;
            }
            .social-share {
                width: 100%;
                height: 32px;
                font-size: 19px;
                border-bottom: solid 1px #e5e4e9;
            }
            .dpos-h_hw {
                margin: 5px 0;
                font-size: 36px;
                color: #1d2a57;
                font-weight: 400;
            }
        </style>
        <script>
            function PlaySound($elementId) {
                var audio = document.getElementById($elementId);
                audio.play();
            }
        </script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
        
            @include('layouts.top-bar')

            @include('layouts.site-menu')  



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        
                        @yield('content')

                    </div> <!-- container -->

                </div> <!-- content -->

                @include('layouts.footer')

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/detect.js"></script>
        <script src="/assets/js/fastclick.js"></script>
        <script src="/assets/js/jquery.blockUI.js"></script>
        <script src="/assets/js/waves.js"></script>
        <script src="/assets/js/jquery.slimscroll.js"></script>
        <script src="/assets/js/jquery.scrollTo.min.js"></script>
        <script src="/assets/plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="/assets/js/jquery.core.js"></script>
        <script src="/assets/js/jquery.app.js"></script>

    </body>
</html>