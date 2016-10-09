<?php include_once 'header.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $Title ?>
            <small><?= $Title ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <?php if (isset($Section)) { ?>
                <li class="active"><?= $Section ?></li>
            <?php } ?>
            <li class="active"><?= $Title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Top Read</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Book Name</th>
                                    <th>Total Read</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($get_top_read as $read) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $read->Title; ?></td>
                                        <td><?php echo $read->TotalRead; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <hr />
                    <hr />
                    <hr />
                    <div class="col-md-12">
                        <h2>Top Issued</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Book Name</th>
                                    <th>Total Issued</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($get_top_issue as $read) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $read->Title; ?></td>
                                        <td><?php echo $read->TotalIssue; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <hr />
                    <div class="col-md-12">
                        <h2>Top Download</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Book Name</th>
                                    <th>Total Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($get_top_download as $read) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $read->Title; ?></td>
                                        <td><?php echo $read->TotalDownload; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'footer.php'; ?>
