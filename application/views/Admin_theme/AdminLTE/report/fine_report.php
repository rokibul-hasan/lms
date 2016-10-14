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
        <div class="box">
            <div class="box-header">
                <?php
                $attributes = array(
                    'class' => 'form-horizontal',
                    'name' => 'form',
                    'method' => 'get');
                echo form_open('', $attributes)
                ?>
<!--                <div class="row col-md-offset-2">
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
                </div>-->

                <?= form_close(); ?>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Fine</th>
                                <!--<th>Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
//                            print_r($get_fine_report);exit();
                            foreach ($get_fine_report as $reports) { ?>
                                <tr>
                                    <td><?php echo $reports['name'] ?></td>
                                    <td><?php echo $reports['email'] ?></td>
                                    <td><?php echo $reports['fine'] ?></td>
                                    <!--<td><a href="" id="details"  type="button"  data-toggle="modal" data-target="#myModal"class="btn btn-info"><i class="fa fa-search"></i><input type="text"  value="<?php echo $reports['user_id']; ?>"/></a></td>-->
                                </tr>
                            
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Issued Book</h4>
            </div>
            <div class="modal-body">
                <div id="issued"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





<?php include_once __DIR__ . '/../footer.php'; ?>
<script type="text/javascript">
    $('.datatable').DataTable({
        bFilter: false,
        "order": [[1, "desc"]]
    });

    $('#details').click(function () {
        var id = $('#details').val();
        alert(id);
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/admin_report/user_details',
            data: {'user_id': id},
            dataType: 'text',
            type: 'POST',
            success: function(data){
                
                var bookList = $.parseJSON(data);
                    var title = '<ul>';
                    $.each(bookList, function (i, bookname) {
                        title += '<li>'+bookname['Title']+'</li>';
                        $('#issued').html(title);
                    });
                    title += '</ul>';
            }
        });
    });
</script>
