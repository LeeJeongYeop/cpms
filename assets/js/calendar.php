

$(document).ready(function() {

	var calendar=$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		lang:'ko',
		height:380,
		selectable: true,
		selectHelper: true,
		insertView: $.post('/index.php/cpms/calendar/calView',function(data){
			a=data.split("<br>")
			j=0;
			for(var i=0;i<(a.length-1)/5;i++){

				start=(new Date(a[j+2])).toISOString()
				end=(new Date(a[j+3])).toISOString()
				if(start.slice(11,19)=='00:00:00' && end.slice(11,19)=='00:00:00'){
					start=start.slice(0,10)
					end=end.slice(0,10)
				}
				else{
					start=start.slice(0,19)
					end=end.slice(0,19)
				}
				eventData={
					id:a[j],
					title:a[j+1],
					start:start,
					end:end,
					color:a[j+4]
				}
				$('#calendar').fullCalendar('renderEvent',eventData,true);
				j=j+5;
			}







		}),



		select: function(start, end) {
			var top=(screen.availHeight/2)-(50/2);
			var left=(screen.availWidth/2)-(200/2);
			var se=window.open('/index.php/cpms/calendar/select?start='+String(start)+'&end='+String(end),'','toolbar=no,status=no,resizable=no,menubar=no,directories=no,width=200, height=50,top='+top+',left='+left);


			




					// stick? = true
					

					$('#calendar').fullCalendar('unselect');
				},
				editable: true,
				eventLimit: 3,


			 // allow "more" link when too many events



			 eventDrop:function(event,delta,revertFunc){
			 	end=event.end;
			 	if(event.end==null){
			 		end=event.start;
			 	}

			 	$.post('/index.php/cpms/calendar/calUpdate',{id:event.id,start:String(event.start),end:String(end)})

			 },
			 eventResize:function(event,jsEvent,ui,view){

			 	$.post('/index.php/cpms/calendar/calUpdate',{id:event.id,start:String(event.start),end:String(event.end)})
			 },
			 eventClick:function(event,element){

			 	if(confirm('삭제하시겠습니까?')){
			 		$.post('/index.php/cpms/calendar/calDelete',{id:event.id})
			 		$('#calendar').fullCalendar('removeEvents',event.id);
			 	}
			 }

			});




});




function select(input){
	var st=input.start.value;
	var en=input.end.value;
	var co=input.color1.value;
	var ti=input.tit.value;
	start=st.slice(0,29)+'+0000';
	end=en.slice(0,29)+'+0000';
	
	$.post('/index.php/cpms/calendar/calInsert',{title:ti,start:String(start),end:String(end),color:co},function(data){
		start=new Date(start.slice(0,29)).toISOString();
		end=new Date(end.slice(0,29)).toISOString();
		if(start.slice(11,19)=='00:00:00' && end.slice(11,19)=='00:00:00'){
			start=start.slice(0,10)
			end=end.slice(0,10)
		}
		else{
			start=start.slice(0,19)
			end=end.slice(0,19)
		}
		$('#calendar').fullCalendar('renderEvent',{
			id:data,
			title:ti,
			start:start,
			end:end,
			color:co

		},true)
	})
	

}
