<?php
include_once 'header_user.php';
$user_id = $_SESSION['user_id'];
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
<?= $Title ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row">


                    <div class="col-lg-12 ">
                        

<?php include '_select_item.php'; ?>

                    </div>



                    <div class="pull-right col-lg-12">

                        <!-------------------------------------------- 
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\BOOK SECTION ///////////////////////////////////////////////////////////
---------------------------------------->       

<?php include '_book_part.php'; ?>    
                        <!-------------------------------------------- 
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\JOURNAL SECTION ///////////////////////////////////////////////////////////
---------------------------------------->

<?php include '_journal_part.php'; ?>

                        <!-------------------------------------------- 
                        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\REPORT SECTION///////////////////////////////////////////////////////////
                        ---------------------------------------->

<?php include '_report_part.php'; ?>

                        <!-------------------------------------------- 
                     \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\THESIS SECTION///////////////////////////////////////////////////////////
                     ---------------------------------------->

<?php include '_thesis_part.php'; ?>


                    </div>
                </div>


            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'footer_user.php'; ?>
<style>
    span.select2{
        width: 100%!important;
    }
    .modal-dialog{
        width:100%;
        height: 100vh;
    }
    td{
/*        background: #777777;*/
        color:#000;
        font-weight: bold;
    }
    td:hover{
        background: #fff;
        color:#000;
        font-weight: bold;
        cursor:pointer;
    }

</style>
<script>
    
    
    $(document).ready(function () {
        
        $(".loding").fadeOut("slow");

        $('.read_now').click(function () {
            var type = $('#type').val();
            var id = $('#id').val();
            // alert(id);
            <?php
                if(!empty($file_link)){
            ?>
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/count/count_read_book',
                data: {'type': type, 'id': id},
                //dataType: 'text',
                type: 'post'
            });
            <?php
                }
            ?>
        });
        $('#download').click(function () {
            var type = $('#type').val();
            var id = $('#id').val();
//             alert(id);
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/count/count_download_book',
                data: {'type': type, 'id': id},
                //dataType: 'text',
                type: 'post'

            });
        });
        
        

        
        $("#select_type_for_reservation").change(function () {
        
        $( ".type_form" ).submit();
        
//        
//            if (this.value == 'books_form') {
//                $("#books_form").show();
//            } else {
//                $("#books_form").hide();
//            }
//
//            if (this.value == 'journals_form') {
//                $("#journals_form").show();
//            } else {
//                $("#journals_form").hide();
//            }
//
//
//            if (this.value == 'reports_form') {
//                $("#reports_form").show();
//            } else {
//                $("#reports_form").hide();
//            }
//
//            if (this.value == 'thesis_form') {
//                $("#thesis_form").show();
//            } else {
//                $("#thesis_form").hide();
//            }

        });

    });
    $('.list').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#book').keyup(function () {
        var book = $('#book').val();
        var option = $('#select_type_for_reservation').val();
//        alert(option);
        if (book != '') {
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/userdashboard/get_book_info',
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
     
</script>