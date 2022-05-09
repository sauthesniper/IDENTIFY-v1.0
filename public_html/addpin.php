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
$nume=$cnp=$varsta=$gen=$anAngajare=$functie=$departament=$email=$telefon=$idcard="";
$enume=$ecnp=$evarsta=$egen=$eanAngajare=$efunctie=$edepartament=$eemail=$etelefon=$eidcard="";
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
    if (!is_numeric($valoare) || !strlen($valoare)) {
    $evaloare = "Format incorect!";$ok=0;
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
        {header("Location: thankyoupin.html");die;} 
}}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Angajati</title>
    <link rel="icon" type="image/png" href="logo2.png">
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap');
*{
  font-family: 'Ubuntu', sans-serif;
  box-sizing: border-box;
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
    color:red;
}
</style>
</head>
<body>
<div class="sidenav">
  <img src="logo2.png" style="width: 135px ; height: 135px; padding-top: 20px; margin-bottom: 100px; padding-left: 22px;">
  <a style="background-color: #0066ff; color: white;"> <span>&#129078;</span> Dashboard</a>
  <a href="#list"> <span>&#129078;</span> Angajati</a>
  <a href="#salary"> <span>&#129078;</span> Financiar</a>
  <a href="#broadcast"> <span>&#129078;</span> Anunturi</a>
  <a href=""></a>

</div>
<div style="margin-left: 30%;margin-right: 30%,  ;">
  <p style="margin-left:25%;font-color:#0066FF; font-size:  35px"> Adaugare cod pin </p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <table style="text-align: center;">
    <tr><td align="right">Valoare :</td><td align="left"><input type="text" name="valoare" value="<?php echo $valoare;?>"> <span class="error">* <?php echo $evaloare;?></span></td></tr>
    <tr><td align="right">Descriere :</td><td align="left"><input type="text" name="descriere" value="<?php echo $descriere;?>"><span class="error">* <?php echo $edescriere;?></span></td></tr>    
     </table>  <a href="https://youlearninfo.ro/thankyoupin.html"> <button type="submit" name="submit" style="width:60%;"> Adaugare cod pin</button> </a>
</div>
    
  </form>    
</body>
</html> 