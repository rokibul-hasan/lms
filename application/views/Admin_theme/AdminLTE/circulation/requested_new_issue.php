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

        <?php
//                       echo $glosary->output;                          
        ?>
        <div class="box">
            <div class="box-header">
                
            </div>
            <div class="box-body">
                <a style="margin-bottom: 10px;" href="<?php echo site_url('circulation/book_issue'); ?>" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Requested New Issue</a>
                
                <?php
                $message = $this->session->userdata('message');
                if (isset($message)) {
                    echo $message;
                }
                $this->session->unset_userdata('message');
                ?>
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <!--<th>Author</th>-->
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($issue_info as $issue) { ?>
                            <tr>
                                <td style="display:none;"><?php echo $issue->IssueReturnId; ?></td>
                                <td><?php echo $issue->Title; ?></td>
                                <!--<td><img src="<?php echo base_url();?>assets/upload/files/<?php echo $issue->banner; ?>" alt="<?php echo $issue->banner; ?>" /></td>-->
                                <td style="text-transform: uppercase;"><?php echo $issue->type; ?></td>                                
                                <td><?php
                                    if ($issue->approval_status == 2) {
                                        echo '<span class="bg-green">Accepted</span>';
                                    } elseif ($issue->approval_status == 3) {
                                        echo '<span class="bg-red">Rejected</span>';
                                    } else {
                                        echo '<span class="bg-yellow">Pending</span>';
                                        } 
                                        ?>
                                </td>
                            </tr>
<?php } ?>
                    </tbody>

                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>
<style type="text/css">
    .bg-green,.bg-red,.bg-yellow{
        padding: 5px 10px;
        border-radius: 15px;
    }
</style>
<script type="text/javascript">
    setTimeout(function () {
        $('#message').fadeOut();
    }, 1000);

    $('#datatable').DataTable({
        bFilter: false,
        "order": [[1, "desc"]]
    });




</script>