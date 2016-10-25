<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $Title ?></title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo $theme_asset_url ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo $theme_asset_url ?>plugins/daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="<?php echo $theme_asset_url ?>plugins/datepicker/datepicker3.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo $theme_asset_url ?>plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="<?php echo $theme_asset_url ?>plugins/colorpicker/bootstrap-colorpicker.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo $theme_asset_url ?>plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo $theme_asset_url ?>plugins/select2/select2.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $theme_asset_url ?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo $theme_asset_url ?>dist/css/skins/_all-skins.min.css">

        <style type="text/css">
            body {
                text-transform: capitalize;
            }
            .loding {
                background: rgba(0,0,0,.5);
                position: absolute;
                z-index: 9999;
                display: block;
                width:100%;
                min-height: 100%;
            }
            .loding p{
                color: #000;
                font-size: 50px;
                position: absolute;
                left: 50%;
                top: 50%;
                z-index: 9999999;
            }
            @media print{
                .only_print{display: none;}
                .memo_print_option{margin:0 auto;width:100%;}
                #print { visibility: hidden;}
                #test{visibility: visible;} 
                td{font-size:12px;}
                

            }
            
             @page{
                width:100%;
                margin:15mm 5mm 10mm 5mm;
            }

            @media only print{
                .report-logo-for-print{
                    display: block;
                }
                aside.main-sidebar.only_print {
                    display: none;
                }
                .table>tbody>tr>td{padding-bottom: 9px}
                footer.main-footer {
                    display:none;
                }
                .page_break_after{page-break-after: always;}

                #table_custom .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
                    border: 1px solid #222!important;
                }
                .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {

                    border:1px solid #222!important;
                }
                body table,body tr,body td,body th,body tbody,body thead,.table,.table-bordered {
                    border: 1px solid #222!important;
                }
                body .table-bordered{
                    border:1px solid #222!important;
                }
            }
        </style>
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php
// echo "<pre>";
// print_r($asset);
// echo "</pre>";
        if (isset($glosary))
            foreach ($glosary->css_files as $file):
                ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

            <?php endforeach; ?>
    </head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="loding">
        <p>Loading........</p>        
    </div>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?= site_url('Admin'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo $this->config->item('SITETITLE'); ?></span>
      <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><small><?php echo $this->config->item('SITETITLE'); ?></small></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
<!--              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><i class="fa fa-user"></i> User :<strong> <?php echo $_SESSION['username']; ?></strong></span>
            </a>

          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
   <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel" style="height:70px">
        <div class="pull-left image">
          
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <?php include_once 'sidebar_common.php';?>
      
    </section>
    <!-- /.sidebar -->
  </aside>
  
