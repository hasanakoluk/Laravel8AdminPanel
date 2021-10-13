<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield("admintitle")</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin')}}/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="{{asset('admin')}}/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    @yield("css")
    <!-- Custom Stylesheet -->
    <link href="{{asset('admin')}}/css/style.css" rel="stylesheet">
    
</head>

<body>
     
       @include("admin.data.ust")
       @include("admin.data.menu")

        
       @yield("home")
     

       @include("admin.data.footer")








    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

       

      

      

        
        
      
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('admin')}}/plugins/common/common.min.js"></script>
    <script src="{{asset('admin')}}/js/custom.min.js"></script>
    <script src="{{asset('admin')}}/js/settings.js"></script>
    <script src="{{asset('admin')}}/js/gleek.js"></script>
    <script src="{{asset('admin')}}/js/styleSwitcher.js"></script>
     
   
     
    <!-- Chartjs -->
    <script src="{{asset('admin')}}/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="{{asset('admin')}}/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="{{asset('admin')}}/plugins/d3v3/index.js"></script>
    <script src="{{asset('admin')}}/plugins/topojson/topojson.min.js"></script>
    <script src="{{asset('admin')}}/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="{{asset('admin')}}/plugins/raphael/raphael.min.js"></script>
    <script src="{{asset('admin')}}/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="{{asset('admin')}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset('admin')}}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    @yield("js")

</body>

</html>