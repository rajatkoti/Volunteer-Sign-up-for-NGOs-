
function volunteer_delete(eventId){
		
		$.ajax({
			type: "POST",
			url: "../php/admin_showvolunteers.php",
			dataType: "json",    
			data: {
				eventId: eventId
			}
		});
	    window.location= "../php/volunteerdetails.php";
	}