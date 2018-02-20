
$(document).ready(function() {

	
/*
	 $("#autocomplete1").keydown(function(){
	 	var value1= $("#autocomplete1").val();
        $("#autocomplete11").text(value1);
        console.log(  $("#autocomplete11").val());
    });

	 $("#autocomplete2").keypress(function(){
	 	var value2= $("#autocomplete2").val();
        $("#autocomplete22").val(value2);
        console.log(  $("#autocomplete22").val());
    });

	 $("#date").keypress(function(){
	 	var value3= $("#date").val();
        $("#datee").val(value3);
        console.log(  $("#datee").val());
    });
*/
	/*$( "#date1" ).datepicker();});*/

	$(".carousel-content").delay(500).queue(function(){
		$(this).addClass("animated bounce");
	});
	
	
	$(".menusearch").on("click", function( e ) {
		e.preventDefault();
		$("body, html").animate({ 
		scrollTop: $( $(this).attr('href') ).offset().top 
		}, 600);
	});


	$(".menuregister").on("click", function( e ) {
		e.preventDefault();
		$("body, html").animate({ 
			scrollTop: $( $(this).attr('href') ).offset().top 
		}, 600);
	});
  
  
	$("#searchbutton").click(function () {
		var a1= $("#autocomplete1").val();
		var a2= $("#autocomplete2").val();
		alert(a1 + a2);  
		// window.location.href='findRide.html';
	});

  
	$("#loginButton").click(function(){
		$("#signupmodal").modal("hide");
        $("#loginmodal").modal();
    });
 
 	$("#signupButton").click(function(){
		$("#loginmodal").modal("hide");
        $("#signupmodal").modal();
    });

 	$("#loginButton1").click(function(){
		$("#signupmodal").modal("hide");
        $("#loginmodal").modal();
    });
 
 	$("#signupButton1").click(function(){
		$("#loginmodal").modal("hide");
        $("#signupmodal").modal();
    });

    $("#video").click(function(){
    	$("#videomodal").modal();
    });

    /*$("#video2").click(function(){
    	$("#videomodal").modal();
    });*/

    $("#videomodal").on('hidden.bs.modal', function (e) {
    	$("#videomodal").attr("src", $("#videomodal").attr("src"));
	});

	/*$("#loginButton2").click(function(){
		$("#signupmodal").modal("hide");
        $("#loginmodal").modal();
    });
 
 	$("#signupButton2").click(function(){
		$("#loginmodal").modal("hide");
        $("#signupmodal").modal();
    });
	*/
	


    /*$("#submitfind").click(function(){
    	//setCookie();
    	var from, to ,date;
    	from= $("#autocomplete1").val();
    	to= $("#autocomplete2").val();
    	date= $("#date").val();
    	alert(from + " " +to + " "+ date);

    	senddata();

	});
*/

	// Variable to hold request
   /* var request;

    // Bind to the submit event of our form
    $("#findform").submit(function(event){
       
        

        var $form = $(this);
        var $inputs = $form.find("input");//, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $form.serialize();
         alert(serializedData);

       
        $inputs.prop("disabled", true);

        request = $.ajax({
            url:"findRide.php",
            type: "post",
            data: serializedData,
        });

        request.done(function (response, textStatus, jqXHR){
        	// $('#ress').html(response );
          // window.location.href='findRide.php';
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

    });
*/
	$("#signUpSubmit").click(function(){
	//$('#signupform').submit(function(event) {	
		validateSignUp();
    });		

	$("#logInSubmit").click(function(){
	//$('#signupform').submit(function(event) {	
		validateLogIn();
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

		var ajaxRequest1;
		event.preventDefault();
		var values = $('#forgotpassform :input').serialize();
		window.alert("Serialized values are: "+values);
		
		ajaxRequest1= $.ajax({
            url: "forgotpass.php",
            type: "post",
            data: values,
        });
		
		ajaxRequest1.done(function (response, textStatus, jqXHR){
			window.alert(response);
		});

		/* On failure of request this function will be called  */
		ajaxRequest1.fail(function (){
			window.alert('There is error while submit');
		});

		$("#forgotpasswordmodal").modal("hide");
       // window.alert("An email with new password has been sent to you.");
    });
 
	$(".subscribe").click(function(){
	    $email = $("input[name='subscribe']").val();
        window.alert("Your email is: "+$email+".\n You have subscribed successfully.");
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

///////
$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());  
});

////////
var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete1 = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete1')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete1.addListener('place_changed');//, fillInAddress);


        autocomplete2 = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete2')),
            {types: ['geocode']});

        autocomplete2.addListener('place_changed');//, fillInAddress);

		

      }
	  
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
				window.location.href='index.php';
			}
			}
		});
	}
}


function validateEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}



/*function setCookie()
  {
    var depart = $("#autocomplete1").val();
   	var dest = $("#autocomplete2").val();
   	var date = $("#date").val();
	$.cookie('back_to_url_onPage_referesh', 1);
	$.cookie('depart',depart);
	$.cookie('dest',dest);
	$.cookie('date',date);

	//alert($.cookie('depart',depart));
	window.location.href='findRide.php';
  }*/

/*function senddata() {

/*alert("values: " +$('#findform :input').val());*
    				var ajaxRequest;
				
					var valuess = $('#findform').serialize();
					//window.alert("Serialized values are: "+values);
					alert("Serialized values are: "+valuess);
		
					
					ajaxRequest= $.ajax({
			            url: "findTrip.php",
			            type: "post",
			            data: valuess,

			           
			        });
					
					ajaxRequest.done(function (response, textStatus, jqXHR){
						//window.alert(response);
						window.location.href='findRide.php';
					});

					//On failure of request this function will be called  *
					ajaxRequest.fail(
						function (xhr, ajaxOptions, thrownError) {
				        alert(xhr.status);
				        alert(thrownError);
				        alert("dafdafafdafadfa");
				  	  	
					});

	
	
}*/




