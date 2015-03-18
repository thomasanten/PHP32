<?php
include ('lib/connection.php');
include ('lib/auth.php');

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Data!</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" href="css/screen.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

	<section class="row fullWidth logo">
		<div class="small-10 small-centered columns">
            	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="250px" height="200px" viewBox="5.0 -10.0 100.0 135.0" enable-background="new 0 0 100 100" xml:space="preserve">
<g>
	<path d="M98.522,37.664L85.699,14.405c-0.576-1.166-1.91-1.947-3.469-2.303c-0.037-0.011-0.059-0.036-0.104-0.043   c-0.08-0.02-0.166-0.006-0.249-0.025c-0.466-0.083-0.923-0.137-1.414-0.132c-0.488-0.005-0.951,0.05-1.414,0.132   c-0.086,0.019-0.167,0.005-0.251,0.025c-0.042,0.007-0.068,0.032-0.106,0.043c-1.559,0.358-2.892,1.14-3.462,2.303l-9.407,50.362   L55.289,35.621c-0.576-1.165-1.916-1.949-3.476-2.306c-0.034-0.008-0.061-0.03-0.096-0.038c-0.08-0.02-0.15-0.005-0.232-0.022   c-0.467-0.085-0.935-0.143-1.429-0.134c-0.499-0.008-0.962,0.049-1.434,0.134c-0.077,0.017-0.159,0.002-0.235,0.022   c-0.039,0.008-0.061,0.03-0.098,0.041c-1.559,0.357-2.896,1.138-3.471,2.303L34.463,61.735l-10.767-8.414   c-0.086-0.068-0.209-0.093-0.299-0.156c-0.063-0.044-0.088-0.101-0.154-0.142c-0.167-0.104-0.382-0.141-0.559-0.229   c-0.346-0.167-0.678-0.328-1.061-0.436c-0.305-0.085-0.611-0.117-0.929-0.162c-0.354-0.049-0.7-0.104-1.059-0.101   c-0.362-0.004-0.702,0.052-1.055,0.101c-0.319,0.045-0.625,0.077-0.929,0.162c-0.382,0.107-0.717,0.269-1.061,0.436   c-0.182,0.088-0.39,0.124-0.557,0.229c-0.069,0.041-0.097,0.101-0.154,0.142c-0.097,0.063-0.213,0.09-0.301,0.156L2.561,66.89   c-2.003,1.562-1.806,3.955,0.435,5.345c2.239,1.399,5.668,1.265,7.662-0.298l9.558-9.954l12.743,9.954   c1.996,1.562,5.428,1.697,7.666,0.298c0.233-0.142,0.342-0.327,0.528-0.49c0.015-0.008,0.02-0.021,0.037-0.033   c0.36-0.317,0.661-0.641,0.853-1.012c0.058-0.093,0.167-0.158,0.22-0.258l7.562-19.066L62.19,85.599   c0.575,1.164,1.911,1.943,3.468,2.302c0.038,0.012,0.066,0.033,0.106,0.044c0.085,0.02,0.172,0.005,0.257,0.024   c0.465,0.082,0.922,0.137,1.411,0.13c0.484,0.007,0.938-0.048,1.404-0.13c0.088-0.02,0.173-0.005,0.254-0.024   c0.045-0.011,0.071-0.032,0.113-0.044c1.551-0.358,2.888-1.14,3.462-2.302l10.287-55.083l5.302,9.615   c0.975,1.977,4.065,3.027,6.906,2.347C97.996,41.801,99.504,39.644,98.522,37.664z"/>
</g></svg>
		</div>
        <div class="logotext">
            <div class="small-10 small-centered columns">
                <h1>Your Data</h1>
             </div>
         </div>
  	</section>

    <hr class="fancy-line"></hr>

	<section class="row fullWidth bgwhite">
            <?php
			if(!isset($_SESSION['userid'])) {
				echo '<div class="small-10 small-centered text-center columns">';
				echo '<div class="large-3 large-centered columns">
						  <div class="login-box">
						  <div class="row">
						  <div class="large-12 columns">
							<form>
							   <div class="row">
								 <div class="large-12 columns">
									 <input type="text" name="uname" placeholder="Username" />
								 </div>
							   </div>
							  <div class="row">
								 <div class="large-12 columns">
									 <input type="password" name="pword" placeholder="Password" />
								 </div>
							  </div>
							  <div class="row">
								<div class="large-12 large-centered columns">
								  <input id="FormSubmit" type="submit" class="button expand" value="Log In"/>
								</div>
							  </div>
							</form>
						  </div>
						</div>
						</div>
						</div>';
				echo '</div>'; 
			} else {
				?>
            <div class="contain-to-grid sticky">
                <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
                <ul class="title-area">
                    <li class="name">
                   		<h1><a href="#"><img src="" /></a></h1>
                    </li>
                	<li class="toggle-topbar menu-icon"><a href="#"></a></li>
                </ul>
                    <section class="top-bar-section">
                        <ul class="right">
                            <li class="has-form"><?php logoutbutton(); ?></li>
                        </ul>
                        <ul class="left">
                        	<li>Welcome, test.</li>
                        </ul>
                    </section>
                </nav>
            </div>
            
            <section class="row fullWidth">
                <div class="small-10 small-centered columns">
                    <h2>Your data</h2>
                </div>
            </section>
            <section class="row fullWidth" style="background-color:#ecf0f1;">
                <div class="small-10 small-centered columns">
						<h2>Games</h2>
                </div>
            </section>
            <section class="row fullWidth">
                <div class="small-10 small-centered columns">
						<h2>Friends</h2>
                </div>
            </section>
            <section class="row fullWidth" style="background-color:#1abc9c;">
                <div class="small-10 small-centered columns">
                    <h2>Hours</h2>
                </div>
            </section>
			<?php }?>
  	</section>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
	  
	  $(document).ready(function() {
    //##### send add record Ajax request to response.php #########
    $("#FormSubmit").click(function (e) {
            e.preventDefault();
            if($("input").val()==='')
            {
                alert("Please enter some text!");
                return false;
            }
            
            $("#FormSubmit").hide(); //hide submit button
            $("#LoadingImage").show(); //show loading image
            
            var myData = 'content_txt='+ $("#contentText").val(); //build a post data structure
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "lib/login.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:myData, //Form variables
            success:function(response){
                $("#responds").append(response);
                $("#contentText").val(''); //empty text field on successful
                $("#FormSubmit").show(); //show submit button
                $("#LoadingImage").hide(); //hide loading image

            },
            error:function (xhr, ajaxOptions, thrownError){
                $("#FormSubmit").show(); //show submit button
                $("#LoadingImage").hide(); //hide loading image
                alert(thrownError);
            }
            });
    });

    //##### Send delete Ajax request to response.php #########
    $("body").on("click", "#responds .del_button", function(e) {
         e.preventDefault();
         var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
         var DbNumberID = clickedID[1]; //and get number from array
         var myData = 'recordToDelete='+ DbNumberID; //build a post data structure
         
        $('#item_'+DbNumberID).addClass( "sel" ); //change background of this element by adding class
        $(this).hide(); //hide currently clicked delete button
         
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "lib/login.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:myData, //Form variables
            success:function(response){
                //on success, hide  element user wants to delete.
                $('#item_'+DbNumberID).fadeOut();
            },
            error:function (xhr, ajaxOptions, thrownError){
                //On error, we alert user
                alert(thrownError);
            }
            });
    });

});
	  
	  
    </script>
    
  </body>
</html>
