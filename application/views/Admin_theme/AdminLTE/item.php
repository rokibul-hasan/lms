<?php include_once 'header.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $Title?>
        <small><?= $Title?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <?php if(isset($Section)){?>
        <li class="active"><?= $Section?></li>
        <?php }?>
        <li class="active"><?= $Title?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

                          <?php  

                       echo $glosary->output;
                    ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'footer.php'; ?>
