<?php include 'header.php';  ?>

 <body class="hold-transition skin-blue sidebar-mini">
     <div class="container" style="margin-bottom: 100px">
        
        <div class="row">
            <div class="page-header">
                <h1 class="text-center">SAARC Agricalture Center(SAC)</h1>
            </div>
           <div class="box-body">
               <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height:350px;overflow-y:hidden">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                 
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <?php echo img(array('src' => 'images/04.-Charter-Day-2015.jpg ' )); ?> 

                    <div class="carousel-caption">
                     
                    </div>
                  </div>
                  <div class="item">
                    <?php echo img(array('src' => 'images/07.-Charter-Day-2015.jpg ' )); ?> 

                    <div class="carousel-caption">
                      
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <aside>
                   <div class="box box-info">
                       
                                
                      
                   </div>
                    <div class="col-md-12">
                        
                       <ul class="sidebar-menu nav nav-pills nav-stacked">
                           <li class="active"><a href="http://lms.friendsitltd.com/lms/index.php/login" style="background:#3c8dbc"> <i class="fa fa-sign-in"></i> <span>Login Panel</span></a></li>
                         <li class="active"><a href="#"><i class="fa fa-tachometer"></i> <span>Book Category</span></a></li>
                         
                           <li class="">
                                    <a href="#books_list" title="Well, reading books as a...">Book</a>
                                    </li> <li>
                                    <a href="#journal_list" title="Well, reading books as a...">Journal</a>
                                    </li> <li>
                                    <a href="#thesis_list" title="For a long period of time...">Thesis</a>
                                    </li> <li>
                                    <a href="#report_list" title="Well, reading books as a...">Report Paper</a>
                                    </li> 
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-md-9">
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
                            foreach($all_book as $book_list){ ?>
                            <tr>
                                <td style="margin:0;padding:0; background-size:100% 100%;background-image: url(<?php echo base_url('images/nocover.jpg') ?>) ">
                                    
                                    <div class="book_wrapper">
                                            <h5 class="text-center"><?=$book_list->Title?></h5>
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
                            foreach($all_journal as $journal_list){ ?>
                            <tr>
                                <td style="margin:0;padding:0; background-size:100% 100%;background-image: url(<?php echo base_url('images/nocover.jpg') ?>) ">
                                    
                                    <div class="book_wrapper">
                                            <h5 class="text-center"><?=$journal_list->Title?></h5>
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
                          <table id="example1" class="table table-bordered table-hover">
                              <caption class="callout callout-info btn-flat text-center">All Report</caption>
                              <thead>
                            <tr>
                              <th>Report Details</th> 
                            </tr>
                            </thead>
                           <tbody>

   <?php //echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block'));  ?>
 
        
                           
                        <?php if(isset($all_report)){ 
                            foreach($all_report as $report_list){ ?>
                            <tr>
                                <td style="margin:0;padding:0; background-size:100% 100%;background-image: url(<?php echo base_url('images/nocover.jpg') ?>) ">
                                    
                                    <div class="book_wrapper">
                                            <h5 class="text-center"><?=$report_list->Title?></h5>
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
                          <table id="example1" class="table table-bordered table-hover">
                              <caption class="callout callout-info btn-flat text-center">All Thesis</caption>
                              <thead>
                            <tr>
                              <th>Journal Details</th>
                            </tr>
                            </thead>
                           <tbody>

   <?php //echo img(array('src'=>'images/nocover.jpg' ,'class' => 'img-responsive center-block'));  ?>
 
        
                           
                        <?php if(isset($all_thesis)){ 
                            foreach($all_thesis as $thesis_list){ ?>
                            <tr>
                                <td style="margin:0;padding:0; background-size:100% 100%;background-image: url(<?php echo base_url('images/nocover.jpg') ?>) ">
                                    
                                    <div class="book_wrapper">
                                            <h5 class="text-center"><?=$thesis_list->Title?></h5>
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
     <div class="footer">
         <nav class="navbar navbar-fixed-bottom navbar-inverse">
        <div class="container">
         <p class="text-center text-aqua">All Rights Reserved.Developed By Friends IT </p>
        </div>
      </nav>
     </div>

</body>

<?php   include 'footer.php';  ?>

<style type="text/css">
    tr {
    width: 20%;
    float: left;
}
td{
    height: 200px;
    width:170px;
}
thead {
    display: none;
}

.book_wrapper {
    background-color: rgba(0,0,0,.5);
    width: 100%;
    height: 100%;
    margin-top: -10px;
    padding: 0;
}

.book_wrapper:hover {
    background-color: rgba(0,0,0,.9);
    color: #fff;
}
.book_wrapper h5 {
    padding: 10px;
    color: #ddd;
}
</style>

<script>
  $(function () {

     $("#example1").DataTable();
    $('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

