<?php
ob_start();
session_start();

unset($_SESSION['userid']);

function logoutbutton() {
    echo "<form action=\"lib/logout.php\" method=\"post\"><input class=\"button\" value=\"Logout\" type=\"submit\" /></form>"; //logout button
}
?>


