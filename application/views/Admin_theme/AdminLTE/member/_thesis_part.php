<?php if(isset($thesis_id)){ 
                             foreach($thesis_id as $thesis_info){
                             $book_title =  $thesis_info->book_title;
                             $publish_year = $thesis_info->yearofaward;
                             $page = $thesis_info->totalpages;
                             $Address = $thesis_info->address;
                             $Abstract =  $thesis_info->abstract;
                             $book_category = $thesis_info->Category;
                             $department  = $thesis_info->department;
                             $bookid = $thesis_info->Thesisid;
                             $book_cover = $thesis_info->Banner;
                             $file_link = $thesis_info->Ebook;
                             
                            }                                               
                            
                            ?>
                        <div class="box box-body">
                            <h3 class="page-header">Thesis Details</h3>
                            <h4 class="callout callout-info btn-flat text-center"><strong><?=$book_title?></strong></h4>
                            <div class="col-md-8">
                                <div class="flip_overlay" style="display: block;">                      
                                    <i class="fa fa-list-ol"></i>&nbsp; <strong> Thesis Category :</strong> <?=$book_category?><br>
                                    <i class="fa fa-list-ol"></i>&nbsp; <strong> Department :</strong> <?=$department?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Title :</strong> <?=$book_title?><br>
                                    <i class="fa fa-user"></i>&nbsp; <strong>Author :</strong>

                                    <?php

                                     foreach($thesis_id as $thesis_info){
                                     echo  " $thesis_info->AuthorFirstName  $thesis_info->AuthorMiddleName  $thesis_info->AuthorLastName  ,";                             
                                     }
                                    ?>         
                                    <br>
                                    <i class="fa fa-map"></i>&nbsp; <strong>Address  :</strong> <?=$Address?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Page :</strong> <?=$page?><br>
                                    <i class="fa fa-book"></i>&nbsp; <strong>Year of Award  :</strong> <?=$publish_year?><br>
                                    <i class="fa fa-pencil"></i>&nbsp; <strong> Abstract  :</strong> <?=$Abstract?>&nbsp;                      
                                </div>
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
                                                             //echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block')); 
                                                             
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
                                        <input type="hidden" value="thesis" name="type"/>
                                        <input type="submit"  class="btn btn-danger btn-flat btn-block" name="btn" value="Lend"/>
                                    
                                    </form>
                                </div>
                               
                            </div>
                            
                           
                            
                        </div>
                        
                        <?php } ?>
                    