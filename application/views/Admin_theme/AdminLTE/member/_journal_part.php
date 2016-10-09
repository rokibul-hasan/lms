 <?php if(isset($journal_id)){ 
                             foreach($journal_id as $journal_info){
                             $book_title =  $journal_info->journal_title;
                             $book_publisher_name =  $journal_info->PublisherName;
                             $publish_year = $journal_info->Year;
                             $article = $journal_info->NoOfArticles;
                             $page = $journal_info->Pagination;
                             $isbn = $journal_info->ISSN;
                             $volume =  $journal_info->Volume;
                             $book_category = $journal_info->Category;
                             $bookid = $journal_info->JournalId;
                             $book_cover = $journal_info->Banner;
                             $file_link = $journal_info->Ebook;
                             $Abstract = $journal_info->Abstract;
                             
                            }                   
                            
                            
                            ?>
                        <div class="box box-body">
                            <h3 class="page-header">Journal Details</h3>
                            <h4 class="callout callout-info btn-flat text-center"><strong><?=$book_title?></strong></h4>
                            <div class="col-md-5">
                                <div class="flip_overlay" style="display: block;">                      
                                    <i class="fa fa-list-ol"></i>&nbsp; <strong> Book Category :</strong> <?=$book_category?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Title :</strong> <?=$book_title?><br>
                                    <i class="fa fa-user"></i>&nbsp; <strong>Volume :</strong><?=$volume?> <br>
                                    <i class="fa fa-sort-numeric-asc"></i>&nbsp; <strong>ISSN :</strong><?=$isbn?><br>
                                    <i class="fa fa-folder-open"></i>&nbsp; <strong>Publisher  :</strong> <?=$book_publisher_name?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Page :</strong> <?=$page?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Year of Published  :</strong> <?=$publish_year?><br>
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
                                    <input type="hidden" value="journal" id="type">
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
                                <a href="<?= base_url('asset/ebook/' . $file_link . '') ?>" id="download" target="blank"class="pull-left"><i class="fa fa-download text-info"></i> Download The Book</a>
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
                                        <input type="hidden" value="journel" name="type"/>
                                        <input type="submit"  class="btn btn-danger btn-flat btn-block" id="lend" name="btn" value="Lend"/>
                                    
                                    </form>
                                </div>
                               
                            </div>
                            
                           
                            
                        </div>
                        
                        <?php } ?>
                       