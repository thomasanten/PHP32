<?php
include 'library.php';
// Destroy the session, so there wi'll be no data left behind.
session_destroy();
// Unset these specific sessions for security reasons.
unset($_SESSION['userid']);
// Unset these specific sessions for security reasons.
unset($_SESSION['username']);
// Redirect after whiping all sessions to the index.php
echo '<script type="text/javascript">window.location = "index.php"; </script>';
?>