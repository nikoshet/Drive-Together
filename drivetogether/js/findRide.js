

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
	
    // Variable to hold request
    var request;

    // Bind to the submit event of our form
    $("#formfind").submit(function(event){
       
       event.preventDefault();

        var from=$("#autocomplete1").val();
        //alert(from);
        var ffrom=from.split(",");
      //  alert(ffrom[0]);
        $("#autocomplete1").val(ffrom[0].toUpperCase());
        var to=$("#autocomplete2").val();
      //  alert(to);
        var tto=to.split(",");
       // alert(tto[0]);
        $("#autocomplete2").val(tto[0].toUpperCase());
        var date=$("#date").val();
      //  alert(date);
        // setup some local variables
        var $form = $(this);
       // alert("2");
        // Let's select and cache all the fields
        var $inputs = $form.find("input");//, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $form.serialize();
     //   alert(serializedData);

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
       
        $inputs.prop("disabled", true);

        // Fire off the request to /form.php
        request = $.ajax({
            url:"findTrip.php",
            type: "post",
            data: serializedData,
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            $("#autocomplete1").val(ffrom);
            $("#autocomplete2").val(tto);
            $('.containerresults').html(response );
           /* alert("Hooray, it worked!");*/
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            alert(
                "The following error occurred: "+
                textStatus, errorThrown
            );
             $("#autocomplete1").val(ffrom);
            $("#autocomplete2").val(tto);
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });

    });
       

       $("#signUpSubmit").click(function(){
    //$('#signupform').submit(function(event) { 
        validateSignUp();
    });     

    $("#logInSubmit").click(function(){
    //$('#signupform').submit(function(event) { 
        validateLogIn();
    });
      


      
});



      
function validateSignUp(){
    var gender = $("input[name='gender']:checked").val();
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var psw = document.getElementById("psw");
    var pswrepeat = document.getElementById("psw-repeat");
    var uploadPhoto = document.getElementById("uploadPhoto");
    var yearofbirth = document.getElementById("yearofbirth");
    if (gender==undefined){window.alert("Please choose your gender.");}     
    else if (fname.value==""){window.alert("Please fill in your first name.");} 
    else if (lname.value==""){window.alert("Please fill in your last name.");}  
    else if (email.value==""){window.alert("Please fill in your email.");}
    else if(!validateEmail(email.value)){window.alert("Please enter a valid email.");}
    else if (psw.value==""){window.alert("Please fill in your password.");} 
    else if (pswrepeat.value==""){window.alert("Please repeat your password.");}
    else if (psw.value.length<8){window.alert("Password must be at least 8 characters.");}
    else if (psw.value!=pswrepeat.value){window.alert("Passwords are not the same.");}
    else if (yearofbirth.value==""){window.alert("Please choose your year of birth.");} 
        
    else{
        //window.alert("Sign Up completed successfully.");

        var ajaxRequest;
        event.preventDefault();
        var values = $('#signupform :input').serialize();
        //window.alert("Serialized values are: "+values);
        
        ajaxRequest= $.ajax({
            url: "register.php",
            type: "post",
            data: values,
        });
        
        ajaxRequest.done(function (response, textStatus, jqXHR){
            window.alert(response);
        });

        /* On failure of request this function will be called  */
        ajaxRequest.fail(function (){
            window.alert('There is error while submit');
        });

        $("#signupmodal").modal("hide");
    }
}
 

function validateLogIn(){
    var email = document.getElementById("emaillogin");
    var psw = document.getElementById("pswlogin");
    if (email.value==""){window.alert("Please fill in your email.");}
    else if(!validateEmail(email.value)){window.alert("Please enter a valid email.");}
    else if (psw.value==""){window.alert("Please fill in your password.");} 
        
    else{

        var ajaxRequest;
        event.preventDefault();
        var values = $('#loginform :input').serialize();
        //window.alert(email.value);
        //window.alert(psw.value);
        //window.alert("Serialized values are: "+values);
        
        $.ajax({
            url: "login.php",
            type: "post",
            data: values,
            dataType: "json",
            success:function(data){
            if(data.info=="Login Failed."){
                window.alert('Login Failed. Try again.');
            }
            else{
                $("#loginmodal").modal("hide");
                window.alert('Welcome,user: '+data.email);
                window.location.href='findRide.php';
            }
            }
        });
    }
}


function validateEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}






