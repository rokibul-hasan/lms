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
            <div class="col-md-12 col-sm-12">

                <div class="box box-info custom_box">
                    <div class="box-header bg-green">
                        <h3 class="box-title">
                            <i class="fa fa-retweet"></i>          

                            Current Circulation - Member : Member        </h3>
                    </div>
                    <?php
                    $attributes = array(
//                        'class' => 'form-horizontal',
                        'name' => 'form',
                        'method' => 'get');
                    echo form_open('', $attributes)
                    ?>
                    <div class="box-header" style="margin: 20px 0;">
                        <div class="row">
                            <div class="col-md-4">
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
                            <div class="col-md-5">
                                <div class="form-group ">
                                    <label>Search with Date Range:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="date_range" value="<?= isset($date_range) ? $date_range : ''; ?>" class="form-control pull-right" id="reservation"  title="This is not a date"/>
                                    </div><!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top: 24px;">
                                <button type="submit" name="btn_submit" value="true" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                <?= anchor(current_url() . '', '<i class="fa fa-refresh"></i>', ' class="btn btn-success"') ?>
                            </div>
                        </div>
                    </div>
                    <?= form_close(); ?>

                    <div class="box-body table-responsive" id="display_div">

                        <table  class="table table-bordered  table-zebra table-hover table-stripped background_white datatable">
                            <thead> <tr>           

                                    <th>Title</th>
                                    <th>Member</th>
                                    <th style="display:none"></th>
                                    <th>Resource Type</th>                                    
                                    <th>Issue Date</th>
                                    <th>Expiry Date</th>           
                                    <th>Fine/Penalty - BDT</th>    
                                    <th>Return</th>  


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($get_issue_book as $issue) { ?>
                                    <tr id="tr_379" class="display_row">
                                        <td><?php echo $issue->Title; ?></td>
                                        <td><?php echo $issue->username; ?></td>
                                        <td style="display:none;"><?php echo $issue->IssueReturnId; ?></td>
                                        <td style="text-transform: uppercase;"><?php echo $issue->type; ?></td>
                                        <td><?php echo $issue->IssueDate; ?></td>
                                        <td><?php echo $issue->ExpiryDate; ?></td>
                                        <td><?php echo $issue->Fine; ?></td>
                                        <td><a href="<?php echo site_url('circulation/returned_book/' . $issue->BookId); ?>" onlclick="confirm()" class="btn btn-warning return"><i class="fa fa-reply"></i> Return
                                            </a></td></tr>
                                <?php } ?>
                            </tbody></table> 

                        <br>
                        <a href="<?php echo site_url('circulation/book_issue'); ?>" class="btn btn-warning btn-lg" id="new_issue_btn" ><i class="fa fa-plus"></i> New Issue</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>
<script type="text/javascript">
    $('.datatable').DataTable({
        bFilter: false,
        "order": [[2, "desc"]],
        "ordering": [true],
        "autoWidth": true,
    });
</script>
