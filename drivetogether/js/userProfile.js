
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
$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());  
});
///////
$(document).ready(function() {
	
 
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
	
	$("#contactDriver").click(function(){
		$("#contactdrivermodal").modal();
    });

 
});