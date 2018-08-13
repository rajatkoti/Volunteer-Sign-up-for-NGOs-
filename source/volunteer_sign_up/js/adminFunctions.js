
	function deleteEvent(eventId){
		
		$.ajax({
			type: "POST",
			url: "../php/admin_DeleteEvent.php",
			dataType: "json",    
			data: {
				eventId: eventId
			}
			/*success: function (data) {
			    window.location= "home.php";
			},
			error: function(data) {
				alert("ERROR");

			}*/
		});
	    window.location= "../php/adminpage.php";

	}
	
