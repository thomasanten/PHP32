<?php
include 'library.php'; // include the library for database connection

function encrypt($string){
	return base64_encode(base64_encode(base64_encode($string)));
}

function decrypt($string){
	return base64_decode(base64_decode(base64_decode($string)));
}

if(isset($_POST['action']) && $_POST['action'] == 'login'){ // Check the action `login`
	$username 		= htmlentities($_POST['username']); // Get the username
	$password 		= htmlentities(encrypt($_POST['password'])); // Get the password and decrypt it
		
	$stmt = $dbh->prepare('SELECT * FROM users WHERE Username=:username and Password=:password');
	$stmt->bindParam(":username",$username);
	$stmt->bindParam(":password",$password);
	$stmt->execute();
	$stmtNo	=	$stmt->rowCount(); // Counting the rows that match the given parameters (username + password)

	if($stmtNo <= 0)// If 0 rows
	{
		echo 0;
	}else{// If else, fetch all the data in 2 sessions and echo 1 to let jquery handle the rest on the index.php 
		$stmtResult = $stmt->fetch(PDO::FETCH_ASSOC);

		$_SESSION['userid'] 		= $stmtResult['id'];
		$_SESSION['username'] 	= $stmtResult['Username'];
		echo 1;	
	}
}
?>