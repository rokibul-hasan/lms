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
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a>
            </li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                        <!--<a href="<?php echo site_url('event/count_book/1'); ?>">count</a>-->
                    </div><!-- /.box-body -->
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div>



        <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'footer.php'; ?>
<link rel="stylesheet" href="<?php echo $theme_asset_url ?>plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="<?php echo $theme_asset_url ?>plugins/fullcalendar/fullcalendar.print.css" media="print">
<script src="<?php echo $theme_asset_url ?>plugins/fullcalendar/fullcalendar.min.js"></script>
<script>
    $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function () {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });
        }
        ini_events($('#external-events div.external-event'));


        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
//            events: function (start, end, timezone, callback) {
//                $.ajax({
//                    url: '<?php echo base_url(); ?>index.php/event/select_all_issue_return',
//                    dataType: 'json',
//                    data: {
//                        // our hypothetical feed requires UNIX timestamps
//                        start: start.unix(),
//                        end: end.unix()
//                    },
//                    success: function (doc) {
//
//                        var events = [];
//                        $(doc).find('event').each(function (e) {
////                            alert(e.attr('username'));
//                            events.push({
//                                title: $(this).attr('username'),
//                                start: $(this).attr('ExpiryDate') // will be parsed
//                            });
//                        });
//                        callback(events);
//                    }
//                });
//            },
//            events: {
//                url: '<?php echo base_url(); ?>index.php/event/select_all_issue_return',
//                type: 'POST',
//                data: {
//                    book: 'something',
//                    title: 'somethingelse'
//                },
//                        dataType: 'text',
//                        success: function(e){
//                            var events = [];
//                            var bookList = $.parseJSON(e);
////                            console.log(bookList);
//                    $.each(bookList, function (i, bookname) {
////                            $(e).each(function(ev){
////                                console.log(bookname['title']);
//                                events.push({
//                                title: bookname['title']+(bookname['book']),
//                                start: new Date(bookname['start']) // will be parsed
//                            });
////                                var events = $(ev).attr('book');
////                                alert(ev['book']);
//                            });
//                        },
//                error: function () {
//                    alert('there was an error while fetching events!');
//                },
//                color: 'yellow', // a non-ajax option
//                textColor: 'black' // a non-ajax option
//            },

//            
            events: '<?php echo base_url(); ?>index.php/event/select_all_issue_return',
            eventAfterRender: function (event, element, view) {
                var dataHoje = new Date();
                if (event.start < dataHoje) {
                    //event.color = "#FFB347"; //Em andamento
                    element.css('background-color', '#BC4031');
                    element.css('border-color', '#3A87AD');
                }else{
                    element.css('background-color', '#008D4D');
                    element.css('border-color', '#008D4D');
                }
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function (date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');

                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                copiedEventObject.backgroundColor = $(this).css("background-color");
                copiedEventObject.borderColor = $(this).css("border-color");

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

            }
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
            e.preventDefault();
            //Save color
            currColor = $(this).css("color");
            //Add color effect to button
            $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
            e.preventDefault();
            //Get value and make sure it is not null
            var val = $("#new-event").val();
            if (val.length == 0) {
                return;
            }

            //Create events
            var event = $("<div />");
            event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
            event.html(val);
            $('#external-events').prepend(event);

            //Add draggable funtionality
            ini_events(event);

            //Remove event from text input
            $("#new-event").val("");
        });
    });
</script>