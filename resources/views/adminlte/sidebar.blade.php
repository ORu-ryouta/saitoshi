        <!-- サイドバー -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">

                    <!-- メニューヘッダ -->
                    <li class="header">機能一覧</li>

                    <!-- メニュー項目 -->
                    <li><a href="{{ action('MemberController@memberList') }}">顧客管理</a></li>

                    <li><a href="{{ action('CompanyController@companyList') }}">取引先管理</a></li>
                    
                    <li><a href="{{ action('PartsController@categoryList') }}">部品管理</a></li>
                    
                    <li><a href="{{ action('DemandController@demandList') }}">注文管理</a></li>
                    
                    <li><a href="{{ action('SupplierController@supplierList') }}">仕入れ管理</a></li>
                    
                    <li><a href="{{ action('SaleController@saleList') }}">売り上げ管理</a></li>
                    
                    <li><a href="{{ action('Admin_userController@admin_userList') }}">管理者</a></li>
                   
                </ul>
            </section>
        </aside><!-- end sidebar -->