<?php
include_once 'header1.html';
?>
  <link rel="stylesheet" href="calendar/fullcalendar.css" />
  <!-- <link rel="stylesheet" href="calendar/bootstrap.css" /> -->
  <link rel="stylesheet" href="calendar/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../global/vendor/bootstrap-touchspin/bootstrap-touchspin.min599c.css?v4.0.2">
  <link rel="stylesheet" href="assets/examples/css/apps/calendar.min599c.css?v4.0.2">
  <script src="../global/vendor/babel-external-helpers/babel-external-helpers599c.js?v4.0.2"></script>  
  <script src="calendar/jquery.min.js"></script>
  <script src="calendar/jquery-ui.min.js"></script>
  <script src="calendar/moment.min.js"></script>
  <script src="calendar/fullcalendar.min.js"></script>
  <script src="../global/vendor/jquery-selective/jquery-selective.min599c.js?v4.0.2"></script>
  <script src="calendar/bootstrap-datepicker.js"></script>
  <script>
   
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
     $("#addNewEvent").modal("show")
     $('#addNewEvent').on('click', '.btn-primary', function(){
        var title = $('#ename').val();
        alert(title);
        var start = $('#starts').val();
        var end = $('#ends').val();
        alert(end);
        $.ajax({
        url:"calendar/event-insert.php",
        type:"POST",
        data:{title:title, start:start, end:end},
        success:function()
        {
            calendar.fullCalendar('refetchEvents');
            alert("Added Successfully");
        }
        })
        $('#addNewEvent').modal('hide');
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

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"calendar/event-delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

    });
  });
   
  </script>
<?php
include_once 'header2.html';
include_once 'navigation-bar-admin.html';
?>
<body style="color:black;">


  <br />
  <div class="container">
   <div id="calendar"></div>
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
                    <div class="input-group">
                      <input type="text" class="form-control" id="starts" data-container="#addNewEvent"
                        data-plugin="datepicker">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 form-control-label" for="ends">Ends:</label>
                  <div class="col-md-10">
                    <div class="input-group">
                      <input type="text" class="form-control" id="ends" data-container="#addNewEvent"
                        data-plugin="datepicker" data-format="Y-MM-DD HH:mm:ss">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="form-control-label col-md-2">Color:</label>
                  <div class="col-md-10">
                    <ul class="color-selector">
                      <li class="bg-blue-600">
                        <input type="radio" checked name="eventColorChosen" id="eventColorChosen2">
                        <label for="eventColorChosen2"></label>
                      </li>
                      <li class="bg-green-600">
                        <input type="radio" name="eventColorChosen" id="eventColorChosen3">
                        <label for="eventColorChosen3"></label>
                      </li>
                      <li class="bg-cyan-600">
                        <input type="radio" name="eventColorChosen" id="eventColorChosen4">
                        <label for="eventColorChosen4"></label>
                      </li>
                      <li class="bg-orange-600">
                        <input type="radio" name="eventColorChosen" id="eventColorChosen5">
                        <label for="eventColorChosen5"></label>
                      </li>
                      <li class="bg-red-600">
                        <input type="radio" name="eventColorChosen" id="eventColorChosen6">
                        <label for="eventColorChosen6"></label>
                      </li>
                      <li class="bg-blue-grey-600">
                        <input type="radio" name="eventColorChosen" id="eventColorChosen7">
                        <label for="eventColorChosen7"></label>
                      </li>
                      <li class="bg-purple-600">
                        <input type="radio" name="eventColorChosen" id="eventColorChosen8">
                        <label for="eventColorChosen8"></label>
                      </li>
                    </ul>
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
        
</body>
<?php
include_once 'footer-calendar.html';
?>