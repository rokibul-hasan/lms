<?php include 'header.php';  ?>

        <div class="row">

            <div class="col-md-12">
                <div class="row margin-bottom">
                    <div class="book_section">
                        
                        
                        
                        
                        <div class="box-body" id="book_list"> 
                          <table id="example" class="table table-bordered table-hover">
                              <caption class="callout callout-success text-center">All Books</caption> 
                              <thead>
                            <tr>
                              <th>Book Details</th>
                            </tr>
                            </thead>
                           <tbody>

   <?php //echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block'));  ?>
 
        
                           
                        <?php if(isset($all_book)){ 
                            foreach($all_book as $book_list){ 
                                $book_cover = $book_list->Banner;                                
                                
                                   if(isset($book_cover) && !empty($book_cover)){
                                    
                                    $link = base_url('assets/uploads/files').'/'.$book_cover;
                                    
                                }else{
                                    
                                     $link = base_url('images/nocover.jpg');
                                }
                                
                                
                                
                                ?>
                            <tr>
                                
                                
                                <td >
                                    <span style="display:none"><?=$book_list->BookId;?></span>
                                    <div class="book_titl">
                                        <h5 class="text-center" style="font-size:10px"><?=$book_list->Title?></h5>
                                    </div>
                                    <div style="margin:0;padding:0;background-size: contain;background-repeat:no-repeat;background-position:center;background-image: url(<?php echo $link ?>) ">
                                        
                                        <div class="book_wrapper">
                                            
                                        </div>

                                     </div> 

                               </td>
                            </tr>
                          <?php  }
                        }
                        ?>
                             </tbody>
                          </table>   
                    </div>
                        
                       <div class="box-body" id="journal_list">
                          <table id="example1" class="table table-bordered table-hover">
                              <caption class="callout callout-info btn-flat text-center">All Journal</caption>
                              <thead>
                            <tr>
                              <th>Journal Details</th>
                            </tr>
                            </thead>
                           <tbody>

   <?php //echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block'));  ?>
 
        
                           
                        <?php if(isset($all_journal)){ 
                            foreach($all_journal as $journal_list){ 
                                $book_cover = $journal_list->Banner;                                
                                
                                   if(isset($book_cover) && !empty($book_cover)){
                                    
                                    $link = base_url('assets/uploads/files').'/'.$book_cover;
                                    
                                }else{
                                    
                                     $link = base_url('images/nocover.jpg');
                                }
                                
                                ?>
                            <tr>
                                
                                <td >
                                    <span style="display:none"><?=$journal_list->JournalId;?></span>
                                    <div class="book_titl">
                                        <h5 class="text-center" style="font-size:10px"><?=$journal_list->Title?></h5>
                                    </div>
                                    <div style="margin:0;padding:0;background-size: contain;background-repeat:no-repeat;background-position:center;background-image: url(<?php echo $link ?>) ">
                                        
                                        <div class="book_wrapper">
                                            
                                        </div>

                                     </div> 

                               </td>
                            </tr>
                          <?php  }
                        }
                        ?>
                             </tbody>
                          </table>   
                    </div>

                        
                         <div class="box-body" id="report_list">
                          <table id="example2" class="table table-bordered table-hover">
                              <caption class="callout callout-success btn-flat text-center">All Report</caption>
                              <thead>
                            <tr>
                              <th>Report Details</th> 
                            </tr>
                            </thead>
                           <tbody>

   <?php //echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block'));  ?>
 
        
                           
                        <?php if(isset($all_report)){ 
                            foreach($all_report as $report_list){ 
                                
                                $book_cover = $report_list->Banner;                                
                                
                                   if(isset($book_cover) && !empty($book_cover)){
                                    
                                    $link = base_url('assets/uploads/files').'/'.$book_cover;
                                    
                                }else{
                                    
                                     $link = base_url('images/nocover.jpg');
                                }
                                
                                ?>
                            <tr>
                                <td >
                                    <span style="display:none"><?=$report_list->ReportId;?></span>
                                    <div class="book_titl">
                                        <h5 class="text-center" style="font-size:10px"><?=$report_list->Title?></h5>
                                    </div>
                                    <div style="margin:0;padding:0;background-size: contain;background-repeat:no-repeat;background-position:center;background-image: url(<?php echo $link ?>) ">
                                        
                                        <div class="book_wrapper">
                                            
                                        </div>

                                     </div> 

                               </td>
                            </tr>
                          <?php  }
                        }
                        ?>
                             </tbody>
                          </table>   
                    </div>

                        
                        <div class="box-body" id="thesis_list">
                          <table id="example3" class="table table-bordered table-hover">
                              <caption class="callout callout-danger btn-flat text-center">All Thesis</caption>
                              <thead>
                            <tr>
                              <th>Journal Details</th>
                            </tr>
                            </thead>
                           <tbody>

   <?php //echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block'));  ?>
 
        
                           
                        <?php if(isset($all_thesis)){ 
                            foreach($all_thesis as $thesis_list){ 
                                
                                $book_cover = $thesis_list->Banner;                                
                                
                                   if(isset($book_cover) && !empty($book_cover)){
                                    
                                    $link = base_url('assets/uploads/files').'/'.$book_cover;
                                    
                                }else{
                                    
                                     $link = base_url('images/nocover.jpg');
                                }
                                ?>
                            <tr>
                                <td >
                                    <span style="display:none"><?=$thesis_list->Thesisid;?></span>
                                    <div class="book_titl">
                                        <h5 class="text-center" style="font-size:10px"><?=$thesis_list->Title?></h5>
                                    </div>
                                    <div style="margin:0;padding:0;background-size: contain;background-repeat:no-repeat;background-position:center;background-image: url(<?php echo $link ?>) ">
                                        
                                        <div class="book_wrapper">
                                            
                                        </div>

                                     </div> 

                               </td>
                            </tr>
                          <?php  }
                        }
                        ?>
                             </tbody>
                          </table>   
                    </div>

                        
                </div>
            </div>
        </div>
    </div>

<?php   include 'footer.php';  ?>

<style type="text/css">
    tr {
    width: 20%;
    float: left;
    margin-bottom: 15px;
}


td{
    height: 200px;
    width:190px;
    display: block;
    margin: 0 auto!important;
}
thead {
    display: none;
}
tr{
    margin-bottom:15px;
}

.book_wrapper {
/*    background-color: rgba(0,0,0,.5);*/
    width: 100%;
    height: 150px;
    margin-top: -10px;
    padding: 0;
}

.book_wrapper:hover {
/*    background-color: rgba(0,0,0,.9);*/
    color: #fff;
}
.book_wrapper h5 {
    padding: 10px;
    color: #ddd;
}


</style>

<script>
  $(function () {

         $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering":  false,
      "info": true,
      "autoWidth": false,
      
    });
    
        $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
    
        $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
    
    $('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  });
</script>

