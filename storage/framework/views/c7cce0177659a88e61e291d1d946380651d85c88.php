<!doctype html>

<html lang="en">

   <head>
      <meta charset="utf-8">

      <title>LinkBox</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">


      <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/reset.css')); ?>">
      <!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">-->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap-select.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/font-awesome.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/datepicker.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/AdminLTE.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/skin-blue.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/custom.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/custom_patient.css')); ?>">

      <!-- DataTable Css -->
      <!-- <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/jquery.dataTables.css')); ?>" > -->
      <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


      <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
   </head>

   <body class="hold-transition skin-blue sidebar-mini roboto  <?php if(Auth::guard('admin')->user()->left_menu_display_type== 1): ?> <?php echo e('sidebar-collapse'); ?> <?php endif; ?>">

      <div class="wrapper">

         <!-- Main Header -->
         <header class="main-header">

            <!-- Logo -->
            <a href="<?php echo e(url('admin/home')); ?>" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini"><img src="<?php echo e(asset('assets/admin/images/Logo-min.png')); ?>"/></span>
               <!-- logo for regular state and mobile devices -->
               <span class="logo-lg"><img src="<?php echo e(asset('assets/admin/images/logo2.png')); ?>"/></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
               <!-- Sidebar toggle button-->

               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" onclick="setMenuDisplayType(this.id)" id="admin_menu_toggle">
                  <span class="sr-only">Toggle navigation</span>
               </a>
               <!-- Navbar Right Menu -->
               <div class="navbar-custom-menu">
                  <ul class="navbar-nav">
                     <!-- Messages: style can be found in dropdown.less-->

                     <!-- Tasks Menu -->

                     <!-- User Account Menu -->
                     <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <!-- The user image in the navbar-->
                           <img src="<?php echo e(asset('assets/admin/images/admin-avatar.png')); ?>" class="user-image" alt="User Image">
                           <!-- hidden-xs hides the username on small devices so only the image appears. -->
                           <span class="hidden-xs">Admin <i class="fa fa-angle-down usr-down-arrow"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                           <!-- The user image in the menu -->
                           <i class="fa fa-caret-up" aria-hidden="true"></i>
                           <li>


   <!--<a href="#" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Logout</a>-->
                              <a href="<?php echo e(url('admin/logout')); ?>" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                              <form id="logout-form" action="<?php echo e(url('admin/logout')); ?>" method="POST" style="display: none;">
                                 <?php echo e(csrf_field()); ?>

                              </form>

                           </li>
                        </ul>
                     </li>
                     <!-- Control Sidebar Toggle Button -->

                  </ul>
               </div>
            </nav>
         </header>
         <!-- Left side column. contains the logo and sidebar -->