<?php include_once __DIR__ . '/../header.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $Title ?>
            <small><?= $Title ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <?php if (isset($Section)) { ?>
                <li class="active"><?= $Section ?></li>
            <?php } ?>
            <li class="active"><?= $Title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-info custom_box">
            <div class="box-header bg-green">
                <h3 class="box-title">
                    <i class="fa fa-retweet"></i>          

                    Current Circulation - Member : Member        </h3>
            </div>
            <div class="box-body" id="display_div">
                
                <table style="width:100%" class="table table-bordered table-zebra table-hover table-stripped background_white">
                    <tbody><tr>           

                            <th>Book ID</th>
                            <th>Issue Date</th>
                            <th>Expiry Date</th>           
                            <th>Fine/Penalty - BDT</th>    
                            <th>Return</th>  


                        </tr>
                        <?php foreach ($get_issue_book as $issue) { ?>
                            <tr id="tr_379" class="display_row">
                                <td><?php echo $issue->BookId; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($issue->IssueDate)); ?></td>
                                <td><?php echo date('Y-m-d', strtotime($issue->ExpiryDate)); ?></td>
                                <td><?php echo $issue->Fine; ?></td>
                                <td><a href="<?php echo site_url('circulation/returned_book/'.$issue->BookId);?>" onlclick="confirm()" class="btn btn-warning return"><i class="fa fa-reply"></i> Return
                                    </a></td></tr>
                        <?php } ?>
                    </tbody></table> 

                <br>
                <a href="<?php echo site_url('circulation/book_issue');?>" class="btn btn-warning btn-lg" id="new_issue_btn" ><i class="fa fa-plus"></i> New Issue</a>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>

