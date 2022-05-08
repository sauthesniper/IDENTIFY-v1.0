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
  if (empty($_POST["nume"])) {
    $enume = "Camp obligatoriu!";$ok=0;
  } else 
  {
    $nume = verif($_POST["nume"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nume)) {
    $enume = "Format incorect!";$ok=0;
    }
  }
if (empty($_POST["CNP"]))
{
  $ecnp="Camp obligatoriu!";$ok=0;
}else
{
  $cnp = verif($_POST["CNP"]);
}
 if (empty($_POST["varsta"]))
{
  $evarsta="Camp obligatoriu!";$ok=0;
}else
{
  $varsta = verif($_POST["varsta"]);
}
 if (empty($_POST["gen"]))
{
  $egen="Camp obligatoriu!";$ok=0;
}else
{
  $gen = verif($_POST["gen"]);
}
 if (empty($_POST["anAngajare"]))
{
  $eanAngajare="Camp obligatoriu!";$ok=0;
}else
{
  $anAngajare= verif($_POST["anAngajare"]);
}
 if (empty($_POST["functie"]))
{
  $efunctie="Camp obligatoriu!";$ok=0;
}else
{
  $functie = verif($_POST["functie"]);
}
 if (empty($_POST["departament"]))
{
  $edepartament="Camp obligatoriu!";$ok=0;
}else
{
  $departament= verif($_POST["departament"]);
}
 if (empty($_POST["email"]))
{
  $eemail="Camp obligatoriu!";$ok=0;
}else
{
  $email= $_POST["email"];
}
 if (empty($_POST["telefon"]))
{
  $etelefon="Camp obligatoriu!";$ok=0;
}else
{
  $telefon= $_POST["telefon"];
}
 if (empty($_POST["idcard"]))
{
  $eidcard="Camp obligatoriu!";$ok=0;
}else
{
  $idcard= verif($_POST["idcard"]);
}
if ($ok)
{
        $servername = "localhost";
        $dbname = "youlear1_DB"; 
        $username = "youlear1_admin_user"; 
        $password = "IDentify2005"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql="INSERT INTO employees VALUES (NULL, '$idcard', '$nume', '$cnp', '$varsta', '$gen', '$anAngajare', 'profilepics/unknown.png', 0, '$functie', '2340', '$telefon', '$email', '$departament');";
        $conn->query($sql);
        $conn->close();
        {header("Location: thankyou.html");die;} 
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
  <img src="http://youlearninfo.ro/logo2.png">
  <a href="dashboard.php"><span>&#129138</span> Dashboard</a>
  <a href="angajati.php"><span>&#129138</span> Angajati</a>
  <a href="pinfinal.php"><span>&#129138</span> Pinuri </a>
  <a href="gatelog.php"><span>&#129138</span> Gate log</a>
</div>

<div style="margin-left: 30%;margin-right: 30%,  ;">
  <p style="margin-left:25%;font-color:#0066FF; font-size:  35px"> Adaugare angajat </p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <table style="text-align: center;">
    <tr><td align="right">Nume :</td><td align="left"><input type="text" name="nume" value="<?php echo $nume;?>"> <span class="error">* <?php echo $enume;?></span></td></tr>
    <tr><td align="right">CNP :</td><td align="left"><input type="text" name="CNP" value="<?php echo $cnp;?>"><span class="error">* <?php echo $ecnp;?></span></td></tr>
    <tr><td align="right">Varsta :</td> <td align="left"><input type="text" name="varsta" value="<?php echo $varsta;?>"><span class="error">* <?php echo $evarsta;?></span></td></tr>
    <tr><td align="right">Gen: </td> <td align="left"><input type="text" name="gen" value="<?php echo $gen;?>"><span class="error">* <?php echo $egen;?></span></td></tr>
    <tr><td align="right">An Angajare :</td><td align="left"><input type="text" name="anAngajare" value="<?php echo $anAngajare;?>"><span class="error">* <?php echo $eanAngajare;?></span></td></tr>
    <tr><td align="right">Functie :</td><td align="left"><input type="text" name="functie" value="<?php echo $functie;?>"><span class="error">* <?php echo $efunctie;?></span></td></tr>
    <tr><td align="right">Departament :</td><td align="left"><input type="text" name="departament" value="<?php echo $departament;?>"><span class="error">* <?php echo $edepartament;?></span></td></tr>
    <tr><td align="right">Email :</td><td align="left"><input type="email" name="email" value="<?php echo $email;?>"><span class="error">* <?php echo $eemail;?></span></td></tr>
    <tr><td align="right">Telefon :</td><td align="left"><input type="tel" name="telefon" value="<?php echo $telefon;?>"><span class="error">* <?php echo $etelefon;?></span></td></tr>
    <tr><td align="right">Serie Card :</td><td align="left"><input type="text" name="idcard" value="<?php echo $idcard;?>"><span class="error">* <?php echo $eidcard;?></span></td></tr>         
     </table>  <a href="https://youlearninfo.ro/thankyou.html"> <button type="submit" name="submit" style="width:60%;"> Adaugare angajat</button> </a>
</div>
    
  </form>    
</body>
</html> 