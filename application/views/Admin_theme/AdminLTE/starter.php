<?php include_once 'header.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $Title; ?>
            <small>LMS <?= $Title; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>
    <?php if($_SESSION['user_type'] != 3) { ?>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="text-center"><h2 style="font-weight:900;">Overall Resources</h2></div>


                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?= $short_report['book'] ?></h3>

                            <p>Total Number Of Book Item</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                        <a target="_blank" href="<?= site_url('book') ?>" class="small-box-footer">
                            More Information <i class="fa fa-arrow-circle-right"></i>
                        </a>

                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?= $short_report['journal'] ?></h3>

                            <p>Total Number Of Journal Item</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a target="_blank" href="<?= site_url('journal') ?>" class="small-box-footer">
                            More Information <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $short_report['report'] ?></h3>

                            <p>Total  Number Of Report Item</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a target="_blank" href="<?= site_url('report') ?>" class="small-box-footer">
                            More Information <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?= $short_report['thesis'] ?></h3>

                            <p>Total  Number Of Thesis Paper Item</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a target="_blank" href="<?= site_url('thesis') ?>" class="small-box-footer">
                            More Information <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="box">
            <div class="box-body row">
                <div class="col-xs-12">
                    <!--total issued-->
                    <div class="row">
                        <div class="text-center"><h2 style="font-weight:900;">Total Issued + Expired But Not Returned</h2></div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?= $short_report['total_issued_book'] ?></h3>

                                    <p>Book</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>

                                <a target="_blank" href="<?= site_url('circulation/issuetable') ?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>

                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3><?= $short_report['total_issued_journal'] ?></h3>

                                    <p>Journal </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a target="_blank" href="<?= site_url('circulation/issuetable') ?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $short_report['total_issued_report'] ?></h3>

                                    <p>Report </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a target="_blank" href="<?= site_url('circulation/issuetable') ?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= $short_report['total_issued_thesis'] ?></h3>

                                    <p> Thesis </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a target="_blank" href="<?= site_url('circulation/issuetable') ?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                    <!--total rejected-->
                    <div class="row">
                        <div class="text-center"><h2 style="font-weight:900;">Total Rejected Request</h2></div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?= $short_report['total_rejected_book'] ?></h3>

                                    <p>Book </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>

                                <a target="_blank" href="<?= site_url('circulation/issuetable') ?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>

                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $short_report['total_rejected_journal'] ?></h3>

                                    <p> Journal </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a target="_blank" href="<?= site_url('circulation/issuetable') ?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= $short_report['total_rejected_report'] ?></h3>

                                    <p> Report </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a target="_blank" href="<?= site_url('circulation/issuetable') ?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3><?= $short_report['total_rejected_thesis'] ?></h3>

                                    <p> Thesis </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a target="_blank" href="<?= site_url('circulation/issuetable') ?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- total report section -->
                    <div class="row">
                        <div class="text-center"><h2 style="font-weight:900;">Overall Report</h2></div>



                        <div class=" col-md-offset-2 col-xs-12 col-sm-12 col-md-4 col-lg-4">

                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?= $short_report['total_issued'] ?></h3>
                                    <p>Total Number of Issued</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-book"></i><i class="fa fa-mail-forward"></i>
                                </div>
                                <a target="_blank" href="<?=site_url('circulation/issuetable')?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

<!--                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

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
                        </div>-->


                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3><?= $short_report['rejected'] ?></h3>
                                    <p>Total Rejected request</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-book"></i>
                                </div>
                                <a target="_blank" href="<?=site_url('circulation/issuetable')?>" class="small-box-footer">
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
                                    <h3><?= $short_report['today_issued'] ?></h3>
                                    <p>Today's Total Issue</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-book"></i><i class="fa fa-mail-forward"></i>
                                </div>
                                <a target="_blank" href="<?=site_url('circulation/issuetable')?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-3 col-xs-12 col-sm-12 col-md-3 col-lg-3">

                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= $short_report['today_returned'] ?></h3>
                                    <p>Today's Total Return</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-book"></i><i class="fa fa-mail-reply"></i>
                                </div>
                                <a target="_blank" href="<?=site_url('circulation/issuetable')?>" class="small-box-footer">
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
                                    <p>This Month's Total Issue</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-book"></i><i class="fa fa-mail-forward"></i>
                                </div>
                                <a target="_blank" href="<?=site_url('circulation/issuetable')?>" class="small-box-footer">
                                    More Information <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-3 col-xs-12 col-sm-12 col-md-3 col-lg-3">

                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>31</h3>
                                    <p>This Month's Total Return</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-book"></i><i class="fa fa-mail-reply"></i>
                                </div>
                                <a target="_blank" href="<?=site_url('circulation/issuetable')?>" class="small-box-footer">
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
    <?php } ?>
</div>
<!-- /.content-wrapper -->

<?php include_once 'footer.php'; ?>
