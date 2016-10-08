
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
                            <!--<input class="form-control" id="book" placeholder="Type Id / Title" type="text">-->
                            <input type="text" class="form-control" placeholder="Title" />
                            <label for="">Edition: </label>
                            <input type="text" class="form-control" placeholder="Edition" />
                            <label for="">Published Year: </label>
                            <input type="text" class="form-control" placeholder="Published Year" />
                            <div id="book_list"></div>
<!--                            <select name="bookid" id="" class="form-control select2">
                                            <option value="">Select Your Book</option>
                                            <?php
                                            foreach ($all_book as $book) {
                                                ?>
                                                <option value="<?php echo $book->BookId; ?>"><?php echo $book->BookId.'-'.$book->Title; ?></option>
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
                                                <option value="<?php echo $thesis->Thesisid; ?>"><?php echo $thesis->Thesisid.'-'.$thesis->Title; ?></option>
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
                                                <option value="<?php echo $journal->JournalId; ?>"><?php echo $journal->JournalId.'-'. $journal->Title; ?></option>
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
                                                <option value="<?php echo $report->ReportId; ?>"><?php echo $report->ReportId.'-'.$report->Title; ?></option>
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
                
