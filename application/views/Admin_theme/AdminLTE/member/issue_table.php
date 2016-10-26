<?php
include_once 'header_user.php';
if (isset($_GET['link']) && $_GET['link'] == 'pending_request') {
    $link = 'pending_request';
}else{
    $link = '';
}
?>


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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped datatable" id="usertable">
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
                                    $i = 1;
                                    foreach ($issue_info as $issue) {
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $issue->Title; ?></td>
                                            <td><?php echo $issue->username; ?></td>
                                            <td style="display:none;"><?php echo $issue->IssueReturnId; ?></td>
                                            <td style="text-transform: uppercase;"><?php echo $issue->type; ?></td>
                                            <td><?php echo $issue->IssueDate; ?></td>
                                            <td><?php echo $issue->ExpiryDate; ?></td>
                                            <!--<td><?php // echo $issue->BookCopyStatus;          ?></td>-->
                                            <td><?php echo $issue->ReturnDate; ?></td>
                                            <td><?php echo $issue->Fine; ?></td>
                                            <td><?php echo ($issue->ReturnOrNot == 1) ? '<span class="bg-green">Yes</span>' : '<span class="bg-red">No</span>'; ?></td>
                                            <td><?php
                                                if ($issue->approval_status == 2) {
                                                    echo '<span class="btn_custom bg-green">Accepted</span>';
                                                } elseif ($issue->approval_status == 3) {
                                                    echo '<span class="btn_custom bg-red">Canceled</span>';
                                                }elseif ($issue->approval_status == 1) {
                                                    echo '<span class="bg-yellow btn">Pending</span>';
                                                }
                                                ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
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

<?php include_once 'footer_user.php'; ?>


<style type="text/css">
    .bg-green,.bg-red{
        padding: 5px 10px;
        border-radius: 15px;
    }
</style>
<script type="text/javascript">
    var link = "<?php echo $link; ?>";
    
    if (link == 'pending_request') {
        //$('.datatable').DataTable();

        $('td>.btn_custom.bg-green').parent('td').parent('tr').hide();

        $('td>.btn_custom.bg-red').parent('td').parent('tr').hide();        
            
    }else{
        $('td>.bg-yellow.btn').parent('td').parent('tr').hide();  
        $('.datatable').DataTable({
            bFilter: false,
            "ordering": true
        });
        
    }
    
            
    





</script>