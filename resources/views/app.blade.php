
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Smart Prescription</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/logosn.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
   
    <link rel="stylesheet" href="{{ asset( 'assets/css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset( 'assets/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    
    <!-- <link rel="stylesheet" href="{{ asset( 'assets/css') }}/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset( 'assets/css') }}/owl.theme.css">
    <link rel="stylesheet" href="{{ asset( 'assets/css') }}/owl.transitions.css"> -->

    <link rel="stylesheet" href="{{ asset( 'assets/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset( 'assets/css/normalize.css') }}">
   
    <link rel="stylesheet" href="{{ asset( 'assets/css/meanmenu.min.css') }}">
   
    <link rel="stylesheet" href="{{ asset( 'assets/css/main.css') }}">
    
    <link rel="stylesheet" href="{{ asset( 'assets/css/educate-custon-icon.css') }}">

    <!-- <link rel="stylesheet" href="{{ asset( 'assets/css') }}/morrisjs/morris.css">

    <link rel="stylesheet" href="{{ asset( 'assets/css') }}/scrollbar/jquery.mCustomScrollbar.min.css"> -->
    <link rel="stylesheet" href="{{ asset( 'assets/css/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset( 'assets/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset( 'assets/css/metisMenu/metisMenu-vertical.css') }}">
    <link rel="stylesheet" href="{{ asset( 'assets/css/modals.css') }}">

    <!-- <link rel="stylesheet" href="{{ asset( 'assets/css') }}/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset( 'assets/css') }}/calendar/fullcalendar.print.min.css"> -->

    <link rel="stylesheet" href="{{ asset( 'assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset( 'css/app.css') }}">
    
    <link rel="stylesheet" href="{{ asset( 'assets/css/responsive.css') }}">
    <script src="{{ asset( 'assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div id="smart-prescription">

        <div class="left-sidebar-pro">
            <nav id="sidebar" class="">
                <div class="sidebar-header">
                    <!-- <router-link to="/" class="app-name">
                        SMART PRESCRIPTION
                    </router-link>
                    <strong>
                        <router-link to="/">
                        </router-link>
                    </strong> -->
                </div>
                <div class="left-custom-menu-adp-wrap comment-scrollbar">
                    <nav class="sidebar-nav left-sidebar-menu-pro">
                        <ul class="metismenu" id="menu1">
                            
                            <li>
                                <router-link to="/" aria-expanded="false">
                                    <span class="educate-icon educate-home icon-wrap icon-style"></span>
                                    <span class="mini-click-non">Dashboard</span>
                                </router-link>
                                <ul aria-expanded="true"></ul>
                            </li>

                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                <span class="educate-icon educate-professor icon-wrap icon-style">
                                </span> <span class="mini-click-non">Patients</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li>
                                        <router-link to="/all-patients"><span class="mini-sub-pro">All Patients</span></router-link>
                                    </li>
                                    <li>
                                        <router-link to="/add-patient"><span class="mini-sub-pro">Add Patient</span></router-link>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                <span class="fa fa-flask icon-wrap icon-style"></span> 
                                <span class="mini-click-non">Medicines</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li>
                                        <router-link to="/all-medicines"><span class="mini-sub-pro">All Medicines</span></router-link>
                                    </li>
                                    <li>
                                        <router-link to="/add-medicine"><span class="mini-sub-pro">Add Medicine</span></router-link>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <span class="fa fa-stethoscope icon-wrap icon-style"></span>
                                    <span class="mini-click-non">Medical Tests</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <router-link to="/all-tests"><span class="mini-sub-pro">All Tests</span></router-link>
                                    </li>
                                    <li>
                                        <router-link to="/add-test"><span class="mini-sub-pro">Add Test</span></router-link>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                <span class="fa fa-calendar-plus-o icon-wrap icon-style"></span> 
                                <span class="mini-click-non">Medicine Groups</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li>
                                        <router-link to="/all-groups"><span class="mini-sub-pro">All Groups</span></router-link>
                                    </li>
                                    <li>
                                        <router-link to="/add-group"><span class="mini-sub-pro">Add Group</span></router-link>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap icon-style"></span> 
                                <span class="mini-click-non">Medicine Types</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li>
                                        <router-link to="/all-types"><span class="mini-sub-pro">All Types</span></router-link>
                                    </li>
                                    <li>
                                        <router-link to="/add-type"><span class="mini-sub-pro">Add Type</span></router-link>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                <span class="fa fa-ambulance icon-wrap icon-style"></span> 
                                <span class="mini-click-non">Companies</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li>
                                        <router-link to="/all-companies"><span class="mini-sub-pro">All Companies</span></router-link>
                                    </li>
                                    <li>
                                        <router-link to="/add-company"><span class="mini-sub-pro">Add Company</span></router-link>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>


        <!-- End Left menu area -->
        <!-- Start Welcome area -->
        <div class="all-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="logo-pro">
                            <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-advance-area">
                <div class="header-top-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn navbar-btn">
                                        <i class="educate-icon educate-nav"></i>
                                        </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                       
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            <li class="nav-item">
                                                <!-- <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span>
                                                </a> -->
                                                <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                    <div class="notification-single-top">
                                                    <h1>Notifications</h1>
                                                    </div>
                                                    <ul class="notification-menu">
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Advanda Cro</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-cloud edu-cloud-computing-down" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Sulaiman din</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-eraser edu-shield" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Victor Jara</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-line-chart edu-analytics-arrow" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="notification-content">
                                                                <span class="notification-date">16 Sept</span>
                                                                <h2>Victor Jara</h2>
                                                                <p>Please done this project as soon possible.</p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    </ul>
                                                    <div class="notification-view">
                                                    <a href="#">View All Notification</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item" style="margin-right:50px!important">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="admin-name">{{Auth::user()->name}}</span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>
                                                <ul style="width:20px!important" role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    <li>
                                                    <router-link to="/profile"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</router-link>
                                                    </li>
                                                    <li>
                                                    <router-link to="/settings" ><span class="edu-icon edu-settings author-log-ic"></span>Settings</router-link>
                                                    </li>
                                                    <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                                                    >
                                                        <span class="edu-icon edu-locked author-log-ic"></span>Log Out
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    </li>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu start -->
                <div class="mobile-menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">

                                        <li><router-link to="/">Dashboard</router-link></li>
                                        <li>
                                            <a data-toggle="collapse" data-target="#Charts">
                                                Patients <span class="admin-project-icon edu-icon edu-down-arrow"></span>
                                            </a>
                                            <ul class="collapse dropdown-header-top">
                                                <li>
                                                    <router-link to="/all-patients"><span class="mini-sub-pro">All Patients</span></router-link>
                                                </li>
                                                <li>
                                                <router-link to="/add-patient"><span class="mini-sub-pro">Add Patient</span></router-link>
                                                </li>
                                            </ul>

                                        </li>
                                        <li>
                                            <a data-toggle="collapse" data-target="#demoevent">
                                            Medicines <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li>
                                                    <router-link to="/all-medicines"><span class="mini-sub-pro">All Medicines</span></router-link>
                                                </li>
                                                <li>
                                                    <router-link to="/add-medicine"><span class="mini-sub-pro">Add Medicine</span></router-link>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a data-toggle="collapse" data-target="#demopro">
                                            Medical Tests <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demopro" class="collapse dropdown-header-top">
                                                <li><router-link to="/all-tests"><span class="mini-sub-pro">All Tests</span></router-link></li>
                                                <li><router-link to="/add-test"><span class="mini-sub-pro">Add Test</span></router-link></li>
                                            </ul>
                                            <li>
                                        </li>
                                        <li>
                                            <a data-toggle="collapse" data-target="#democrou" href="#">
                                            Medicine Groups <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <li><router-link to="/all-groups"><span class="mini-sub-pro">All Groups</span></router-link></li>
                                                <li><router-link to="/add-group"><span class="mini-sub-pro">Add Group</span></router-link></li>
                                            </ul>

                                        </li>
                                        <li>
                                            <a data-toggle="collapse" data-target="#democrou" href="#">
                                            Medicine Types <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <li><router-link to="/all-types"><span class="mini-sub-pro">All Types</span></router-link></li>
                                                <li><router-link to="/add-type"><span class="mini-sub-pro">Add Type</span></router-link></li>
                                            </ul>

                                        </li>
                                        <li>
                                            <a data-toggle="collapse" data-target="#democrou" href="#">
                                            Companies <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <li><router-link to="/all-companies"><span class="mini-sub-pro">All Companies</span></router-link></li>
                                                <li><router-link to="/add-company"><span class="mini-sub-pro">Add Company</span></router-link></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu end -->
            </div>
            

            <master-app></master-app>
                
        </div>
    </div>
    <script src="{{ asset( 'js/app.js') }}"></script>

    <script src="{{ asset( 'assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
   
    <script src="{{ asset( 'assets/js/bootstrap.min.js') }}"></script>
  
    <script src="{{ asset( 'assets/js/wow.min.js') }}"></script>
 
    <!-- <script src="{{ asset( 'assets/js') }}/jquery-price-slider.js"></script> -->
  
    <script src="{{ asset( 'assets/js/jquery.meanmenu.js') }}"></script>
    
    <!-- <script src="{{ asset( 'assets/js') }}/owl.carousel.min.js"></script> -->
   
    <script src="{{ asset( 'assets/js/jquery.sticky.js') }}"></script>
   
    <!-- <script src="{{ asset( 'assets/js') }}/jquery.scrollUp.min.js"></script> -->
    
    <script src="{{ asset( 'assets/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset( 'assets/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset( 'assets/js/counterup/counterup-active.js') }}"></script>
    
    <!--<script src="{{ asset( 'assets/js') }}/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset( 'assets/js') }}/scrollbar/mCustomScrollbar-active.js"></script> -->
 
    <script src="{{ asset( 'assets/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset( 'assets/js/metisMenu/metisMenu-active.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>

    
    <!-- <script src="{{ asset( 'assets/js') }}/morrisjs/raphael-min.js"></script>
    <script src="{{ asset( 'assets/js') }}/morrisjs/morris.js"></script>
    <script src="{{ asset( 'assets/js') }}/morrisjs/morris-active.js"></script> -->
  
    <!-- <script src="{{ asset( 'assets/js') }}/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset( 'assets/js') }}/sparkline/jquery.charts-sparkline.js"></script>
    <script src="{{ asset( 'assets/js') }}/sparkline/sparkline-active.js"></script> -->

    <!-- <script src="{{ asset( 'assets/js') }}/calendar/moment.min.js"></script>
    <script src="{{ asset( 'assets/js') }}/calendar/fullcalendar.min.js"></script>
    <script src="{{ asset( 'assets/js') }}/calendar/fullcalendar-active.js"></script> -->
    
    <!-- <script src="{{ asset( 'assets/js') }}/plugins.js"></script> -->
    <script src="{{ asset( 'assets/js/main.js') }}"></script>
    <!-- <script src="{{ asset( 'assets/js') }}/tawk-chat.js"></script> -->

    <script src="{{ asset( 'assets/js/summernote/summernote.min.js') }}"></script>
</body>

</html>