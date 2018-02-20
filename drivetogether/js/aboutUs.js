
$(document).ready(function() {
 
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
 
	$("#forgotpassword").click(function(){
		$("#loginmodal").modal("hide");
        $("#forgotpasswordmodal").modal();
    });
	
	$("#signupmodal2").click(function(){
		$("#loginmodal").modal("hide");
        $("#signupmodal").modal();
    });
 
	$("#loginmodal2").click(function(){
		$("#signupmodal").modal("hide");
        $("#loginmodal").modal();
    });
	
	
	$("#sendEmail").click(function(){
		$("#forgotpasswordmodal").modal("hide");
        window.alert("An email with new password has been sent to you.");
    });
 
	$(".subscribe").click(function(){
	    $email = $("input[name='subscribe']").val();
        window.alert("Your email is: "+$email+".\n You have subscribed successfully.");
    });
 
	 
       $("#signUpSubmit").click(function(){
    //$('#signupform').submit(function(event) { 
        validateSignUp();
    });     

    $("#logInSubmit").click(function(){
    //$('#signupform').submit(function(event) { 
        validateLogIn();
    });
    

	$('.link1').click(function() {
	event.preventDefault();
	$('body').fadeOut(1000, newpage1);
	});
	function newpage1() {
	window.location.href = "index.php";
	}

	$('.link2').click(function() {
	event.preventDefault();
	$('body').fadeOut(1000, newpage2);
	});
	function newpage2() {
	window.location.href = "aboutUs.php";
	}
	 
	$('.link3').click(function() {
    event.preventDefault();
    $('body').fadeOut(100, newpage3);
    });
    function newpage3() {
    window.location.href = "privacypolicy.php";
    }
 
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

