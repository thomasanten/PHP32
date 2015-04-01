<?php
include 'library.php';
/*if(isset($_SESSION['userid']) && $_SESSION['userid'] != ''){ // Redirect to secured user page if user logged in
	echo '<script type="text/javascript">window.location = "userpage.php"; </script>';
}*/

// Encrypt the password 3 times
function encrypt($string){	
	return base64_encode(base64_encode(base64_encode($string)));
}

// Decrypt the password 3 times
function decrypt($string){
	return base64_decode(base64_decode(base64_decode($string)));
}

// Collect these Session data and save it into vars.
$updateSex		= $_POST['updateSex']; 
$updateAge		= $_POST['updateAge']; 
$updateHcolor	= $_POST['updateHcolor']; 
$updateEcolor	= $_POST['updateEcolor']; 
$updateHlength	= $_POST['updateHlength']; 
$updateWeigth	= $_POST['updateWeigth']; 
$updateBody		= $_POST['updateBody']; 
$updateLength	= $_POST['updateLength']; 

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
        #canvas-holder{
            width:30%;
        }
    </style>
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
	$stmt = $dbh->prepare('SELECT * FROM userData WHERE id=:userid');
	$stmt->bindParam(":userid",$userid);
	$stmt->execute();
	$stmtNo	=	$stmt->rowCount(); // Counting the rows that match the given parameters; username

	if($stmtNo <= 0){
		$stmt = $dbh->prepare("UPDATE userData SET(
					regSex,
					regAge,
					regHcolor,
					regEcolor,
					regHlength,
					regWeigth,
					regBody,
					regLength,
					) VALUES (
					:updateSex,
					:updateAge,
					:updateHcolor,
					:updateEcolor,
					:updateHlength,
					:updateWeigth,
					:updateBody,
					:updateLength)WHERE 'id' = :regId");
												  
		$stmt->bindParam(':regId', $updateid);       
		$stmt->bindParam(':updateSex', $updateSex);
		$stmt->bindParam(':updateAge', $updateAge); 
		$stmt->bindParam(':updateHcolor', $updateHcolor);
		$stmt->bindParam(':updateEcolor', $updateEcolor);       
		$stmt->bindParam(':updateHlength', $updateHlength);
		$stmt->bindParam(':updateWeigth', $updateWeigth); 
		$stmt->bindParam(':updateBody', $updateBody);
		$stmt->bindParam(':updateLength', $updateLength);       
	
		if ($stmt->execute()){
          	?> 
          	<section class="row fullWidth">
                <div class="small-10 large-centered text-center columns">
                    <h2>Succes!</h2>
                    <p>Registration was a success! We've now entered your data.</p>
                    <p><a href="userpage.php" class="button">Go Back</a></p>
                </div>
            </section>
            <?php
			$stmtResult = $stmt->fetch(PDO::FETCH_ASSOC);
			} else {
          	?> 
			<section class="row fullWidth">
                <div class="small-10 large-centered text-center columns">
                    <h2>OOOOops!</h2>
                    <p>Something went ugly wrong!</p>
                    <p><a href="index.php" class="button">Go Back</a></p>
                </div>
            </section>
            <?php }
				//$stmt->close(); 
			}else{ ?>
          	<section class="row fullWidth">
                <div class="small-10 large-centered text-center columns">
                    <h2>Error!</h2>
                    <p>Registration wasn't a succes! This email address is already registered, use another one...</p>
                    <p><a href="index.php" class="button">Go Back</a></p>
                </div>
            </section>
        <?php } ?>
   
  	</section>
    
</div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();

	</script>

</body>
</html>