<?php
if (isset($report_list)) {
    ?>
    <div style="width:90%;margin:0 auto;overflow-x:scroll">
        <?php
        if (empty($report_list)) {
            echo '<h2 class="text-center">No Records Found</h2>';
        } else {
            ?>
        <input class="only_print pull-right btn btn-primary" style="margin-bottom: 10px;" type="button"  onClick="window.print()"  value="Print"/>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="list"  class="table table-bordered table-responsive table-striped list">
                            <thead>
                                <tr>
                                    <th>Report ID</th>
                                    <th>Report Title</th>
                                    <!--<th>Keywords</th>-->
                                    <th>Year of Publication</th>
                        <!--            <th>Place of Publication</th>-->
                                    <th>Organization Name</th>
                                    <th class="only_print">Action</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($report_list as $report_info) {
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td>{$report_info->ReportId}</td>";
                                echo "<td>{$report_info->Title}</td>";
//            echo "<td>{$journal_info->BookKeywords}</td>";
                                echo "<td>{$report_info->Year}</td>";
//            echo "<td>{$book_info->PlaceOfPublication}</td>";
                                echo "<td>{$report_info->Organization}</td>";
                                echo '<td class="only_print"><form action="' . site_url('userdashboard') . '" method="post">';
                                echo '<button type="submit" value="Details" name="btn_report_search" class="btn btn-sm btn-primary">Details</button>';
                                echo '<input type="hidden"  name="ReportId" value="' . $report_info->ReportId . '" />';
                                echo '</form></td>';
                                echo "</tr>";
                                echo "</tbody>";
                            }
                            ?>
                        </table>     
                    </div>
                </div>
        <?php }
        ?>

    </div>
    <?php
}
if (isset($reportd_id)) {
    foreach ($reportd_id as $report_info) {
        $book_title = $report_info->book_title;
        $Organization = $report_info->Organization;
        $publish_year = $report_info->Year;
        $page = $report_info->Pagination;
        $address = $report_info->Address;
        $book_category = $report_info->Category;
        $bookid = $report_info->ID;
        $book_cover = $report_info->Banner;
        $file_link = $report_info->Ebook;
        $Abstract = $report_info->Abstract;
        $remaining_copy = $report_info->ReportCopyStatus - $max_issue ;
        if($remaining_copy < 0){$remaining_copy = 0;} 
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <h3 class="page-header">Report Details</h3>
                <h4 class="callout callout-info btn-flat text-center"><strong><?= $book_title ?></strong></h4>
                <div class="col-md-5">
                    <div class="flip_overlay" style="display: block;">                      
                        <i class="fa fa-list-ol"></i>&nbsp; <strong> Report Category :</strong> <?= $book_category ?><br>
                        <i class="fa fa-book"></i>&nbsp; <strong>Title :</strong> <?= $book_title ?><br>
                        <i class="fa fa-university"></i>&nbsp; <strong>Organization :</strong><?= $Organization ?><br>
                        <i class="fa fa-book"></i>&nbsp; <strong>Page :</strong> <?= $page ?><br>
                        <i class="fa fa-book"></i>&nbsp; <strong>Year of Published  :</strong> <?= $publish_year ?><br>
                        <i class="fa fa-map"></i>&nbsp; <strong> Address  :</strong> <?= $address ?><br>
                        <i class="fa fa-book"></i>&nbsp;<strong>Abstract :</strong><?= $Abstract ?><br />
                        <i class="fa fa-hourglass-end"></i>&nbsp;<strong>Total Number of Copy Remaining : </strong><?= $remaining_copy ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php
                    if (isset($book_cover) && !empty($book_cover)) {

                        echo img(array('src' => 'assets/uploads/files/' . $book_cover, 'class' => 'img-responsive'));
                    } else {

                        echo img(array('src' => 'images/nocover.jpg', 'class' => 'img-responsive center-block'));
                    }
                    ?>
                </div>
                <div class="col-md-4">

                    <div class="row">
                        <button type="button" class="btn btn-primary btn-flat btn-block read_now" data-toggle="modal" data-target="#myModal">
                            Read Now
                        </button>
                        <input type="hidden" value="report" id="type">
                        <input type="hidden" value="<?= $bookid ?>" id="id">

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title"><?= $book_title ?></h4>
                                    </div>

                                    <div class="modal-body">
                                        <?php if (isset($file_link) && !empty($file_link)) {
                                            ?>
                                            <iframe src="http://docs.google.com/gview?url=<?= base_url('asset/ebook/' . $file_link . '') ?>&embedded=true" style="width:100%; height:600px;" frameborder="0"></iframe>

                                            <?php
                                        } else {
                                            echo '<br><h2 class="text-center text-danger">Book Not Available</h2>';
                                        }
                                        ?>


                                    </div>
                                    <div class="modal-footer">
                                        <?php if (isset($file_link) && !empty($file_link)) { ?>
                                            <a href="<?= base_url('asset/ebook/' . $file_link . '') ?>" id="download"  target="blank"class="pull-left"><i class="fa fa-download text-info"></i> Download The Book</a>
                                            <?php
                                        } else {
                                            echo '<p class="text-dengar pull-left">File not available</p>';
                                        }
                                        ?>
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
                            <input type="hidden" value="<?= $bookid; ?>" name="Id" />
                            <input type="hidden" value="<?= $user_id; ?>" name="UserId" />
                            <input type="hidden" value="report" name="type"/>
                            <input type="submit"  class="btn btn-danger btn-flat btn-block" id="lend" name="btn" value="Borrow"/>

                        </form>
                    </div>

                </div>



            </div>
        </div>
        </div>


    <?php } ?>