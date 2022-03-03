<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Title Page-->
    <title>@yield('title')</title>
    <!-- Fontfaces CSS-->
    <link href="{{asset('css/font-face.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <!-- Bootstrap CSS-->
    <link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Vendor CSS-->
    <link href="{{asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet" media="all">
    <!-- Button CSS-->
    <link href="{{asset('css/buttons.dataTables.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/bootstrap-select.css')}}" rel="stylesheet" media="all">
    <!-- Jquery JS-->
    <script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <link href="{{asset('css/daterangepicker.css')}}" rel="stylesheet" media="all">
    <!-- Common  CSS-->
    <link href="{{asset('css/common.css') }}" rel="stylesheet">
    <!-- include summernote css -->
    <link href="{{asset('css/summernote-bs4.css') }}" rel="stylesheet">
</head>
<body class="animsition">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/daterangepicker.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>

    <!-- Vendor JS  -->
    <script src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    
    <script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}"></script>

    <script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>

    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Main JS-->
    <script src="{{asset('js/main.js')}}"></script>
    <!-- Download Excel -->
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/jszip.min.js')}}"></script>
    <script src="{{asset('js/vfs_fonts.js')}}"></script>
    <script src="{{asset('js/buttons.html5.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#datepicker').datepicker({
                leftArrow: '&laquo;',
                rightArrow: '&raquo;',
                daysOfWeekHighlighted: "7,0",
                autoclose: true,
                todayHighlight: true,
                orientation: 'bottom',
                endDate:'today',
            }).datepicker("setDate",'now');

            $('input[name="url_validity"]').daterangepicker({
                autoUpdateInput : false,
                linkedCalendars : false,
                minYear         : 2000,
                showDropdowns   : true,
                locale          : {
                                    cancelLabel: 'Clear',
                                    format: 'DD-MM-YYYY'
                                }
                });
            });

            $('input[name="url_validity"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY') + ' | ' + picker.endDate.format('DD-MM-YYYY'));

            });
            $('input[name="url_validity"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
    </script>
</body>

</html>
<!-- end document-->
