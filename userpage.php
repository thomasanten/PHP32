<?php
include 'library.php';
// Check if the user is logged in, else redirect them to index.php
if(!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
	echo '<script type="text/javascript">window.location = "index.php"; </script>';
}else{
	// Set user ID
	$userId = $_SESSION['userid'];
}
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
</hr>
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
        <li class="has-form"><a href="logout.php" class="a">logout</a></li>
      </ul>
      <ul class="left">
        <li>Welcome, <?php echo ucfirst($_SESSION['username']); ?>.</li>
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
			if($_FILES["filename"]["error"] == 4){
				echo '<p>Er is geen CSV bestand aangetroffen... Probeer het eens opnieuw!</p>';
			}else{
			
			/*	
			if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
				echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
				echo "<h2>Displaying contents:</h2>";
				readfile($_FILES['filename']['tmp_name']);
			}
			*/
			
			//Import uploaded file to Database
			$handle = fopen($_FILES['filename']['tmp_name'], "r");
			
			//Loop trough the ; seperated data
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
		
			//Prepare the a query with the data pulled out of the CSV
			$stmt = $dbh->prepare("INSERT INTO userData(
							id,
							regSex,
							regAge,
							regHcolor,
							regEcolor,
							regHlength,
							regWeigth,
							regBody,
							regLength,
							regSmoker,
							regSsize,
							regRemarks) VALUES (
							:id,  
							:regSex,
							:regAge,
							:regHcolor,
							:regEcolor,
							:regHlength,
							:regWeigth,
							:regBody,
							:regLength,
							:regSmoker,
							:regSsize,
							:regRemarks)");
														  
				$stmt->bindParam(':id', $_SESSION['userid']);       
				$stmt->bindParam(':regSex', $data[0]);       
				$stmt->bindParam(':regAge', $data[1]); 
				$stmt->bindParam(':regHcolor', $data[2]);
				$stmt->bindParam(':regEcolor', $data[3]); 
				$stmt->bindParam(':regHlength', $data[4]);
				$stmt->bindParam(':regWeigth', $data[5]);       
				$stmt->bindParam(':regBody', $data[6]); 
				$stmt->bindParam(':regLength', $data[7]);
				$stmt->bindParam(':regSmoker', $data[8]); 
				$stmt->bindParam(':regSsize', $data[9]);
				$stmt->bindParam(':regRemarks', $data[10]);

				}
				// Check if ececution went good, show the outcome..
				if (	$stmt->execute()) {
					?>
						<div class="small-10 large-centered text-center columns">
							<h3>Succes!</h3>
						</div>
					</section>
      <?
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
							}
							?>
						</div>
					</section>
      <?
				}
			}
			// Close the file pointer
			fclose($handle);
		}else {
			unset($_POST['submit']);
			
			print'<p>No data added yet! Tell us more about yourself by adding it Manually or by uploading a <a href="#" data-reveal-id="csvForm">CSV&hellip;</a> file!</p>';
				?>
             <form data-abide method="post" action="register.php"> 
 
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
                      <small class="error">You can't be sure about your sex.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regAge">Your age <small>required</small>
                      	<input id="regAge" name="regAge" class="medium" type="number" size="6" min="18" max="99" value="21">
                      </label>
                      <small class="error">Broke.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regHcolor">Your hair color <small>required</small>
                        <select id="regHcolor" name="regHcolor" class="medium" required>
                          <option value="">Select your hair color</option>
                          <option value="black">Black</option>
                          <option value="brown">Brown</option>
                          <option value="blond">Blond</option>
                          <option value="auburn">Auburn</option>
                          <option value="chestnut">Chestnut</option>
                          <option value="red">Red</option>
                          <option value="greywhite">Grey/White</option>
                        </select>
                      </label>
                      <small class="error">Broke.</small>
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
                      <small class="error">Broke.</small>
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
                      <small class="error">Broke.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regWeigth">Your weigth <small>required</small>
                        <select id="regWeigth" name="regWeigth" class="medium" required>
                          <option value="">Select your weigth in kg</option>
                          <option value="50-60">50-60</option>
                          <option value="60-70">60-70</option>
                          <option value="70-80">70-80</option>
                          <option value="80-90">80-90</option>
                          <option value="90-100">90-100</option>
                          <option value="100-110">100-110</option>
                          <option value="100+">100+</option>
                        </select>
                      </label>
                      <small class="error">Broke.</small>
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
                      <small class="error">Broke.</small>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regSmoker">You're a smoker? <small>required</small>
                        <select id="regSmoker" name="regSmoker" class="medium" required>
                          <option value="">Select your state</option>
                          <option value="yes">Yes</option>
                          <option value="sometimes">Sometimes</option>
                          <option value="socially">Socially</option>
                          <option value="never">Never</option>
                        </select>
                      </label>
                      <small class="error">Broke.</small>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="large-4 columns">
                    <div class="row collapse">
                      <label for="regSsize">Your shoe size (EU)
                        <select id="regSsize" name="regSsize" class="medium" required>
                          <option value="">Select your shoe size in eu</option>
                          <option value="34">34</option>
                          <option value="35">35</option>
                          <option value="36">36</option>
                          <option value="37">37</option>
                          <option value="38">38</option>
                          <option value="39">39</option>
                          <option value="40">40</option>
                          <option value="41">41</option>
                          <option value="42">42</option>
                          <option value="43">43</option>
                          <option value="44">44</option>
                          <option value="45">45</option>
                          <option value="46">46</option>
                          <option value="47">47</option>
                          <option value="48">48</option>
                          <option value="49">49</option>
                          <option value="50">50</option>
                          <option value="51">51</option>
                        </select>
                      </label>
                      <small class="error">Broke.</small>
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
		}
?>
    <div id="csvForm" class="reveal-modal" data-reveal><h2>This is a modal.</h2>
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
              <th>Shoe size</th>
              <th>Smoker</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
				foreach ($stmtData as $user) {
					echo '<td>'.$user['regAge'] . '</td>';
					echo '<td>'.$user['regSex'] . '</td>';
					echo '<td>'.$user['regHcolor'] . '</td>';
					echo '<td>'.$user['regEcolor'] . '</td>';
					echo '<td>'.$user['regHlength'] . '</td>';
					echo '<td>'.$user['regWeigth'] . '</td>';
					echo '<td>'.$user['regBody'] . '</td>';
					echo '<td>'.$user['regLength'] . '</td>';
					echo '<td>'.$user['regSmoker'] . '</td>';
					echo '<td>'.$user['regSsize'] . '</td>';
				}
			?>
            </tr>
          </tbody>
        </table>
    </div>
  </section>
  <?php
	}
			
			?>
  <section class="row " style="background-color:#ecf0f1;">
    <div class="small-10 small-centered columns">
      <h2>Games</h2>
    </div>
  </section>
</section>
<br/>
</div>
<script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
	<script src="js/foundation/foundation.abide.js"></script>

<script>
      $(document).foundation();
	</script>
</body>
</html>