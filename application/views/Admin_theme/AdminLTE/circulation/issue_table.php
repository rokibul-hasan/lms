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
                    <div class="box-header only_print">
                        <?php
                        $attributes = array(
                            'class' => 'form-horizontal',
                            'name' => 'form',
                            'method' => 'get');
                        echo form_open('', $attributes)
                        ?>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group ">
                                    <label class="col-md-3">Member Name:</label>
                                    <div class="col-md-9">
                                        <select name="member_id" id="" class="form-control select2">
                                            <option value="">Select Member Name</option>
                                            <?php
                                            foreach ($users_info as $user) {
                                                ?>
                                                <option value="<?php echo $user->id; ?>"><?php echo $user->username; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group ">
                                    <label class="col-md-3">Is Returned?:</label>
                                    <div class="col-md-9">
                                        <select name="issue_return" id="" class="form-control select2">
                                            <option value="">Select Is Returned?</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group ">
                                    <label class="col-md-3">From :</label>
                                    <div class="col-md-9">
                                        <input class="form-control datepicker" name="date_from"  placeholder="Add Date" type="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group ">
                                    <label class="col-md-3">To :</label>
                                    <div class="col-md-9">
                                        <input class="form-control datepicker" name="date_to"  placeholder="Add Date" type="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" name="btn_submit" value="true" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                <?= anchor(current_url() . '', '<i class="fa fa-refresh"></i> Reset', ' class="btn btn-success"') ?>
                            </div>
                        </div>

                        <?= form_close(); ?>
                    </div>
                    <hr />
                    <div class="box-body">
                        <div class="col-md-12">
                            <?php
                            if (empty($search_issue_info)) {
                                ?>
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
//                            if (empty($search_issue_info)) {
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped datatable">
                                        <thead>
                                            <tr>

                                                <th>Title</th>
                                                <th>Member Name</th>
                                                <th style="display:none"></th>
                                                <th>Resource Type</th>
                                                <th>Issue Date</th>
                                                <th>Expiry Date</th>
                                                <!--<th>Total Number of Copy</th>-->
                                                <th>Return Date</th>
                                                <th>Fine/Penalty-BDT</th>
                                                <th>Is Returned</th>
                                                <th>Approval Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
//                                                                    echo '<pre>'; print_r($issue_info);exit();
                                            foreach ($issue_info as $issue) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $issue->Title; ?></td>
                                                    <td><?php echo $issue->username; ?></td>
                                                    <td style="display:none;"><?php echo $issue->IssueReturnId; ?></td>
                                                    <td style="text-transform: uppercase;"><?php echo $issue->type; ?></td>
                                                    <td><?php echo $issue->IssueDate; ?></td>
                                                    <td><?php echo $issue->ExpiryDate; ?></td>
                                                    <!--<td><?php // echo $issue->BookCopyStatus;         ?></td>-->
                                                    <td><?php echo $issue->ReturnDate; ?></td>
                                                    <td><?php echo $issue->Fine; ?></td>
                                                    <td><?php echo ($issue->ReturnOrNot == 1) ? '<span class="bg-green">Yes</span>' : '<span class="bg-red">No</span>'; ?></td>
                                                    <td><?php
                                                        if ($issue->approval_status == 2) {
                                                            echo '<span class="bg-green">Accepted</span>';
                                                        } elseif ($issue->approval_status == 3) {
                                                            echo '<span class="bg-red">Canceled</span>';
                                                        }
                                                        ?></td>
                                                </tr>
    <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                                <?php
                            }
                            if (!empty($search_issue_info)) {
                                ?>
                                <div id="block">
                                    <div class="box-header">
                                        <p class="text-center"><strong>Issue and Return Table</strong></p>
                                        <!--<p class="pull-left" style="margin-left:20px"> <strong>Search Range: (From - To) </strong> <?php echo $date_range; ?></p>-->
                                        <input class="only_print pull-right btn btn-primary" type="button"  onClick="window.print()"  value="Print"/>
                                        <!--<input style="margin-bottom: 10px;" class="only_print pull-right btn btn-primary" type="button" id="print"  onClick="printDiv('block')"  value="Print Report"/>-->
                                        <!--<div class="pull-right" id="test">Report Date: <?php echo date('d/m/Y', now()); ?></div>-->
                                    </div>
                                    <div class="box-body">
                                        <table  class ="table table-bordered table-hover" style="background: #fff;">
                                            <thead style="background: #DFF0D8;">
                                                <tr>
                <!--                                        <th></th>-->
                                                    <th>Title</th>
                                                    <th>Member Name</th>
                                                    <th>Resource Type</th>
                                                    <th>Issue Date</th>
                                                    <th>Expiry Date</th>
                                                    <!--<th>Total Number of Copy</th>-->
                                                    <th>Return Date</th>
                                                    <th>Fine/Penalty-BDT</th>
                                                    <th>Is Returned</th>
                                                    <th>Approval Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sum_total_amount = 0;
                                                foreach ($search_issue_info as $issue) {
//                                                    $sum_total_amount += $rep->transfered_amount;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $issue->Title; ?></td>
                                                        <td><?php echo $issue->username; ?></td>
                                                        <td style="text-transform: uppercase;"><?php echo $issue->type; ?></td>
                                                        <td><?php echo date('Y-m-d', strtotime($issue->IssueDate)); ?></td>
                                                        <td><?php echo date('Y-m-d', strtotime($issue->ExpiryDate)); ?></td>
                                                        <td><?php echo $issue->ReturnDate; ?></td>
                                                        <td><?php echo $issue->Fine; ?></td>
                                                        <td><?php echo ($issue->ReturnOrNot == 1) ? 'Yes' : 'No'; ?></td>
                                                        <td><?php
                                                            if ($issue->approval_status == 2) {
                                                                echo 'Accepted';
                                                            } elseif ($issue->approval_status == 3) {
                                                                echo 'Canceled';
                                                            } elseif ($issue->approval_status == 1) {
                                                                echo 'Pending';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>

                <!--                                                <tr style="font-weight: bold">
                                                                    <td>Total :</td>
                                                                    <td><?php echo $sum_total_amount; ?></td>
                                                                    <td></td>


                                                                </tr>-->
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
<?php } ?>
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