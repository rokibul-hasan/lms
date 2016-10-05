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

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table table-bordered table-stripped datatable">
                            <thead>
                                <tr>
                                    <td>Book Name</td>
                                    <td>ISBN</td>
                                    <td>Subtitle</td>
                                    <td>Number of Reading</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($get_daily_read_book as $read) { ?>
                                    <tr>
                                        <td><?php echo $read->Title; ?></td>
                                        <td><?php echo $read->ISBN; ?></td>
                                        <td><?php echo $read->Subtitle; ?></td>
                                        <td><?php echo $read->TotalRead; ?></td>
                                    </tr>
                                <?php } ?>
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

<script type="text/javascript">
    $('.datatable').DataTable({
        bFilter: false,
        "ordering": true,
        //"order": [[1, "desc"]]
    });
</script>
