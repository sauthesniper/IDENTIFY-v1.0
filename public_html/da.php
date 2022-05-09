<?php
$servername = "localhost";
$dbname = "youlear1_DB";
$username = "youlear1_admin_user";
$password = "IDentify2005";
$conn= new mysqli($servername,$username,$password,$dbname);
 $security="SELECT * FROM `employees` WHERE DEPART=\"SECURITY\" AND IS_PRESENT=1";
 $management="SELECT * FROM `employees` WHERE DEPART=\"MANAGEMENT\" AND IS_PRESENT=1";
 $factory="SELECT * FROM `employees` WHERE DEPART=\"FACTORY\" AND IS_PRESENT=1";
 $maintenance="SELECT * FROM `employees` WHERE DEPART=\"MAINTENANCE\" AND IS_PRESENT=1";
 $pinsecurity="UPDATE pins SET valid='0' WHERE valid='1';"
 $conn->query($pinsecurity);
 
 $r1=$conn-> query($security); $r2=$conn-> query($management);
 $r3=$conn-> query($factory);  $r4=$conn-> query($maintenance);
 $r1=$r1->num_rows;$r2=$r2->num_rows;$r3=$r3->num_rows;$r4=$r4->num_rows;
 $sql="INSERT INTO `reports` (`ID`, `day`, `MANAGEMENT`, `FACTORY`, `SECURITY`, `MAINTENANCE`) VALUES (NULL, CURRENT_TIMESTAMP, '$r2', '$r3', '$r1', '$r4')";
 $conn->query($sql);
 $conn->close();
?>