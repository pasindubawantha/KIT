

<?php 
$pre_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

echo $pre_link;

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "kitwebapp"; // Database name

$con = mysqli_connect("$host", "$username", "$password", "$db_name") or die("cannot connect");

$sql = "INSERT INTO `services` (`id`, `user_id`, `service_type`) VALUES (NULL, '2', 'wash');";
$result = mysqli_query($con, $sql);

?>