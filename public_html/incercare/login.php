<?php
session_start();
    $servername = "localhost";
    $dbname = "youlear1_DB"; 
	$username = "youlear1_admin_user"; 
	$password = "IDentify2005"; 
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
function check_login($conn)
{
	if (isset($_SESSION['user_id']))
	{
		$id= $_SESSION['user_id'];
		$check="SELECT * FROM login WHERE user_id='$id' LIMIT 1";
		$result=$conn-> query($check); $rn=$result->num_rows;
		echo "DADADADADA";
		if ($result && $rn>0)
		{
			$user_data= mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//header("Location: login.php");die;	
}

if ($_SERVER['REQUEST_METHOD']== "POST")
{
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
  if (!empty($user_name) && !empty($password)&& !is_numeric($user_name) )
  {
    $sql="SELECT * FROM login WHERE user_name='$user_name'";
    
    $result=$conn-> query($sql); 
    $rn=$result->num_rows;
    if ($result)
    {
        if ($result && $rn>0)
          {
            $user_data= mysqli_fetch_assoc($result);
            
            if ($user_data['password']===$password)
            {
              $_SESSION['user_id']=$user_data['user_id'];
              header("Location: index.php"); die;
            }
          }        
    }

  }else
  {
    echo "INFORMATII INVALIDE!";
  }
}
?>
<!DOCTYPE html>
<html>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap');
/* Style the body */
body {
  margin: 0;
}
p.big{
  font-family: 'Ubuntu', sans-serif;
  text-align: left;
  color: white;
  font-size:36px;
  margin-left: 45px;
  font-weight: 500;  
  line-height: 1;
}
p.small{
  font-family: 'Ubuntu', sans-serif;
  text-align: left;
  color: white;
  font-size:30px;
  font-weight: 400;
  margin-left: 15px;
  line-height: 1.15;
}
.header {
  padding: 3px;
  text-align: left;
  background: #660066;
  color: white;
}
/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
* {
  box-sizing: border-box;
}
      .verticalLine {
        border-left: 4px solid white;
        height: 70vh;
        position: absolute;
        left: 50%;
        margin-left: -3px;
        margin-top: 15vh;
        top: 0;
      }
input[type=text], input[type=password] {
  width: 100%;
  padding-top: 12px;
  padding-left: 20px;
  padding-bottom:12px;
  margin: 9px ;
  display: inline-block;
  border: 2px #0066CC ;
  box-sizing: border-box;
}

button {
  background-color: #660066;
  color: white;
  font-family: 'Ubuntu', sans-serif;
  font-size: 20px;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.66;
  background-color: ;
}
.container {
  padding: 16px;
}
.fadein {
            animation: fadeInAnimation ease 3s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }
        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }
            30% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
</style>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IDentify</title>
  <link rel="icon" type="image/png" href="logo2.png">
</head>

<div class="header">
 <img src="logo2.png" style="padding:3 px; height: 39px;width: 39px; margin-left: 5vw;margin-top: 7px;">
  <b style="margin-left: 10px; font-size: 47px;text-align: left;  font-weight: 500  ;font-family: 'Ubuntu', sans-serif;">IDentify</b>
</div>  
<body style="background-color: #00CCFF;">
  <div class="verticalLine"></div>
 <div class="row" style="margin-left:12vw;margin-right: 12vw;">
   <div class="column"> 
 <br><br><br><br><br><br><p class="big">Salut, </p> 
 <p class="small"> Bun venit pe platforma online IDentify!</p>
 <p class="small"> Introdu datele de acces pentru a putea fi transferat către panoul de bord.</p>
 <div class="fadein"><img src="logo2.png" style="margin-top: 15vh;margin-left: 3vw;width:15vw;height: 15vw;"></div>
 </div>
   <div class="column" style="padding-left:15vw; padding-top: 25vh;"> 
    <p style="text-align: center;font-family: 'Ubuntu', sans-serif; font-size:40px; color: white;">AUTENTIFICARE</p>
<form method="post">
    <div class="container">
      <label for="name"><b style="font-family: 'Ubuntu', sans-serif; font-size:medium; color: white;">Utilizator :</b></label>
      <input type="text" placeholder="Nume de utilizator" name="user_name" value="<?php echo $user;?>" required> <span class="error">* <?php echo $euser;?></span>

      <label for="pass"><b style="font-family: 'Ubuntu', sans-serif; font-size:medium; color: white;">Parolă :</b></label>
      <input type="password" placeholder="Parola" name="password" required> <span class="error">* <?php echo $epass;?></span>
      <br><br><br>
      <button type="submit">Autentificare</button>
    </div>
  </div>
</form>
</div>
 </div>
</body>
</html>



