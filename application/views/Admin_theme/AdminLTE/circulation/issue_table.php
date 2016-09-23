<?php include_once __DIR__.'/../header.php'; ?>



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
//                       echo $glosary->output;                          
                    ?>
        <div class="box">
            <div class="box-header">
                
            </div>
            <div class="box-body">
                <a href="<?php echo site_url('circulation/book_issue');?>" class="btn btn-warning"><i class="fa fa-mail-forward"></i> Issue </a>
                <a href="" class="btn btn-danger"><i class="fa  fa-mail-reply"></i> Return</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Member Name</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Issue Date</th>
                            <th>Expiry Date</th>
                            <th>Return Date</th>
                            <th>Fine/Penalty-BDT</th>
                            <th>Is Returned</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($issue_info as $issue){?>
                        <tr>
                            <td><?php echo $issue->BookId;?></td>
                            <td><?php echo $issue->username;?></td>
                            <td><?php echo $issue->Title;?></td>
                            <td><?php echo $issue->IssueDate;?></td>
                            <td><?php echo $issue->ExpiryDate;?></td>
                            <td><?php echo $issue->ReturnDate;?></td>
                            <td><?php echo $issue->Fine;?></td>
                            <td><?php echo ($issue->ReturnOrNot == 1)?'<span class="skin-blue">Yes</span>':'<span class="skin-blue">No</span>';?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once __DIR__.'/../footer.php'; ?>
