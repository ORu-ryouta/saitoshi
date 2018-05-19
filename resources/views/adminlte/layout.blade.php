<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>adminLTE test</title>
    <!-- for responsive -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- bootstrap -->
    <link href="{{asset("bower_components/admin-lte/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- font awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- adminLTE style -->
    <link href="{{asset("bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
</head>
<body class="skin-blue">
    <div class="wrapper">

        <!-- トップメニュー -->
        @include('adminlte.header')
        <!-- end header -->


        <!-- サイドバー -->
        @include('adminlte.sidebar')
        <!-- end sidebar -->


        <!-- content -->
        <div class="content-wrapper"> 
            <!--コンテンツ -->
            @yield('content')    
        </div><!-- end content -->


        <!-- フッター -->
        @include('adminlte.footer')
        <!-- end footer -->


    </div><!-- end wrapper -->
    <!-- JS -->

    <!-- jquery -->
    <script src="{{asset("bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js")}}" type="text/javascript"></script>
    <!-- bootstrap -->
    <script src="{{asset("bower_components/admin-lte/bootstrap/js/bootstrap.min.js")}}" type="text/javascript"></script>
    <!-- adminLTE -->
    <script src="{{asset("bower_components/admin-lte/dist/js/app.min.js")}}" type="text/javascript"></script>
</body>
</html>

