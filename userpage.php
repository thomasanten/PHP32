<?php
include 'library.php';
// Check if the user is logged in, else redirect them to index.php
if(!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
	echo '<script type="text/javascript">window.location = "index.php";</script>';
}else{
	// Set user ID
	$userId 	= $_SESSION['userid'];
};
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
  <div class="small-10 small-centered columns"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="250px" height="200px" viewBox="5.0 -10.0 100.0 135.0" enable-background="new 0 0 100 100" xml:space="preserve">
    <g>
      <path d="M98.522,37.664L85.699,14.405c-0.576-1.166-1.91-1.947-3.469-2.303c-0.037-0.011-0.059-0.036-0.104-0.043   c-0.08-0.02-0.166-0.006-0.249-0.025c-0.466-0.083-0.923-0.137-1.414-0.132c-0.488-0.005-0.951,0.05-1.414,0.132   c-0.086,0.019-0.167,0.005-0.251,0.025c-0.042,0.007-0.068,0.032-0.106,0.043c-1.559,0.358-2.892,1.14-3.462,2.303l-9.407,50.362   L55.289,35.621c-0.576-1.165-1.916-1.949-3.476-2.306c-0.034-0.008-0.061-0.03-0.096-0.038c-0.08-0.02-0.15-0.005-0.232-0.022   c-0.467-0.085-0.935-0.143-1.429-0.134c-0.499-0.008-0.962,0.049-1.434,0.134c-0.077,0.017-0.159,0.002-0.235,0.022   c-0.039,0.008-0.061,0.03-0.098,0.041c-1.559,0.357-2.896,1.138-3.471,2.303L34.463,61.735l-10.767-8.414   c-0.086-0.068-0.209-0.093-0.299-0.156c-0.063-0.044-0.088-0.101-0.154-0.142c-0.167-0.104-0.382-0.141-0.559-0.229   c-0.346-0.167-0.678-0.328-1.061-0.436c-0.305-0.085-0.611-0.117-0.929-0.162c-0.354-0.049-0.7-0.104-1.059-0.101   c-0.362-0.004-0.702,0.052-1.055,0.101c-0.319,0.045-0.625,0.077-0.929,0.162c-0.382,0.107-0.717,0.269-1.061,0.436   c-0.182,0.088-0.39,0.124-0.557,0.229c-0.069,0.041-0.097,0.101-0.154,0.142c-0.097,0.063-0.213,0.09-0.301,0.156L2.561,66.89   c-2.003,1.562-1.806,3.955,0.435,5.345c2.239,1.399,5.668,1.265,7.662-0.298l9.558-9.954l12.743,9.954   c1.996,1.562,5.428,1.697,7.666,0.298c0.233-0.142,0.342-0.327,0.528-0.49c0.015-0.008,0.02-0.021,0.037-0.033   c0.36-0.317,0.661-0.641,0.853-1.012c0.058-0.093,0.167-0.158,0.22-0.258l7.562-19.066L62.19,85.599   c0.575,1.164,1.911,1.943,3.468,2.302c0.038,0.012,0.066,0.033,0.106,0.044c0.085,0.02,0.172,0.005,0.257,0.024   c0.465,0.082,0.922,0.137,1.411,0.13c0.484,0.007,0.938-0.048,1.404-0.13c0.088-0.02,0.173-0.005,0.254-0.024   c0.045-0.011,0.071-0.032,0.113-0.044c1.551-0.358,2.888-1.14,3.462-2.302l10.287-55.083l5.302,9.615   c0.975,1.977,4.065,3.027,6.906,2.347C97.996,41.801,99.504,39.644,98.522,37.664z"/>
    </g>
    </svg> </div>
  <div class="logotext">
    <div class="small-10 small-centered columns">
      <h1>Your Data</h1>
    </div>
  </div>
</section>
<hr class="fancy-line">
      <div class="contain-to-grid sticky">
        <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
        <ul class="title-area">
            <li class="name">
              <h1><a href="#">Welcome, <?php echo ucfirst($_SESSION['username']); ?></a></h1>
            </li>
             <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <ul class="right">
                  <li><a href="index.php">Home</a></li>
                  <li class="active"><a href="logout.php" class="a">Logout</a></li>
            </ul>
        </section>
        </nav>
        </div>
<section class="row bgwhite">
  <?php
	$stmt = $dbh->prepare('SELECT * FROM userData WHERE id=:userid');
	$stmt->bindParam(":userid",$userId);
	$stmt->execute();
	$stmtData = $stmt->fetchAll();
	$stmtNo	=	$stmt->rowCount(); // Counting the rows that match the given parameters; username

	$stmtId = $dbh->prepare("SELECT * FROM users WHERE id=:userid");
	$stmtId->bindParam(":userid",$userId);
	$stmtId->execute();
	$stmtIdData = $stmtId->fetchAll(PDO::FETCH_ASSOC);
	$regStatus = $stmtIdData[0]['userStatus']; // Get the userstates of the user just logged in (on admin rights).

	if($stmtNo <= 0){// If 0 rows	
	?>
  <section class="row ">
    <div class="small-10 small-centered columns">
      <h2>Personal</h2>
      <?php
		//Upload File
		// Check if the submit button is clicked
		if (isset($_POST['submit'])) {
			
			// Check if a file is selected for upload
			$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
			if($_FILES["filename"]["error"] == 4){
				echo '<p>No csv file found... Try it again!</p>';
			}else{
				if(in_array($_FILES['filename']['type'],$mimes)){
			
				//Import uploaded file to Database
				$handle = fopen($_FILES['filename']['tmp_name'], "r");
				
				//Loop trough the ; seperated data
				while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			
				//Prepare the a query with the data pulled out of the CSV
				$stmt = $dbh->prepare("INSERT INTO users(
								Username,
								Password,
								regFname,
								regLname,
								userStatus,
								regRemarks) VALUES (
								:Username,
								:Password,
								:regFname,
								:regLname,
								:regStatus,
								:regRemarks)");
					
					$Password = base64_encode(base64_encode(base64_encode($data[1])));		  
					$stmt->bindParam(':Username', $data[0]);
					$stmt->bindParam(':Password', $Password);            
					$stmt->bindParam(':regFname', $data[2]); 
					$stmt->bindParam(':regLname', $data[3]);
					$stmt->bindParam(':regStatus', $data[4]); 
					$stmt->bindParam(':regRemarks', $data[5]);
					
					};
					// Check if ececution went good, show the outcome..
					if ($stmt->execute()) {
						?>
							<div class="small-10 large-centered text-center columns">
								<h1>Succes!</h1>
                                <p>User added..</p>
							</div>
						</section>
		  <?php
					} else {
						?>
						<section class="row fullWidth">
							<div class="small-10 large-centered text-center columns">
								<h3>OOOOops!</h3>
								<?php
								// Check if there's a CSV uploaded..
								$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
								if(in_array($_FILES['filename']['type'],$mimes)){
									echo '<p>Something went ugly wrong!</p>';
								}else{
									echo '<p>We detected a non-csv thingy, please upload a csv doc!</p>';
								};
								?>
							</div>
						</section>
		  <?php
					};
				fclose($handle);
				}else{
			?>
                <section class="row fullWidth">
                    <div class="small-10 large-centered text-center columns">
                        <h3>OOOOops!</h3>
						<p>Something went ugly wrong!</p>
                        <p>We detected a non-csv thingy, please upload a csv doc!</p>
                        <p><a href="userpage.php" class="button">Go Back</a></p>
                    </div>
                </section>            
            <?php					
				};
			};
			// Close the file pointer
		}else {
			unset($_POST['submit']);
			if($regStatus === 'admin'){
				print'<p>No data added yet! Tell us more about yourself by adding it Manually.. Or add an user by uploading a <a href="#" data-reveal-id="csvForm">CSV&hellip;</a> file!</p>';	
			}else{
				print'<p>No data added yet! Tell us more about yourself by adding it Manually!</p>';
			};
				?>
             <form data-abide method="post" action="registerData.php"> 
 
                <div class="row">
                    <div class="large-12 columns">
                        <hr>
                    </div>
                </div>
                     
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regSex">Your gender <small>required</small>
                        <select id="regSex" name="regSex" class="medium" required>
                          <option value="">Select your gender</option>
                          <option value="female">Female</option>
                          <option value="male">Male</option>
                          <option value="both">Both</option>
                        </select>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regAge">Your age <small>required</small>
                      	<input id="regAge" name="regAge" pattern="max_age" class="medium" type="number" size="6" min="18" max="99">
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regHcolor">Your hair color <small>required</small>
                        <select id="regHcolor" name="regHcolor" class="medium" required>
                          <option value="">Select your hair color</option>
                          <option value="auburn">Auburn</option>
                          <option value="black">Black</option>
                          <option value="blond">Blond</option>
                          <option value="brown">Brown</option>
                          <option value="chestnut">Chestnut</option>
                          <option value="greywhite">Grey/White</option>
                          <option value="red">Red</option>
                        </select>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
                  
                  <div class="large-4 left columns">
                    <div class="row collapse">
                      <label for="regHlength">Your hair length <small>required</small>
                        <select id="regHlength" name="regHlength" class="medium" required>
                          <option value="">Select your hair length</option>
                          <option value="long">Long</option>
                          <option value="second">Medium</option>
                          <option value="short">Short</option>
                          <option value="bald">Bald</option>
                        </select>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>      
                 
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regEcolor">Your eye color <small>required</small>
                        <select id="regEcolor" name="regEcolor" class="medium" required>
                          <option value="">Select your eye color</option>
                          <option value="amber">Amber</option>
                          <option value="blue">Blue</option>
                          <option value="brown">Brown</option>
                          <option value="grey">grey</option>
                          <option value="green">Green</option>
                          <option value="hazel">Hazel</option>
                          <option value="red">Red</option>
                          <option value="violet">Violet</option>
                        </select>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regWeigth">Your weigth <small>required</small>
                        <select id="regWeigth" name="regWeigth" class="medium" required>
                          <option value="">Select your weigth in kg</option>
                          <option value="50-60">60 or less</option>
                          <option value="60-70">60-70</option>
                          <option value="70-80">70-80</option>
                          <option value="80-90">80-90</option>
                          <option value="90-100">90-100</option>
                          <option value="100-110">100-110</option>
                          <option value="100+">100 or more</option>
                        </select>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
            
                  <div class="large-4 left columns">
                    <div class="row collapse">
                      <label for="regBody">Your body type <small>required</small>
                        <select id="regBody" name="regBody" class="medium" required>
                          <option value="">Select your body type</option>
                          <option value="normal">Normal</option>
                          <option value="slim">Slim</option>
                          <option value="halfslim">Half-slim</option>
                          <option value="athletic">Athletic</option>
                          <option value="chubby">Chubby</option>
                          <option value="beefy">Beefy</option>
                        </select>
                      </label>
                      <small class="error">Broke.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regLength">Your length (CM) <small>required</small>
                          <input type="number" id="regLength" name="regLength" min="150" max="220" required>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-12 columns">
                    <hr>
                  </div>
                </div>
                            
                <div class="row">
                  <div class="large-12 columns">
                    <button type="submit" class="medium button green">Submit</button>
                  </div>
                </div>
                
            </form>               
                <?php
		};
?>
    <div id="csvForm" class="reveal-modal" data-reveal><h2>Add a new user.</h2>
        <p>Upload new csv by browsing to file and clicking on Upload</p>
        <form enctype='multipart/form-data' action='userpage.php' method='post'>   
            <input size='50' type='file' name='filename'><br />
            <input class='secondary button' type='submit' name='submit' value='Upload'>
        </form>
        <a class="close-reveal-modal">&#215;</a>
    </div>

    </div>
  </section>
  <?php
	}else{
?>
  <section class="row ">
    <div class="small-10 small-centered columns">
      <h2>Your Data</h2>
      <p>This is what you've told us..</p>
      <table>
          <thead>
            <tr>
              <th>Age</th>
              <th>Gender</th>
              <th>Hair color</th>
              <th>Hair length</th>
              <th>Eye color</th>
              <th>Weigth</th>
              <th>Length</th>
              <th>Body type</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
				foreach ($stmtData as $user) {
					$userAge = $user['regAge'];
					$userGender = $user['regSex'];
					$userHcolor = $user['regHcolor'];
					$userHlength = $user['regHlength'];
					$userEcolor = $user['regEcolor'];
					$userWeigth = $user['regWeigth'];
					$userLength = $user['regLength'];
					$userBody = $user['regBody'];
									
				}
					echo '<td>'.$userAge . '</td>';
					echo '<td>'.$userGender . '</td>';
					echo '<td>'.$userHcolor . '</td>';
					echo '<td>'.$userHlength . '</td>';
					echo '<td>'.$userEcolor . '</td>';
					echo '<td>'.$userWeigth . '</td>';
					echo '<td>'.$userLength . '</td>';
					echo '<td>'.$userBody . '</td>';
			?>
            </tr>
          </tbody>
        </table>
		<a href="#" data-reveal-id="updateModal" class="button secondary">Edit</a>
        <div id="updateModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
          <h2 id="firstModalTitle">Update your userdata.</h2>
          <?php var_dump($user['regAge']) ?>
             <form data-abide method="post" action="updateData.php"> 
                     
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regSex">Your gender <small>required</small>
                        <select id="regSex" name="updateSex" class="medium" required>
                          <option value="">Select your gender</option>
                          <option <?php if($userGender=='female'){ echo 'selected';}; ?> value="female">Female</option>
                          <option <?php if($userGender=='male'){ echo 'selected'; }; ?> value="male">Male</option>
                          <option value="both">Both</option>
                        </select>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regAge">Your age <small>required</small>
                      <?php
						$age = $user['regAge'];
						echo '<input id="updateAge" name="updateAge" pattern="max_age" class="medium" type="number" size="6" min="18" max="99" value="'.$age.'">';					  
					  ?>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="updateHcolor">Your hair color <small>required</small>
                        <select id="updateHcolor" name="updateHcolor" class="medium" required>
                          <option value="">Select your hair color</option>
                          <option <?php if($userHcolor=='auburn'){ echo 'selected';}; ?> value="auburn">Auburn</option>
                          <option <?php if($userHcolor=='black'){ echo 'selected';}; ?> value="black">Black</option>
                          <option <?php if($userHcolor=='blond'){ echo 'selected';}; ?> value="blond">Blond</option>
                          <option <?php if($userHcolor=='brown'){ echo 'selected';}; ?> value="brown">Brown</option>
                          <option <?php if($userHcolor=='chestnut'){ echo 'selected';}; ?> value="chestnut">Chestnut</option>
                          <option <?php if($userHcolor=='greywhite'){ echo 'selected';}; ?> value="greywhite">Grey/White</option>
                          <option <?php if($userHcolor=='red'){ echo 'selected';}; ?> value="red">Red</option>
                        </select>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
                  
                  <div class="large-4 left columns">
                    <div class="row collapse">
                      <label for="updateHlength">Your hair length <small>required</small>
                        <select id="updateHlength" name="updateHlength" class="medium" required>
                          <option value="">Select your hair length</option>
                          <option <?php if($userHlength=='long'){ echo 'selected';}; ?> value="long">Long</option>
                          <option <?php if($userHlength=='medium'){ echo 'selected';}; ?> value="medium">Medium</option>
                          <option <?php if($userHlength=='short'){ echo 'selected';}; ?> value="short">Short</option>
                          <option <?php if($userHlength=='bald'){ echo 'selected';}; ?> value="bald">Bald</option>
                        </select>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>      
                 
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="updateEcolor">Your eye color <small>required</small>
                        <select id="updateEcolor" name="updateEcolor" class="medium" required>
                          <option value="">Select your eye color</option>
                          <option <?php if($userEcolor=='amber'){ echo 'selected';}; ?> value="amber">Amber</option>
                          <option <?php if($userEcolor=='blue'){ echo 'selected';}; ?> value="blue">Blue</option>
                          <option <?php if($userEcolor=='brown'){ echo 'selected';}; ?> value="brown">Brown</option>
                          <option <?php if($userEcolor=='grey'){ echo 'selected';}; ?> value="grey">grey</option>
                          <option <?php if($userEcolor=='green'){ echo 'selected';}; ?> value="green">Green</option>
                          <option <?php if($userEcolor=='hazel'){ echo 'selected';}; ?> value="hazel">Hazel</option>
                          <option <?php if($userEcolor=='red'){ echo 'selected';}; ?> value="red">Red</option>
                          <option <?php if($userEcolor=='violet'){ echo 'selected';}; ?> value="violet">Violet</option>
                        </select>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="updateWeigth">Your weigth <small>required</small>
                        <select id="updateWeigth" name="updateWeigth" class="medium" required>
                          <option value="">Select your weigth in kg</option>
                          <option <?php if($userWeigth <= 60){ echo 'selected';}; ?> value="50-60">60 or less</option>
                          <option <?php if($userWeigth >= 61 && $userWeigth <= 70){ echo 'selected';}; ?> value="60-70">60-70</option>
                          <option <?php if($userWeigth >= 71 && $userWeigth <= 80){ echo 'selected';}; ?> value="70-80">70-80</option>
                          <option <?php if($userWeigth >= 81 && $userWeigth <= 90){ echo 'selected';}; ?> value="80-90">80-90</option>
                          <option <?php if($userWeigth >= 91 && $userWeigth <= 100){ echo 'selected';}; ?> value="90-100">90-100</option>
                          <option <?php if($userWeigth >= 101 && $userWeigth <= 110){ echo 'selected';}; ?> value="100-110">100-110</option>
                          <option <?php if($userWeigth >= 110){ echo 'selected';}; ?> value="100+">100 or more</option>
                        </select>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
            
                  <div class="large-4 left columns">
                    <div class="row collapse">
                      <label for="updateBody">Your body type <small>required</small>
                        <select id="updateBody" name="updateBody" class="medium" required>
                          <option value="">Select your body type</option>
                          <option <?php if($userBody=='normal'){ echo 'selected';}; ?> value="normal">Normal</option>
                          <option <?php if($userBody=='slim'){ echo 'selected';}; ?> value="slim">Slim</option>
                          <option <?php if($userBody=='halfslim'){ echo 'selected';}; ?> value="halfslim">Half-slim</option>
                          <option <?php if($userBody=='athletic'){ echo 'selected';}; ?> value="athletic">Athletic</option>
                          <option <?php if($userBody=='chubby'){ echo 'selected';}; ?> value="chubby">Chubby</option>
                          <option <?php if($userBody=='beefy'){ echo 'selected';}; ?> value="beefy">Beefy</option>
                        </select>
                      </label>
                      <small class="error">Broke.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="updateLength">Your length (CM) <small>required</small>
                        <?php
                        $length = $user['regLength'];
						echo '<input type="number" id="updateLength" name="updateLength" min="150" max="220" value="'.$length.'" required>';
						?>
                      </label>
                      <small class="error">You forgot to fill in this part of the form.</small>
                    </div>
                  </div>
                </div>
                            
                <div class="row">
                  <div class="large-12 columns">
                    <button type="submit" class="medium button green">Update</button>
                  </div>
                </div>
                
            </form> 
          <a class="close-reveal-modal" aria-label="Close">&#215;</a>
        </div>
    </div>
  </section>
  <?php
	};
			
			?>
</section>
<br/>
</div>
<script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
	<script src="js/foundation/foundation.abide.js"></script>

<script>
	$(document).foundation();
$(document)
  .foundation({
    abide : {
      patterns: {
        max_age: /^[0-9-]{0,2}$/,
        //max_length:/^([150-220]{3})([0-9]{3})$/
      }
    }
  });
	</script>
</body>
</html>