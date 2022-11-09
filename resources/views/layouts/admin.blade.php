<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>{{config('app.name')}}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('theme/css/waves.min.css')}}" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('theme/css/waves.min.css')}}" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/jquery.mCustomScrollbar.css')}}">
    <!-- slim select -->
    <link rel="stylesheet" href="{{ asset('plugins/slim-select/slimselect.min.css') }}">
    <script src="{{asset('plugins/fontaweson/fontaws.js')}}" crossorigin="anonymous"></script>
    <style>
        .btn {
            margin: 2.5px;
        }

        .page-header {
            position: relative;
            border-radius: 0;
            color: #fff;
            background-color: #1d1d1d;
        }
    </style>
    @yield('styles')
</head>

<body>


    <!-- Pre-loader start -->
    @includeIf('partial.admin.loader')
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @includeIf('partial.admin.header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('partial.admin.navbar')
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        @include('partial.admin.bread')
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body button-page">
                                        @include('partial.alert')
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="{{asset('theme/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme/js/bootstrap.min.js')}}"></script>
    <!-- waves js -->
    <script src="{{asset('theme/js/waves.min.js')}}"></script>
    <!-- waves js -->
    <script src="{{asset('theme/js/waves.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('theme/js/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('theme/js/SmoothScroll.js')}}"></script>
    <script src="{{asset('theme/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- Custom js -->
    <script src="{{asset('theme/js/pcoded.min.js')}}"></script>
    <script src="{{asset('theme/js/vertical-layout.min.js')}}"></script>
    <script src="{{asset('theme/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- Custom js -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover({
                html: true,
                content: function() {
                    return $('#primary-popover-content').html();
                }
            });
        });
    </script>
    <script type="text/javascript" src="{{asset('theme/js/script.min.js')}}"></script>

    <!-- slim-select -->
    <script src="{{ asset('plugins/slim-select/slimselect.min.js') }}"></script>
    @yield('scripts')
</body>

</html>