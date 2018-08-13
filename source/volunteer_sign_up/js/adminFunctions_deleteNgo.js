
	function deleteNgo(registrationId){
		
		$.ajax({
			type: "POST",
			url: "../php/admin_DeleteNgo.php",
			dataType: "json",    
			data: {
				registrationId: registrationId
			},
			/*success: function (data) {
			    window.location= "/volunteer_sign_up/php/adminpage.php";
			},
			error: function(data) {
				alert("ERROR");

			}*/
		});
	    window.location= "../php/deleteNgo.php";

	}
	
