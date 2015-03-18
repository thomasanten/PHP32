<?php
include '../library.php';

$return = $_POST;

$stmt = $dbh->prepare("SELECT * FROM userData");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-type: application/json; charset=utf-8");
echo json_encode($result);


?>