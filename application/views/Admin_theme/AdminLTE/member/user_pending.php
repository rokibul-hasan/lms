<?php include_once 'header_user.php'; ?>


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
        <div class="row">
            <div class="col-md-12">

                <?php
//                       echo $glosary->output;                          
                ?>
                <div class="box">                    
                    <div class="box-body">
                        <div class="col-md-12">
                            <?php
                            $message = $this->session->userdata('message');
                            if (isset($message)) {
                                echo $message;
                            }
                            $this->session->unset_userdata('message');
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>

                                            <th>Title</th>
                                            <th>Member Name</th>
                                            <th style="display:none"></th>
                                            <th>Resource Type</th>
                                            <th>Approval Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
//                                                                    echo '<pre>'; print_r($issue_info);exit();
//                                        foreach ($issue_info as $issue) {
                                        ?>
                                        <tr>
                                            <td><?php echo $user_request->Title; ?></td>
                                            <td><?php echo $user_request->username; ?></td>
                                            <td style="display:none;"><?php echo $user_request->IssueReturnId; ?></td>
                                            <td style="text-transform: uppercase;"><?php echo $user_request->type; ?></td>                                                
                                            <td><span class="bg-green">Pending....</span></td>
                                        </tr>
                                        <?php // } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'footer_user.php'; ?>
<style type="text/css">
    .bg-green,.bg-red{
        padding: 5px 10px;
        border-radius: 15px;
    }
    .button{
        margin-bottom: 15px;
    }
</style>
<script type="text/javascript">
    setTimeout(function () {
        $('#message').fadeOut();
    }, 1000);

    $('.save_status').click(function (ev) {
        var form = $(this).parents('form:first');
        $.ajax({
            url: "<?php echo site_url('circulation/issue_approval'); ?>",
            type: "POST",
            data: form.serialize(),
            dataType: "json",
            success: function (data) {
//                alert(data);
                form.html(data);
            },
            error: function () {
                alert('Error on updateing call');
            }
        });

        ev.preventDefault();
        //$(this).parent().html('updating...');


    });

    $('.datatable').DataTable({
        bFilter: false,
        "order": [[2, "desc"]],
        "ordering": [true],
        "autoWidth": true,
    });




</script>