<?php include_once 'header_user.php'; ?>



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
            <div class="col-md-3">
                <form action="" class="form" method="post">
                <div class="form-group">
                    <label for="">Book Name: </label>
                    <select name="bookid" id="" class="form-control select2">
                                    <option value="">Select Your Book</option>
                                    <?php
                                    foreach ($all_book as $book) {
                                        ?>
                                        <option value="<?php echo $book->BookId; ?>"><?php echo $book->Title; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                        
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_submit" value="Search" class="btn btn-primary pull-right"/>
                </div>
                    
                    </form>
            </div>
                    <div class="col-md-9">
                        <h3 class="page-header">Abstraction</h3>
                        <?php if(isset($book_id)){ 
                             foreach($book_id as $book_info){
                             $book_title =  $book_info->Title;
                              $book_publisher_name =  $book_info->PublisherName;
                             $publish_year = $book_info->YearOfPublication;
                             $page = $book_info->Pagination;
                             $isbn = $book_info->ISBN;
                             $edition =  $book_info->Edition;
                             
                            }                   
                            
                            
                            ?>
                        <div class="box box-body">
                            <h4 class=""><?=$book_title?></h4>
                            
                           <div class="flip_overlay" style="display: block;">                      
                           <i class="fa fa-list-ol"></i>&nbsp; <strong> Book Category :</strong> <br>
                           <i class="fa fa-book"></i>&nbsp; <strong>Title :</strong> <?=$book_title?><br>
                           <i class="fa fa-user"></i>&nbsp; <strong>Author :</strong>
                                    
                           <?php
                            
                            foreach($book_id as $book_info){
                            echo  " $book_info->AuthorFirstName  $book_info->AuthorMiddleName  $book_info->AuthorLastName  ";                             
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
