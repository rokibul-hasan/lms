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
                    <div class="box-header">
                        <?php
                        $attributes = array(
                            // 'class' => 'form-horizontal',
                            'name' => 'form',
                            'method' => 'get');
                        echo form_open('', $attributes)
                        ?>
                        <div class="row">
                            <div class="col-md-5 ">
                                <div class="form-group ">
                                    <label>Member Name:</label>
                                    <div>
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
                            <div class="col-md-5 ">
                                <div class="form-group ">
                                    <label>Payment:</label>
                                    <div >
                                        <select name="payment" id="" class="form-control select2">
                                            <option value="1">Paid</option>
                                            <option value="0">Unpaid</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-top: 23px;">
                                <button type="submit" name="btn_submit" value="true" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                <?= anchor(current_url() . '', '<i class="fa fa-refresh"></i>', ' class="btn btn-success"') ?>
                            </div>
                        </div>

                        <?= form_close(); ?>
                    </div>
                    <div class="box-body">
        <!--                <a href="<?php echo site_url('circulation/book_issue'); ?>" class="btn btn-warning"><i class="fa fa-mail-forward"></i> Issue </a>
                        <a href="<?php echo site_url('circulation/book_return'); ?>" class="btn btn-danger"><i class="fa  fa-mail-reply"></i> Return</a>-->
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
                                        <th>Fine</th>
                                        <th>Fine Payment</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
//                                     echo '<pre>';   print_r($fine_calculation[0]);exit();
                                    foreach ($fine_calculation as $fine) {
//                            foreach ($fine as $cal)
//                            echo '<pre>';   print_r($fine['Title']);exit();
                                        ?>
                                        <tr>

                                            <td><?php echo $fine['Title']; ?></td>
                                            <td><?php echo $fine['username']; ?></td>
                                            <td><?php echo $fine['Fine']; ?></td>
                                            <td><?php
                                                if (!empty($fine['Find_paid'])) {
                                                    echo '<span class="bg-green">Paid</span>';
                                                } elseif (empty($fine['Fine'])) {
                                                    echo '<span class="bg-purple">No Fine</span>';
                                                } else {
                                                    ?> 
                                                    <form class="formforstatus" method="post" action="<?php echo site_url('circulation/issue_approval'); ?>">
                    <!--                                           <input type="hidden" name="amount_transaction" value="<?php echo $row->amount; ?>">
                                                           <input type="hidden" name="account_number" value="<?php echo $row->id_bank_account; ?>"/>
                                                           <input type="hidden" name="transaction_type" value="<?php echo $row->id_trnsaction_type; ?>"/>-->

                                                        <input type="hidden" name="IssueReturnId" value="<?php echo $fine['IssueReturnId']; ?>">
                                                        paid <input type="radio" name="payment" value="<?php echo $fine['Fine']; ?>" >
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

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>
<style type="text/css">
    .bg-green,.bg-red,.bg-purple{
        padding: 5px 10px;
        border-radius: 15px;
    }
</style>
<script type="text/javascript">
    setTimeout(function () {
        $('#message').fadeOut();
    }, 1000);

    $('.save_status').click(function (ev) {
        var form = $(this).parents('form:first');
        $.ajax({
            url: "<?php echo site_url('circulation/fine_payment'); ?>",
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
        "order": [[1, "desc"]]
    });




</script>