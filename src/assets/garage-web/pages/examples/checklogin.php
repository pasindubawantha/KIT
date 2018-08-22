<?php
//include "header.php";

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "kitwebapp"; // Database name
$tbl_name = "user"; // Table name

// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password", "$db_name") or die("cannot connect");


// username and password sent from form
 $myusername=$_POST['myusername'];
 $mypassword=$_POST['mypassword'];

//$myusername = "suran";
//$mypassword = "123";

//echo $myusername;

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($con, $myusername);
$mypassword = mysqli_real_escape_string($con, $mypassword);

$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result = mysqli_query($con, $sql);

// Mysql_num_row is counting table row
$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 1) {

// Register $myusername, $mypassword and redirect to file "login_success.php"
    $_SESSION['username'] = $myusername;
    $_SESSION['isloged'] = "true";


    header("location:http://localhost/KIT-Web-App/garage-web");
} else {
    var_dump($_POST);
    echo "Wrong Username or Password";
}
?>
