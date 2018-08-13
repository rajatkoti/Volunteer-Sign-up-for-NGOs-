function deleteFromWishlist(email,eventId){
		
		
		$.ajax({
			type: "POST",
			url: "../php/wishlist_DeleteEvent.php",
			dataType: "json",    
			data: {
				eventId: eventId,
				email: email
			},
			success: function (data) {
				//console.log(data);
			   
			},
			error: function(data) {
				//console.log(data);
			}
		});
	   window.location= "../php/event.php";
	   window.location= "../php/event.php";

	}
function checkOut(email){
	var event_ids = [];
	
	$(".checkout-row").each(function(i) {		
			 var event_id = this.id;
			 event_ids.push(event_id);
	});
    
	var jsonEventIDs = JSON.stringify(event_ids);
	
	$.ajax({
		type: "POST",
		url: "sign_up_for_event.php",
		dataType: "json",    
		data: {
			email: email,
			event_ids: jsonEventIDs
		},
		success: function (data) {
			console.log(data);
		   
		},
		error: function(data) {
			console.log(data);
		}
	});
   window.location= "signed_up_events.php";
}