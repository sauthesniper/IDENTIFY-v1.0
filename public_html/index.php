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
	<title>Front Page</title>
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
}
.main {
  color: #ffffff;
  font-size: 55px; /* Same as the width of the sidenav */
  text-align: center;
  margin-top: 150px;
  font-family: 'Ubuntu', sans-serif;
}

</style>
</head>
<body style="background-color: #00ccff;">

<div class="sidenav">
  <img src="http://youlearninfo.ro/logo2.png">
  <a href="dashboard.php"><span>&#129138</span> Dashboard</a>
  <a href="angajati.php"><span>&#129138</span> Angajati</a>
  <a href="pinfinal.php"><span>&#129138</span> Pinuri </a>
  <a href="gatelog.php"><span>&#129138</span> Gate log</a>
</div>
<div class="main">
  <a style="padding-left: 180px;"> Bun venit, Liviu!</a> <br><br>
  <p style="padding-left:250px; font-size: 32px;; text-align: left;">Te aflii pe prima pagina !</p>
    <p style="padding-left:250px; font-size: 32px; text-align: left;">Sistemele tale ruleaza versiunea : IDea 1.0</p>
    <p style="padding-left:250px; font-size: 32px; text-align: left;">
    	 <span style="font-size: 45px; font-weight: bold; padding-right: 20px">&#8598;</span> Poti naviga pe panou folosind acest sidebar.
    </p>
</div>
   
</body>
</html> 
