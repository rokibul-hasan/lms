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
        <div class="row">
            <div class="col-md-12">

                <?php
//                       echo $glosary->output;                          
                ?>
                <div class="box">                    
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="button">
                                <a href="<?php echo site_url('circulation/book_issue'); ?>" class="btn btn-warning"><i class="fa fa-mail-forward"></i> Issue </a>
                                <a href="<?php echo site_url('circulation/book_return'); ?>" class="btn btn-danger"><i class="fa  fa-mail-reply"></i> Return</a>
                            </div>
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
                                            <th>Request Date</th>
                                            <th>Title</th>
                                            <th style="display:none"></th>
                                            <th>Member Name</th>                                            
                                            <th>Resource Type</th>
                                            <th>Total Number of Copy Remaining</th>
                                            <th>Approval Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
//                                                                    echo '<pre>'; print_r($issue_info);exit();
                                        foreach ($issue_info as $issue) {
                                            ?>
                                            <tr>
                                                <td><?php echo $issue['RequestDate']; ?></td>
                                                <td><?php echo $issue['Title']; ?></td>
                                                <td style="display:none;"><?php echo $issue['IssueReturnId']; ?></td>
                                                <td><?php echo $issue['username']; ?></td>                                                
                                                <td style="text-transform: uppercase;"><?php echo $issue['type']; ?></td>                                                
                                                <td><?php echo $issue['total_copy']; ?></td>
                                                <td><?php
                                                    if ($issue['approval_status'] == 2) {
                                                        echo '<span class="bg-green">Accepted</span>';
                                                    } elseif ($issue['approval_status'] == 3) {
                                                        echo '<span class="bg-red">Canceled</span>';
                                                    } else {
                                                        ?> 
                                                        <form class="formforstatus" method="post" action="<?php echo site_url('circulation/issue_approval'); ?>">
                        <!--                                           <input type="hidden" name="amount_transaction" value="<?php echo $row->amount; ?>">
                                                               <input type="hidden" name="account_number" value="<?php echo $row->id_bank_account; ?>"/>
                                                               <input type="hidden" name="transaction_type" value="<?php echo $row->id_trnsaction_type; ?>"/>-->

                                                            <input type="hidden" name="IssueReturnId" value="<?php echo $issue['IssueReturnId']; ?>">
                                                            <input type="hidden" name="email" value="<?php echo $issue['email']; ?>">
                                                            <?php if($issue['total_copy'] == '0'){ ?>
                                                            Accepted <input  type="radio" name="approval_status" value="2" <?php
                                                            if ($issue['approval_status'] == 2) {
                                                                echo 'checked';
                                                            }
                                                            ?> disabled="">
                                                            <?php }else{?>
                                                            Accepted <input type="radio" name="approval_status" value="2" <?php
                                                            if ($issue['approval_status'] == 2) {
                                                                echo 'checked';
                                                            }
                                                            ?> >
                                                            <?php }?>
                                                            Canceled <input type="radio" name="approval_status" value="3"  <?php
                                                            if ($issue['approval_status'] == 3) {
                                                                echo 'checked';
                                                            }
                                                            ?>>
                                                            Pending <input type="radio" name="approval_status" value="1"  <?php
                                                            if ($issue['approval_status'] == 1) {
                                                                echo 'checked';
                                                            }
                                                            ?>>
                                                            <a href="#"  class="btn btn-warning save_status">Update</a>
                                                        </form>
    <?php } ?>
                                                </td>
                                            </tr>
<?php } ?>
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

<?php include_once __DIR__ . '/../footer.php'; ?>
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
                window.location.reload(true);
            },
            error: function () {
                alert('Error on updateing call');
            }
        });

        ev.preventDefault();
//        window.location.reload(true);
        //$(this).parent().html('updating...');


    });

    $('.datatable').DataTable({
        bFilter: false,
        "order": [[2, "desc"]],
        "ordering": [true],
        "autoWidth": true,
    });




</script>