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
                <div style="background:#3399FF;margin-bottom:0px;margin-top:20px;padding-left:15px;padding-top:15px;" class="col-xs-12  col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                    <h3 style="margin-top:0px !important;color:white"><i class="fa fa-search"></i> Member Search Panel</h3>
                </div>
                <div class="col-xs-12  col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" style="margin-top:0px;background-color:#EEE;padding:10px;">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <i class="fa fa-5x fa-user" style="margin-top:20px;color:#3399FF;"></i>    
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <form class="form" role="form" action="http://lms.xeroneit.net/admin/add_circulation_action" method="post" style="padding-left:15px;">
                            <input id="member_id" name="member_id" class="form-control" placeholder="Member ID/Name" type="text">

                            <div id="suggestion_div_for_member"></div>

                            <button type="submit" class="btn btn-primary btn-md" style="margin-top:10px;width:120px;background-color:#3399FF !important;color:white !important;">Search</button>
                        </form>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>

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
                        <?php foreach ($get_issue_book as $issue){ ?>
                        <tr id="tr_379" class="display_row">
                            <td><?php echo $issue->BookId;?></td>
                            <td><?php echo date('Y-m-d',strtotime($issue->IssueDate));?></td>
                            <td><?php echo date('Y-m-d',strtotime($issue->ExpiryDate));?></td>
                            <td><?php echo $issue->Fine;?></td>
                            <td><a id="return_379" class="btn btn-warning return"><i class="fa fa-reply"></i> Return
                                </a></td></tr>
                        <?php }?>
                    </tbody></table> 

                <br>
                <button type="button" class="btn btn-warning btn-lg" id="new_issue_btn" data-toggle="modal" data-target="#myModal" style="display:block"> New Issue</button>
            </div>
        </div>

    </section>
    <!-- /.content -->

    <!--modal for issue-->


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">New Issue</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Book ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="book" placeholder="Book Id" type="text">
                            <div id="book_list"></div>
                            <!--search result-->
                            <div id="book_preview" class="text-center" style="margin-top: 20px;">
                                <form action="<?php echo site_url('circulation/new_issue');?>" method="post">
                                    <div style="margin-bottom:5px;">
                                        <input type="hidden" id="id" name="BookId" />
                                        <input id="new_issue_submit" name="btn" class="btn btn-success btn-lg" data-dismiss="modal" value="Issue" style="display:bock;" type="submit">
                                    </div>
                                    <div id="banner">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>
<style type="text/css">
    .list_unlist{
        text-decoration: none;
        list-style: none;
        margin-top: 10px;
    }
</style>

<script type="text/javascript">
    $('#book_preview').hide();
//    book search 

    $('#book').keyup(function () {
        var book = $('#book').val();
//        alert(book);
        if (book != '') {
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/circulation/get_book_info',
                data: {'bookInfo': book},
                dataType: 'text',
                type: 'POST',
                success: function (data) {
//                    alert(data);
                    $('#book_list').fadeIn();
                    $('#book_list').html(data);
                    if(data == ''){
                        $('#book_list').html("No Books Available");
                    }
                }
            });
        }
    });

    $(document).on('click', 'option', function () {
        $('#book').val($(this).text());
        $('#book_list').fadeOut();
        var bookId = $(this).val();
        if (bookId != '') {
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/circulation/get_book_info_after_search',
                data: {'bookId': bookId},
                dataType: 'text',
                type: 'POST',
                success: function (data) {
                    $('#book_preview').show();
                    var bookList = $.parseJSON(data);
                    $.each(bookList, function (i, bookname) {
                        var banner = '<img class="img img-thumbnail" id="book_cover_preview" style="width:175px; height:275px;" src="<?php echo base_url(); ?>assets/uploads/files/' + bookname['BookBanner'] + '">';
                        $('#banner').html(banner);
                        $('#id').val(bookname['BookId']);
                    });
                }
            });
        }
    });

</script>