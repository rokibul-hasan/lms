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
            <li class="active"><?= $Title ?> </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">

                    <div class="box-body">
                        <form class="form-horizontal" action="<?php echo site_url('circulation/new_issue'); ?>" method="post">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-2 control-label">User</label>
                                <div class="col-md-10">
                                    <?php
                                    $username = $this->session->userdata('username');
                                    $user_id = $this->session->userdata('user_id');
                                    $user_type = $this->session->userdata('user_type');
                                    if ($user_type == '1') {
                                        ?>
                                        <select class="form-control  select2" name="UserId" id="select2">
                                            <option value="blank">Select User</option>
                                            <?php foreach ($get_users as $user) { ?>
                                                <option value="<?php echo $user->id; ?>"><?php echo $user->username; ?></option>                                                
                                            <?php } ?>
                                        </select>
                                        <?php
                                    } else {
                                        echo $username;
                                        ?>
                                        <input type="hidden" name="UserId" value="<?php echo $user_id; ?>" />
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-2 control-label">Resource Type</label>
                                <div class="col-md-10">
                                    <select class="form-control  select2" name="type" id="option">
                                        <option value="blank">Select Type</option>
                                        <option value="book">Book</option>
                                        <option value="journel">Journal</option>
                                        <option value="report">Report</option>
                                        <option value="thesis">Thesis</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-2 col-sm-2 control-label">Search</label>
                                <div class="col-md-10 col-sm-10">
                                    <input class="form-control" id="book" placeholder="Type Id / Title / Accession Number" type="text" autocomplete="off" required="">
                                    <div id="book_list"></div>
                                    <!--search result-->
                                    <div id="book_preview" class="text-center" style="margin-top: 20px;">
                                        <div style="margin-bottom:5px;">
                                            <input type="hidden" id="id" name="Id" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="banner">
                            </div>
                            <div id="failure"></div>
                            <input id="new_issue_submit" name="btn" class="btn btn-success btn-lg pull-right" data-dismiss="modal" value="Issue" style="display:bock;" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>
<style type="text/css">
    td{
        background: #777777;
        color:#fff;
        font-weight: bold;
    }
    td:hover{
        background: #fff;
        color:#000;
        font-weight: bold;
        cursor:pointer;
    }
</style>

<script type="text/javascript">
    $('#book_preview').hide();
    $('#option').change(function () {
        $('#book').val('');
        $('#banner').hide();
        $(".loding").show();
        $(".loding").fadeOut(2000);
    });
    
    $('#new_issue_submit').click(function () {
            if (document.getElementsByName('UserId')[0].value == 'blank') {
                alert('Please Select User !');
                return false;
            }
            if (document.getElementsByName('type')[0].value == 'blank') {
                alert('Please Select Resource Type !');
                return false;
            }
        });
    
//    book search 

    $('#book').keyup(function () {
        var book = $('#book').val();
        var option = $('#option').val();
//        alert(option);
        if (book != '') {
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/circulation/get_book_info',
                data: {'bookInfo': book, 'option': option},
                dataType: 'text',
                type: 'POST',
                cache: false,
                success: function (data) {
//                    alert(data);
                    $('#book_list').fadeIn();
                    $('#book_list').html(data);
                    if (data == '') {
                        $('#book_list').html('<span class="bg-red">No Books Available</span>');                        
                    }
                },
                error: function () {
                    $('#book_list').html('<span class="bg-red">No Books Available</span>');
                }
            });
        }
    });

    $(document).on('click', 'option', function () {
        $('#book').val($(this).text());
        $('#book_list').fadeOut();
        var bookId = $(this).val();
        var name = $("#type").attr("name");
        if (bookId != '') {
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/circulation/get_book_info_after_search',
                data: {'bookId': bookId, 'typeName': name},
                dataType: 'text',
                type: 'POST',
                success: function (data) {
                    if(data =='[]'){
                        $('#failure').html('<h2 class="text-center">No items Exist</h2>');
                        $('#new_issue_submit').hide();
                    }
//                    console.log(data);
//                    alert(data);
                    $('#banner').show();
                    var bookList = $.parseJSON(data);
//                    alert(bookList.max_issue);
                    var totalIssue = bookList.max_issue;
                    $.each(bookList.get_resource_info, function (i, bookname) {
                        
                        var banner = '<div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Title</label><div class="col-sm-10"><span><b>' + bookname['Title'] + '</b></span></div></div>';                                                
                        if (name == 'book') {
                            var remainCopy = bookname['BookCopyStatus'] - totalIssue;
                            if(remainCopy < 0){ remainCopy = 0;}
                            banner+='<div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Total Number of Copy Remaining</label><div class="col-sm-10"><span><b>' + remainCopy + '</b></span></div></div>';
                            $('#id').val(bookname['BookId']);
                        } else if (name == 'journel') {
                            var remainCopy = bookname['JournalCopyStatus'] - totalIssue;
                            if(remainCopy < 0){ remainCopy = 0;}
                            banner+='<div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Total Number of Copy Remaining</label><div class="col-sm-10"><span><b>' + remainCopy + '</b></span></div></div>';
                            $('#id').val(bookname['JournalId']);
                        } else if (name == 'report') {
                            var remainCopy = bookname['ReportCopyStatus'] - totalIssue;
                            if(remainCopy < 0){ remainCopy = 0;}
                            banner+='<div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Total Number of Copy Remaining</label><div class="col-sm-10"><span><b>' + remainCopy + '</b></span></div></div>';
                            $('#id').val(bookname['ReportId']);
                        } else if (name == 'thesis') {
                            var remainCopy = bookname['ThesisCopyStatus'] - totalIssue;
                            if(remainCopy < 0){ remainCopy = 0;}
                            banner+='<div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Total Number of Copy Remaining</label><div class="col-sm-10"><span><b>' + remainCopy + '</b></span></div></div>';
                            $('#id').val(bookname['Thesisid']);
                        }
                        if (bookname['Banner'] == '') {
                            banner += '<div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Banner</label><div class="col-sm-10"><img class="img img-thumbnail" id="book_cover_preview" style="width:175px; height:275px;" src="<?php echo base_url(); ?>assets/uploads/files/default.jpg"></div></div>';
                        } else {
                            banner += '<div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Banner</label><div class="col-sm-10"><img class="img img-thumbnail" id="book_cover_preview" style="width:175px; height:275px;" src="<?php echo base_url(); ?>assets/uploads/files/' + bookname['Banner'] + '"></div></div>';
                        }
                        $('#banner').html(banner);
                    });
                }
            });
        }
    });

</script>