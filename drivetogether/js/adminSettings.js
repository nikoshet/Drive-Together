
////////
function banUser(useremail) {
	//alert(useremail);
      $.ajax({
           method: "POST",
           url: 'adminFunctions.php',
           data:{action:'banuser',email:useremail},
           success:function(response) {
             alert(response);
             window.location.href = 'adminSettings.php';
           }
      });
 }


///////
$(document).ready(function() {
	
	/////
	var counter = 0;
	var tripIdList = [];

	/////
	$('.checkbox').change(function(){
	counter = parseInt($('.selected').html());
    var c = this.checked ? '+' : '-';
    //alert($(this).val());
    var id = $(this).attr("id");
    //alert("id= "+id);
    var tripId = $("#"+id).val().split("-").pop();
    alert("Trip id : "+tripId);
    if (c=='+'){
    	$('.selected').html(counter +1) ;
    	tripIdList.push(tripId);
    }
    if(c=='-'){
    	$('.selected').html(counter -1) ;
    	for (var i=tripIdList.length-1; i>=0; i--) {
		    if (tripIdList[i] === tripId) {
		        tripIdList.splice(i, 1);
		    }
		}
    }

    if ((c=='+') && (counter==3)){
    	$("#"+id).prop("checked",false);
    	$('.selected').html("3") ;
    	for (var i=tripIdList.length-1; i>=0; i--) {
		    if (tripIdList[i] === tripId) {
		        tripIdList.splice(i, 1);
		    }
		}
    	alert("You must choose exactly 3 trips.");
    }
   // alert("Trip ID List : "+tripIdList);
});
	/////

	$('#update').click(function(event) {
		var ajaxRequest;
		event.preventDefault();
		if (tripIdList.length==3){
			window.alert("About to update trips offered in Home Page..");
			$.ajax({
	            url: "adminFunctions.php",
	            type: "post",
	            data:{trip1:tripIdList[0],trip2:tripIdList[1],trip3:tripIdList[2]},
				dataType: "text",
	           success:function(response) {
	             alert(response);
	             window.location.href = 'adminSettings.php';
	           }

        	});
		}
        else{
        	alert("You must choose exactly 3 trips.");
        }

        
		
	});




    ///////
	$(".subscribe").click(function(){
		window.alert("You have subscribed successfully.");
    });	
 
	$("#logoutButton").click(function(){
		window.alert("You have logged out successfully.");
    });
	
	
	$("#signupButton").click(function(){
		$("#loginmodal").modal("hide");
        $("#signupmodal").modal();
    });
 
	$("#loginButton").click(function(){
		$("#signupmodal").modal("hide");
        $("#loginmodal").modal();
    });

     $("#signupButton1").click(function(){
        $("#loginmodal").modal("hide");
        $("#signupmodal").modal();
    });
 
    $("#loginButton1").click(function(){
        $("#signupmodal").modal("hide");
        $("#loginmodal").modal();
    });
 
	$("#signupmodal2").click(function(){
		$("#loginmodal").modal("hide");
        $("#signupmodal").modal();
    });
 
	$("#loginmodal2").click(function(){
		$("#signupmodal").modal("hide");
        $("#loginmodal").modal();
    });
 
	$("#forgotpassword").click(function(){
		$("#loginmodal").modal("hide");
        $("#forgotpasswordmodal").modal();
    });
	
	$("#sendEmail").click(function(){
		$("#forgotpasswordmodal").modal("hide");
        window.alert("An email with new password has been sent to you.");
    });
	

 
});
