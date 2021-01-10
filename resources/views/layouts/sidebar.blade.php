<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            {{-- <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li> --}}
            <li class="nav-item start {{ setActiveClass('dashboard') }}">
                <a href="{{ route('dashboard') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    {{-- <span class="arrow open"></span> --}}
                </a>
                {{-- <ul class="sub-menu">
                    <li class="nav-item start active open">
                        <a href="index.html" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Dashboard 1</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="dashboard_2.html" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Dashboard 2</span>
                            <span class="badge badge-success">1</span>
                        </a>
                    </li>
                </ul> --}}
            </li>
            {{-- <li class="heading">
                <h3 class="uppercase">Dashboard</h3>
            </li> --}}

            @can('view users')
            <li class="nav-item {{ setActiveClass('user.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">الأعضاء</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('user.index') }}">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>
                    @can('create users')
                    <li class="nav-item {{ setActiveClass('user.create') }}">
                        <a href="{{ route('user.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                    {{-- <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Page Progress Bar</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_1.html" class="nav-link "> Flash </a>
                            </li>
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_2.html" class="nav-link "> Big Counter </a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </li>
            @endcan

            @can('view clients')
            <li class="nav-item {{ setActiveClass('client.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-user"></i>
                    <span class="title">الموكلين</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('client.index') }}">
                        <a href="{{ route('client.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>
                    @can('create clients')
                    <li class="nav-item {{ setActiveClass('client.create') }}">
                        <a href="{{ route('client.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view issues')
            <li class="nav-item {{ setActiveClass('issue.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">القضايا</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('issue.index') }}">
                        <a href="{{ route('issue.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>
                    @can('create issues')
                    <li class="nav-item {{ setActiveClass('issue.create') }}">
                        <a href="{{ route('issue.create') }}" class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view receipt-vouchers')
            <li class="nav-item {{ setActiveClass('receipt-voucher.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">سندات القبض</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('receipt-voucher.index') }}">
                        <a href="{{ route('receipt-voucher.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>
                    @can('create receipt-vouchers')
                    <li class="nav-item {{ setActiveClass('receipt-voucher.create') }}">
                        <a href="{{ route('receipt-voucher.create') }}" class="nav-link">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view expert-issues')
            <li class="nav-item {{ setActiveClass('expert-issue.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-briefcase"></i>
                    <span class="title">قضايا الخبراء</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('expert-issue.index') }}">
                        <a href="{{ route('expert-issue.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>
                    @can('create expert-issues')
                    <li class="nav-item {{ setActiveClass('expert-issue.create') }}">
                        <a href="{{ route('expert-issue.create') }}" class="nav-link">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('view session-rolls')
            <li class="nav-item {{ setActiveClass('session-roll.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-doc"></i>
                    <span class="title">رول الجلسات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ setActiveClass('session-roll.index') }}">
                        <a href="{{ route('session-roll.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-align-justify"></i>
                            <span class="title">عرض</span>
                        </a>
                    </li>
                    @can('create session-rolls')
                    <li class="nav-item {{ setActiveClass('session-roll.create') }}">
                        <a href="{{ route('session-roll.create') }}" class="nav-link">
                            <i class="icon-plus"></i>
                            <span class="title">إضافة</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->