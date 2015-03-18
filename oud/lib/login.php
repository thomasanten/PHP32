<?php
session_start();
include_once('include/connection.php');

//MySQLi query
$stmt = $dbh->prepare('SELECT * FROM table WHERE ID=?');

$stmt->bindParam(1, $_GET['uname'], PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if( ! $row)
{
    die('nothing found');
}else{
	die('found it');
}

//get all records from add_delete_record table
/*
while($row = $results->fetch_assoc())
{
  echo '<li id="item_'.$row["id"].'">';
  echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
  echo '<img src="images/icon_del.gif" border="0" />';
  echo '</a></div>';
  echo $row["content"].'</li>';
}
*/

//close db connection
$dbh->close();
?>


