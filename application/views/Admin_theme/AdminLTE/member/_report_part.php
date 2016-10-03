<?php if(isset($reportd_id)){ 
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
                                    <i class="fa fa-map"></i>&nbsp; <strong> Address  :</strong> <?=$address?>&nbsp;                      
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
                                    <button type="button" class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#myModal">
                                       Read Now
                                      </button>
                                    
                                         
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">×</span></button>
                                                      <h4 class="modal-title"><?=$book_title?></h4>
                                                  </div>
                                                  <div class="modal-body">
                                                     <?php if(isset($file_link) && !empty($file_link)){ 
                                                    
                                                        ?>
                                                            <object data="<?=base_url('asset/ebook/'.$file_link.'')?>" type="application/pdf" width="100%" height="600px">
                                                                <p>Alternative text - include a link <a href="<?=base_url('asset/ebook/'.$file_link.'')?>">to the PDF!</a></p>
                                                            </object>
                                                             
                                                       <?php }else{
                                                            // echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block')); 
                                                             
                                                              echo '<br><h2 class="text-center text-danger">Book Not Available</h2>';
                                                        }
                                                        ?>
                                                  </div>
                                                  <div class="modal-footer">
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
                                        <input type="submit"  class="btn btn-danger btn-flat btn-block" name="btn" value="Lend"/>
                                    
                                    </form>
                                </div>
                               
                            </div>
                            
                           
                            
                        </div>
                        
                        <?php } ?>