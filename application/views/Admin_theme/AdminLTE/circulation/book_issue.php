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

            <div class="box-body">
                <form class="form-horizontal" action="<?php echo site_url('circulation/new_issue'); ?>" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">User</label>
                        <div class="col-sm-10">
                            <select class="form-control  select2" name="UserId" id="select2">
                                <option value="">Select User</option>
                                <?php foreach ($get_users as $user) { ?>
                                    <option value="<?php echo $user->id; ?>"><?php echo $user->username; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Book ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="book" placeholder="Book Id / Book Title" type="text">
                            <div id="book_list"></div>
                            <!--search result-->
                            <div id="book_preview" class="text-center" style="margin-top: 20px;">
                                <div style="margin-bottom:5px;">
                                    <input type="hidden" id="id" name="BookId" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="banner">
                    </div>
                    <input id="new_issue_submit" name="btn" class="btn btn-success btn-lg pull-right" data-dismiss="modal" value="Issue" style="display:bock;" type="submit">
                </form>
            </div>



















            <!--            <div class="box-header">
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
                        </div>-->
        </div>

        

    </section>
    <!-- /.content -->
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
                    if (data == '') {
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
                        var banner = '<div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Author Name</label><div class="col-sm-10"><span><b>' + bookname['AuthorCorporateName'] + '</b></span></div></div><div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Banner</label><div class="col-sm-10"><img class="img img-thumbnail" id="book_cover_preview" style="width:175px; height:275px;" src="<?php echo base_url(); ?>assets/uploads/files/' + bookname['BookBanner'] + '">  </div></div>';
                        $('#banner').html(banner);
                        $('#id').val(bookname['BookId']);
                    });
                }
            });
        }
    });

</script>