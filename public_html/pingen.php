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
        echo "DADA";
      $user_data= mysqli_fetch_assoc($result);
    }
  }
  else {header("Location: login.php");die;} 

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
    <link rel="icon" type="image/png" href="logo2.png">
</head>
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
  padding-top: 0px;
}

.sidenav a {
  padding-top: 6px;
  padding-bottom: 6px;
  padding-left: 20px;

  text-decoration: none;
  font-size: 24px;
  color: #99ccff;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}
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

th{
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
tr:nth-child(odd) {
  background-color: #9999CC;
}

</style>
</head>
<body style="background-color: #ffffff">

<div class="sidenav">
  <img src="logo2.png" style="width: 135px ; height: 135px; padding-top: 20px; padding-bottom: 100px; padding-left: 22px;">
  <a style="background-color: #0066ff; color: white;"> <span>&#129078;</span> Dashboard</a>
  <a href="angajati.php"> <span>&#129078;</span> Angajati</a>
  <a href="#salary"> <span>&#129078;</span> Financiar</a>
  <a href="#broadcast"> <span>&#129078;</span> Anunturi</a>
  <a href=""></a>

</div>
<div class="main">
  <table>
    <tr>
      <th>ID </th>
      <th>Valid</th>
      <th>Descriere</th>
      <th>Cod</th>
    </tr>
  <?php
        $servername = "localhost";
        $dbname = "youlear1_DB"; 
        $username = "youlear1_admin_user"; 
        $password = "IDentify2005"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql= "SELECT id,value,valid,description from pins";
    $result= $conn-> query($sql);
    if ($result->num_rows>0)
    {
      while ($row=$result->fetch_assoc())
      {

        echo "<tr><td>" .$row["id"] ."</td><td style=\"text-align: center;\">";
          if ($row["valid"]==1) echo "<span>&#10004;</span>"; 
            else echo "<span>&#10006;</span>";
        echo "</td><td>" .$row["description"]."</td><td>" .$row["value"]."</td></tr>";
      } echo "</table>";
    }
    else echo "<p> Nu exista pinuri de acces in acest moment</p>";
  $conn->close();
  ?>
  </table>
</div>
</body>
</html> 
