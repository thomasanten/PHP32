<?php
if(empty($_GET['userid'])){
	echo '<script type="text/javascript">window.location = "../userpage.php";</script>';
}

// Database data
DEFINE('DB_HOST', '127.0.0.1');		// Server naam
DEFINE('DB_USERNAME', 'root');		// Gebruikersnaam
DEFINE('DB_PASSWORD', '');		// Wachtwoord
DEFINE('DB_DATABASE', 'honour');	// Database naam


// Initialisatie
$output			= "";
$table 			= "userData";
$userid			= $_GET['userid'];
$sql 			= "SELECT * FROM $table WHERE id=$userid";
$filename       = "export_userdata.csv";

// Database connection
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
mysqli_set_charset($con, "utf8");

if (mysqli_connect_errno())
{
	die('Service kan niet geladen worden.');
}

// Get all data from the table
if($result = mysqli_query($con, $sql))
{
    $columns_total 	= mysqli_num_fields($result);
    
    // Get the fieldnames from the table
    for ($i = 0; $i < $columns_total; $i++)
    {
        $heading	=	mysqli_fetch_field_direct($result, $i)->name;
        $output		.= '"' . $heading . '";';
    }
    $output .="\n";

    // Get all the records from the table
    while ($row = mysqli_fetch_array($result))
    {
        for ($i=0; $i<$columns_total; $i++)
        {
            $output .='"'.$row["$i"].'";';
        }

        $output .="\n";
    }

    // Download the file
    header('Content-type: application/csv');
    header('Content-Disposition: attachment; filename=' . $filename);
    echo $output;
    //exit;
}
?>