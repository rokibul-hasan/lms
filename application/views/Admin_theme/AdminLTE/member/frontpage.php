<?php include 'header.php';  ?>

 <body class="hold-transition skin-blue sidebar-mini">
     <div class="container" style="margin-bottom: 100px">
        
        <div class="row">
            <div class="jumbotron">
                <h1 class="text-center">welcome to library management system</h1>
                <p class="text-center">...</p>
                <p class="text-center"><a class=" btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
          </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <aside>
                    <div class="box box-info">
                        <h4 class="page-header text-center">User Area</h4>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">User Login</a></li>
                              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">User Registration</a></li>
                                </ul>
                             
                             
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                <form class="form-horizontal">
                                    <div class="box-body">
                                      <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label text-left">Email</label>

                                        <div class="col-sm-9">
                                          <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label  text-left">Password</label>

                                        <div class="col-sm-9">
                                          <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox"> Remember me
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">

                                      <button type="submit" class="btn btn-info pull-right">Sign in</button>
                                    </div>
                                    <!-- /.box-footer -->
                                  </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                  
                  <form class="form-horizontal">
                                    <div class="box-body">
                                      <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                          <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                                        <div class="col-sm-10">
                                          <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox"> Remember me
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">

                                      <button type="submit" class="btn btn-info pull-right">Sign in</button>
                                    </div>
                                    <!-- /.box-footer -->
                                  </form>
                
              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
                            
                        



                          </div>
                    <div class="col-md-12">
                        
                       <ul class="sidebar-menu nav nav-pills nav-stacked">
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