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

        <?php
//                       echo $glosary->output;                          
        ?>
        <div class="box">
            <div class="box-header">

            </div>
            <div class="box-body">
                <a href="<?php echo site_url('circulation/book_issue'); ?>" class="btn btn-warning"><i class="fa fa-mail-forward"></i> Issue </a>
                <a href="<?php echo site_url('circulation/book_return'); ?>" class="btn btn-danger"><i class="fa  fa-mail-reply"></i> Return</a>
                <?php
                    $message = $this->session->userdata('message');
                    if(isset($message)){
                        echo $message;
                    }
                    $this->session->unset_userdata('message');
                ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Member Name</th>
                            <th>Title</th>
                            <th>Issue Date</th>
                            <th>Expiry Date</th>
                            <th>Return Date</th>
                            <th>Fine/Penalty-BDT</th>
                            <th>Is Returned</th>
                            <th>Approval Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($issue_info as $issue) { ?>
                            <tr>
                                <td><?php echo $issue->Title; ?></td>
                                <td><?php echo $issue->username; ?></td>
                                <td><?php echo $issue->Title; ?></td>
                                <td><?php echo $issue->IssueDate; ?></td>
                                <td><?php echo $issue->ExpiryDate; ?></td>
                                <td><?php echo $issue->ReturnDate; ?></td>
                                <td><?php echo $issue->Fine; ?></td>
                                <td><?php echo ($issue->ReturnOrNot == 1) ? '<span class="bg-green">Yes</span>' : '<span class="bg-red">No</span>'; ?></td>
                                <td><?php if($issue->approval_status==2){echo '<span class="bg-green">Accepted</span>'; }
                                      elseif($issue->approval_status==3){echo '<span class="bg-red">Canceled</span>'; }
                                      else{ ?> 
                                    <form class="formforstatus" method="post" action="<?php echo site_url('circulation/issue_approval');?>">
<!--                                           <input type="hidden" name="amount_transaction" value="<?php echo $row->amount; ?>">
                                           <input type="hidden" name="account_number" value="<?php echo $row->id_bank_account; ?>"/>
                                           <input type="hidden" name="transaction_type" value="<?php echo $row->id_trnsaction_type; ?>"/>-->
                                           
                                           <input type="hidden" name="IssueReturnId" value="<?php echo $issue->IssueReturnId; ?>">
                                           Accepted <input type="radio" name="approval_status" value="2" <?php if($issue->approval_status==2){echo 'checked';}?> >
                                           Canceled <input type="radio" name="approval_status" value="3"  <?php if($issue->approval_status==3){echo 'checked';}?>>
                                           Pending <input type="radio" name="approval_status" value="1"  <?php if($issue->approval_status==1){echo 'checked';}?>>
                                           <a href="#"  class="btn btn-warning save_status">Update</a>
                                       </form>
                                      <?php }?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>
<style type="text/css">
    .bg-green,.bg-red{
        padding: 5px 10px;
        border-radius: 15px;
    }
</style>
<script type="text/javascript">
    setTimeout(function () {
        $('#message').fadeOut();
    }, 1000);

   $('.save_status').click(function(ev){
       var form = $(this).parents('form:first');
       $.ajax({
          url:"<?php echo site_url('circulation/issue_approval'); ?>",
          type:"POST",
           data : form.serialize(),
           dataType: "json",
            success: function(data) {
//                alert(data);
              form.html(data);
            },
            error: function(){
                  alert('Error on updateing call');
            }
        });
        
     ev.preventDefault();  
       //$(this).parent().html('updating...');

    
   }); 
    


    
</script>