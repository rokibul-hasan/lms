 <?php if(isset($book_id)){ 
                             foreach($book_id as $book_info){
                             $book_title =  $book_info->book_title;
                              $book_publisher_name =  $book_info->PublisherName;
                             $publish_year = $book_info->YearOfPublication;
                             $page = $book_info->Pagination;
                             $isbn = $book_info->ISBN;
                             $edition =  $book_info->Edition;
                             $book_category = $book_info->Category;
                             $bookid = $book_info->BookId;
                             $book_cover = $book_info->Banner;
                             $file_link = $book_info->Ebook;
                             $id = $book_info->BookId;
                             
                             
                             
                            }                   
                           
                            
                            ?>
                        <div class="box box-body">
                            <h3 class="page-header">Book Details</h3>
                            <h4 class="callout callout-info btn-flat text-center"><strong><?=$book_title?></strong></h4>
                            <div class="col-md-5">
                                <div class="flip_overlay" style="display: block;">                      
                                    <i class="fa fa-list-ol"></i>&nbsp; <strong> Book Category :</strong> <?=$book_category?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Title :</strong> <?=$book_title?><br>
                                    <i class="fa fa-user"></i>&nbsp; <strong>Author :</strong>

                                    <?php

                                     foreach($book_id as $book_info){
                                     echo  " $book_info->AuthorFirstName  $book_info->AuthorMiddleName  $book_info->AuthorLastName  ,";                             
                                     }
                                    ?>         
                                    <br>
                                    <i class="fa fa-sort-numeric-asc"></i>&nbsp; <strong>ISBN :</strong><?=$isbn?><br>
                                    <i class="fa fa-folder-open"></i>&nbsp; <strong>Publisher  :</strong> <?=$book_publisher_name?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Page :</strong> <?=$page?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Year of Published  :</strong> <?=$publish_year?><br>
                                    <i class="fa fa-pencil"></i>&nbsp; <strong> Edition  :</strong> <?=$edition?>&nbsp;                      
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
                                    
                                         
                                    <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                      
                                                    <button type="button" class="btn btn-default pull-right " data-dismiss="modal" >Close</button>
                                                    
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
                                        <input type="hidden" value="book" name="type"/>
                                        <input type="submit"  class="btn btn-danger btn-flat btn-block" name="btn" value="Lend"/>
                                    
                                    </form>
                                </div>
                                
                                <div class="row">
                                    <div class="alert text-center">Total Read : 50</div>
                                </div>
                               
                            </div>
                            
                           
                            
                        </div>
                        
                        <?php } ?>
                       