<?php
if (isset($report_list)) {
    ?>
<div style="width:90%;margin:0 auto;overflow-x:scroll">
<table class="table table-bordered table-responsive table-striped">
        <tr>
            <th>Book ID</th>
            <th>Book Title</th>
            <th>Keywords</th>
            <th>Year of Publication</th>
<!--            <th>Place of Publication</th>-->
            <th>Publisher Name</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($report_list as $book_info) {
            echo "<tr>";
            echo "<td>{$book_info->reportid}</td>";
            echo "<td>{$book_info->book_title}</td>";
            echo "<td>{$book_info->BookKeywords}</td>";
            echo "<td>{$book_info->YearOfPublication}</td>";
//            echo "<td>{$book_info->PlaceOfPublication}</td>";
            echo "<td>{$book_info->PublisherName}</td>";
            echo '<td><form action="'.site_url('userdashboard').'" method="post">';
            echo '<input type="submit" value="Details" name="btn_book_search" class="btn btn-primary">';
            echo '<input type="hidden"  name="bookid" value="'.$book_info->BookId.'" />';
            echo '</form></td>';
            echo "</tr>";
        }
        ?>
    </table>
</div>
    <?php
}
if(isset($reportd_id)){ 
                             foreach($reportd_id as $report_info){
                             $book_title =  $report_info->book_title;
                              $Organization =  $report_info->Organization;
                             $publish_year = $report_info->Year;
                             $page = $report_info->Pagination;
                             $address =  $report_info->Address;
                             $book_category = $report_info->Category;
                             $bookid = $report_info->ReportId;
                             $book_cover = $report_info->Banner;
                             $file_link = $report_info->Ebook;
                             $Abstract = $report_info->Abstract;
                             
                            }                   
                            
                            
                            ?>
                        <div class="box box-body">
                            <h3 class="page-header">Report Details</h3>
                            <h4 class="callout callout-info btn-flat text-center"><strong><?=$book_title?></strong></h4>
                            <div class="col-md-5">
                                <div class="flip_overlay" style="display: block;">                      
                                    <i class="fa fa-list-ol"></i>&nbsp; <strong> Report Category :</strong> <?=$book_category?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Title :</strong> <?=$book_title?><br>
                                    <i class="fa fa-university"></i>&nbsp; <strong>Organization :</strong><?=$Organization?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Page :</strong> <?=$page?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Year of Published  :</strong> <?=$publish_year?><br>
                                    <i class="fa fa-map"></i>&nbsp; <strong> Address  :</strong> <?=$address?><br>
                                     <i class="fa fa-book"></i>&nbsp;<strong>Abstract :</strong><?=$Abstract?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <?php if(isset($book_cover) && !empty($book_cover)){
                                    
                                    echo img(array('src'=>'assets/uploads/files/'.$book_cover ,'class' => 'img-responsive')); 
                                    
                                }else{
                                    
                                     echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block')); 
                                }
                                ?>
                            </div>
                            <div class="col-md-4">
                                
                                <div class="row">
                                    <button type="button" class="btn btn-primary btn-flat btn-block read_now" data-toggle="modal" data-target="#myModal">
                                       Read Now
                                      </button>
                                    <input type="hidden" value="report" id="type">
                <input type="hidden" value="<?= $bookid ?>" id="id">
                                         
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">×</span></button>
                                                      <h4 class="modal-title"><?=$book_title?></h4>
                                                  </div>
                                                  
                                                      <div class="modal-body">
                                                    <?php if (isset($file_link) && !empty($file_link)) {
                                                        ?>
                                                                    <iframe src="http://docs.google.com/gview?url=<?= base_url('asset/ebook/' . $file_link . '') ?>&embedded=true" style="width:100%; height:600px;" frameborder="0"></iframe>

                                                                    <?php
                                                                    } else {
                                                                        echo '<br><h2 class="text-center text-danger">Book Not Available</h2>';
                                                                    }
                                                                    ?>


                                                                </div>
                                                                <div class="modal-footer">
                                <?php if (isset($file_link) && !empty($file_link)) {              ?>
                                <a href="<?= base_url('asset/ebook/' . $file_link . '') ?>" id="download"  target="blank"class="pull-left"><i class="fa fa-download text-info"></i> Download The Book</a>
                                <?php }else{ echo '<p class="text-dengar pull-left">File not available</p>'; } ?>
                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                                    
                                                  </div>
                                                </div>
                                                <!-- /.modal-content -->
                                              </div>
                                              <!-- /.modal-dialog -->
                                            </div>

                                </div><br>
                                <div class="row">
                                    <form class="form-horizontal" action="<?php echo site_url('circulation/new_issue'); ?>" method="post">
                                        <input type="hidden" value="<?=$bookid;?>" name="Id" />
                                        <input type="hidden" value="<?=$user_id;?>" name="UserId" />
                                        <input type="hidden" value="report" name="type"/>
                                        <input type="submit"  class="btn btn-danger btn-flat btn-block" id="lend" name="btn" value="Lend"/>
                                    
                                    </form>
                                </div>
                               
                            </div>
                            
                           
                            
                        </div>
                        
                        <?php } ?>