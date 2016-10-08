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
                <div class="box">
                    <div class="box-header">
                        <?php
                        $attributes = array(
                            'class' => 'form-horizontal',
                            'name' => 'form',
                            'method' => 'get');
                        echo form_open('', $attributes)
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Select Type:</label>
                                <select class="form-control  select2" name="type" id="option">
                                    <option value="">Select Type</option>
                                    <option value="book">Book</option>
                                    <option value="journel">Journal</option>
                                    <option value="report">Report</option>
                                    <option value="thesis">Thesis</option>

                                </select>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group ">
                                    <label>Search Item:</label>
                                    <div >
                                        <input type="" id="book" class="form-control"/>
                                        <div id="book_list"></div>
                                        <!--search result-->
                                        <div id="book_preview" class="text-center" style="margin-top: 20px;">
                                            <div style="margin-bottom:5px;">
                                                <input type="hidden" id="id" name="Id" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="col-md-4" style="margin-top: 25px;">
                                <button type="submit" name="btn_submit" value="true" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                <?= anchor(current_url() . '', '<i class="fa fa-refresh"></i>', ' class="btn btn-success"') ?>
                            </div>-->
                        </div> 
                    </div>
                    <div class="box-body">                        
                        <div id="banner">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-2 control-label">Title</label>
                                <div class="col-md-10">
                                    <span><b id="title"></b></span>
                                </div>
                            </div>
<!--                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-2 control-label">Subtitle</label>
                                <div class="col-md-10">
                                    <span><b id="Subtitle"></b></span>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-2 control-label">Total Read</label>
                                <div class="col-md-10">
                                    <span><b id="totalread"></b></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-2 control-label">Total Issue</label>
                                <div class="col-md-10">
                                    <span><b id="totalissue"></b></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-2 control-label">Total Download</label>
                                <div class="col-md-10">
                                    <span><b id="totaldownload"></b></span>
                                </div>
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
    $('#banner').hide();
    $('#option').change(function () {
        $('#book').val('');
        $('#banner').hide();
        $('#book_list').hide();
    });
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
                url: '<?php echo base_url(); ?>index.php/admin_report/get_book_info_after_search',
                data: {'bookId': bookId, 'typeName': name},
                dataType: 'text',
                type: 'POST',
                success: function (data) {

//                    alert(data);
                    $('#banner').show();
                    var bookList = $.parseJSON(data);
                    $.each(bookList, function (i, bookname) {
                        if (bookname == '') {
                            $('#banner').html('<h2>No Record Exist</h2>');
                        }
                        $('#title').html(bookname['Title']);
//                        $('#subtitle').html(bookname['SubTitle']);
                        $('#totalread').html(bookname['TotalRead']);
                        $('#totalissue').html(bookname['TotalIssue']);
                        $('#totaldownload').html(bookname['TotalDownload']);
                        
//                        $('#banner').html(banner);
                        if (name == 'book') {
                            $('#id').val(bookname['BookId']);
                        } else if (name == 'journel') {
                            $('#id').val(bookname['JournalId']);
                        } else if (name == 'report') {
                            $('#id').val(bookname['ReportId']);
                        } else if (name == 'thesis') {
                            $('#id').val(bookname['Thesisid']);
                        }
                    });
                }
            });
        }
    });
</script>