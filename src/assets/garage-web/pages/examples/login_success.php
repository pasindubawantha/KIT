// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
<?php
session_start();
if (isset($_SESSION["lastname"])) {
    header("location:http://localhost/KIT-Web-App/garage-web/");
}
?>

<html>
<body>
Login Successful
</body>
</html>
