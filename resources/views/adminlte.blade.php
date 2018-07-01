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
        <header class="main-header">

            <!-- ロゴ -->
            <a href="" class="logo">管理画面</a>

            <!-- トップメニュー -->
            <nav class="navbar navbar-static-top" role="navigation">
                <ul class="nav navbar-nav">
                    <li><a href="">YANMAR</a></li>
                </ul>
            </nav>

        </header><!-- end header -->


        <!-- サイドバー -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">

                    <!-- メニューヘッダ -->
                    <li class="header">機能一覧</li>

                    <!-- メニュー項目 -->
                    <li><a href="">顧客管理</a></li>

                    <li><a href="">顧客管理</a></li>

                    
                </ul>
            </section>
        </aside><!-- end sidebar -->


        <!-- content -->
        <div class="content-wrapper">

            <!-- コンテンツヘッダ -->
            <section class="content-header">
                <h1>ページタイトル</h1>
            </section>

            <!-- メインコンテンツ -->
            <section class="content">

                <!-- コンテンツ1 -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">ボックスタイトル</h3>
                    </div>
                    <div class="box-body">
                        <p>ボックスボディー</p>
                    </div>
                </div>

            </section>

        </div><!-- end content -->


        <!-- フッター -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">Version1.0</div>
            <strong>Copyright &copy; SRMホールディングス2018</strong>, All rights reserved.
        </footer><!-- end footer -->


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
