<?php
				
				

				 if(isset($_POST['autocomplete1']) && isset($_POST['autocomplete2']) && isset($_POST['date1'])) 
				{	

					$depart=$_POST['autocomplete1'];
					$dest=$_POST['autocomplete2'];
					$hmeromhnia=$_POST['date1'];
				    $date = explode('-', $_POST['date1']);
					$new_date = $date[2].'-'.$date[0].'-'.$date[1];
					$sorting="nosort";

					header("Location: findRide.php");
					/*
	        		$('#date').datepicker().datepicker('setDate', '".$hmeromhnia."');*/
					/*echo "<script>
					    	alert('from index here.');
			        		
			        		$(function () {

			        			$('#autocomplete1').val('".$depart."');
			        			$('#autocomplete2').val('".$dest."');

								$('#datepicker').datepicker({ 
								        autoclose: true, 
								        todayHighlight: true
								  }).datepicker('update', '".$hmeromhnia."');  
								});


				    </script>";
					
					

			            get_all_trips($depart,$dest,$new_date,$sorting);*/

			         
				}

				/*unset($_POST['autocomplete1']);
			    unset($_POST['autocomplete2']);
			    unset($_POST['date1']);*/


			?>