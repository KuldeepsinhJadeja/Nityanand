<?php
include_once 'header1.html';
?>
<style>
    h1 {
    color: white;
    background-color: #0984bf;
            padding: 4px 16px 6px;
}
.form-control{width: 200px; margin-bottom: 10px;}
</style>
  <link rel="stylesheet" href="calendar/fullcalendar.css" />
  <!-- <link rel="stylesheet" href="calendar/bootstrap.css" /> -->
  <link rel="stylesheet" href="calendar/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../global/vendor/bootstrap-touchspin/bootstrap-touchspin.min599c.css?v4.0.2">
  <link rel="stylesheet" href="assets/examples/css/apps/calendar.min599c.css?v4.0.2">
  <link rel="stylesheet" href="calendar/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="calendar/jquery.datetimepicker.min.css">
  <script src="../global/vendor/babel-external-helpers/babel-external-helpers599c.js?v4.0.2"></script>  
  <script src="calendar/jquery.min.js"></script>
  <script src="calendar/jquery-ui.min.js"></script>
  <script src="calendar/moment.min.js"></script>
  <script src="calendar/fullcalendar.min.js"></script>
  <script src="../global/vendor/jquery-selective/jquery-selective.min599c.js?v4.0.2"></script>
  <script src="calendar/bootstrap-datepicker.js"></script>
  <script src="calendar/jquery.datetimepicker.full.js"></script>
  <script src="calendar/jquery.datetimepicker.full.min.js"></script>
  <script src="calendar/jquery.datetimepicker.min.js"></script>

  <script>
    jQuery(document).ready(function () {
      jQuery('#datetimepicker1').datetimepicker();
      jQuery('#datetimepicker2').datetimepicker();
      jQuery('#datetimepicker3').datetimepicker();
      jQuery('#datetimepicker4').datetimepicker();
    });
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,//resize event
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'calendar/event-load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     $("#addNewEvent").modal("show");
     $('#addNewEvent').on('click', '.btn-primary', function(){
        var title = $('#ename').val();
        var start = moment($('#datetimepicker1').val()).format("YYYY-MM-DD HH:mm:ss");
        var end = moment($('#datetimepicker2').val()).format("YYYY-MM-DD HH:mm:ss");
        $.ajax({
        url:"calendar/event-insert.php",
        type:"POST",
        // async:false,
        data:{"title":title, "start":start, "end":end},
        success:function()
        {
            location.reload(true);
            calendar.fullCalendar('refetchEvents');
            // alert("Added Successfully");
            $('#ename').val("");
             $('#datetimepicker1').val("");
              $('#datetimepicker2').val("");
              $('#addNewEvent').modal('hide');
        }
        })
        delete title;
        delete start;
        delete end;
      });
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({   
      url:"calendar/event-update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"calendar/event-update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event){
      $("#editNewEvent").modal("show")
      $("#editEname").val(event.title);
      $("#datetimepicker3").val(moment(event.start).format("YYYY-MM-DD HH:mm:ss"));
      $("#datetimepicker4").val(moment(event.end).format("YYYY-MM-DD HH:mm:ss"));

      $('#editNewEvent').on('click', '.btn-primary', function(){
        var title = $('#editEname').val();
        var start = moment($('#datetimepicker3').val()).format("YYYY-MM-DD HH:mm:ss");
        var end = moment($('#datetimepicker4').val()).format("YYYY-MM-DD HH:mm:ss");
        var id = event.id;
        $.ajax({
        url:"calendar/event-update.php",
        type:"POST",
        data:{title:title, start:start, end:end, id:id},
        success:function()
        {
            calendar.fullCalendar('refetchEvents');
            alert("Updated Successfully");
            $('#editEname').val("");
              $('#datetimepicker3').val("");
              $('#datetimepicker4').val("");
              $('#addNewEvent').modal('hide');
        }
        })
    });

    $('#editNewEvent').on('click', '.btn-danger', function(){
      var id = event.id;
      $.ajax({
       url:"calendar/event-delete.php",
       type:"POST",
      // async:false,
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
    });  
    },
    });
  });
   
  </script>
<?php
include_once 'header2.html';
include_once 'navigation-bar-admin.html';
?>
<!-- <body style="color:black;"> -->
  <br />
  <div class="container">
   <div id="calendar" style="color:black"></div>
  </div>
 
  <div class="modal fade" id="addNewEvent" aria-hidden="true" aria-labelledby="addNewEvent"
          role="dialog" tabindex="-1">
          <div class="modal-dialog modal-simple">
            <form class="modal-content form-horizontal" action="#" method="post" role="form">
              <div class="modal-header">
                <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                <h4 class="modal-title">New Event</h4>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                  <label class="col-md-2 form-control-label" for="ename">Name:</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="ename" name="ename">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2 form-control-label" for="starts">Starts:</label>
                  <div class="col-md-10">
                    <div class="input-group date"  for='datetimepicker1'>
                      <input type="text" class="form-control" id="datetimepicker1" data-container="#addNewEvent">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 form-control-label" for="ends">Ends:</label>
                  <div class="col-md-10">
                    <div class="input-group date"  for='datetimepicker1'>
                      <input type="text" class="form-control" id="datetimepicker2" data-container="#addNewEvent">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="modal-footer">
                <div class="form-actions">
                  <button class="btn btn-primary" data-dismiss="modal" type="button">Add this event</button>
                  <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!---->
        <div class="modal fade" id="editNewEvent" aria-hidden="true" aria-labelledby="editNewEvent"
          role="dialog" tabindex="-1" data-show="false">
          <div class="modal-dialog modal-simple">
            <form class="modal-content form-horizontal" action="#" method="post" role="form">
              <div class="modal-header">
                <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                <h4 class="modal-title">Edit Event</h4>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                  <label class="col-md-2 form-control-label" for="editEname">Name :</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="editEname" name="editEname">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2 form-control-label" for="editStarts">Starts:</label>
                  <div class="col-md-10">
                    <div class="input-group">
                      <input type="text" class="form-control" id="datetimepicker3" name="editStarts" data-container="#editNewEvent"
                      >
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 form-control-label" for="editEnds">Ends:</label>
                  <div class="col-md-10">
                    <div class="input-group">
                      <input type="text" class="form-control" id="datetimepicker4" data-container="#editNewEvent"
                        >
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>  
              <div class="modal-footer">
                <div class="form-actions">
                  <button class="btn btn-primary" data-dismiss="modal" type="button">Update</button>
                  <button class="btn btn-danger" data-dismiss="modal" type="button">Delete</button>
                  <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
<!-- </body> -->
<?php
include_once 'footer-calendar.html';
?>