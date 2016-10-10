
<div class="col-md-12">
    <div class="form-group">
        <label for="">Select Type Of Item: </label>
        <select  id="select_type_for_reservation" class="form-control select2">
            <option value="">Select Type</option>
            <option value="books_form">Books</option>
            <option value="journals_form">Journals</option>
            <option value="reports_form">Reports</option>
            <option value="thesis_form">Thesis</option>
        </select>

    </div>
</div>
<div class="col-md-12">
    <form action="" class="form" method="post" id="books_form" style="display: none">
        <div class="form-group">
            <label for="">Book Name: </label>
            <input type="text" name="book_name" class="form-control" placeholder="Title" />
            <label for="">Publisher: </label>
            <select name="publisher[]"class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select publisher" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <?php foreach ($all_publisher as $publisher){?>
                <option value="<?php echo $publisher->PublisherId;?>"><?php echo $publisher->PublisherName;?></option>
                <?php }?>
            </select>            
            <label for="">Published Year: </label>
            <div class="row">
                <div class="col-md-6">
                    From:
                    <select name="from" id="" class="form-control select2">
                        <?php
                        $now = date('Y');
                        for($i=$now;$i>1700;$i--){
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    To:
                    <select name="to" id="" class="form-control select2">
                        <?php
                        $now = date('Y');
                        for($i=$now;$i>1700;$i--){
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <label for="">keywords: </label>
                <input type="text" class="form-control" name="keywords"/>
            <label for="">Author: </label>
            <select name="author[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select author" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <option value="">Not Select</option>
                <?php foreach ($all_author as $author){?>
                <option value="<?php echo $author->AuthorId;?>"><?php echo $author->AuthorFirstName .' '. $author->AuthorLastName;?></option>
                <?php }?>
            </select>
            <label for="">Subject: </label>
            <input type="text" class="form-control" name="subject" placeholder="subject" />
            <!--<div id="book_list"></div>-->
<!--            <select name="bookid" id="" class="form-control select2">
                <option value="">Select Your Book</option>
                <?php
                foreach ($all_book as $book) {
                    ?>
                    <option value="<?php echo $book->BookId; ?>"><?php echo $book->BookId . '-' . $book->Title; ?></option>
                    <?php
                }
                ?>
            </select>-->

        </div>
        <div class="form-group">
            <input type="submit" name="btn_book" value="Search" class="btn btn-primary btn-flat "/>
        </div>

    </form>
</div>
<!-------------------------------------------- 
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\BOOK SEARCH///////////////////////////////////////////////////////////
---------------------------------------->

<div class="col-md-12">
    <form action="" class="form" method="post" id="thesis_form" style="display: none">
        <div class="form-group">
            <label for="">Thesis Name: </label> 
            <select name="thesisid" id="" class="form-control select2">
                <option value="">Select Your Thesis</option>
                <?php
                foreach ($all_thesis as $thesis) {
                    ?>
                    <option value="<?php echo $thesis->Thesisid; ?>"><?php echo $thesis->Thesisid . '-' . $thesis->Title; ?></option>
                    <?php
                }
                ?>
            </select>

        </div>
        <div class="form-group">
            <input type="submit" name="btn_thesis" value="Search" class="btn btn-primary btn-flat "/>
        </div>

    </form>
</div>
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

