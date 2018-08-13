$(function () {
    
    $('.list-group.checked-list-box .list-group-item').each(function () {
        
        // Settings
        var $widget = $(this),
            $checkbox = $('<input type="checkbox" class="hidden" />'),
            color = ($widget.data('color') ? $widget.data('color') : "primary"),
            style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };
            
        $widget.css('cursor', 'pointer')
        $widget.append($checkbox);
        
        // Event Handlers
        $widget.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
            
        });
        //console.log(checkedItemsInLi);
        $checkbox.on('change', function () {
            updateDisplay();
            //listAllChecked();
            refreshPage();
        });
          

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $widget.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $widget.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$widget.data('state')].icon);
            
            // Update the button's color
            if (isChecked) {
                $widget.addClass(style + color + ' active');
                
                
            } else {
                $widget.removeClass(style + color + ' active');
            }
        }
        function listAllChecked(){
              //console.log("am hr");
                //event.preventDefault(); 
                var checkedItems = new Array(), counter = 0;
                $("#check-list-box li.active").each(function(idx, li) {
                    checkedItems[counter] = $(li).text();
                    counter++;
                });
                for(var i=0;i<counter;i++)
                console.log(checkedItems[i]);
                return checkedItems;
        }
        function refreshPage(){
            var options = listAllChecked();
            var isChecked = $checkbox.is(':checked');
            if(isChecked){
            var genreText = options ;
            //console.log("genreText"+genreText);
            $.ajax({
                type: "GET",
                url: "../php/filteredEventList.php",
                dataType: "json",    
                data: {
                    category : genreText
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
                      //var err =  xhr.responseText;
                      //alert(err.Message);
                      console.log(exception);
                    }
            });
            }
        }
        
        // Initialization
        function init() {
            
            if ($widget.data('checked') == true) {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
            }
            
            updateDisplay();
            
            // Inject the icon if applicable
            if ($widget.find('.state-icon').length == 0) {
                $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
            }
        }
        init();
    });
    
    
    
    
});