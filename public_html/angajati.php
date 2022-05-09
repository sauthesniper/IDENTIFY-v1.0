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

tr:nth-child(odd) {
  background-color: #9999CC;
}
input[type=text] {
  width: 25vw;
  padding: 12px;
  font-family: 'Ubuntu';
  font-size: 22px;
  box-sizing: border-box;
  color: #660066;
}
input[type=submit] {
  width: 12vw;
  padding: 12px;
  font-family: 'Ubuntu';
  font-size: 22px;
  margin-left: 60px;
  background-color: #663366 ;
  color: white;
  box-sizing: border-box;
}
input[type=submit] {
  width: 12vw;
  padding: 12px;
  font-family: 'Ubuntu';
  font-size: 22px;
  margin-left: 60px;
  background-color: #663366 ;
  color: white;
  box-sizing: border-box;
}
.column {
  float: left;
  width: 350px;
  padding: 10px;
  height: 300px; 
  
}
.column p {
    color: black ;
    font-size: 24px;
    
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;display: inline-block;
}
#buton_apel{
    width: 12vw;
  padding: 12px;
  font-family: 'Ubuntu';
  font-size: 22px;
  margin-left: 60px;
  background-color: #663366 ;
  color: white;
  box-sizing: border-box;
}
.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 200ms;
  visibility: hidden;
  opacity: 0;
}

.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #6666CC;
  border-radius: 5px;
  width: 45%;
  position: relative;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}

.popup .content {
  max-height: 30%;
  overflow: auto;
  color: white;
  font-size:24px;
  
}

</style>
</head>
<?php
 if (isset($_POST['submit'])){
        $name=$_POST["name"];
        $servername = "localhost";
        $dbname = "youlear1_DB"; 
        $username = "youlear1_admin_user"; 
        $password = "IDentify2005"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        $sql ="SELECT  * FROM employees WHERE NAME LIKE '%" . $name . "%'";
        $result=$conn->query($sql);
        $found=$result->num_rows==1;
        if ($result->num_rows==1)
            {
              while ($row=$result->fetch_assoc())
              {
                $imagine=$row["PHOTO"];
                $nume=$row["NAME"];
                $CNP=$row["CNP"];
                $varsta=$row["AGE"];
                $gen=$row["SEX"];
                $dataAngajare=$row["EMPLOYMENT_DATE"];
                $telefon=$row["PHONE_NUMBER"];
                $email=$row["EMAIL_ADRESS"];
                $departament=$row["DEPART"];
                $functie=$row["FUNCTION"];
                $an=$row["EMPLOYMENT_DATE"];
                $prezentAcum=$row["IS_PRESENT"];
                $salariu=$row["BASE_SALARY"];
              }
            }
     }
$conn->close();
?>
<?php
  if  (isset($_POST['button1']))
  {
          $servername = "localhost";
          $dbname = "youlear1_DB"; 
          $username = "youlear1_admin_user"; 
          $password = "IDentify2005"; 
          $conn = mysqli_connect($servername, $username, $password, $dbname); 

          $cnp_stergere=mysqli_real_escape_string($conn,$_POST['cnp_stergere']);
          
          $sql ="DELETE FROM employees WHERE CNP=$cnp_stergere";
          if (mysqli_query($conn,$sql))
          {
            echo "DA";
          }
          else 
            {echo "NU";}
          $result=$conn->query($sql);
          echo $result;
  }
?>
<div class="sidenav">
  <img src="http://youlearninfo.ro/logo2.png">
  <a href="dashboard.php"><span>&#129138</span> Dashboard</a>
  <a href="angajati.php"><span>&#129138</span> Angajati</a>
  <a href="add_form.php" style="font-size:18px; margin-bottom:20px"><span>&#129138</span> Adauga angajat</a>
  <a href="pinfinal.php"><span>&#129138</span> Pinuri </a>
  <a href="gatelog.php"><span>&#129138</span> Gate log</a>
</div>
<body style="background-color: #66ffff">
<div style="margin-left: 300px;margin-top:150px; font-family: 'Ubuntu'; margin-right:15vw"; >
    <form action="" method="POST" style="font-size: 32px;">
  <label for="name"> <span>&#129078;</span> Introdu numele unui angajat:</label>
  <input type="text" id="name" name="name" autofocus required> <input type="submit" name='submit' value="Cautare">
</form>
<p style="font-size:25px; color:black;">
<?php if ($found==1) echo "Am gasit urmatorul angajat:" ; if ($found==0) echo 
"Nu am gasit niciun angajat !"; if ($found>1) echo "Exista mai multi angajati cu acest nume!";?>    
</p>
<div class="row" style="padding-top:150px">
  <div class="column">
    <img src="<?php echo $imagine?>" style="width:100%;height:100%">
  </div>
  <div class="column">
      <p> <span>&#129078;</span>  Nume: <?php echo $nume?></p>
      <p> <span>&#129078;</span>  Varsta: <?php echo $varsta?></p>
      <p> <span>&#129078;</span>  Gen: <?php echo $gen?></p>
      <p> <span>&#129078;</span>  CNP: <?php echo $CNP?></p>
      <p> <span>&#129078;</span>  Prezent: <?php if ($prezentAcum==0) echo "NU"; else echo "DA";?></p>
  </div>
  <div class="column">
      <p> <span>&#129078;</span>  Departament: <?php echo $departament?></p>
      <p> <span>&#129078;</span>  Functie: <?php echo $functie?></p>
      <p> <span>&#129078;</span>  Salariu: <?php echo $salariu?></p>
      <p> <span>&#129078;</span>  Telefon: <?php echo $telefon?></p>
      <p> <span>&#129078;</span>  Email: <?php echo $email?></p>
  </div>
</div>
</div>
  <div style="margin-top:150px;margin-left:350px;"> 
    <p style="font-size:24px;">Actiuni pentru angajatul <?php echo $nume?> : </p>
    <a id="buton_apel" href="tel:<?php echo $telefon?></p>" style=""> Suna angajatul</a>
    <a id="buton_apel" href="mailto:<?php echo $email?></p>" style=""> Trimite Email</a> 
    <a id="buton_apel" class="button" href="#popup1" >Stergere</a> 
</div>
<div id="popup1" class="overlay">
  <div class="popup">
    <a class="close" href="#"> </a>
    <div class="content">
      Sunteti sigur ca vreti sa stergeti din baza de date acest angajat? <br>
      <div style="text-align: center; margin-top: 40px;"> <form method="post"> 
      <input type="submit" name="button1" class="button" value="Stergere" />
        <input type="hidden" name="cnp_stergere" value="<?php echo $CNP; ?>"/>
    </form></div>
    </div>
  </div>
</div>
</body>
</html> 