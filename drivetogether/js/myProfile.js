

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
	
	$("#contactDriver").click(function(){
		$("#contactdrivermodal").modal();
    });

	 $("#profilesettings").click(function(){
		$("#settingsmodal").modal();
    });

    $("#changepass").click(function(){
            var pass=$("#pass").val();
            var newpass=$("#newpass").val();
            var newpass2=$("#newpass2").val();
            if(newpass!=newpass2){
                  alert('Your new password doesnt match with the repeat new pass');
            }
            else{

            
                  var ajaxRequest1;
                  event.preventDefault();
                  var values = $('#changepassform :input').serialize();
                  window.alert("Serialized values are: "+values);
                  
                  ajaxRequest1= $.ajax({
                          url: "changepass.php",
                          type: "post",
                          data: values,
                      });
                  
                  ajaxRequest1.done(function (response, textStatus, jqXHR){
                    //window.alert(response);
                      window.alert("Your password changed succusfully");
                      $("#pass").val("");
                      $("#newpass").val("");
                      $("#newpass2").val("");
                  });

                  /* On failure of request this function will be called  */
                  ajaxRequest1.fail(function (){
                    window.alert('There is error while submit');
                  });

                    //$("#settingsmodal").modal("hide");
                     
              }
    });

	/*  $('#uploadimage').click(function(){

    var fd = new FormData();
    var files = $('#file')[0].files[0];
    fd.append('file',files);

    // AJAX request
    $.ajax({
      url: 'uploadimage.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        if(response != 0){
          // Show image preview
         alert("uploaded");
         // $('#preview').append("<img src='"+response+"' width='100' height='100' style='display: inline-block;'>");
        }else{
          alert('file not uploaded');
        }
      }
    });
  });*/

 
});



//<?php echo "<img src='".($_SESSION["user"]["imagepath"])."' width='72' height='72' alt='' class='Photo-user'>" ?>