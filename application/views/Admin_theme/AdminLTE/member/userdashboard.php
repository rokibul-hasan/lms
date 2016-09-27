<?php include_once 'header_user.php';
 $user_id = $_SESSION['user_id'];

?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
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
            <div class="col-md-3 ">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Select Type: </label>
                        <select  id="select_type_for_reservation" class="form-control select2">
                            <option value="">Select Type</option>
                            <option value="books_form">Books</option>
                            <option value="journals_form">Journals</option>
                            <option value="reports_form">Reports</option>
                            <option value="thesis_form">Thesis</option>
                        </select>

                    </div>
            </div>
                <div class="col-md-12">
                    <form action="" class="form" method="post" id="books_form" style="display: none">
                        <div class="form-group">
                            <label for="">Book Name: </label>
                            <select name="bookid" id="" class="form-control select2">
                                            <option value="">Select Your Book</option>
                                            <?php
                                            foreach ($all_book as $book) {
                                                ?>
                                                <option value="<?php echo $book->BookId; ?>"><?php echo $book->BookId.'-'.$book->Title; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn_book" value="Search" class="btn btn-primary btn-flat "/>
                        </div>

                      </form>
                </div>
                   <!-------------------------------------------- 
   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\BOOK SEARCH///////////////////////////////////////////////////////////
   ---------------------------------------->
                
                <div class="col-md-12">
                    <form action="" class="form" method="post" id="thesis_form" style="display: none">
                        <div class="form-group">
                            <label for="">Thesis Name: </label> 
                            <select name="thesisid" id="" class="form-control select2">
                                            <option value="">Select Your Thesis</option>
                                            <?php
                                            foreach ($all_thesis as $thesis) {
                                                ?>
                                                <option value="<?php echo $thesis->Thesisid; ?>"><?php echo $thesis->Thesisid.'-'.$thesis->Title; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn_thesis" value="Search" class="btn btn-primary btn-flat "/>
                        </div>

                      </form>
                </div>
                   <!-------------------------------------------- 
   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\THESIS SEARCH///////////////////////////////////////////////////////////
   ---------------------------------------->
                
                <div class="col-md-12">
                    <form action="" class="form" method="post" id="journals_form" style="display: none">
                        <div class="form-group">
                            <label for="">Journal Name: </label>
                            <select name="bookid" id="" class="form-control select2">
                                            <option value="">Select Your Journal</option>
                                            <?php
                                            foreach ($all_journal as $journal) {
                                                ?>
                                                <option value="<?php echo $journal->JournalId; ?>"><?php echo $journal->JournalId.'-'. $journal->Title; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn_journal" value="Search" class="btn btn-primary btn-flat "/>
                        </div>

                      </form>
                </div>
                   <!-------------------------------------------- 
   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\JOURNAL SEARCH///////////////////////////////////////////////////////////
   ---------------------------------------->
                
                <div class="col-md-12">
                    <form action="" class="form" method="post" id="reports_form" style="display: none">
                        <div class="form-group">
                            <label for="">Report Name: </label>
                            <select name="reportid" id="" class="form-control select2">
                                            <option value="">Select Your Report</option>
                                            <?php
                                            foreach ($all_report as $report) {
                                                ?>
                                                <option value="<?php echo $report->ReportId; ?>"><?php echo $report->ReportId.'-'.$report->Title; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn_report" value="Search" class="btn btn-primary btn-flat "/>
                        </div>

                      </form>
                </div>
                   <!-------------------------------------------- 
   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\REPORT SEARCH ///////////////////////////////////////////////////////////
   ---------------------------------------->
                
            </div>
                    <div class="col-md-offset-1 col-md-8">
                        
                                    <!-------------------------------------------- 
   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\BOOK SECTION ///////////////////////////////////////////////////////////
   ---------------------------------------->       
                        
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
                                    <button type="button" class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#myModal">
                                        Red Now
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
                                                     <?php if(isset($book_cover)){
                                                            echo img(array('src'=>'$book_cover' ,'class' => 'img-responsive')); 
                                                        }else{
                                                             echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block')); 
                                                        }
                                                        ?>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <a style="font-size:3em" class="pull-left" href=""><i class="fa fa-download"></i></a>
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
                                        <input type="hidden" value="<?=$bookid;?>" name="BookId" />
                                        <input type="hidden" value="<?=$user_id;?>" name="UserId" />
                                        <input type="submit"  class="btn btn-danger btn-flat btn-block" name="btn" value="Lend"/>
                                    
                                    </form>
                                </div>
                               
                            </div>
                            
                           
                            
                        </div>
                        
                        <?php } ?>
                                    
                                                       <!-------------------------------------------- 
   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\JOURNAL SECTION ///////////////////////////////////////////////////////////
   ---------------------------------------->
                        
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
                                                  
                                </div>
                            </div>
                            <div class="col-md-3">
                                <?php if(isset($book_cover)){
                                    echo img(array('src'=>'$book_cover' ,'class' => 'img-responsive')); 
                                }else{
                                     echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block')); 
                                }
                                ?>
                            </div>
                            <div class="col-md-4">
                                
                                <div class="row">
                                    <button type="button" class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#myModal">
                                        Red Now
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
                                                     <?php if(isset($book_cover)){
                                                            echo img(array('src'=>'$book_cover' ,'class' => 'img-responsive')); 
                                                        }else{
                                                             echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block')); 
                                                        }
                                                        ?>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <a style="font-size:3em" class="pull-left" href=""><i class="fa fa-download"></i></a>
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
                                        <input type="hidden" value="<?=$bookid;?>" name="BookId" />
                                        <input type="hidden" value="<?=$user_id;?>" name="UserId" />
                                        <input type="submit"  class="btn btn-danger btn-flat btn-block" name="btn" value="Lend"/>
                                    
                                    </form>
                                </div>
                               
                            </div>
                            
                           
                            
                        </div>
                        
                        <?php } ?>
                        
                        
   <!-------------------------------------------- 
   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\REPORT SECTION///////////////////////////////////////////////////////////
   ---------------------------------------->
                        
                        <?php if(isset($reportd_id)){ 
                             foreach($reportd_id as $report_info){
                             $book_title =  $report_info->book_title;
                              $Organization =  $report_info->Organization;
                             $publish_year = $report_info->Year;
                             $page = $report_info->Pagination;
                             $address =  $report_info->Address;
                             $book_category = $report_info->Category;
                             
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
                                <?php if(isset($book_cover)){
                                    echo img(array('src'=>'$book_cover' ,'class' => 'img-responsive')); 
                                }else{
                                     echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block')); 
                                }
                                ?>
                            </div>
                            <div class="col-md-4">
                                
                                <div class="row">
                                    <button type="button" class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#myModal">
                                        Red Now
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
                                                     <?php if(isset($book_cover)){
                                                            echo img(array('src'=>'$book_cover' ,'class' => 'img-responsive')); 
                                                        }else{
                                                             echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block')); 
                                                        }
                                                        ?>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <a style="font-size:3em" class="pull-left" href=""><i class="fa fa-download"></i></a>
                                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                                    
                                                  </div>
                                                </div>
                                                <!-- /.modal-content -->
                                              </div>
                                              <!-- /.modal-dialog -->
                                            </div>

                                </div><br>
                                <div class="row">
                                    <a href="" class="btn btn-danger btn-flat btn-block">Lend</a>
                                </div>
                               
                            </div>
                            
                           
                            
                        </div>
                        
                        <?php } ?>
   
      <!-------------------------------------------- 
   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\THESIS SECTION///////////////////////////////////////////////////////////
   ---------------------------------------->
                        
                        <?php if(isset($thesis_id)){ 
                             foreach($thesis_id as $thesis_info){
                             $book_title =  $thesis_info->book_title;
                             $publish_year = $thesis_info->yearofaward;
                             $page = $thesis_info->totalpages;
                             $Address = $thesis_info->address;
                             $Abstract =  $thesis_info->abstract;
                             $book_category = $thesis_info->Category;
                             $department  = $thesis_info->department;                            
                             
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
                            <!--
                            <div class="col-md-3">
                                <?php if(isset($book_cover)){
                                    echo img(array('src'=>'$book_cover' ,'class' => 'img-responsive')); 
                                }else{
                                     echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block')); 
                                }
                                ?>
                            </div>
                            -->
                            <div class="col-md-4">
                                
                                <div class="row">
                                    <button type="button" class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#myModal">
                                        Red Now
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
                                                     <?php if(isset($book_cover)){
                                                            echo img(array('src'=>'$book_cover' ,'class' => 'img-responsive')); 
                                                        }else{
                                                             echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block')); 
                                                        }
                                                        ?>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <a style="font-size:3em" class="pull-left" href=""><i class="fa fa-download"></i></a>
                                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                                    
                                                  </div>
                                                </div>
                                                <!-- /.modal-content -->
                                              </div>
                                              <!-- /.modal-dialog -->
                                            </div>

                                </div><br>
                                <div class="row">
                                    <a href="" class="btn btn-danger btn-flat btn-block">Lend</a>
                                </div>
                               
                            </div>
                            
                           
                            
                        </div>
                        
                        <?php } ?>
                    
                    
                    
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
  </style>
  <script>
  
  $(document).ready(function(){
    $("#select_type_for_reservation").change(function(){
        if(this.value=='books_form'){
            $("#books_form").show();
        }else{
            $("#books_form").hide();
        }
        
         if(this.value=='journals_form'){
            $("#journals_form").show();
        }else{
            $("#journals_form").hide();
        }
        
        
         if(this.value=='reports_form'){
            $("#reports_form").show();
        }else{
            $("#reports_form").hide();
        }
        
         if(this.value=='thesis_form'){
            $("#thesis_form").show();
        }else{
            $("#thesis_form").hide();
        }
        
    });
        
});
  </script>