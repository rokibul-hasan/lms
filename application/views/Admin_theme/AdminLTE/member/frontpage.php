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
            <div class="col-md-4">
                <aside>
                   <div class="box box-info">
                       
                                
                      
                   </div>
                    <div class="col-md-12">
                        
                       <ul class="sidebar-menu nav nav-pills nav-stacked">
                           <li class="active"><a href="http://lms.friendsitltd.com/lms/index.php/login" style="background:#3c8dbc"> <i class="fa fa-sign-in"></i> <span>Login Panel</span></a></li>
                         <li class="active"><a href="#"><i class="fa fa-tachometer"></i> <span>Book Category</span></a></li>
                         
                           <li class="">
                                    <a href="category.php?id_category=2" title="Well, reading books as a...">Book</a>
                                    </li> <li>
                                    <a href="category.php?id_category=3" title="Well, reading books as a...">Journal</a>
                                    </li> <li>
                                    <a href="category.php?id_category=4" title="For a long period of time...">Thesis</a>
                                    </li> <li>
                                    <a href="category.php?id_category=5" title="Well, reading books as a...">Report Paper</a>
                                    </li> 
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-md-8">
                <div class="row margin-bottom">
                    <div class="col-sm-6">
                        <?php echo img(array('src'=>'images/2-5-home.jpg' ,'class' => 'img-responsive')); ?>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                            <?php echo img(array('src'=>'images/3-9-home.jpg' ,'class' => 'img-responsive')); ?>
                          
                          <br>
                          <?php echo img(array('src'=>'images/4-13-home.jpg' ,'class' => 'img-responsive')); ?>
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <?php echo img(array('src'=>'images/5-17-home.jpg' ,'class' => 'img-responsive')); ?>
                          
                          <br>
                          <?php echo img(array('src'=>'images/6-21-home.jpg' ,'class' => 'img-responsive')); ?>
                          
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
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