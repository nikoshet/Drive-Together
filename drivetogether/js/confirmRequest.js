

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
	
	/*$("#sendMessage").click(function(){
		$.ajax({
		   // URL where your PHP code is
		   url: 'sendEmail.php',
		   method: "post",
		   // if sent
		   success: function(data) {
		     alert('Email sent');
		   }
		});
    });
*/
	$("#sendEmail").click(function(){
		$("#forgotpasswordmodal").modal("hide");
        window.alert("An email with new password has been sent to you.");
    });
	
	$("#contactDriver").click(function(){
		$("#contactdrivermodal").modal();
    });

    $("#signUpSubmit").click(function(){
    //$('#signupform').submit(function(event) { 
        validateSignUp();
    });     

    $("#logInSubmit").click(function(){
    //$('#signupform').submit(function(event) { 
        validateLogIn();
    });

    /*// Variable to hold request
    var request;

    // Bind to the submit event of our form
    $("#bookseatform").submit(function(event){
       alert("1");
       event.preventDefault();


        var $form = $(this);
        var $inputs = $form.find("input");//, select, button, textarea");

        var serializedData = $form.serialize();
       
        alert(serializedData);

       
        $inputs.prop("disabled", true);

        request = $.ajax({
            url:"bookSeat.php",
            type: "post",
            data: serializedData,
        });

        request.done(function (response, textStatus, jqXHR){
            /*$('#findresults').html(response );*
            alert("Seats booked");
        });

        request.fail(function (jqXHR, textStatus, errorThrown){
            alert(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });

        request.always(function () {
            $inputs.prop("disabled", false);
        });

    });*/
       
      

 
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
       // window.alert(email.value);
       // window.alert(psw.value);
       // window.alert("Serialized values are: "+values);
        
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
                window.location.href='aboutUs.php';
            }
            }
        });
    }
}


function validateEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

