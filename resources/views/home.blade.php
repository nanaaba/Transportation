<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Clear Admin Template | Clear Admin Template </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" rel="stylesheet" href="css/app.css"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="vendors/swiper/css/swiper.min.css">
    <link href="vendors/nvd3/css/nv.d3.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="vendors/lcswitch/css/lc_switch.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <link href="css/custom_css/dashboard1.css" rel="stylesheet" type="text/css"/>
    <link href="css/custom_css/dashboard1_timeline.css" rel="stylesheet"/>

    <!--end of page level css-->
</head>
<body class="skin-default">
<div class="preloader">
    <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="index.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the marginin -->
            <img src="img/logo.png" alt="logo"/>
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <div class="mr-auto">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-fw ti-email black"></i>
                        <span class="badge badge-pill badge-success">2</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages table-striped">
                        <li class="dropdown-title">New Messages</li>
                        <li>
                            <a href="" class="message striped-col dropdown-item">
                                <img class="message-image rounded-circle" src="img/authors/avatar7.jpg" alt="avatar-image">

                                <div class="message-body"><strong>Ernest Kerry</strong>
                                    <br>
                                    Can we Meet?
                                    <br>
                                    <small>Just Now</small>
                                    <span class="badge badge-success label-mini msg-lable">New</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message dropdown-item">
                                <img class="message-image rounded-circle" src="img/authors/avatar6.jpg" alt="avatar-image">

                                <div class="message-body"><strong>John</strong>
                                    <br>
                                    Dont forgot to call...
                                    <br>
                                    <small>5 minutes ago</small>
                                    <span class="badge badge-success label-mini msg-lable">New</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message striped-col dropdown-item">
                                <img class="message-image rounded-circle" src="img/authors/avatar5.jpg" alt="avatar-image">

                                <div class="message-body">
                                    <strong>Wilton Zeph</strong>
                                    <br>
                                    If there is anything else &hellip;
                                    <br>
                                    <small>14/10/2014 1:31 pm</small>
                                </div>

                            </a>
                        </li>
                        <li>
                            <a href="" class="message dropdown-item">
                                <img class="message-image rounded-circle" src="img/authors/avatar1.jpg" alt="avatar-image">
                                <div class="message-body">
                                    <strong>Jenny Kerry</strong>
                                    <br>
                                    Let me know when you free
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message striped-col dropdown-item">
                                <img class="message-image rounded-circle" src="img/authors/avatar.jpg" alt="avatar-image">
                                <div class="message-body">
                                    <strong>Tony</strong>
                                    <br>
                                    Let me know when you free
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer"><a href="#"> View All messages</a></li>
                    </ul>



                </li>
                <!--rightside toggle-->
                <li>
                    <a href="#" class="dropdown-toggle toggle-right" data-toggle="dropdown">
                        <i class="fa fa-fw ti-view-list black"></i>
                        <span class="badge badge-pill badge-danger">9</span>
                    </a>
                </li>
                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle padding-user d-block" data-toggle="dropdown">
                        <img src="img/authors/avatar1.jpg" width="35" class="rounded-circle img-fluid float-left"
                             height="35" alt="User Image">
                        <div class="riot">
                            <div>
                                Addison
                                <span><i class="fa fa-sort-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="img/authors/avatar1.jpg" class="rounded-circle" alt="User Image">
                            <p> Addison</p>
                        </li>
                        <!-- Menu Body -->
                        <li class="p-t-3"><a href="user_profile.html" class="dropdown-item"> <i class="fa fa-fw ti-user"></i> My Profile </a>
                        </li>
                        <li role="presentation"></li>
                        <li><a href="edit_user.html" class="dropdown-item"><i class="fa fa-fw ti-settings"></i> Account Settings </a></li>
                        <li role="presentation" class="dropdown-divider"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="float-left">
                                <a href="lockscreen.html">
                                    <i class="fa fa-fw ti-lock"></i>
                                    Lock
                                </a>
                            </div>
                            <div class="float-right">
                                <a href="login.html">
                                    <i class="fa fa-fw ti-shift-right"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
                <div class="nav_profile">
                    <div class="media profile-left">
                        <a class="float-left profile-thumb" href="#">
                            <img src="img/authors/avatar1.jpg" class="rounded-circle" alt="User Image"></a>
                        <div class="content-profile">
                            <h4 class="media-heading">Addison</h4>
                            <ul class="icon-list">
                                <li>
                                    <a href="users.html" title="user">
                                        <i class="fa fa-fw ti-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="lockscreen.html" title="lock">
                                        <i class="fa fa-fw ti-lock"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="edit_user.html" title="settings">
                                        <i class="fa fa-fw ti-settings"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="login.html" title="Login">
                                        <i class="fa fa-fw ti-shift-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="navigation">
                    <li class="active" id="active">
                        <a href="index.html">
                            <i class="menu-icon ti-desktop"></i>
                            <span class="mm-text ">Dashboard 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="index2.html">
                            <i class="menu-icon ti-layout-list-large-image"></i>
                            <span class="mm-text ">Dashboard 2</span>
                        </a>
                    </li>
                    <li class="menu-dropdown">
                        <a href="javascript:void(0)">
                            <i class="menu-icon ti-check-box"></i>
                            <span>Forms</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-fw ti-receipt"></i> Features
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu p-l-40">
                                    <li>                                         <a href="form_elements.html">                                             <i class="fa fa-fw ti-cup"></i> Form Elements                                         </a>                                     </li>                                     <li>                                         <a href="realtime_form.html">                                             <i class="fa fa-fw ti-write"></i> Realtime Forms                                         </a>                                     </li>
                                    <li>
                                        <a href="form_validations.html">
                                            <i class="fa fa-fw ti-alert"></i> Form Validations
                                        </a>
                                    </li>
                                    <li>
                                        <a href="form_layouts.html">
                                            <i class="fa fa-fw ti-layout-width-default"></i> Form Layouts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="complex_forms.html">
                                            <i class="fa fa-fw ti-layout-cta-left"></i> Complex Forms
                                        </a>
                                    </li>
                                    <li>
                                        <a href="complex_forms2.html">
                                            <i class="fa fa-fw ti-layout-cta-center"></i> Complex Forms 2
                                        </a>
                                    </li>

                                    <li>
                                        <a href="radio_checkboxes.html">
                                            <i class="fa fa-fw ti-check-box"></i> Radio and Checkbox
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-fw ti-clipboard"></i> Components
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu p-l-40">
                                    <li>
                                        <a href="form_editors.html">
                                            <i class="fa fa-fw ti-pencil"></i> Form Editors
                                        </a>
                                    </li>
                                    <li>
                                        <a href="form_wizards.html">
                                            <i class="fa fa-fw ti-settings"></i> Form Wizards
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dropdowns.html">
                                            <i class="fa fa-fw ti-widget-alt"></i> Drop Downs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="datepicker.html">
                                            <i class="fa fa-fw ti-calendar"></i> Date pickers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="advanceddate_pickers.html">
                                            <i class="fa fa-fw ti-notepad"></i> Advanced Date pickers
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon ti-desktop"></i>
                            <span>
                                    UI Features
                                </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="general_components.html">
                                    <i class="fa fa-fw ti-plug"></i> General Components
                                </a>
                            </li>
                            <li>
                                <a href="buttons.html">
                                    <i class="fa fa-fw ti-layout-placeholder"></i> Buttons
                                </a>
                            </li>
                            <li>
                                <a href="tabs_accordions.html">
                                    <i class="fa fa-fw ti-layers"></i> Tabs &amp; Accordions
                                </a>
                            </li>
                            <li>
                                <a href="fonts.html">
                                    <i class="fa fa-fw ti-ink-pen"></i> Font Icons
                                </a>
                            </li>
                            <li>
                                <a href="advanced_modals.html">
                                    <i class="fa fa-fw ti-brush-alt"></i> Advanced Modals
                                </a>
                            </li>
                            <li>
                                <a href="timeline.html">
                                    <i class="fa fa-fw ti-time"></i> Timeline
                                </a>
                            </li>
                            <li>
                                <a href="notifications.html">
                                    <i class="fa fa-fw ti-flag-alt"></i> Notifications
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon ti-briefcase"></i>
                            <span>
                                    UI Components
                                </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="pickers.html">
                                    <i class="fa fa-fw ti-brush"></i> Pickers
                                </a>
                            </li>
                            <li>
                                <a href="grid_layout.html">
                                    <i class="fa fa-fw ti-layout-grid2"></i> Grid Layout
                                </a>
                            </li>
                            <li>
                                <a href="tags_input.html">
                                    <i class="fa fa-fw ti-tag"></i> Tags Input
                                </a>
                            </li>
                            <li>
                                <a href="nestable_list.html">
                                    <i class="fa fa-fw ti-view-list"></i> Nestable List
                                </a>
                            </li>
                            <li>
                                <a href="sweet_alert.html">
                                    <i class="fa fa-fw ti-bell"></i> Sweet Alert
                                </a>
                            </li>
                            <li>
                                <a href="toastr_notifications.html">
                                    <i class="fa fa-fw ti-tablet"></i> Toastr Notifications
                                </a>
                            </li>
                            <li><a href="draggable_portlets.html"> <i class="fa fa-fw ti-control-shuffle"></i> Draggable
                                Portlets </a></li>
                            <li><a href="jstree.html"> <i class="fa fa-fw ti-folder"></i> jstree </a></li>
                            <li>
                                <a href="transitions.html"> <i class="fa fa-fw ti-star"></i> Transitions </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon ti-widget"></i>
                            <span>Widgets</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="widgets.html">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Widgets 1
                                </a>
                            </li>
                            <li>
                                <a href="widgets1.html">
                                    <i class=" menu-icon fa fa-fw ti-widget-alt"></i>
                                    Widgets 2
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon ti-layout-grid4"></i>
                            <span>DataTables</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="simple_tables.html">
                                    <i class="fa fa-fw ti-layout"></i> Simple tables
                                </a>
                            </li>
                            <li>
                                <a href="datatables.html">
                                    <i class="fa fa-fw ti-server"></i> Data Tables
                                </a>
                            </li>
                            <li>
                                <a href="advanced_datatables.html">
                                    <i class="fa fa-fw ti-layout-grid3"></i> Advanced Tables
                                </a>
                            </li>
                            <li>
                                <a href="responsive_datatables.html">
                                    <i class="fa fa-fw ti-layout-accordion-merged"></i> Responsive DataTables
                                </a>
                            </li>
                            <li>
                                <a href="bootstrap_tables.html">
                                    <i class="fa fa-fw ti-layout-grid2"></i> Bootstrap Tables
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#"> <i class="menu-icon ti-bar-chart"></i>
                            <span>Charts</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="flot_charts.html">
                                    <i class="fa fa-fw ti-bar-chart-alt"></i> Flot Charts
                                </a>
                            </li>
                            <li>
                                <a href="nvd3_charts.html"> <i class="fa fa-fw ti-stats-up"></i> NVD3 Charts </a>
                            </li>
                            <li>
                                <a href="circle_sliders.html"> <i class="fa fa-fw ti-basketball"></i> Circle Sliders
                                </a>
                            </li>
                            <li>
                                <a href="chartjs_charts.html"> <i class="fa fa-fw ti-pie-chart"></i> Chartjs Charts </a>
                            </li>

                            <li>
                                <a href="amcharts.html"> <i class="fa fa-fw ti-stats-up"></i> Amcharts </a>
                            </li>
                            <li>
                                <a href="chartist.html"> <i class="fa fa-fw ti-bar-chart"></i> Chartist Charts </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon ti-calendar"></i>
                            <span>Calendar</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="calendar.html">
                                    <i class=" menu-icon fa fa-fw ti-video-clapper"></i>
                                    <span>Calendar</span>
                                    <small class="badge badge-pill badge-success">7</small>
                                </a>
                            </li>
                            <li>
                                <a href="calendar2.html">
                                    <i class=" menu-icon fa fa-fw ti-calendar"></i>
                                    <span>Advanced Calendar</span>
                                    <small class="badge badge-pill badge-success">6</small>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon ti-gallery"></i>
                            <span>Gallery</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="masonry_gallery.html">
                                    <i class="fa fa-fw ti-gallery"></i> Masonry Gallery
                                </a>
                            </li>

                            <li>
                                <a href="dropify.html">
                                    <i class="fa fa-fw ti-dropbox"></i> Dropify
                                </a>
                            </li>
                            <li>
                                <a href="image_hover.html">
                                    <i class="fa fa-fw ti-image"></i> Image Hover
                                </a>
                            </li>
                            <li>
                                <a href="image_filter.html">
                                    <i class="fa fa-fw ti-filter"></i> Image Filter
                                </a>
                            </li>
                            <li>
                                <a href="image_magnifier.html">
                                    <i class="fa fa-fw ti-zoom-in"></i> Image Magnifier
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#"> <i class="menu-icon ti-user"></i> <span>Users</span> <span
                                class="fa arrow"></span> </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="users.html">
                                    <i class="fa fa-fw ti-menu-alt" aria-hidden="true"></i> Users List
                                </a>
                            </li>
                            <li>
                                <a href="addnew_user.html">
                                    <i class="fa fa-fw ti-user"></i> Add New User
                                </a>
                            </li>
                            <li>
                                <a href="user_profile.html">
                                    <i class="fa fa-fw ti-id-badge"></i> View Profile
                                </a>
                            </li>
                            <li>
                                <a href="deleted_users.html">
                                    <i class="fa fa-fw ti-trash"></i> Deleted Users
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon ti-location-pin"></i>
                            <span>Maps</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="google_maps.html">
                                    <i class="fa fa-fw ti-world"></i> Google Maps
                                </a>
                            </li>
                            <li>
                                <a href="vector_maps.html">
                                    <i class="fa fa-fw ti-map"></i> Vector Maps
                                </a>
                            </li>
                            <li>
                                <a href="advanced_maps.html">
                                    <i class="fa fa-fw ti-map-alt"></i> Advanced Maps
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="javascript:void(0)">
                            <i class="menu-icon ti-files"></i>
                            <span>Pages</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="login.html">
                                    <i class="fa fa-fw ti-shift-right"></i> Login
                                </a>
                            </li>
                            <li>
                                <a href="register.html">
                                    <i class="fa fa-fw ti-check-box"></i> Register
                                </a>
                            </li>
                            <li>
                                <a href="forgot_password.html">
                                    <i class="fa fa-fw ti-help"></i> Forgot Password
                                </a>
                            </li>
                            <li>
                                <a href="reset_password.html">
                                    <i class="fa fa-fw ti-key"></i> Reset Password
                                </a>
                            </li>
                            <li>
                                <a href="lockscreen.html">
                                    <i class="fa fa-fw ti-lock"></i> Lockscreen
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="javascript:void(0)">
                            <i class="menu-icon ti-face-smile"></i>
                            <span>Extra Pages</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="blank.html">
                                    <i class="fa fa-fw ti-file"></i> Blank
                                </a>
                            </li>
                            <li>
                                <a href="invoice.html">
                                    <i class="fa fa-fw ti-layout-cta-left"></i> Invoice
                                </a>
                            </li>
                            <li>
                                <a href="session_timeout.html">
                                    <i class="fa fa-fw ti-time"></i> Session Timeout
                                </a>
                            </li>
                            <li>
                                <a href="pricing_table.html">
                                    <i class="fa fa-fw ti-time"></i> Pricing
                                </a>
                            </li>
                            <li>
                                <a href="404.html">
                                    <i class="fa fa-fw ti-unlink"></i> 404 Error
                                </a>
                            </li>
                            <li>
                                <a href="500.html">
                                    <i class="fa fa-fw ti-face-sad"></i> 500 Error
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon ti-layout-grid3"></i>
                            <span>Layouts</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="menubarfold.html">
                                    <i class="fa fa-fw ti-layout-menu-v"></i> Menubar Fold
                                </a>
                            </li>
                            <li>
                                <a href="horizontal_menu.html">
                                    <i class="fa fa-fw ti-layout-menu-full"></i> Horizontal Menu
                                </a>
                            </li>

                            <li>
                                <a href="boxed_movable_header.html">
                                    <i class="fa fa-fw ti-layout-grid2"></i> Boxed &amp; Movable Header
                                </a>
                            </li>
                            <li>
                                <a href="layout_movable_header.html">
                                    <i class="fa fa-fw ti-view-list-alt"></i> Movable Header
                                </a>
                            </li>
                            <li>
                                <a href="layout_boxed_fixed_header.html">
                                    <i class="fa fa-fw ti-view-list"></i> Boxed &amp; Fixed Header
                                </a>
                            </li>
                            <li>
                                <a href="layout_fixed.html">
                                    <i class="fa fa-fw ti-layout-column2"></i> Fixed Header &amp; Menu
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon ti-menu"></i>
                            <span>
                                    Menu levels
                                </span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-fw ti-control-skip-forward"></i> Level 1
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu sub-submenu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw ti-control-skip-forward"></i> Level 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw ti-control-skip-forward"></i> Level 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw ti-control-skip-forward"></i> Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                        <ul class="sub-menu sub-submenu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw ti-control-skip-forward"></i> Level 3
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw ti-control-skip-forward"></i> Level 3
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw ti-control-skip-forward"></i> Level 3
                                                    <span class="fa arrow"></span>
                                                </a>
                                                <ul class="sub-menu sub-submenu">
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-fw ti-control-skip-forward"></i> Level 4
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-fw ti-control-skip-forward"></i> Level 4
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-fw ti-control-skip-forward"></i> Level 4
                                                            <span class="fa arrow"></span>
                                                        </a>
                                                        <ul class="sub-menu sub-submenu">
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-fw ti-control-skip-forward"></i> Level 5
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-fw ti-control-skip-forward"></i> Level 5
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-fw ti-control-skip-forward"></i> Level 5
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw ti-control-skip-forward"></i> Level 4
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw ti-control-skip-forward"></i> Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-fw ti-control-skip-forward"></i> Level 1
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-fw ti-control-skip-forward"></i> Level 1
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu sub-submenu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw ti-control-skip-forward"></i> Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw ti-control-skip-forward"></i> Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw ti-control-skip-forward"></i> Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- / .navigation --> </div>
            <!-- menu --> </section>
        <!-- /.sidebar --> </aside>
    <aside class="right-side">

        <section class="content-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-5 col-8">
                    <div class="header-element">
                        <h3>Clear/
                            <small>Dashboard</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4 ml-auto col-md-6 col-sm-7 col-4">
                    <div class="header-object">
                        <span class="option-search float-right d-none d-sm-block">
                            <span class="search-wrapper">
                                <input type="text" placeholder="Search here"><i class="ti-search"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="flip">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon float-left">
                                <i class="ti-eye text-warning"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>3752</b></h3>
                                <p>Daily Visits</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-bg-color-icon card-box back">
                            <div class="text-center">
                                <span id="loadspark-chart"></span>
                                <hr>
                                <p>Check summary</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="flip">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon float-left">
                                <i class="ti-shopping-cart text-success"></i>
                            </div>
                            <div class="text-right">
                                <h3><b id="widget_count3">3251</b></h3>
                                <p>Sales status</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-bg-color-icon card-box back">
                            <div class="text-center">
                                <span class="linechart" id="salesspark-chart"></span>
                                <hr>
                                <p>Check summary</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="flip">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon float-left">
                                <i class="ti-thumb-up text-danger"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>1532</b></h3>
                                <p>Hits</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-bg-color-icon card-box back">
                            <div class="text-center">
                                <span id="visitsspark-chart"></span>
                                <hr>
                                <p>Check summary</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xl-3">
                    <div class="flip">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon float-left">
                                <i class="ti-user text-info"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>1252</b></h3>
                                <p>Subscribers</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-bg-color-icon card-box back">
                            <div class="text-center">
                                <span id="subscribers-chart"></span>
                                <hr>
                                <p>Check summary</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card main-chart">
                                <div class="card-header panel-tabs">
                                    <ul class="nav nav-tabs nav-float" role="tablist">
                                        <li class=" text-center nav-item">
                                            <a href="#home" class="nav-link active" role="tab" data-toggle="tab">Live Feeds</a>
                                        </li>
                                        <li class="text-center nav-item">
                                            <a href="#profile" role="tab" data-toggle="tab" class="nav-link"><span class="d-none d-sm-block">Annual</span>
                                                Revenue</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane  active" id="home">
                                            <div class="form-group">
                                                <input type="checkbox" id="toggle_real" name="my-checkbox"
                                                       data-size="small" checked>
                                            </div>
                                            <div id="live-chart" class="livechart-tab1 m-t-10"></div>
                                        </div>
                                        <div class="tab-pane fade" id="profile">
                                            <div class="chart-container">
                                                <span class="">
                                                    <i class="ti-reload redraw-cart float-right set-animate"></i>
                                                </span>
                                                <canvas id="dashboard-chart1" width="800" height="300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card">
                                <div>
                                <div class="swiper-container swiper_news">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide slide-1 gradient-color">
                                            <div class="slider-content">
                                                <div class="news-head">
                                                    <h3>The Need For Inc. in Energy</h3>
                                                    <span class="float-right">Yesterday</span>
                                                    <hr>
                                                </div>
                                                <div class="news-cont">
                                                    <h4>The strategy of adjusting and optimizing energy, using systems
                                                        and
                                                        procedures so as to reduce energy requirements per unit of
                                                        output
                                                        while holding ...</h4>
                                                    <p class="text-right read-more"><a class="read-more"
                                                                                       href="javascript:void(0)">Read
                                                        more <i class="ti-angle-double-right"></i></a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide slide-2 gradient-color">
                                            <div class="slider-content">
                                                <div class="news-head">
                                                    <h3>What to expect in the final race..</h3>
                                                    <span class="float-right">5min ago</span>
                                                    <hr>
                                                </div>
                                                <div class="news-cont">
                                                    <h4>The strategy of adjusting and optimizing energy, using systems
                                                        and
                                                        procedures so as to reduce energy per unit of output
                                                        while holding ...</h4>
                                                    <p class="text-right read-more"><a class="read-more"
                                                                                       href="javascript:void(0)">Read
                                                        more <i class="ti-angle-double-right"></i></a></p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide slide-3 gradient-color">
                                            <div class="slider-content">
                                                <div class="news-head">
                                                    <h3>First ever Largest open Air Purifier</h3>
                                                    <span class="float-right">On 28th Oct</span>
                                                    <hr>
                                                </div>
                                                <div class="news-cont">
                                                    <h4>The strategy of adjusting and optimizing energy, using systems
                                                        and
                                                        procedures so as to reduce energy requirements per unit of
                                                        output
                                                        while holding ...</h4>
                                                    <p class="text-right read-more"><a class="read-more"
                                                                                       href="javascript:void(0)">Read
                                                        more <i class="ti-angle-double-right"></i></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card real-timechart">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            <h3 class="">Real-Time Visits</h3>
                                            <div class="real-value"><p><span></span>k</p></div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <h3 class="">Returning Visitors</h3>
                                            <div class="return-value"><p><span></span>k</p></div>
                                        </div>
                                    </div>
                                    <div id="realtime-views" class="real-chart"></div>
                                    <hr>
                                    <div class="row ratings">
                                        <div class="col-4 text-center">
                                            <h4>81%</h4>
                                            <p>Satisfied</p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <h4>8%</h4>
                                            <p>Unsatisfied</p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <h4>11%</h4>
                                            <p>NA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card nvd3-card">
                                <div class="card-header">
                                    <h3 class="card-title">Project Status</h3>
                                </div>
                                <div class="card-body">
                                    <div class="nvd3-chart line-chart text-center" data-x-grid="false">
                                        <svg></svg>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4  col-12">
                    <div class="row">
                        <div class="col-xl-12 col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Timeline</h3>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <ul class="timeline timeline-update">
                                            <li>
                                                <div class="timeline-badge primary wow lightSpeedIn center">
                                                    <img src="img/authors/avatar1.jpg" height="36" width="36"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                </div>
                                                <div class="timeline-card wow slideInLeft"
                                                     style="display:inline-block;">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Jade Project's Status </h4>
                                                        <p>
                                                            <small class="text-primary">11 hours ago</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>
                                                            Jade Project team has completed their first phase.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="timeline-badge info wow lightSpeedIn center">
                                                    <img src="img/authors/avatar.jpg" height="36" width="36"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                </div>
                                                <div class="timeline-card wow slideInLeft">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Tinder Project</h4>
                                                        <p>
                                                            <small class="text-primary">Sept 10, 2016</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>
                                                            Tinder Project's Final review has completed.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-badge default wow lightSpeedIn center">
                                                    <img src="img/authors/avatar2.jpg" height="36" width="36"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                </div>
                                                <div class="timeline-card wow slideInLeft">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">A new branch in Virginia.</h4>
                                                        <p>
                                                            <small class="text-primary">Jan 02, 2017</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>
                                                            Planning to have a branch in virginia in the coming year.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-badge primary wow lightSpeedIn center">
                                                    <img src="img/authors/avatar3.jpg" height="36" width="36"
                                                         class="rounded-circle float-right" alt="avatar-image">

                                                </div>
                                                <div class="timeline-card wow slideInLeft"
                                                     style="display:inline-block;">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Daily Status </h4>
                                                        <p>
                                                            <small class="text-primary">2days ago</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>
                                                            Manager schedules to keep a daily project status track.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="timeline-badge info wow lightSpeedIn center">
                                                    <img src="img/authors/avatar4.jpg" height="36" width="36"
                                                         class="rounded-circle float-right" alt="avatar-image">

                                                </div>
                                                <div class="timeline-card wow slideInLeft">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Performance report</h4>
                                                        <p>
                                                            <small class="text-primary">Aug 10, 2016</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>
                                                            Richard, updated his Team over view Performance report.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-badge default wow lightSpeedIn center">
                                                    <img src="img/authors/avatar2.jpg" height="36" width="36"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                </div>
                                                <div class="timeline-card wow slideInLeft">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Project Evaluation</h4>
                                                        <p>
                                                            <small class="text-primary">Oct 05, 2016</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>
                                                            Variations Project Evaluation is going on to highlight
                                                            project.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-6 col-sm-6">
                            <div class="card personal-chat">
                                <div class="card-header">
                                    <div class="card-title"><img class="chat-image rounded-circle float-left" height="36"
                                                                  width="36"
                                                                  src="img/authors/avatar5.jpg" alt="avatar-image">
                                        <div class="header-elements">Wilton zeph
                                            <br>
                                            <small class="status"><b>Online</b></small>

                                            <div class="float-right options">
                                                <div class="btn-group">
                                                <span class="toggle-dropdown" data-toggle="dropdown"
                                                      aria-expanded="false" aria-haspopup="true" role="menu">
                                                    <i class="ti-clip attachment"></i>
                                                </span>
                                                    <ul class="dropdown-menu dropdown-menu-right position_dropdown">
                                                        <li class="dropdown-item"><a href="#"><i class="ti-file text-primary"></i>Document</a>
                                                        </li>
                                                        <li class="dropdown-item"><a href="#"><i
                                                                class="ti-gallery text-primary"></i>Gallery</a>
                                                        </li>
                                                        <li class="dropdown-item"><a href="#"><i class="ti-location-arrow text-primary"></i>Location</a>
                                                        </li>
                                                        <li class="dropdown-item"><a href="#"><i class="ti-camera text-primary"></i>Camera</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="btn-group">
                                                <span class="toggle-dropdown" data-toggle="dropdown"
                                                      aria-expanded="false" aria-haspopup="true" role="menu">
                                                    <i class="ti-more-alt more"></i>
                                                </span>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#">Profile</a>
                                                        </li>
                                                        <li><a href="#">Media</a>
                                                        </li>
                                                        <li><a href="#">Mute</a>
                                                        </li>
                                                        <li><a href="#">More</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--</div>-->
                                    <div class="chat-conversation">
                                        <ul class="conversation-list">
                                            <li class="clearfix odd conversers1">

                                                <div class="conversation-text">
                                                    <div class="ctext-wrap m-t-10">
                                                        <p class="text-left">
                                                            Hello Wilton, are the review papers ready?
                                                            <i class="text-right">8:31 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix  m-t-10 conversers2">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <p>
                                                            Not yet, it will take a bit of time for you to get them.
                                                            <br><i class="text-right">8:31 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix odd m-t-10 conversers1">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <p class="text-left">
                                                            Treat this on urgent Basis.
                                                            <i class="text-right">8:33 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix  m-t-10 conversers2">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <p>
                                                            I will make it as early as possible.
                                                            <br><i class="text-right">8:34 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix odd m-t-10 conversers1">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <p class="text-left">
                                                            Okay.
                                                            <i class="text-right">8:35 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="clearfix m-t-10 conversers2">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <p>
                                                            If there is anything else..
                                                            <br><i class="text-right">8:35 pm</i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <form id="main_input_box">
                                            <div class="row">
                                                <div class="col-12 m-b-15">
                                                    <div class="input-group text-field">
                                                        <input type="search"
                                                               class="form-control chat-input custom_textbox"
                                                               id="custom_textbox" placeholder="Type a message"
                                                               required>
                                                        <span class="input-group-btn">
                                                    <button class="btn btn-success send-btn"
                                                            type="submit"><i
                                                            class="menu-icon ti-location-arrow text-white"></i></button>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--rightside bar -->
            <div id="right">
                <div id="right-slim">
                    <div class="rightsidebar-right">
                        <div class="rightsidebar-right-content">
                            <div class="panel-tabs">
                                <ul class="nav nav-tabs nav-float" role="tablist">
                                    <li class="nav-item text-center">
                                        <a href="#r_tab1" role="tab" data-toggle="tab" class="nav-link active "><i
                                                class="fa fa-fw ti-comments"></i></a>
                                    </li>
                                    <li class="text-center nav-item">
                                        <a href="#r_tab2" role="tab" data-toggle="tab" class="nav-link"><i class="fa fa-fw ti-bell"></i></a>
                                    </li>
                                    <li class="text-center nav-item">
                                        <a href="#r_tab3" role="tab" data-toggle="tab" class="nav-link"><i
                                                class="fa fa-fw ti-settings"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="r_tab1">
                                    <div id="slim_t1">
                                        <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                            <i class="menu-icon  fa fa-fw ti-user"></i>
                                            Contacts
                                        </h5>
                                        <ul class="list-unstyled margin-none">
                                            <li class="rightsidebar-contact-wrapper">
                                                <a class="rightsidebar-contact" href="#">
                                                    <img src="img/authors/avatar6.jpg"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                    <i class="fa fa-circle text-xs text-primary"></i>
                                                    Annette
                                                </a>
                                            </li>
                                            <li class="rightsidebar-contact-wrapper">
                                                <a class="rightsidebar-contact" href="#">
                                                    <img src="img/authors/avatar.jpg"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                    <i class="fa fa-circle text-xs text-primary"></i>
                                                    Jordan
                                                </a>
                                            </li>
                                            <li class="rightsidebar-contact-wrapper">
                                                <a class="rightsidebar-contact" href="#">
                                                    <img src="img/authors/avatar2.jpg"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                    <i class="fa fa-circle text-xs text-primary"></i>
                                                    Stewart
                                                </a>
                                            </li>
                                            <li class="rightsidebar-contact-wrapper">
                                                <a class="rightsidebar-contact" href="#">
                                                    <img src="img/authors/avatar3.jpg"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                    <i class="fa fa-circle text-xs text-warning"></i>
                                                    Alfred
                                                </a>
                                            </li>
                                            <li class="rightsidebar-contact-wrapper">
                                                <a class="rightsidebar-contact" href="#">
                                                    <img src="img/authors/avatar4.jpg"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                    <i class="fa fa-circle text-xs text-danger"></i>
                                                    Eileen
                                                </a>
                                            </li>
                                            <li class="rightsidebar-contact-wrapper">
                                                <a class="rightsidebar-contact" href="#">
                                                    <img src="img/authors/avatar5.jpg"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                    <i class="fa fa-circle text-xs text-muted"></i>
                                                    Robert
                                                </a>
                                            </li>
                                            <li class="rightsidebar-contact-wrapper">
                                                <a class="rightsidebar-contact" href="#">
                                                    <img src="img/authors/avatar7.jpg"
                                                         class="rounded-circle float-right" alt="avatar-image">
                                                    <i class="fa fa-circle text-xs text-muted"></i>
                                                    Cassandra
                                                </a>
                                            </li>
                                        </ul>

                                        <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                            <i class="fa fa-fw ti-export"></i>
                                            Recent Updates
                                        </h5>
                                        <div>
                                            <ul class="list-unstyled">
                                                <li class="rightsidebar-notification">
                                                    <a href="#">
                                                        <i class="fa ti-comments-smiley fa-fw text-primary"></i>
                                                        New Comment
                                                    </a>
                                                </li>
                                                <li class="rightsidebar-notification">
                                                    <a href="#">
                                                        <i class="fa ti-twitter-alt fa-fw text-success"></i>
                                                        3 New Followers
                                                    </a>
                                                </li>
                                                <li class="rightsidebar-notification">
                                                    <a href="#">
                                                        <i class="fa ti-email fa-fw text-info"></i>
                                                        Message Sent
                                                    </a>
                                                </li>
                                                <li class="rightsidebar-notification">
                                                    <a href="#">
                                                        <i class="fa ti-write fa-fw text-warning"></i>
                                                        New Task
                                                    </a>
                                                </li>
                                                <li class="rightsidebar-notification">
                                                    <a href="#">
                                                        <i class="fa ti-export fa-fw text-danger"></i>
                                                        Server Rebooted
                                                    </a>
                                                </li>
                                                <li class="rightsidebar-notification">
                                                    <a href="#">
                                                        <i class="fa ti-info-alt fa-fw text-primary"></i>
                                                        Server Not Responding
                                                    </a>
                                                </li>
                                                <li class="rightsidebar-notification">
                                                    <a href="#">
                                                        <i class="fa ti-shopping-cart fa-fw text-success"></i>
                                                        New Order Placed
                                                    </a>
                                                </li>
                                                <li class="rightsidebar-notification">
                                                    <a href="#">
                                                        <i class="fa ti-money fa-fw text-info"></i>
                                                        Payment Received
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="r_tab2">
                                    <div id="slim_t2">
                                        <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                            <i class="fa fa-fw ti-bell"></i>
                                            Notifications
                                        </h5>
                                        <ul class="list-unstyled m-t-15 notifications">
                                            <li>
                                                <a href="" class="message icon-not striped-col">
                                                    <img class="message-image rounded-circle"
                                                         src="img/authors/avatar3.jpg" alt="avatar-image">

                                                    <div class="message-body">
                                                        <strong>John Doe</strong>
                                                        <br>
                                                        5 members joined today
                                                        <br>
                                                        <small class="noti-date">Just now</small>
                                                    </div>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="" class="message icon-not">
                                                    <img class="message-image rounded-circle"
                                                         src="img/authors/avatar.jpg" alt="avatar-image">
                                                    <div class="message-body">
                                                        <strong>Tony</strong>
                                                        <br>
                                                        likes a photo of you
                                                        <br>
                                                        <small class="noti-date">5 min</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" class="message icon-not striped-col">
                                                    <img class="message-image rounded-circle"
                                                         src="img/authors/avatar6.jpg" alt="avatar-image">

                                                    <div class="message-body">
                                                        <strong>John</strong>
                                                        <br>
                                                        Dont forgot to call...
                                                        <br>
                                                        <small class="noti-date">11 min</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" class="message icon-not">
                                                    <img class="message-image rounded-circle"
                                                         src="img/authors/avatar1.jpg" alt="avatar-image">
                                                    <div class="message-body">
                                                        <strong>Jenny Kerry</strong>
                                                        <br>
                                                        Done with it...
                                                        <br>
                                                        <small class="noti-date">1 Hour</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" class="message icon-not striped-col">
                                                    <img class="message-image rounded-circle"
                                                         src="img/authors/avatar7.jpg" alt="avatar-image">

                                                    <div class="message-body">
                                                        <strong>Ernest Kerry</strong>
                                                        <br>
                                                        2 members joined today
                                                        <br>
                                                        <small class="noti-date">3 Days</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-right noti-footer"><a href="#">View All Notifications <i
                                                    class="ti-arrow-right"></i></a></li>
                                        </ul>
                                        <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                            <i class="fa fa-fw ti-check-box"></i>
                                            Tasks
                                        </h5>
                                        <ul class="list-unstyled m-t-15">
                                            <li>
                                                <div>
                                                    <p>
                                                        <span>Button Design</span>
                                                        <small class="float-right text-muted">40%</small>
                                                    </p>
                                                    <div class="progress progress-xs  active">
                                                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 40%">
                                                            <span class="sr-only">40% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <p>
                                                        <span>Theme Creation</span>
                                                        <small class="float-right text-muted">20%</small>
                                                    </p>
                                                    <div class="progress progress-xs  active">
                                                        <div class="progress-bar bg-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 20%">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <p>
                                                        <span>XYZ Task To Do</span>
                                                        <small class="float-right text-muted">60%</small>
                                                    </p>
                                                    <div class="progress progress-xs  active">
                                                        <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 60%">
                                                            <span class="sr-only">60% Complete (warning)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <p>
                                                        <span>Transitions Creation</span>
                                                        <small class="float-right text-muted">80%</small>
                                                    </p>
                                                    <div class="progress progress-xs active">
                                                        <div class="progress-bar bg-danger progress-bar-striped" role="progressbar"
                                                             aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 80%">
                                                            <span class="sr-only">80% Complete (danger)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="text-right"><a href="#">View All Tasks <i
                                                    class="ti-arrow-right"></i></a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="r_tab3">
                                    <div id="slim_t3">

                                        <h5 class="rightsidebar-right-heading text-uppercase gen-sett-m-t text-xs">
                                            <i class="fa fa-fw ti-settings"></i>
                                            General
                                        </h5>
                                        <ul class="list-unstyled settings-list m-t-10">
                                            <li>
                                                <label for="status">Available</label>
                                                <span class="float-right">
                                            <input type="checkbox" id="status" name="my-checkbox" checked>
                                        </span>
                                            </li>
                                            <li>
                                                <label for="email-auth">Login with Email</label>
                                                <span class="float-right">
                                            <input type="checkbox" id="email-auth" name="my-checkbox">
                                        </span>
                                            </li>
                                            <li>
                                                <label for="update">Auto Update</label>
                                                <span class="float-right">
                                            <input type="checkbox" id="update" name="my-checkbox">
                                        </span>
                                            </li>

                                        </ul>
                                        <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                            <i class="fa fa-fw ti-volume"></i>
                                            Sound & Notification
                                        </h5>
                                        <ul class="list-unstyled settings-list m-t-10">
                                            <li>
                                                <label for="chat-sound">Chat Sound</label>
                                                <span class="float-right">
                                            <input type="checkbox" id="chat-sound" name="my-checkbox" checked>
                                        </span>
                                            </li>
                                            <li>
                                                <label for="noti-sound">Notification Sound</label>
                                                <span class="float-right">
                                            <input type="checkbox" id="noti-sound" name="my-checkbox">
                                        </span>
                                            </li>
                                            <li>
                                                <label for="remain">Remainder </label>
                                                <span class="float-right">
                                            <input type="checkbox" id="remain" name="my-checkbox" checked>
                                        </span>

                                            </li>
                                            <li>
                                                <label for="vol">Volume</label>
                                                <input type="range" id="vol" min="0" max="100" value="15">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#right -->
            <div class="background-overlay"></div>
        </section>
        <!-- /.content --> </aside>
    <!-- /.right-side --> </div>
<!-- ./wrapper -->
<!-- global js -->
<div id="qn"></div>
<script src="js/app.js" type="text/javascript"></script>
<!-- end of global js -->

<!-- begining of page level js -->
<!--Sparkline Chart-->
<script type="text/javascript" src="js/custom_js/sparkline/jquery.flot.spline.js"></script>
<!-- flip --->
<script type="text/javascript" src="vendors/flip/js/jquery.flip.min.js"></script>
<script type="text/javascript" src="vendors/lcswitch/js/lc_switch.min.js"></script>
<!--flot chart-->
<script type="text/javascript" src="vendors/flotchart/js/jquery.flot.js"></script>
<script type="text/javascript" src="vendors/flotchart/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="vendors/flotchart/js/jquery.flot.stack.js"></script>
<script type="text/javascript" src="vendors/flotspline/js/jquery.flot.spline.min.js"></script>
<script type="text/javascript" src="vendors/flot.tooltip/js/jquery.flot.tooltip.js"></script>
<!--swiper-->
<script type="text/javascript" src="vendors/swiper/js/swiper.min.js"></script>
<!--chartjs-->
<script src="vendors/chartjs/js/Chart.js"></script>
<!--nvd3 chart-->
<script type="text/javascript" src="js/nvd3/d3.v3.min.js"></script>
<script type="text/javascript" src="vendors/nvd3/js/nv.d3.min.js"></script>
<script type="text/javascript" src="vendors/moment/js/moment.min.js"></script>
<script type="text/javascript" src="vendors/advanced_newsTicker/js/newsTicker.js"></script>
<script type="text/javascript" src="js/dashboard1.js"></script>
<!-- end of page level js -->

</body>

</html>