
<div class="col-md-4">
    <form action="" method="post" class="form-inline type_form">
        <div class="form-group col-md-12">
             <label for="" >Select Type Of Item: </label>
        </div>       
    <div class="form-group col-md-8">
        
        <select  id="select_type_for_reservation" class="form-control select2 " name="type_book">
            <option value="">Select Type</option>
            <option value="book">Books</option>
            <option value="journal">Journals</option>
            <option value="report">Reports</option>
            <option value="thesis">Thesis</option>
        </select>        
    </div>
  </form>
</div>

<?php if(isset($type_book)) { ?>

<div class="col-md-8">
    <form action="" class="form" method="post" id="books_form">
        
        <div class="form-group col-md-6">
            <label for="">Book Name: </label>
            <input type="text" name="book_name" class="form-control" placeholder="Title" />
        </div>
        <div class="form-group col-md-6">
            <div class="row">
             <label for="">Publisher: </label>
            <select name="publisher[]"class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select publisher" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <?php foreach ($all_publisher as $publisher) { ?>
                    <option value="<?php echo $publisher->PublisherId; ?>"><?php echo $publisher->PublisherName; ?></option>
                <?php } ?>
            </select> 
        </div>
        </div>
        <div class="form-group col-md-12">            
                      
            <label for="">Published Year: </label>
            <div class="row">
                <div class="col-md-6">
                    From:
                    <select name="from" id="" class="form-control select2">
                        <?php
                        $now = date('Y');
                        echo '<option value=""></option>';
                        for ($i = $now; $i > 1700; $i--) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    To:
                    <select name="to" id="" class="form-control select2">
                        <?php
                        $now = date('Y');
                        echo '<option value=""></option>';
                        for ($i = $now; $i > 1700; $i--) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="">keywords: </label>
            <select name="keywords[]"class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select keywords" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <option value="">Not Select</option>
                <?php
                $sql = "SELECT DISTINCT  `BookKeywords` FROM  `view_book_details`";
                $BookKeywords = $this->db->query($sql)->result();
//                print_r($BookKeywords);exit();
                foreach ($BookKeywords as $BookKeyword) {
                    $tmpBookKeywords = explode(',', $BookKeyword->BookKeywords);
                    foreach ($tmpBookKeywords as $tmpBookKeyword) {
                        $tmpBookKeyword = trim($tmpBookKeyword);
                        echo '<option value="' . $tmpBookKeyword . '">' . $tmpBookKeyword . '</option>';
                    }
                }
                ?>
            </select>     
        </div>
        <div class="form-group col-md-6">
            <label for="">Author: </label>
            <select name="author[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select author" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <option value="">Not Select</option>
                <?php foreach ($all_author as $author) { ?>
                    <option value="<?php echo $author->AuthorId; ?>"><?php echo $author->AuthorFirstName . ' ' . $author->AuthorLastName; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="">Subject: </label>
            <select name="subject[]"class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select publisher" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <?php
                $sql = "SELECT DISTINCT  `SubjectId` ,  `subject_title` FROM  `view_book_details`";
                $subject_rows = $this->db->query($sql)->result();
                foreach ($subject_rows as $subject) {
                    ?>
                    <option value="<?php echo $subject->SubjectId; ?>"><?php echo $subject->subject_title; ?></option>
                <?php } ?>
            </select>

        </div>
        <div class="form-group col-md-6">
            <label>&nbsp;</label>
            <input type="submit" name="btn_book" value="Search" class="btn btn-block btn-primary btn-flat "/>
        </div>

    </form>
</div>

<?php } ?>
<!-------------------------------------------- 
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\BOOK SEARCH///////////////////////////////////////////////////////////
---------------------------------------->

<?php if(isset($type_journal)) { ?>

<div class="col-md-8">
    <form action="" class="form" method="post" id="books_form">
        
        <div class="form-group col-md-6">
            <label for="">Book Name: </label>
            <input type="text" name="book_name" class="form-control" placeholder="Title" />
        </div>
        <div class="form-group col-md-6">
            <div class="row">
             <label for="">Publisher: </label>
            <select name="publisher[]"class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select publisher" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <?php foreach ($all_publisher as $publisher) { ?>
                    <option value="<?php echo $publisher->PublisherId; ?>"><?php echo $publisher->PublisherName; ?></option>
                <?php } ?>
            </select> 
        </div>
        </div>
        <div class="form-group col-md-12">            
                      
            <label for="">Published Year: </label>
            <div class="row">
                <div class="col-md-6">
                    From:
                    <select name="from" id="" class="form-control select2">
                        <?php
                        $now = date('Y');
                        echo '<option value=""></option>';
                        for ($i = $now; $i > 1700; $i--) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    To:
                    <select name="to" id="" class="form-control select2">
                        <?php
                        $now = date('Y');
                        echo '<option value=""></option>';
                        for ($i = $now; $i > 1700; $i--) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="">Subject: </label>
            <select name="subject[]"class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select publisher" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <?php
                $sql = "SELECT DISTINCT  `SubjectId` ,  `subject_title` FROM  `view_book_details`";
                $subject_rows = $this->db->query($sql)->result();
                foreach ($subject_rows as $subject) {
                    ?>
                    <option value="<?php echo $subject->SubjectId; ?>"><?php echo $subject->subject_title; ?></option>
                <?php } ?>
            </select>

        </div>
        <div class="form-group col-md-6">
            <label>&nbsp;</label>
            <input type="submit" name="btn_journal" value="Search" class="btn btn-block btn-primary btn-flat "/>
        </div>

    </form>
</div>

<?php } ?>


<!-------------------------------------------- 
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\THESIS SEARCH///////////////////////////////////////////////////////////
---------------------------------------->

<div class="col-md-12">
    <form action="" class="form" method="post" id="journals_form" style="display: none">
        <div class="form-group">
            <label for="">Journal Name: </label>
            <select name="bookid" id="" class="form-control select2">
                <option value="">Select Your Journal</option>
                <?php
                foreach ($all_journal as $journal) {
                    ?>
                    <option value="<?php echo $journal->JournalId; ?>"><?php echo $journal->JournalId . '-' . $journal->Title; ?></option>
                    <?php
                }
                ?>
            </select>

        </div>
        <div class="form-group">
            <input type="submit" name="btn_journal" value="Search" class="btn btn-primary btn-flat "/>
        </div>

    </form>
</div>
<!-------------------------------------------- 
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\JOURNAL SEARCH///////////////////////////////////////////////////////////
---------------------------------------->

<div class="col-md-12">
    <form action="" class="form" method="post" id="reports_form" style="display: none">
        <div class="form-group">
            <label for="">Report Name: </label>
            <select name="reportid" id="" class="form-control select2">
                <option value="">Select Your Report</option>
                <?php
                foreach ($all_report as $report) {
                    ?>
                    <option value="<?php echo $report->ReportId; ?>"><?php echo $report->ReportId . '-' . $report->Title; ?></option>
                    <?php
                }
                ?>
            </select>

        </div>
        <div class="form-group">
            <input type="submit" name="btn_report" value="Search" class="btn btn-primary btn-flat "/>
        </div>

    </form>
</div>
<!-------------------------------------------- 
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\REPORT SEARCH ///////////////////////////////////////////////////////////
---------------------------------------->

