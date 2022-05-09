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

</style>
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
<?php
    $servername = "localhost";
        $dbname = "youlear1_DB"; 
        $username = "youlear1_admin_user"; 
        $password = "IDentify2005"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql="SELECT * FROM `reports` ORDER BY `reports`.`day` DESC";
        $vr=$conn->query($sql);
          $row=$vr->fetch_assoc();
          $pnr1= $row["MANAGEMENT"];
          $pnr2= $row["FACTORY"];
          $pnr3= $row["SECURITY"];
          $pnr4= $row["MAINTENANCE"];

        $sql="SELECT * FROM `employees` WHERE DEPART=\"MANAGEMENT\" ";
        $vr=$conn->query($sql);
          $anr1= $vr->num_rows; $anr1=$anr1-$pnr1;
        $sql="SELECT * FROM `employees` WHERE DEPART=\"FACTORY\" ";
        $vr=$conn->query($sql);
          $anr2= $vr->num_rows; $anr2=$anr2-$pnr2;
        $sql="SELECT * FROM `employees` WHERE DEPART=\"SECURITY\" ";
        $vr=$conn->query($sql);
          $anr3= $vr->num_rows; $anr3=$anr3-$pnr3;
        $sql="SELECT * FROM `employees` WHERE DEPART=\"MAINTENANCE\" ";
        $vr=$conn->query($sql);
          $anr4= $vr->num_rows; $anr4=$anr4-$pnr4;
$DP = array(
  array("label"=> "PREZENTI", "y"=> $pnr1 ),
  array("label"=> "PREZENTI", "y"=> $pnr2 ),
  array("label"=> "PREZENTI", "y"=> $pnr3 ),
  array("label"=> "PREZENTI", "y"=> $pnr4 ),
);
$DP2 = array(
  array("label"=> "ABSENTI", "y"=> $anr1 ),
  array("label"=> "ABSENTI", "y"=> $anr2 ),
  array("label"=> "ABSENTI", "y"=> $anr3 ),
  array("label"=> "ABSENTI", "y"=> $anr4 ),
);
  $conn->close();
?>

<?php
    $servername = "localhost";
        $dbname = "youlear1_DB"; 
        $username = "youlear1_admin_user"; 
        $password = "IDentify2005"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql1="SELECT * FROM employees WHERE IS_PRESENT=0";
        $sql2="SELECT * FROM employees WHERE IS_PRESENT=1";
        $result1=$conn-> query($sql1);
        $result2=$conn-> query($sql2);
        $nr1=$result1->num_rows;
        $nr2=$result2->num_rows;
$dataPoints = array(
  array("label"=> "Prezenti", "y"=> $nr2 ),
  array("label"=> "Absenti", "y"=> $nr1 ),);
  $conn->close();
?>

<script type="text/javascript">
  window.onload = function () {
        CanvasJS.addColorSet("IDeaCOLOR",
                [//colorSet Array

                "#6600FF",
                "#330066",
                "#0033FF",
                "#6699FF",
                "#3300FF",
                "#33CCFF"            
                ]);
var chart = new CanvasJS.Chart("chartContainer1", {
  animationEnabled: true,
  backgroundColor: "#CCFFFF",
  colorSet: "IDeaCOLOR",
  title:{
    text: "Prezenta angajatilor in fiecare departament ",
    fontFamily: "Ubuntu",
    fontColor: "#660066",
  },
      data: [
      {
        type: "stackedColumn100",
        name: "PREZENTI",
        dataPoints: <?php echo json_encode($DP, JSON_NUMERIC_CHECK); ?>
      }, {
        type: "stackedColumn100",
        name: "ABSENTI",
        dataPoints: <?php echo json_encode($DP2, JSON_NUMERIC_CHECK); ?>
      }, {
        type: "stackedColumn100",
        name: "ABSENTI",
        dataPoints: [
        {  y: 0, label: "MANAGEMENT"},
        {  y: 0, label: "FACTORY" },
        {  y: 0, label: "SECURITY" },
        {  y: 0, label: "MAINTENANCE" },
        ]
      }]
    });
  var chart2 = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    backgroundColor: "#CCFFFF",
    colorSet: "IDeaCOLOR",
  title:{
    text: "Prezenta angajatilor",
    fontFamily: "Ubuntu",
    fontColor: "#660066",
  },
    data: [{
      type: "pie",
      showInLegend: "true",
      fontSize:24,
      fontColor: "#6600CC",
      legendText: "{label}",
      indexLabelFontSize: 24,
      indexLabelFontColor: "#6600CC",
      indexLabel: "{label} - #percent%",
      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
  });
  chart2.render();chart.render();
  }
  </script>
 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <div id="chartContainer2" style="border-top:100px;height: 300px;margin-left:400px;margin-right:400px"> </div>
  <div id="chartContainer1" style="border-top:100px;height: 300px;margin-left:400px;margin-right:400px""> </div>      
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <table>
    <tr>
      <th>ID </th>
      <th>Prezenta</th>
      <th>Functie</th>
      <th>Nume</th>
    </tr>
  <?php
        $servername = "localhost";
        $dbname = "youlear1_DB"; 
        $username = "youlear1_admin_user"; 
        $password = "IDentify2005"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql= "SELECT ID,IS_PRESENT,FUNCTION,NAME from employees";
    $result= $conn-> query($sql);
    if ($result->num_rows>0)
    {
      while ($row=$result->fetch_assoc())
      {

        echo "<tr><td>" .$row["ID"] ."</td><td style=\"text-align: center;\">";
          if ($row["IS_PRESENT"]==1) echo "<span>&#10004;</span>"; 
            else echo "<span>&#10006;</span>";
        echo "</td><td>" .$row["FUNCTION"]."</td><td>" .$row["NAME"]."</td></tr>";
      } echo "</table>";
    }
    else echo "Nu am gasit niciun angajat!";
  $conn->close();
  ?>
  </table>
</div>
</body>
</html> 
