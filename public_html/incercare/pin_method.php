<?php
$servername = "localhost";
$dbname = "youlear1_DB"; 
$username = "youlear1_admin_user"; 
$password = "IDentify2005"; 
$val = $_GET['val'];
$key = $_GET['key'];
$keyValid="E9873D79C6D87DC0FB6A57786333891273AICSIACU1231F4453213303DA61F20BD67FC233AA33262";
if($key == $keyValid)
{
   echo 'R:';
} else {
   $conn->close();
}
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query("SELECT DISTINCT 1 FROM `pins` WHERE value='$val'");
if($result->num_rows == 0) 
{ echo 'D';}
else 
{echo 'G';}

?>