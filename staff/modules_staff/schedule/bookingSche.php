<?php
    require_once('bdd.php');
    // require_once('./../config.php');
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    $username =  $_SESSION['login_staff'];

    $sql = "SELECT ID_schedule, title, start, end, Session 
    FROM schedule JOIN staff ON schedule.ID_Staff=staff.ID_Staff
    WHERE staff.UserName='$username'";

    $req = $bdd->prepare($sql);
    $req->execute();

    $events = $req->fetchAll();
?>
<main>


    <!-- Page Content -->

    <div class="row">
        <section class="content">
            <div class="col-md-10">
                <div class="box box-success">
                    <div class="box-body">
                        <div class="row">
                            <button class="modal-btnadd-work">Thêm công việc</button>
                            <button class="modal-btnmodify-work">Sửa công việc</button>
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-hover" style="margin-right:-10px">
                                    <div id="calendar" class="col-centered">
                                    </div>
                                </table>
                            </div><!--col end -->
                        </div><!--row end-->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <!-- /.row -->
            <?php include('modal.php');?>

        </section>
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="./modules_staff/schedule/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./modules_staff/schedule/js/bootstrap.min.js"></script>

    <!-- FullCalendar -->
    <script src='./modules_staff/schedule/js/moment.min.js'></script>
    <!-- <script src='js/fullcalendar.min.js'></script> -->
    <script src='./modules_staff/schedule/js/fullcalendarxx.min.js'></script>
    <script src='./modules_staff/schedule/js/sweetalert.min.js'></script>


    <script src='./modules_staff/schedule/packages/list/main.js'> </script>



    
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                header: {
                    left: 'prev,next',
                    center: 'title',
                    //right: 'month,agendaWeek,agendaDay,listDay,listWeek,listMonth',
                    right: 'today,month,listWeek,listMonth',
                },
                views: {
                    listDay: { buttonText: 'List day' },
                    listWeek: { buttonText: 'List week' },
                    listMonth: { buttonText: 'List month' },
                    month: { buttonText: 'Month' },
                    today: { buttonText: 'Today' },
                    agendaWeek: { buttonText: 'Week' },
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                timeFormat:"h:mma",
                defaultView:'month',
                scrollTime: '08:00', // undo default 6am scrollTime
                eventOverlap:false,
                allDaySlot: false,



                select: function(start, end) {

                    //$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');

                },
                eventRender: function(event, element) {
                    element.bind('dblclick', function() { //gawin mong CLICK yung parameter para maging single
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #title').val(event.title);
                        $('#ModalEdit #color').val(event.color);
                        //$('#ModalEdit #start').val(event.start);
                        $('#ModalEdit #start').val(moment(event.start).format('YYYY-MM-DD HH:mm:ss'));
                        $('#ModalEdit #end').val(moment(event.end).format('YYYY-MM-DD HH:mm:ss'));
                    //	$('#ModalEdit #end').val(event.end);
                        $('#ModalEdit').modal('show');
                          //var formattedTime = $.fullCalendar.formatDates(event.start, event.end, "HH:mm { - HH:mm}");
                    });

                },

                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    edit(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    edit(event);
                },

                eventMouseover: function(Event, jsEvent) {
                    /*var tooltip = '<div class="tooltip" >' +'<b>ACTIVITY :</b>&nbsp;'+ Event.title + '<br><b>TIME :</b>&nbsp;'+(moment(Event.start).format('HH:mma'))+'</div>';*/

                    var tooltip = '<div class="tooltip" >' +'<b>WHAT :</b>&nbsp;'+ Event.title + '<br><b>DURATION :</b>&nbsp;'+(moment(Event.start).format('HH:mma'))+'&nbsp;-&nbsp;'+(moment(Event.end).format('HH:mma'))+'</div>';
                    var $tooltip = $(tooltip).appendTo('body');

                    $(this).mouseover(function(e) {
                        $(this).css('z-index', 10000);
                        $tooltip.fadeIn('500');
                        $tooltip.fadeTo('10', 1.9);
                    }).mousemove(function(e) {
                        $tooltip.css('top', e.pageY + 10);
                        $tooltip.css('left', e.pageX + 20);
                    });
                },

                eventMouseout: function(Event, jsEvent) {
                    $(this).css('z-index', 8);
                    $('.tooltip').remove();
                },


                events: [
                <?php foreach($events as $event):


                    $start = explode(" ", $event['start']);
                    $end = explode(" ", $event['end']);
                    if($start[1] == '00:00:00'){
                        $start = $start[0];
                    }else{
                        $start = $event['start'];
                    }
                    if($end[1] == '00:00:00'){
                        $end = $end[0];
                    }else{
                        $end = $event['end'];
                    }
                    ?>
                    {
                        

                        id: '<?php echo $event['ID_schedule']; ?>',
                        title: '<?php echo $event['title']; ?>',
                        start: '<?php echo $start; ?>',
                        end: '<?php echo $end; ?>',
                        color: '<?php 
                                if($event['Session']=='Sáng') echo '#FF0000'; 
                                elseif($event['Session']=='Chiều') echo '#008000';
                                elseif($event['Session']=='Ngoài giờ') echo '#FF8C00'; ?>',
                    },
                <?php endforeach; ?>
                ]
            });


            function edit(event){
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
                if(event.end){
                    end = event.end.format('YYYY-MM-DD HH:mm:ss');
                }else{
                    end = start;
                }

                id =  event.id;

                Event = [];
                Event[0] = id;
                Event[1] = start;
                Event[2] = end;

                $.ajax({
                    url: './modules_staff/schedule/editEventDate.php',
                    type: "POST",
                    data: {Event:Event},
                    success: function(rep) {
                        if(rep == 'OK'){
                            //alert('Saved');
                            swal("Done!","Successfully MOVED!","success");
                        }else{
                            //alert('Could not be saved. try again.');
                            swal("Cancelled", "Could not be saved. Please try again", "error");
                        }
                    }
                });
            }


            /*function add(event){

              title = event.title;
              start = event.start;
              end = event.end;
              color = event.color;
               /* if(event.end){
                    end = event.end.format('YYYY-MM-DD HH:mm:ss');
                }else{
                    end = start;
                }

                id =  event.id;

                Event = [];
                Event[0] = id;
                Event[1] = title;
                Event[2] = start;
                Event[3] = end;
                Event[4] = color;

                $.ajax({
                    url: 'addEvent.php',
                    type: "POST",
                    data: {Event:Event},
                    success: function(repp) {
                        if(repp == 'OK'){
                            //alert('Saved');
                            swal("Done!","Successfully saved!","success");
                        }else{
                            //alert('Could not be saved. try again.');
                            swal("Cancelled", "Could not be saved. Please try again", "error");
                        }
                    }
                });
            }*/


        });

    </script>

    <?php
        
        $sql_get_IDStaff = "SELECT `ID_Staff` FROM `staff` WHERE `UserName`='$username'";
        $query_get_IDStaff = mysqli_query($conn, $sql_get_IDStaff);
        $rows_get_IDStaff = mysqli_fetch_array($query_get_IDStaff);
        $ID_Staff=$rows_get_IDStaff['ID_Staff'];
    ?>
    <div class="modal-bg-work">
        <div class="modal">
            <h1>Thêm công việc</h1>
            <form class="form-horizontal" method="POST" action="./modules_staff/schedule/addEvent.php">
                <div class="modal-body">
                    <input type="hidden" name="ID_Staff" value="<?php echo $ID_Staff ?>" >
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Công việc:</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Activity" autocomplete="off" value="Khám ngoại" required="">
                            <!-- <textarea rows="4" cols="10" id="title" class="form-control" name="title" maxlength="300" value="Khám ngoại" required></textarea> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ngày làm việc</label>
                        <div class="col-sm-10">
                            <input type="date" name="dateworking" class="form-control" id="start" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Chọn lịch làm việc:</label>
                        <div class="col-sm-10">
                            <select name="session" class="form-control" id="color" required="">
                                <option value="">-- Chọn --</option>
                                <option style="color:#FF0000;" value="Sáng">&#9724; Sáng</option>
                                <option style="color:#008000;" value="Chiều">&#9724; Chiều</option>
                                <option style="color:#FF8C00;" value="Ngoài giờ">&#9724; Ngoài giờ</option>
                             </select>
                        </div>
                    </div>
                    
                    <!-- <div class="form-group">
                        <label for="end" class="col-sm-2 control-label">End date</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" name="end" class="form-control" id="end">
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Chọn phòng:</label>
                        <div class="col-sm-10">
                            <select name="room" class="form-control" id="room" required="">
                                <option value="">Choose</option>
                                <?php 
                                    $sql_get_room = "SELECT *
                                    FROM `room` JOIN dept ON room.ID_Dept=dept.ID_Dept
                                    JOIN staff ON staff.ID_Dept=dept.ID_Dept
                                    WHERE staff.UserName='$username'";
                                    $query_get_room = mysqli_query($conn, $sql_get_room);
                                    while($rows_get_room = mysqli_fetch_array($query_get_room)){
                                ?>
                                <option value="<?php echo $rows_get_room['ID_Room'] ?>"><?php echo $rows_get_room['Name_Room'] ?></option>
                                <?php } ?>
                             </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnSave_submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
            <span class="modal-close-work">X</spsan>
        </div>
    </div>

    <div class="modal-bg-work-modify">
        <div class="modal">
            <h1>Chỉnh sửa công việc</h1>
            <form class="form-horizontal" method="POST" action="./modules_staff/schedule/editEventTitle.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Activity</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" name="title" class="form-control" id="title" placeholder="Title"> -->
                            <textarea rows="4" cols="10" id="title" class="form-control" name="title" maxlength="300" value="" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">ACTIVITY COLOR SCHEME</label>
                        <div class="col-sm-10">
                            <select name="color" class="form-control" id="color">
                                <option value="">Choose</option>
                                <option style="color:#FF0000;" value="#FF0000">&#9724; URGENT MEETING</option>
                                <option style="color:#008000;" value="#008000">&#9724; PERSONAL SCHEDULE</option>
                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Executives Schedule</option>
						        <option style="color:#0071c5;" value="#0071c5">&#9724;ETC</option>
							</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="start" class="col-sm-2 control-label">Date and Time</label>
                        <div class="col-sm-10">
                            <input type="text" name="start" class="form-control" id="start" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="end" class="col-sm-2 control-label">End date</label>
                        <div class="col-sm-10">
                            <input type="text" name="end" class="form-control" id="end">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id" class="form-control" id="id">


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success 	">Save changes</button>
                </div>
            </form>
            <span class="modal-close-work-modify">X</spsan>
        </div>
    </div>

    <script type="text/javascript">
        //Them
        var modalBtnAddWork = document.querySelector('.modal-btnadd-work'); //sua ten
        var modalBg_Work = document.querySelector('.modal-bg-work');
        var modalClose_Work = document.querySelector('.modal-close-work');

        modalBtnAddWork.addEventListener('click', function(){
            modalBg_Work.classList.add('bg-work-active');
        });
        
        modalClose_Work.addEventListener('click', function(){
            modalBg_Work.classList.remove('bg-work-active');
        });

        //Xoa
        var modalBtnWork_Modify = document.querySelector('.modal-btnmodify-work'); //sua ten
        var modalBg_Work_Modify = document.querySelector('.modal-bg-work-modify');
        var modalClose_Work_Modify = document.querySelector('.modal-close-work-modify');

        modalBtnWork_Modify.addEventListener('click', function(){
            modalBg_Work_Modify.classList.add('bg-work-modify-active');
        });
        
        modalClose_Work_Modify.addEventListener('click', function(){
            modalBg_Work_Modify.classList.remove('bg-work-modify-active');
        });
    </script>

</main>