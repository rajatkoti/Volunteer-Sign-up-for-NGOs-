$(document).ready(function(){
	$("button#submitID").click(function(){
		//alert("Yes");
		var queryString = $("input#searchID").val().toLowerCase();
		console.log(queryString);
		 $.ajax({
     		type: "GET",
     		url: "../php/searchEvent.php",
     		dataType: "json",    
     		data: {
     			query : queryString
     		},
     		success: function (data) {
     			console.log(data);
    			
     			var length = Object.keys(data).length;
     			console.log(length);
     			var numberOfRows = Math.ceil(length/3.0);
     			console.log(numberOfRows);// each row has 3 elements , if total 9 elements, there are 3 rows.
     			$('.dynamic').remove();
     			for(var i=0;i<numberOfRows;i++){
     				
     				var toAppendDivRows = "<div id='row"+i+"' class='row dynamic'></div>";
     				console.log(toAppendDivRows);
     				$('#eventsList').append(toAppendDivRows);
     			}
     			
     		   $.each(data, function(index, element) {
                    //console.log(index);
                    //console.log(element.img_id);
                    var toAppendDivElements = "<div class='col-sm-3'>" +
                    "<div class='panel panel-success'>" +
                    "<div class='panel-heading' style='font-size:15px;background-color:#d5e1df;width:100%' id= '"+element.e_name+"' style='text-align:center;'>" +
                    element.e_name +" On "+element.date+""+
                    "</div>" +
                    "<div class='panel-body'>" +
                    "<img src='../images/"+element.img+".jpg' style='width:100%;height:200px' alt='/images/"+element.img+".jpg'>" +
                    "</div>" +
                    "<div class='panel-footer words'>" +
                    "<div class='glyphicon glyphicon-list-alt'style='font-size:18px'></div> "+element.description +
                    " "+
                    "<br><i class='material-icons' style='font-size:18px;color:red'>&#xe568;</i>Location: "+element.venue +
                    "<br><i class='glyphicon glyphicon-time' style='font-size:18px;color:blue'></i> "+element.time +
                    "</div>" +
                    "<a href='../php/add_to_wishlist.php?event_id="+element.event_id+"' class='btn btn-info' style='margin:30px 100px 30px 100px;text-transform: uppercase;' role='button' id='"+element.event_id+"'>Add to Wishlist</a>" +
                    "</div>" +
                    "</div>"; 
                    //console.log(toAppendDivElements);
                    $("#row"+Math.floor(index/3)).append(toAppendDivElements);
                    //console.log("append successful");
                    
               });
            
     		},
     		error: function(exception) {
     			//  var err =  xhr.responseText;
     			  alert("Search Not Valid!!")
     			  //console.log(exception);
     			}
     	});
	});
});	