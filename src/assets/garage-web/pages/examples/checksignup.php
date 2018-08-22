<?php
echo 1 ;
var_dump($_POST);
// include "header.php";

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "kitwebapp"; // Database name
$tbl_name = "user"; // Table name

// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password", "$db_name") or die("cannot connect");


// username and password sent from form
 $myusername=$_POST['namesurname'];
 $email=$_POST['email'];
 $mypassword=$_POST['password'];
 $contact=$_POST['contact'];
 $location=$_POST['location'];

//$myusername = "suran";
//$mypassword = "123";

//echo $myusername;

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$email = stripslashes($email);
$contact = stripslashes($contact);
$location = stripslashes($location);
$myusername = mysqli_real_escape_string($con, $myusername);
$mypassword = mysqli_real_escape_string($con, $mypassword);
$email = mysqli_real_escape_string($con, $email);
$contact = mysqli_real_escape_string($con, $contact);
$location = mysqli_real_escape_string($con, $location);

$sql = "SELECT * FROM $tbl_name WHERE username='$email' and password='$mypassword'";
$result = mysqli_query($con, $sql);

// Mysql_num_row is counting table row
$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

// FIREBASE SIGNEUP
require 'HttpRequest.php'; 
$r = new HttpRequest('https://www.googleapis.com/identitytoolkit/v3/relyingparty/signupNewUser?key=AIzaSyC1O0Wm91aQ1pP_y7tTkjDR5WwlF21H2XE', HttpRequest::METH_POST);

$r->addPostFields(array('email' => $email, 'password' => 's3c|r3t', $mypassword => false));
try {
    $body = $r->send()->getBody();
    echo $body;
} catch (HttpException $ex) {
    echo $ex;
}
// FIREBASE SI



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