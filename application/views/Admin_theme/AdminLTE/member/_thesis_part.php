<?php
if (isset($thesis_list)) {
    ?>
    <div style="width:90%;margin:0 auto;overflow-x:scroll">
        <?php
        if (empty($thesis_list)) {
            echo '<h2 class="text-center">No Records Found</h2>';
        } else {
            ?>
        <input class="only_print pull-right btn btn-primary" style="margin-bottom: 10px;" type="button"  onClick="window.print()"  value="Print"/>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                <th>Journal ID</th>
                                <th>Journal Title</th>
                                <!--<th>Keywords</th>-->
                                <th>Year of Publication</th>
                    <!--            <th>Place of Publication</th>-->
                                <th>Department</th>
                                <th class="only_print">Action</th>
                            </tr>
                            <?php
                            foreach ($thesis_list as $thesis_info) {
                                echo "<tr>";
                                echo "<td>{$thesis_info->Thesisid}</td>";
                                echo "<td>{$thesis_info->Title}</td>";
//            echo "<td>{$journal_info->BookKeywords}</td>";
                                echo "<td>{$thesis_info->yearofaward}</td>";
//            echo "<td>{$book_info->PlaceOfPublication}</td>";
                                echo "<td>{$thesis_info->department}</td>";
                                echo '<td class="only_print"><form action="' . site_url('userdashboard') . '" method="post">';
                                echo '<button type="submit" value="Details"  name="btn_thesis_search" class="btn btn-sm btn-primary">Details</button>';
                                echo '<input type="hidden"  name="thesisid" value="' . $thesis_info->Thesisid . '" />';
                                echo '</form></td>';
                                echo "</tr>";
                            }
                            ?>
                        </table>     
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>
    <?php
}if (isset($thesis_id)) {
    foreach ($thesis_id as $thesis_info) {
        $book_title = $thesis_info->book_title;
        $publish_year = $thesis_info->yearofaward;
        $page = $thesis_info->totalpages;
        $Address = $thesis_info->address;
        $Abstract = $thesis_info->abstract;
        $book_category = $thesis_info->Category;
        $department = $thesis_info->department;
        $bookid = $thesis_info->ID;
        $book_cover = $thesis_info->Banner;
        $file_link = $thesis_info->Ebook;
        $remaining_copy = $thesis_info->ThesisCopyStatus - $max_issue ;
        if($remaining_copy < 0){$remaining_copy = 0;} 
    }
    ?>
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <h3 class="page-header">Thesis Details</h3>
                    <h4 class="callout callout-info btn-flat text-center"><strong><?= $book_title ?></strong></h4>
                    <div class="col-md-8">
                        <div class="flip_overlay" style="display: block;">                      
                            <i class="fa fa-list-ol"></i>&nbsp; <strong> Thesis Category :</strong> <?= $book_category ?><br>
                            <i class="fa fa-list-ol"></i>&nbsp; <strong> Department :</strong> <?= $department ?><br>
                            <i class="fa fa-book"></i>&nbsp; <strong>Title :</strong> <?= $book_title ?><br>
                            <i class="fa fa-user"></i>&nbsp; <strong>Author :</strong>

                            <?php
                            foreach ($thesis_id as $thesis_info) {
                                echo " $thesis_info->AuthorFirstName  $thesis_info->AuthorMiddleName  $thesis_info->AuthorLastName  ,";
                            }
                            ?>         
                            <br>
                            <i class="fa fa-map"></i>&nbsp; <strong>Address  :</strong> <?= $Address ?><br>
                            <i class="fa fa-book"></i>&nbsp; <strong>Page :</strong> <?= $page ?><br>
                            <i class="fa fa-book"></i>&nbsp; <strong>Year of Award  :</strong> <?= $publish_year ?><br>
                            <i class="fa fa-hourglass-end"></i>&nbsp;<strong>Total Number of Copy Remaining : </strong><?= $remaining_copy ?> <br />
                            <i class="fa fa-pencil"></i>&nbsp; <strong> Abstract  :</strong> <?= $Abstract ?>&nbsp;                      
                        </div>
                    </div>


                    <div class="col-md-4">

                        <div class="row">
                            <button type="button" class="btn btn-primary btn-flat btn-block read_now" data-toggle="modal" data-target="#myModal">
                                Read Now
                            </button>
                            <input type="hidden" value="thesis" id="type">
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
                                                <a href="<?= base_url('asset/ebook/' . $file_link . '') ?>"  id="download"  target="blank"class="pull-left"><i class="fa fa-download text-info"></i> Download The Book</a>
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
                                <input type="hidden" value="thesis" name="type"/>
                                <input type="submit"  class="btn btn-danger btn-flat btn-block" id="lend" name="btn" value="Borrow"/>

                            </form>
                        </div>

                    </div>



                </div>
            </div>
        </div>

<?php } ?>
                    