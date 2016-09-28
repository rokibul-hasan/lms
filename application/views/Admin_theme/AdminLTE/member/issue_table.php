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

        <?php
//                       echo $glosary->output;                          
        ?>
        <div class="box">
<!--            <div class="box-header">
                 <?php
                $attributes = array(
                    'class' => 'form-horizontal',
                    'name' => 'form',
                    'method' => 'get');
                echo form_open('', $attributes)
                ?>
                <div class="row col-md-offset-2">
                    <div class="col-md-8 ">
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
                    <div class="col-md-4">
                        <button type="submit" name="btn_submit" value="true" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <?= anchor(current_url() . '', '<i class="fa fa-refresh"></i>', ' class="btn btn-success"') ?>
                    </div>
                </div>

                <?= form_close(); ?>
            </div>-->
            <div class="box-body">
                
                <?php
                $message = $this->session->userdata('message');
                if (isset($message)) {
                    echo $message;
                }
                $this->session->unset_userdata('message');
                ?>
                <table class="table table-bordered table-striped datatable" id="usertable">
                    <thead>
                        <tr>
                            <th style="display:none"></th>
                            <th>Title</th>
                            <th>Member Name</th>
                            <th>Type</th>
                            <th>Issue Date</th>
                            <th>Expiry Date</th>
                            <th>Return Date</th>
                            <th>Fine/Penalty-BDT</th>
                            <th>Is Returned</th>
                            <th>Approval Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i=1;  foreach ($issue_info as $issue) { ?>
                            <tr>
                                <td style="display:none;"><?php echo $i ?></td>
                                <td><?php echo $issue->Title; ?></td>
                                <td><?php echo $issue->username; ?></td>
                                <td style="text-transform: uppercase;"><?php echo $issue->type; ?></td>
                                <td><?php echo $issue->IssueDate; ?></td>
                                <td><?php echo $issue->ExpiryDate; ?></td>
                                <td><?php echo $issue->ReturnDate; ?></td>
                                <td><?php echo $issue->Fine; ?></td>
                                <td><?php echo ($issue->ReturnOrNot == 1) ? '<span class="bg-green">Yes</span>' : '<span class="bg-red">No</span>'; ?></td>
                                <td><?php
                                    if ($issue->approval_status == 2) {
                                        echo '<span class="btn bg-green">Approved</span>';
                                    } elseif ($issue->approval_status == 3) {
                                        echo '<span class="btn bg-red">Rejected</span>';
                                    } else {
                                        echo '<span class="btn bg-yellow">Pending</span>';
                                        }   ?>
                                </td>
                            </tr>
<?php  $i++; }  ?>
                    </tbody>

                </table>
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
</style>
<script type="text/javascript">


    $('.datatable').DataTable({
        bFilter: false,
        "ordering": true,
        //"order": [[1, "desc"]]
    });




</script>