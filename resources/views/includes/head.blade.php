<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <title> @yield('title') | {{config('app.name', 'laravel')}} </title>
    <meta name="description" content="">
    <meta name="author" content="">
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/frontend/css/font-awesome.min.css">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="/frontend/css/smartadmin-production-plugins.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/frontend/css/smartadmin-production.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/frontend/css/smartadmin-skins.min.css">

    <!-- SmartAdmin RTL Support  -->
    <link rel="stylesheet" type="text/css" media="screen" href="/frontend/css/smartadmin-rtl.min.css">


      <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp
    <link rel="stylesheet" type="text/css" media="screen" href="/frontend/css/demo.min.css"> -->

   
    <!-- FAVICONS -->
    
    
    <link rel="shortcut icon" href="/frontend/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/frontend/img/favicon/favicon.ico" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- Specifying a Webpage Icon for Web Clip 
         Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="/frontend/img/splash/sptouch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/frontend/img/splash/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/frontend/img/splash/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/frontend/img/splash/touch-icon-ipad-retina.png">
    
    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    
    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="/frontend/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="/frontend/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="/frontend/img/splash/iphone.png" media="screen and (max-device-width: 320px)">
    
    <!--Select box with search option-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
  
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" rel="stylesheet"/>

      
<style>   
    nav ul{

        background-color: #333;
    }
  
    aside {
        background-color: #333;
    }
    /*aside#left-panel nav>ul>li>a:hover {
        background-color: red;    
    }*/
    .menu-on-top nav ul ul li:hover>a, .menu-on-top nav ul ul ul li a:hover {
    color: #fff;
    background-color: #e9212e;
    }
    .dropdown-menu>li>a:hover{
        background-color: #e9212e;  
    }

    .btn-red{
        color: #fff;
        background-color: #e9212e;       
    }
    .btn-red:hover { background-color: #db1622
    !important } 

    .btn-red:hover,     
    .btn-red:focus, 
    .btn-red:active, 
    .btn-red.active, 
    .open .dropdown-toggle.btn-red { 
    color: #fff; 
    background-color: #e9212e; 
    border-color: #e9212e; 
    } 
    

ul.pagination {
    display: inline-block;
    font-weight: bold;
    padding-left: 700px;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    line-height: 1.42857143;
    text-decoration: none;
    color: #e9212e;
    background-color: #ddd;
    border: 1px solid #ddd;
    margin-left: -1px;
}

.pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
    z-index: 2;
    color: #fff;
    background-color: #e9212e;
    border-color: #e9212e;
}
.pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
    color: #e9212e;
    background-color: #ddd;
    border-color: #ddd;
    cursor: not-allowed;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    background-color: #e9212e;
    border-color: #e9212e;
    cursor: default;
}

.select2-container--default .select2-selection--single .select2-selection__arrow b {
     border-color: #888 transparent transparent transparent; 
    border-style: ; 
    border-width: 5px 4px 0 4px;
    height: 0;
    left: 50%;
    margin-left: -4px;
    margin-top: -2px;
    position: absolute;
    top: 50%;
    width: 0;
}
.select2-container .select2-choice .select2-arrow, .select2-selection__arrow {
    display: inline-block
    width: 34px;
    height: 100%;
    position: absolute;
    right: 0;
    top: 0;
    border-left:none;
    background: none;
}
.select2-container .select2-choice .select2-arrow b:before, .select2-selection__arrow b:before {
    width: 100%;
    height: 100%;
    text-align: center;
    display: block;
    content: none;
}
.datepicker table tr td.active:hover, .datepicker table tr td.active:hover:hover, .datepicker table tr td.active.disabled:hover, .datepicker table tr td.active.disabled:hover:hover, .datepicker table tr td.active:focus, .datepicker table tr td.active:hover:focus, .datepicker table tr td.active.disabled:focus, .datepicker table tr td.active.disabled:hover:focus, .datepicker table tr td.active:active, .datepicker table tr td.active:hover:active, .datepicker table tr td.active.disabled:active, .datepicker table tr td.active.disabled:hover:active, .datepicker table tr td.active.active, .datepicker table tr td.active:hover.active, .datepicker table tr td.active.disabled.active, .datepicker table tr td.active.disabled:hover.active, .open .dropdown-toggle.datepicker table tr td.active, .open .dropdown-toggle.datepicker table tr td.active:hover, .open .dropdown-toggle.datepicker table tr td.active.disabled, .open .dropdown-toggle.datepicker table tr td.active.disabled:hover {
    color: #fff;
    background-color: #e9212e;
}
.datepicker table tr td.today, .datepicker table tr td.today:hover, .datepicker table tr td.today.disabled, .datepicker table tr td.today.disabled:hover {
    color: #fff;
    background-color: #9a9a9a;
  

}
.datepicker table tr td.day:hover, .datepicker table tr td.day.focused {
    color: #fff;
    background: #e9212e;
    cursor: pointer;
}
.datepicker table tr td.today:hover, .datepicker table tr td.today:hover:hover, .datepicker table tr td.today.disabled:hover, .datepicker table tr td.today.disabled:hover:hover, .datepicker table tr td.today:focus, .datepicker table tr td.today:hover:focus, .datepicker table tr td.today.disabled:focus, .datepicker table tr td.today.disabled:hover:focus, .datepicker table tr td.today:active, .datepicker table tr td.today:hover:active, .datepicker table tr td.today.disabled:active, .datepicker table tr td.today.disabled:hover:active, .datepicker table tr td.today.active, .datepicker table tr td.today:hover.active, .datepicker table tr td.today.disabled.active, .datepicker table tr td.today.disabled:hover.active, .open .dropdown-toggle.datepicker table tr td.today, .open .dropdown-toggle.datepicker table tr td.today:hover, .open .dropdown-toggle.datepicker table tr td.today.disabled, .open .dropdown-toggle.datepicker table tr td.today.disabled:hover {
    color: gray;
    background-color: #ddd;
}
.datepicker table tr td span.active:hover, .datepicker table tr td span.active:hover:hover, .datepicker table tr td span.active.disabled:hover, .datepicker table tr td span.active.disabled:hover:hover, .datepicker table tr td span.active:focus, .datepicker table tr td span.active:hover:focus, .datepicker table tr td span.active.disabled:focus, .datepicker table tr td span.active.disabled:hover:focus, .datepicker table tr td span.active:active, .datepicker table tr td span.active:hover:active, .datepicker table tr td span.active.disabled:active, .datepicker table tr td span.active.disabled:hover:active, .datepicker table tr td span.active.active, .datepicker table tr td span.active:hover.active, .datepicker table tr td span.active.disabled.active, .datepicker table tr td span.active.disabled:hover.active, .open .dropdown-toggle.datepicker table tr td span.active, .open .dropdown-toggle.datepicker table tr td span.active:hover, .open .dropdown-toggle.datepicker table tr td span.active.disabled, .open .dropdown-toggle.datepicker table tr td span.active.disabled:hover {
    color: #fff;
    background-color: #e9212e;
}
.datepicker table tr td span:hover {
    color: #fff;
    background: #e9212e;
}
.smart-form .icon-append, .smart-form .icon-prepend {
    color: #A2A2A2;
    margin-right: 30px;
}
a {
    color: #e9212e;
    text-decoration: none;
}
.smart-form .iconappend, .smart-form .icon-prepend {
    color: #A2A2A2;
    margin-right: 10px;
}
/*For Calendar*/

.panel-primary>.panel-heading {
    color: #333;
    background-color: #ddd;
    border-color: #ddd;
}


element.style {
}
.fc-event .fc-time, .fc-event .fc-title {
    display: inline-block;
}
.fc-time, .fc-title {
    padding: 3px 2px 2px 4px;
    line-height: 16px;
    font-weight: 700;
    font-size: 11px;
    box-sizing: border-box;
}
.fc-view-container *, .fc-view-container :after, .fc-view-container :before {
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
}
.fc-view-container *, .fc-view-container :after, .fc-view-container :before {
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
}
*, :after, :before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.fc-day-grid-event>.fc-content {
    white-space: nowrap;
    overflow: hidden;
}
.fc-event, .fc-event:hover, .ui-widget .fc-event {
    color: #fff;
    text-decoration: none;
}
.fc-event {
    position: relative;
    display: block;
    font-size: .85em;
    line-height: 1.3;
    border-left: 6px solid rgba(0,0,0,.15);
    background-color: ;
    font-weight: 400;
}
.jarviswidget .fc-toolbar {
    margin-bottom: 10px;
}
.fc-unthemed .fc-today {
    background: #f7adb2;
}
.bg-color-red {
    background-color: #e9212e!important;
}
#activity b.badge {
    position: absolute;
    top: -5px;
    right: -5px;
    cursor: pointer;
    background: #f7adb2;
    display: inline-block;
    font-size: 10px;
    box-shadow: inset 1px 1px 0 rgba(0,0,0,.1), inset 0 -1px 0 rgba(0,0,0,.07);
    color: #fff;
    font-weight: 700;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    padding: 2px 4px 3px;
    text-align: center;
    line-height: normal;
}

#activity.active .badge {
    background: #f7adb2!important;
}
.ui-sortable .jarviswidget-sortable.jarviswidget-collapsed>header {
    background-color: #e9212e;
    border: 1px solid #e9212e;
    
    
}
.ui-sortable .jarviswidget-sortable>header {
    background-color: #e9212e;
    border: 1px solid #e9212e;
}
.jarviswidget>header {
    color: #fff;
    border: 1px solid #C2C2C2;
    background: #fafafa;
}
.jarviswidget-ctrls .button-icon {
    color: #fff;
}
.nav-tabs>li.active>a {    
    box-shadow: 0 -2px 0 #e9212e;    
}
.panel-default>.panel-heading {
    color: #fff;
    background-color: #e9212e;
    border-color: #e9212e;
}
.select2-container-multi .select2-choices .select2-search-choice, .select2-selection__choice {
    padding: 1px 28px 1px 8px;
    margin: 4px 0 3px 5px;
    position: relative;
    line-height: 18px;
    color: black;
    cursor: default;
    border: 1px solid #2a6395;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #3276b1;
}

</style>
</head>
 