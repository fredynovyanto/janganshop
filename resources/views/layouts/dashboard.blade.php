<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('storage/logo.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name', 'Laravel') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="">
    <div class="wrapper ">
        @include('layouts.admin._sidebar')
        <div class="main-panel">
        @include('layouts.admin._navbar')
        <div class="content">
            <div class="container-fluid">
            @yield('content')
            </div>
        </div>
        @include('layouts.admin._footer')
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/material-dashboard.js?v=2.1.2')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function (){
            notifCount();

            function notifCount()
            {
                $.ajax({
                    method: "GET",
                    url: "/dashboards/notif-count",
                    success: function(response){
                        if(response.count > 0)
                        {
                            var notif = '<span class="notification">'+response.count+'</span>';
                            $('.notif-count').html(notif);
                            var string = '<div>';
                            $.each( response.order, function( key, value ) { 
                                string += '<a class="dropdown-item" href="/dashboards/orders/'+value['id']+'">Order Tracking No : <strong> '+value['tracking_no']+'</strong></a>';
                            });
                            string += '</div>';
                            $("#records").html(string); 
                        }
                    }
                });
            }
        });
    </script>
    @yield('script')

</body>

</html>