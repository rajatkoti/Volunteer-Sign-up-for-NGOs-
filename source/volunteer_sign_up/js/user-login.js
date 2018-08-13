$(document).ready(function(){
	
	$('#registerform').submit(function(e) {
		e.preventDefault();
	});
	$('#loginform').submit(function(e) {
		e.preventDefault();
	});
	var isValid = 0;
	
	$("#dialog").dialog({
			autoOpen: false,
			modal: true,
			title: "Message",
			buttons: {
			Close: function () {
                $(this).dialog('close');
            }
		}
	});	
	
	$("<span id=unameSpan></span>").insertAfter("#uname");
	$("<span id=passSpan></span>").insertAfter("#pass");
	$("<span id=rePassSpan></span>").insertAfter("#rePass");
	$("<span id=myname1Span></span>").insertAfter("#myname1");
	$("<span id=myname2Span></span>").insertAfter("#myname2");
	$('#uname').focus(function() {
		$("#unameSpan").text("Enter your email id here").show();
		$("#unameSpan").removeClass();
		$("#unameSpan").addClass("info");
	});

	$('#uname').blur(function() {
		var uname = $("#uname").val();
		var res = /^.+@.+\..+$/.test(uname);  
		
		if (!uname) {
			isValid = 0;
			$("#unameSpan").hide();
		} else {
			if (res) {
				//AJAX Call to check presence of username in system
				//////////////////////////////////////
				
				$.ajax({
			
				type: 'POST',
				url: "php/usernameCheck.php",
				dataType: "json",    
				data: {
				username: uname
			},
			success: function (data) {	
				
				if(data == 'exist')
				{
					isValid = 0;
					$("#unameSpan").text("Error: Username already exist").show();
					$("#unameSpan").removeClass();
					$("#unameSpan").addClass("error");
					
				}
				else if(data == 'does not exist')
				{
					isValid = 1;
					$("#unameSpan").text("OK").show();
					$("#unameSpan").removeClass();
					$("#unameSpan").addClass("ok");
				}
			},
			error: function(data) {
					
			}
			 			
		});	
				
			} 
			else {
				isValid = 0;
				$("#unameSpan").text("Error").show();
				$("#unameSpan").removeClass();
				$("#unameSpan").addClass("error");
			}
		}
	});
	
	$('#pass').focus(function() {
		$("#passSpan").text("Numbers & Special characters required").show();
		$("#passSpan").removeClass();
		$("#passSpan").addClass("info");
	});

	$('#pass').blur(function() {
		var pass = $("#pass").val();
		var res = /^[0-9a-zA-Z.!@#$]{8,}$/.test(pass);
		console.log("res pass " + res);
		if (!pass) {
			isValid = 0;
			$("#passSpan").hide();
		} else {
			if (res) {
				isValid = 1;
				$("#passSpan").text("OK").show();
				$("#passSpan").removeClass();
				$("#passSpan").addClass("ok");
			} else {
				isValid = 0;
				$("#passSpan").text("Error").show();
				$("#passSpan").removeClass();
				$("#passSpan").addClass("error");
			}
		}
	});

	
	
	
	
	$('#rePass').focus(function() {
		$("#rePassSpan").text("Should be same as password entered above").show();
		$("#rePassSpan").removeClass();
		$("#rePassSpan").addClass("info");
	});

	$('#rePass').blur(function() {
		var pass = $("#rePass").val();
		var res = $("#rePass").val() == $("#pass").val();
		console.log("res pass " + res);
		if (!pass) {
			isValid = 0;
			$("#rePassSpan").hide();
		} else {
			if (res) {
				isValid = 1;
				$("#rePassSpan").text("OK").show();
				$("#rePassSpan").removeClass();
				$("#rePassSpan").addClass("ok");
			} else {
				isValid = 0;
				$("#rePassSpan").text("Error").show();
				$("#rePassSpan").removeClass();
				$("#rePassSpan").addClass("error");
			}
		}
	});
	$('#myname1').focus(function() {
		$("#myname1Span").text("Should contain only alphabets").show();
		$("#myname1Span").removeClass();
		$("#myname1Span").addClass("info");
	});

	$('#myname1').blur(function() {
		var name1 = $("#myname1").val();
		var res1 = /^[a-zA-Z][a-zA-Z ]+$/.test(name1);;
		if (!name1) {
			isValid = 0;
			$("#myname1Span").hide();
		} else {
			if (res1) {
				isValid = 1;
				$("#myname1Span").text("OK").show();
				$("#myname1Span").removeClass();
				$("#myname1Span").addClass("ok");
			} else {
				isValid = 0;
				$("#myname1Span").text("Error").show();
				$("#myname1Span").removeClass();
				$("#myname1Span").addClass("error");
			}
		}
	});
$('#myname2').focus(function() {
		$("#myname2Span").text("Should contain only alphabets").show();
		$("#myname2Span").removeClass();
		$("#myname2Span").addClass("info");
	});
	$('#myname2').blur(function() {
		var name2 = $("#myname2").val();
		var res2 = /^[a-zA-Z][a-zA-Z ]+$/.test(name2);;
		if (!name2) {
			isValid = 0;
			$("#myname2Span").hide();
		} else {
			if (res2) {
				isValid = 1;
				$("#myname2Span").text("OK").show();
				$("#myname2Span").removeClass();
				$("#myname2Span").addClass("ok");
			} else {
				isValid = 0;
				$("#myname2Span").text("Error").show();
				$("#myname2Span").removeClass();
				$("#myname2Span").addClass("error");
			}
		}
	});
	


	$('#submit-sign').click(function(){	
		//alert("isValid :" + isValid);
		
		var uname = $('#uname').val();
		var pass = $('#pass').val();
		var myname1 = $('#myname1').val();
		var myname2 = $('#myname2').val();

		if(isValid == 1){
			$.ajax({
				type:'POST',
				url: "php/signup.php",
				//dataType: "json",    
				data: {
					uname : uname,
					pass : pass,
					myname1 : myname1,
					myname2 : myname2
								
					
				},
				success: function (data) {	
					//alert(data);
					isValid=0;
					$("#unameSpan").hide();
					$("#passSpan").hide();
					$("#rePassSpan").hide();
					$("#myname1Span").hide();
					$("#myname2Span").hide();

											
					$('#registerform')[0].reset();
					$("#dialog").html("Thanks for signing up!");
					$("#dialog").dialog("open");
						
					
					console.log(data);
					
				},
				error: function(data) {
					 //alert("error");
					console.log(data);
				}
							
			});	
			}
			//when isValid = 0
			else{
			$('#registerform')[0].reset();
			$("#dialog").html("Please try again with valid information!");
			$("#dialog").dialog("open");
		}
	});
$('#submit').click(function(){	
		
		var username = $.trim($('#username').val());
		var passwd = $.trim($('#password').val());
		
		$.ajax({
			
			type: 'POST',
			url: "php/login.php",
			dataType: "json",    
			data: {
				username: username,
				passwd: passwd
			},
			success: function (data) {	
				
				if(data == 'a')
				{//alert("admin block");
					window.location.replace("/volunteer_sign_up/php/adminpage.php");
					
				}
				else if(data == 'u')
				{//alert("user block");
					window.location.replace("/volunteer_sign_up/php/homepage.php");
				}
				else if(data == 'x'){
					//alert("invalid credential block");
					$('#loginform')[0].reset();
					$("#dialog").html("Invalid Credentials");
					$("#dialog").dialog("open");
				}
				else{
					$('#loginform')[0].reset();
					$("#dialog").html("Invalid");
					$("#dialog").dialog("open");
				}
				
			},
			error: function(data) {
				$('#loginform')[0].reset();
				$("#dialog").html("Error in login. Please try again.");
				$("#dialog").dialog("open");
				window.location.replace("/volunteer_sign_up/php/homepage.php");	
			}
			 			
		});		
	});

	
});
	
	
	
	
	
	