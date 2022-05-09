<?php
session_start();
    $servername = "localhost";
    $dbname = "youlear1_DB"; 
    $username = "youlear1_admin_user"; 
    $password = "IDentify2005"; 
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
if (isset($_SESSION['user_id']))
  {
    $id= $_SESSION['user_id'];
    $check="SELECT * FROM login WHERE user_id='$user_id' LIMIT 1";
    $result=$conn-> query($check); $rn=$result->num_rows;
    if ($result && $rn>0)
    {
      $user_data= mysqli_fetch_assoc($result);
    }
  }
  else {header("Location: login.php");die;} 
$valoare=$descriere="";
$evaloare=$edescriere="";
$ok=1;
function verif($data) {
  $data = htmlspecialchars($data);  $data = trim($data);  $data = stripslashes($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["valoare"])) {
    $evaloare = "Camp obligatoriu!";$ok=0;
  } else 
  {
    $valoare = verif($_POST["valoare"]);
    if (!is_numeric($valoare) || !strlen($valoare)) 
    {
      $evaloare = "Format incorect!";$ok=0;
    }
    $sql="SELECT * FROM pins WHERE value='$valoare' ";
    $result=$conn->query($sql); $result=$result->num_rows;
    if ($result>0) 
      {
        $evaloare = "Acest pin deja exista";$ok=0;
      }
  }
if (empty($_POST["descriere"]))
{
  $edescriere="Camp obligatoriu!";$ok=0;
}else
{
  $descriere = verif($_POST["descriere"]);
}
if ($ok)
{
        $servername = "localhost";
        $dbname = "youlear1_DB"; 
        $username = "youlear1_admin_user"; 
        $password = "IDentify2005"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql="INSERT INTO `pins` (`id`, `value`, `valid`, `description`) VALUES (NULL, '$valoare', '1', '$descriere');";
        $conn->query($sql);
        $conn->close();
        header("Location: addedpin.html");  die; 
}
} 
?>
<!DOCTYPE html>
<html>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap');
*{
  font-family: 'Ubuntu', sans-serif;
}
.sidenav {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #660066;
  overflow-x: hidden;
  padding-top: 20px;
}
 
.sidenav a {
  padding: 6px 6px 6px 10px;
  text-decoration: none;
  font-size: 24px;
  color: #99ccff;
  display: block;
}
 
.sidenav a:hover {
  color: #f1f1f1;
}
.sidenav img
{
  width:145px;
    height:145px;
    margin-left:10px;
    margin-bottom: 100px;
}
.sidenav span{
  font-size: 20px;
    color: white;
}s
.main {
  color: #ffffff;
  font-size: 30px; /* Same as the width of the sidenav */
  text-align: center;
  margin-top: 50px;
  font-family: 'Ubuntu', sans-serif;
}
table {
  border-collapse: collapse;
  width: 80vw;
  font-size: 24px;
  color:  white;
  margin-left: 250px;
  padding-right: 250px;
  margin-top:100px;
}

.listing th{
  background-color:#660066 ;
}
td {
  color: #660066;
  text-align: left;
  padding: 8px;
}
td {
  color: #660066;
  text-align: left;
  padding: 8px;
}
p {
    color: black;
    padding-left:180px;
}
.listing tr:nth-child(odd) {
  background-color: #9999CC;
}
tr {
  background-color: white;
}
input {
  width: 35vw;
  padding: 12px;
  font-family: 'Ubuntu';
  font-size: 22px;
  margin-top:10px;
  box-sizing: border-box;
  color: #660066;
}
button[type=submit] {
  width: 35vw;
  padding: 12px;
  margin-top:75px;
  font-family: 'Ubuntu';
  font-size: 22px;
  margin-left: 60px;
  background-color: #663366 ;
  color: white;
  box-sizing: border-box;
}
form td{
    font-size:24px;
}
form span{
    font-size:24px;
   

</style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
    <link rel="icon" type="image/png" href="logo2.png">
</head>
</head>
<body style="background-color: #ffffff">

<div class="sidenav">
  <img src="http://youlearninfo.ro/logo2.png">
  <a href="dashboard.php"><span>&#129138</span> Dashboard</a>
  <a href="angajati.php"><span>&#129138</span> Angajati</a>
  <a href="pinfinal.php"><span>&#129138</span> Pinuri </a>
  <a href="gatelog.php"><span>&#129138</span> Gate log</a>
</div>
<div class="main">
  <p style="font-color:#0066FF; font-size:  35px; text-align:center "> Evidenta validarilor IDevice </p>
  <table class="listing">
    <tr>
      <th>Data validare </th>
      <th>Nume</th>
      <th>Descriere</th>
      <th>Cod folosit</th>
    </tr>
  <?php
        $servername = "localhost";
        $dbname = "youlear1_DB"; 
        $username = "youlear1_admin_user"; 
        $password = "IDentify2005"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql= "SELECT * FROM statements";
        $result= $conn-> query($sql);
        if ($result->num_rows>0)
        {
          while ($row=$result->fetch_assoc())
          {

            echo "<tr><td style=\"text-align: center; witdth: 30%;\">" .$row["date"] ."</td><td style=\"text-align: center;\">". $row["name"]. "</td><td>" .$row["description"]."</td><td style=\"text-align: center;\">" .$row["card"]."</td></tr>";
          } echo "</table>";
        }
        else echo "<tr><td>Nu exista intrari in acest moment..</td></tr>";
      $conn->close();
  ?>
  </table>
</div>
</body>
</html> 