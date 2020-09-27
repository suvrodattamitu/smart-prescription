
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Smart Prescription</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
   
    <link rel="stylesheet" href="{{ asset( 'assets/css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset( 'assets/css/font-awesome.min.css') }}">
    
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
                    <router-link to="/"><img class="main-logo" src="{{asset('assets/img/logo/logo.png') }}" alt="" /></router-link>
                    <strong>
                        <router-link to="/"><img src="{{asset('assets/img/logo/logosn.png') }}" alt="" /></router-link>
                    </strong>
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
                                            <li class="nav-item">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="admin-name">{{Auth::user()->name}}</span>
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
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
                                        <li>
                                        <a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul class="collapse dropdown-header-top">
                                            <li><a href="index.html">Dashboard v.1</a></li>
                                            <li><a href="index-1.html">Dashboard v.2</a></li>
                                            <li><a href="index-3.html">Dashboard v.3</a></li>
                                            <li><a href="analytics.html">Analytics</a></li>
                                            <li><a href="widgets.html">Widgets</a></li>
                                        </ul>
                                        </li>
                                        <li><a href="events.html">Event</a></li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#demoevent" href="#">Professors <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demoevent" class="collapse dropdown-header-top">
                                            <li><a href="all-professors.html">All Professors</a></li>
                                            <li><a href="add-professor.html">Add Professor</a></li>
                                            <li><a href="edit-professor.html">Edit Professor</a></li>
                                            <li><a href="professor-profile.html">Professor Profile</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#demopro" href="#">Students <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demopro" class="collapse dropdown-header-top">
                                            <li><a href="all-students.html">All Students</a></li>
                                            <li><a href="add-student.html">Add Student</a></li>
                                            <li><a href="edit-student.html">Edit Student</a></li>
                                            <li><a href="student-profile.html">Student Profile</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#democrou" href="#">Courses <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="democrou" class="collapse dropdown-header-top">
                                            <li><a href="all-courses.html">All Courses</a></li>
                                            <li><a href="add-course.html">Add Course</a></li>
                                            <li><a href="edit-course.html">Edit Course</a></li>
                                            <li><a href="course-profile.html">Courses Info</a></li>
                                            <li><a href="course-payment.html">Courses Payment</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#demolibra" href="#">Library <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demolibra" class="collapse dropdown-header-top">
                                            <li><a href="library-assets.html">Library Assets</a></li>
                                            <li><a href="add-library-assets.html">Add Library Asset</a></li>
                                            <li><a href="edit-library-assets.html">Edit Library Asset</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#demodepart" href="#">Departments <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demodepart" class="collapse dropdown-header-top">
                                            <li><a href="departments.html">Departments List</a></li>
                                            <li><a href="add-department.html">Add Departments</a></li>
                                            <li><a href="edit-department.html">Edit Departments</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demo" class="collapse dropdown-header-top">
                                            <li><a href="mailbox.html">Inbox</a></li>
                                            <li><a href="mailbox-view.html">View Mail</a></li>
                                            <li><a href="mailbox-compose.html">Compose Mail</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                            <li><a href="google-map.html">Google Map</a></li>
                                            <li><a href="data-maps.html">Data Maps</a></li>
                                            <li><a href="pdf-viewer.html">Pdf Viewer</a></li>
                                            <li><a href="x-editable.html">X-Editable</a></li>
                                            <li><a href="code-editor.html">Code Editor</a></li>
                                            <li><a href="tree-view.html">Tree View</a></li>
                                            <li><a href="preloader.html">Preloader</a></li>
                                            <li><a href="images-cropper.html">Images Cropper</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="Chartsmob" class="collapse dropdown-header-top">
                                            <li><a href="bar-charts.html">Bar Charts</a></li>
                                            <li><a href="line-charts.html">Line Charts</a></li>
                                            <li><a href="area-charts.html">Area Charts</a></li>
                                            <li><a href="rounded-chart.html">Rounded Charts</a></li>
                                            <li><a href="c3.html">C3 Charts</a></li>
                                            <li><a href="sparkline.html">Sparkline Charts</a></li>
                                            <li><a href="peity.html">Peity Charts</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="Tablesmob" class="collapse dropdown-header-top">
                                            <li><a href="static-table.html">Static Table</a></li>
                                            <li><a href="data-table.html">Data Table</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="formsmob" class="collapse dropdown-header-top">
                                            <li><a href="basic-form-element.html">Basic Form Elements</a></li>
                                            <li><a href="advance-form-element.html">Advanced Form Elements</a></li>
                                            <li><a href="password-meter.html">Password Meter</a></li>
                                            <li><a href="multi-upload.html">Multi Upload</a></li>
                                            <li><a href="tinymc.html">Text Editor</a></li>
                                            <li><a href="dual-list-box.html">Dual List Box</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                            <li><a href="basic-form-element.html">Basic Form Elements</a></li>
                                            <li><a href="advance-form-element.html">Advanced Form Elements</a></li>
                                            <li><a href="password-meter.html">Password Meter</a></li>
                                            <li><a href="multi-upload.html">Multi Upload</a></li>
                                            <li><a href="tinymc.html">Text Editor</a></li>
                                            <li><a href="dual-list-box.html">Dual List Box</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="Pagemob" class="collapse dropdown-header-top">
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="lock.html">Lock</a></li>
                                            <li><a href="password-recovery.html">Password Recovery</a></li>
                                            <li><a href="404.html">404 Page</a></li>
                                            <li><a href="500.html">500 Page</a></li>
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
</body>

</html>