<?php include_once 'header.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$Title;?>
        <small>LMS <?=$Title;?></small>
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
                
                
                <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3><?=$short_report['book']?></h3>

                    <p>Total Number Of Books</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                   
                    <a target="_blank" href="<?=site_url('book')?>" class="small-box-footer">
                            More Information <i class="fa fa-arrow-circle-right"></i>
                    </a>
                  
                </div>
              </div>
                
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                      <div class="inner">
                        <h3><?=$short_report['journal']?></h3>

                        <p>Total Journal's</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a target="_blank" href="<?=site_url('journal')?>" class="small-box-footer">
                            More Information <i class="fa fa-arrow-circle-right"></i>
                    </a>
                    </div>
                  </div>
                
                <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?=$short_report['report']?></h3>

                    <p>Total  Number Of Report's</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a target="_blank" href="<?=site_url('report')?>" class="small-box-footer">
                            More Information <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
              </div>
                
                <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3><?=$short_report['thesis']?></h3>

                    <p>Total  Number Of Thesis Paper</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                 <a target="_blank" href="<?=site_url('thesis')?>" class="small-box-footer">
                            More Information <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
              </div>
                
            </div>
                </div>
        
        <div class="box">
                <div class="box-body row">
			<div class="col-xs-12">

				<div class="row">
					<div class="text-center"><h2 style="font-weight:900;">Total Issued Books + Expired But Not Returned Books</h2></div>
					<div id="div_for_circle_chart"><svg height="342" version="1.1" width="1193" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#0b62a4" d="M596.5,282.5A109,109,0,0,0,705.0157867549872,163.23725061466706" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#0b62a4" stroke="#ffffff" d="M596.5,285.5A112,112,0,0,0,708.0024597849409,162.9547896224102L754.2958917492244,158.57664424242873A158.5,158.5,0,0,1,596.5,332Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#3980b5" d="M705.0157867549872,163.23725061466706A109,109,0,1,0,596.4657566406393,282.49999462106564" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#3980b5" stroke="#ffffff" d="M708.0024597849409,162.9547896224102A112,112,0,1,0,596.4648141628587,285.4999944730216L596.4486349609589,336.9999919315985A163.5,163.5,0,1,1,759.2736801324808,158.1058759220006Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="596.5" y="163.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: 800; font-stretch: normal; font-size: 15px; line-height: normal; font-family: Arial;" font-size="15px" font-weight="800" transform="matrix(1.9432,0,0,1.9432,-562.5894,-164.5841)" stroke-width="0.5146215596330275"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="6">Total Issued</tspan></text><text x="596.5" y="183.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: Arial;" font-size="14px" transform="matrix(2.2708,0,0,2.2708,-758.0521,-223.0313)" stroke-width="0.4403669724770642"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="5"><?=$short_report['total_issued']?></tspan></text></svg></div>
				</div>

				<!-- total report section -->
				<div class="row">
					<div class="text-center"><h2 style="font-weight:900;">Overall Report</h2></div>

					

					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

						<div class="small-box bg-yellow">
							<div class="inner">
								<h3><?=$short_report['total_issued']?></h3>
								<p>Total Number of Issued</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i><i class="fa fa-mail-forward"></i>
							</div>
							<a target="_blank" href="#" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

						<div class="small-box bg-aqua">
							<div class="inner">
								<h3>91</h3>
								<p>Total Number of Members</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<a target="_blank" href="#" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
                                        
                                        
                                                                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

						<div class="small-box bg-blue">
							<div class="inner">
								<h3><?=$short_report['rejected']?></h3>
								<p>Total Rejected request</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<a target="_blank" href="#" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>

				</div>
				

				<!-- end of total report section -->

				<!-- Todays report section -->
				<div class="row">
					<div class="text-center"><h2 style="font-weight:900;">Today's Report</h2></div>
<!--					<div class="col-xs-12 col-sm-12 col-md-3 col-xs-12 col-sm-12 col-md-3 col-lg-3">

						<div class="small-box bg-blue">
							<div class="inner">
								<h3>0</h3>
								<p>Today's Added Books</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<a target="_blank" href="#" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>-->

					<div class="col-md-offset-3 col-xs-12 col-sm-12 col-md-3 col-xs-12 col-sm-12 col-md-3 col-lg-3">

						<div class="small-box bg-yellow">
							<div class="inner">
								<h3><?=$short_report['today_issued']?></h3>
								<p>Today's Issued Books</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i><i class="fa fa-mail-forward"></i>
							</div>
							<a target="_blank" href="http://lms.xeroneit.net/admin/circulation" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-3 col-xs-12 col-sm-12 col-md-3 col-lg-3">

						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><?=$short_report['today_returned']?></h3>
								<p>Today's Returned Books</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i><i class="fa fa-mail-reply"></i>
							</div>
							<a target="_blank" href="http://lms.xeroneit.net/admin/circulation" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>

<!--					<div class="col-xs-12 col-sm-12 col-md-3 col-xs-12 col-sm-12 col-md-3 col-lg-3">

						<div class="small-box bg-orange">
							<div class="inner">
								<h3>0</h3>
								<p>Today's Added Members</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<a target="_blank" href="http://lms.xeroneit.net/admin/config_member" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>-->
				</div>
				
				<!--end of Todays report section -->

				<!-- monthly report section -->
				<div class="row">
					<div class="text-center"><h2 style="font-weight:900;">Current Month's Report</h2></div>
<!--					<div class="col-xs-12 col-sm-12 col-md-3 col-xs-12 col-sm-12 col-md-3 col-lg-3">

						<div class="small-box bg-blue">
							<div class="inner">
								<h3>8924</h3>
								<p>This month's Added Book</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<a target="_blank" href="http://lms.xeroneit.net/admin/book_list" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>-->

					<div class="col-md-offset-3 col-xs-12 col-sm-12 col-md-3 col-xs-12 col-sm-12 col-md-3 col-lg-3">

						<div class="small-box bg-yellow">
							<div class="inner">
								<h3>24</h3>
								<p>This Month's Issued Book</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i><i class="fa fa-mail-forward"></i>
							</div>
							<a target="_blank" href="http://lms.xeroneit.net/admin/circulation" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-3 col-xs-12 col-sm-12 col-md-3 col-lg-3">

						<div class="small-box bg-aqua">
							<div class="inner">
								<h3>31</h3>
								<p>This Month's Returned Book</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i><i class="fa fa-mail-reply"></i>
							</div>
							<a target="_blank" href="http://lms.xeroneit.net/admin/circulation" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>

<!--					<div class="col-xs-12 col-sm-12 col-md-3 col-xs-12 col-sm-12 col-md-3 col-lg-3">

						<div class="small-box bg-orange">
							<div class="inner">
								<h3>91</h3>
								<p>This Month's Added Member</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<a target="_blank" href="http://lms.xeroneit.net/admin/config_member" class="small-box-footer">
								More Information <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>-->
				</div>
				


			</div>
		</div>
                

                
                
         </div>
        

      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'footer.php'; ?>
