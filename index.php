<?php
include 'library.php';
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
    <script src="js/chart/Chart.js"></script>
    <style>
.canvas-holder {
	padding: 2rem;
}
.wrapper section{
	padding: 2rem 0;
}
</style>
    </head>
    <body>
<section class="row fullWidth logo">
        <div class="logotext">
            <div class="small-10 small-centered columns">
                <h1>Your Data</h1>
            </div>
        </div>
    </section>
    
	<hr class="fancy-line">
    
	<section class="fullWidth bgwhite">
      <?php
	// If session with id userid is set, show a menu
	if(isset($_SESSION['userid'])){
	?>
    <div class="contain-to-grid sticky">
    <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
        <ul class="title-area">
            <li>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="48px" height="48px" viewBox="5.0 -10.0 100.0 135.0" enable-background="new 0 0 100 100" xml:space="preserve" fill="#fff">
        <g>
        <path d="M98.522,37.664L85.699,14.405c-0.576-1.166-1.91-1.947-3.469-2.303c-0.037-0.011-0.059-0.036-0.104-0.043   c-0.08-0.02-0.166-0.006-0.249-0.025c-0.466-0.083-0.923-0.137-1.414-0.132c-0.488-0.005-0.951,0.05-1.414,0.132   c-0.086,0.019-0.167,0.005-0.251,0.025c-0.042,0.007-0.068,0.032-0.106,0.043c-1.559,0.358-2.892,1.14-3.462,2.303l-9.407,50.362   L55.289,35.621c-0.576-1.165-1.916-1.949-3.476-2.306c-0.034-0.008-0.061-0.03-0.096-0.038c-0.08-0.02-0.15-0.005-0.232-0.022   c-0.467-0.085-0.935-0.143-1.429-0.134c-0.499-0.008-0.962,0.049-1.434,0.134c-0.077,0.017-0.159,0.002-0.235,0.022   c-0.039,0.008-0.061,0.03-0.098,0.041c-1.559,0.357-2.896,1.138-3.471,2.303L34.463,61.735l-10.767-8.414   c-0.086-0.068-0.209-0.093-0.299-0.156c-0.063-0.044-0.088-0.101-0.154-0.142c-0.167-0.104-0.382-0.141-0.559-0.229   c-0.346-0.167-0.678-0.328-1.061-0.436c-0.305-0.085-0.611-0.117-0.929-0.162c-0.354-0.049-0.7-0.104-1.059-0.101   c-0.362-0.004-0.702,0.052-1.055,0.101c-0.319,0.045-0.625,0.077-0.929,0.162c-0.382,0.107-0.717,0.269-1.061,0.436   c-0.182,0.088-0.39,0.124-0.557,0.229c-0.069,0.041-0.097,0.101-0.154,0.142c-0.097,0.063-0.213,0.09-0.301,0.156L2.561,66.89   c-2.003,1.562-1.806,3.955,0.435,5.345c2.239,1.399,5.668,1.265,7.662-0.298l9.558-9.954l12.743,9.954   c1.996,1.562,5.428,1.697,7.666,0.298c0.233-0.142,0.342-0.327,0.528-0.49c0.015-0.008,0.02-0.021,0.037-0.033   c0.36-0.317,0.661-0.641,0.853-1.012c0.058-0.093,0.167-0.158,0.22-0.258l7.562-19.066L62.19,85.599   c0.575,1.164,1.911,1.943,3.468,2.302c0.038,0.012,0.066,0.033,0.106,0.044c0.085,0.02,0.172,0.005,0.257,0.024   c0.465,0.082,0.922,0.137,1.411,0.13c0.484,0.007,0.938-0.048,1.404-0.13c0.088-0.02,0.173-0.005,0.254-0.024   c0.045-0.011,0.071-0.032,0.113-0.044c1.551-0.358,2.888-1.14,3.462-2.302l10.287-55.083l5.302,9.615   c0.975,1.977,4.065,3.027,6.906,2.347C97.996,41.801,99.504,39.644,98.522,37.664z"/>
      </g>
        </svg> 
            </li>
        </ul>
        
          <section class="top-bar-section">
        <ul class="right">
            <li><a href="userpage.php">Userpage</a></li>
            <li class="active"><a href="logout.php" class="a">Logout</a></li>
        </ul>
      </section>
        </nav>
  </div>
      <?php
	}else{
		// If there is no session set, show the login/register option
	  ?>
    <section class="row">
        <ul class="button-group even-2">
          <li><a href="#" class="button" data-reveal-id="logModal" >Login</a></li>
          <li><a href="#" class="button secondary" data-reveal-id="regModal" >Register</a></li>
        </ul>
    </section>
    <div id="logModal" class="reveal-modal" data-reveal>
            <h2>Log Yourself In</h2>
            <p>and get connected with us..</p>
            <div class="login-box">
            <div class="login_result" id="login_result"></div>
                <form data-abide>
                    <div class="name-field large-6 columns">
                        <label>Your email
                            <input type="text" id="username" name="username" placeholder="sample@yourdata.com" />
                        </label>
                    </div>
                    <div class="name-field large-6 columns">
                        <label>Your password
                            <input type="password" id="password" name="password" placeholder="Pass123" />
                        </label>
                    </div>
                    <div class="row">
                    <div class="name-field large-6 text-left columns">
                        <input type="submit" id="submit" class="button expand" value="Log In"/>
                    </div>
                    </div>
                </form>
            </div>
            <a class="close-reveal-modal">&#215;</a>
        </div>
   <div id="regModal" class="reveal-modal" data-reveal>
    	<h2>Register Yourself</h2>
    	<p>Tell us more about yourself by registering...</p>
    	<form data-abide method="post" action="registerUser.php">
    		<div class="name-field large-6 columns">
                <label>Your firstname <small>required</small>
                    <input type="text" name="regFname" required pattern="[a-zA-Z]+">
                </label>
                <small class="error">Firstame is required and must be a string.</small>
            </div>
    		<div class="name-field large-6 left columns">
    			<label>Your lastname <small>required</small>
    				<input type="text" name="regLname" required pattern="[a-zA-Z]+">
    			</label>
    			<small class="error">Lastame is required and must be a string.</small>
            </div>
            <div class="email-field large-12 columns">
            <label>Email <small>required</small>
            <input type="email" name="regEmail" required>
            </label>
            <small class="error">An email address is required.</small> </div>
            <div class="password-field large-12 columns">
            <label for="password1">Password <small>required</small>
            <input type="password" id="password1" placeholder="LittleW0men." name="password" required>
            </label>
            <small class="error">Passwords must be at least 8 characters with 1 capital letter, 1 number, and one special character.</small> </div>
            <div class="password-field large-12 columns">
            <label for="confirmPassword">Confirm Password <small>required</small>
            <input type="password" id="confirmPassword" placeholder="LittleW0men." name="regPword" required data-equalto="password1">
            </label>
            <small class="error">Passwords must match.</small>
            </div>
            <div class="submit-field large-12 columns">
            <button type="submit">Submit</button>
            </div>
    	</form>
    <a class="close-reveal-modal">&#215;</a>
    </div>
      <?php
		}
		?>
    <section class="wrapper fullWidth">
        <section class="row fullWidth" style="background-color:#f4f8f9;">
            <div class="large-6 small-10 small-centered text-center columns">
                <h2>Introduction</h2>
                <p>What is this site all about? It's a website that gathers information from HUMANS. In about 10 years we're going to investigate this database and hope to see a significant outcome. With that outcome we'll hope we can prove what the ideal person would look like. Use this API and fill in your desired 'human'-look..  Let's see what the world thinks the desired human will be!</p>
                <p>Thanks for participating!</p>
            </div>
        </section>
        
        <section class="row fullWidth">
            <div class="large-6 small-10 small-centered text-center columns">
                <h2>Weight</h2>
                <div class="canvas-holder">
                    <canvas id="chart-age"></canvas>
                </div>
            </div>
        </section>
  
    <section style="background-color:#ecf0f1;"  class="row fullWidth">
        <div class="large-6 small-10 small-centered text-center columns">
        	<h2>Haircolor</h2>
            <div class="canvas-holder">
               <canvas id="chart-weigth"></canvas>
            </div>
        </div>
    </section>
  
    <section class="row fullWidth">
        <div class="large-6 small-10 small-centered text-center columns">
            <h2>Average age</h2>
           <span class="averageAge">200</span>
        </div>
    </section>
  
	<section class="row fullWidth" style="background-color:#ecf0f1;">
        <div class="large-6 small-10 small-centered text-center columns">
              <h2>Hair</h2>
              <div class="large-3 small-3 columns"> <img src="img/hair_l.png" alt="Long hair" /> </div>
              <div class="large-3 small-3 columns"> <img src="img/hair_m.png" alt="Long hair" /> </div>
              <div class="large-3 small-3 columns"> <img src="img/hair_s.png" alt="Long hair" /> </div>
              <div class="large-3 small-3 columns"> <img src="img/hair_b.png" alt="Long hair" /> </div>
        </div>
    </section>
        
  <section class="row fullWidth">
    <div class="small-10 small-centered text-center columns">
          <h2>News</h2>
          <?php
						// Function to load rss data from menshealth into an array
                        $rss = new DOMDocument();
                        $rss->load('http://www.menshealth.com/events-promotions/washpofeed');
                        $feed = array();
                        foreach ($rss->getElementsByTagName('item') as $node) {
                            $item = array ( 
                                'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                                'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                                'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                                'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
                                );
                            array_push($feed, $item);
                        }
						// Cycle 3 times (limit) through the for loop, so it wil get the first 3 childs out of the array
                        $limit = 3;
                        for($x=0;$x<$limit;$x++) {
                            $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
                            $link = $feed[$x]['link'];
                            $description = $feed[$x]['desc'];
                            $date = date('l F d, Y', strtotime($feed[$x]['date']));
                            echo '<div class="name-field large-4 columns">';
                            echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
                            echo '<small><em>Posted on '.$date.'</em></small></p>';
                            echo '</div>';
                        }
                    ?>
        </div>
  </section>
  <footer class="row fullWidth" style="background-color:#ecf0f1;">
        <div class="large-6 small-10 small-centered text-center columns">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="48px" height="48px" viewBox="5.0 -10.0 100.0 135.0" enable-background="new 0 0 100 100" xml:space="preserve" fill="#000">
            <g>
            <path d="M98.522,37.664L85.699,14.405c-0.576-1.166-1.91-1.947-3.469-2.303c-0.037-0.011-0.059-0.036-0.104-0.043   c-0.08-0.02-0.166-0.006-0.249-0.025c-0.466-0.083-0.923-0.137-1.414-0.132c-0.488-0.005-0.951,0.05-1.414,0.132   c-0.086,0.019-0.167,0.005-0.251,0.025c-0.042,0.007-0.068,0.032-0.106,0.043c-1.559,0.358-2.892,1.14-3.462,2.303l-9.407,50.362   L55.289,35.621c-0.576-1.165-1.916-1.949-3.476-2.306c-0.034-0.008-0.061-0.03-0.096-0.038c-0.08-0.02-0.15-0.005-0.232-0.022   c-0.467-0.085-0.935-0.143-1.429-0.134c-0.499-0.008-0.962,0.049-1.434,0.134c-0.077,0.017-0.159,0.002-0.235,0.022   c-0.039,0.008-0.061,0.03-0.098,0.041c-1.559,0.357-2.896,1.138-3.471,2.303L34.463,61.735l-10.767-8.414   c-0.086-0.068-0.209-0.093-0.299-0.156c-0.063-0.044-0.088-0.101-0.154-0.142c-0.167-0.104-0.382-0.141-0.559-0.229   c-0.346-0.167-0.678-0.328-1.061-0.436c-0.305-0.085-0.611-0.117-0.929-0.162c-0.354-0.049-0.7-0.104-1.059-0.101   c-0.362-0.004-0.702,0.052-1.055,0.101c-0.319,0.045-0.625,0.077-0.929,0.162c-0.382,0.107-0.717,0.269-1.061,0.436   c-0.182,0.088-0.39,0.124-0.557,0.229c-0.069,0.041-0.097,0.101-0.154,0.142c-0.097,0.063-0.213,0.09-0.301,0.156L2.561,66.89   c-2.003,1.562-1.806,3.955,0.435,5.345c2.239,1.399,5.668,1.265,7.662-0.298l9.558-9.954l12.743,9.954   c1.996,1.562,5.428,1.697,7.666,0.298c0.233-0.142,0.342-0.327,0.528-0.49c0.015-0.008,0.02-0.021,0.037-0.033   c0.36-0.317,0.661-0.641,0.853-1.012c0.058-0.093,0.167-0.158,0.22-0.258l7.562-19.066L62.19,85.599   c0.575,1.164,1.911,1.943,3.468,2.302c0.038,0.012,0.066,0.033,0.106,0.044c0.085,0.02,0.172,0.005,0.257,0.024   c0.465,0.082,0.922,0.137,1.411,0.13c0.484,0.007,0.938-0.048,1.404-0.13c0.088-0.02,0.173-0.005,0.254-0.024   c0.045-0.011,0.071-0.032,0.113-0.044c1.551-0.358,2.888-1.14,3.462-2.302l10.287-55.083l5.302,9.615   c0.975,1.977,4.065,3.027,6.906,2.347C97.996,41.801,99.504,39.644,98.522,37.664z"/>
            </g>
            </svg>
        </div>
  </footer>
    </section>
    </section>
<script src="js/vendor/jquery.js"></script> 
<script src="js/foundation/foundation.abide.js"></script> 
<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation();
		
		// this is for testing VVV
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		
		// Declare some variables
		var jqRegAge = [];
		var jqRegWeigth = [];
		var jqRegId = [];
		var img_arr = [];
		var jqRegHcolor = [];
		var counts = {};
		var countz = {};
		var times;
		
		$.ajax({
			url : "modules/api.php",
			type: "POST",
			success: function(data, textStatus, jqXHR)
			{		

				// Retreive data and bind it into an array.
				$.each(data, function(i, val) {
					jqRegId.push(val.id);
					jqRegWeigth.push(val.regWeigth);
					jqRegAge = Number(jqRegAge) + Number(val.regAge);
					jqRegHcolor.push(val.regHcolor);
					times = i;
				});
				
				// jqRegAge devided by the number of each loops.
				jqRegAge = Math.round(jqRegAge/times);
				
				// Make an up counter and show it on the averageAge class.
				$('.averageAge').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: jqRegAge // Use the number that has been calculated 6 lines above.
					}, {
						duration: 4000,
						easing: 'swing',
						step: function (now) {
							$(this).text(Math.ceil(now));
						}
					});
				});

				// 	Get Weigth		
				$.each(data, function(i, val) {
					if(val.regWeigth <= 59) {
						value = '50-60';
						if (!counts.hasOwnProperty(value)) {
							counts[value] = 1;
						  } else {
							counts[value]++;
						  }
					  }
					if(val.regWeigth >= 60 && val.regWeigth <= 69) {
						value = '60-70';
						if (!counts.hasOwnProperty(value)) {
							counts[value] = 1;
						  } else {
							counts[value]++;
						  }
					  }
					if(val.regWeigth >= 70 && val.regWeigth <= 79) {
						value = '70-80';
						if (!counts.hasOwnProperty(value)) {
							counts[value] = 1;
						  } else {
							counts[value]++;
						  }
					  }
					if(val.regWeigth >= 80 && val.regWeigth <= 89) {
						value = '80-90';
						if (!counts.hasOwnProperty(value)) {
							counts[value] = 1;
						  } else {
							counts[value]++;
						  }
					  }
					if(val.regWeigth >= 90 && val.regWeigth <= 99) {
						value = '90-100';
						if (!counts.hasOwnProperty(value)) {
							counts[value] = 1;
						  } else {
							counts[value]++;
						  }
					  }
					if(val.regWeigth >= 100 && val.regWeigth <= 109) {
						value = '100-110';
						if (!counts.hasOwnProperty(value)) {
							counts[value] = 1;
						  } else {
							counts[value]++;
						  }
					  }
					if(val.regWeigth >= 110) {
						value = '100+';
						if (!counts.hasOwnProperty(value)) {
							counts[value] = 1;
						  } else {
							counts[value]++;
						  }
					  }
				});
				
				// Collect data to create the bar chart.
				var barChartData = {
					labels : ["50-60kg","60-70kg","70-80kg","80-90kg","90-100kg","100-110kg","110+kg"],
					datasets : [
						{
							fillColor : "rgba(220,220,220,0.5)",
							strokeColor : "rgba(220,220,220,0.8)",
							highlightFill: "rgba(220,220,220,0.75)",
							highlightStroke: "rgba(220,220,220,1)",
							data : counts
						}
					]
				}
				
				// Count how many haircolors the query plots, than count and combine them.
				jQuery.each(jqRegHcolor, function(key,value) {
				  if (!countz.hasOwnProperty(value)) {
					countz[value] = 1;
				  } else {
					countz[value]++;
				  }
				});
				
				// Create data to fill the Piechart.
				var doughnutData = [
						{
							value: countz['black'], //Get the amount of haircolors out of the array of this specific color
							color:"#000000",
							highlight: "#cccccc",
							label: "Black"
						},
						{
							value: countz['brown'], //Get the amount of haircolors out of the array of this specific color
							color: "#964B00",
							highlight: "#eadbcc",
							label: "Brown"
						},
						{
							value: countz['blond'], //Get the amount of haircolors out of the array of this specific color
							color: "#FAF0BE",
							highlight: "#fefcf2",
							label: "Blond"
						},
						{
							value: countz['auburn'], //Get the amount of haircolors out of the array of this specific color
							color: "#6D351A",
							highlight: "#e2d7d1",
							label: "Auburn"
						},
						{
							value: countz['chestnut'], //Get the amount of haircolors out of the array of this specific color
							color: "#CD5C5C",
							highlight: "#f5dede",
							label: "Chestnut"
						},
						{
							value: countz['red'], //Get the amount of haircolors out of the array of this specific color
							color: "#CC0000",
							highlight: "#f5cccc",
							label: "Red"
						},
						{
							value: countz['grey/white'], //Get the amount of haircolors out of the array of this specific color
							color: "#B2BEB5",
							highlight: "#f0f2f0",
							label: "Grey/White"
						}
					];	 
				
					var age = document.getElementById("chart-age").getContext("2d");
					window.myBar = new Chart(age).Bar(barChartData, {
						responsive : true
					});	
					var weigth = document.getElementById("chart-weigth").getContext("2d");
					window.myDoughnut = new Chart(weigth).Doughnut(doughnutData, {responsive : true});		
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
		
			}
		}); 

	function getImgs(setId) {
	  var URL = "https://api.flickr.com/services/rest/" +  // Wake up the Flickr API gods.
		"?method=flickr.photosets.getPhotos" +  // Get photo from a photoset
		"&api_key=623656741f0e0ec35cf8be9b5986fdd3" +  // API key
		"&photoset_id=" + setId +  // The set ID
		"&privacy_filter=1" +  // 1 signifies all public photos
		"&per_page=20" + // Limiting it to 20 photos
		"&format=json&nojsoncallback=1";
	
	  $.getJSON(URL, function(data){
		$.each(data.photoset.photo, function(i, item){
			var img_src = "http://farm" + item.farm + ".static.flickr.com/" + item.server + "/" + item.id + "_" + item.secret + "_b.jpg";
			img_arr.push(img_src);
		});
		var img_bg = img_arr[Math.floor(Math.random()*img_arr.length)];
		$('.logo').css("background", 'url(' + img_bg + ') no-repeat center center').css(	"-webkit-background-size", 'cover').css(	"-moz-background-size", 'cover').css("-o-background-size", 'cover').css("background-size", 'cover');  
	  });
	}

	var arr=[];

	// Login Form
	  $(document).ready(function(){
		    getImgs("72157630344440372"); // Call the flickr function.

			$('#username').focus(); // Focus to the username field on body loads
			$('#submit').click(function(){ // Create `click` event function for login
				var username = $('#username'); // Get the username field
				var password = $('#password'); // Get the password field
				var login_result = $('.login_result'); // Get the login result div
				login_result.html('loading..'); // Set the pre-loader can be an animation
				if(username.val() == ''){ // Check the username values is empty or not
					username.focus(); // focus to the filed
					login_result.html('<span class="error">Enter the username</span>');
					return false;
				}
				if(password.val() == ''){ // Check the password values is empty or not
					password.focus();
					login_result.html('<span class="error">Enter the password</span>');
					return false;
				}
				if(username.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
					var UrlToPass = 'action=login&username='+username.val()+'&password='+password.val();
					$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
					type : 'POST',
					data : UrlToPass,
					url  : 'checker.php',
					success: function(responseText){ // Get the result and asign to each cases
						if(responseText == 0){
							login_result.html('<span class="error">Bad, Bad, not good!</span>');
						}
						else if(responseText == 1){
							window.location = 'userpage.php';
						}
						else{
							alert('Problem with sql query');
						}
					}
					});
				}
				return false;
			});
		});
		
		$( "#target" ).submit(function( event ) {
		  alert( "Handler for .submit() called." );
		  event.preventDefault();
		});
	</script>
</body>
</html>