<div class="services_text">
	<button type="button" name="save_calendar_events" class="btn btn-primary pull-right"/>Save</button>
	<div class="clearfix"></div>
	<div class="mar-b-20"></div>
	<div id='calendar'></div>
</div>

<!-- Initialise Calendar -->
<script>
var client_events = '';
$(function(){
	/* Get calendar events */
	
	(get_calendar_events()).done(function(response){
		var response = JSON.parse(response);
// 		console.log(JSON.stringify(response.result));
		client_events = JSON.stringify(response.result);

		return client_events;
	});

	console.log(client_events);
	
	
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

   ini_events($('.external-event'));

   /* initialize the calendar
    -----------------------------------------------------------------*/
   
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
               
     height: 1400,
     defaultView : 'agendaWeek',
     editable: true,
     droppable: true, // this allows things to be dropped onto the calendar !!!
     drop: function (date, allDay) { // this function is called when something is dropped

       // retrieve the dropped element's stored Event Object
       var originalEventObject = $(this).data('eventObject');

       // we need to copy it, so that multiple events don't have a reference to the same object
       var copiedEventObject = $.extend({}, originalEventObject);
       	
       // assign it the date that was reported
       copiedEventObject.start = date;
       //copiedEventObject.allDay = allDay;
       copiedEventObject.backgroundColor = $(this).css("#000");
       copiedEventObject.borderColor = $(this).css("#000");

       
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

	
   
	$('button[type="button"][name="save_calendar_events"]').on('click', function(){

		eventArr = [];
		var events = $('#calendar').fullCalendar('clientEvents'); 
   		$(events).each(function(k,v){
			event = {};
			event['userId'] = "<?php echo $this->session->userdata('id');?>";
			event['eventTitle'] = v.title;
			event['startDate'] = v.start._d;
			event['endDate'] = v.end ? v.end._d : '' ;
			event['fullDay'] = v.allDay;

			eventArr.push(event);			
   		});

		/* Now since we have the events ready, let's fire and ajax to save */
		
		var payload = {'events':eventArr};
		
		var data = {'acid':401, 'payload':JSON.stringify(payload)};
		$.ajax({
			url : BASE_URL + '/ajax',
			data : data,
			method:'POST',
			success : function(response)
			{
				console.log(response);
			}
		});  	
   });

	

});

function get_calendar_events()
{
	var data = {'acid':402};
	return $.ajax({
		url : BASE_URL + '/ajax',
		data : data,
		method:'POST',
	}); 
}

</script>