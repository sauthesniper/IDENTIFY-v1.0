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
<!DOCTYPE HTML>
<html>
<style type="text/css">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap');
*{
  font-family: 'Ubuntu', sans-serif;
}
      .box div {
        width: 100px;
        display: inline-block;
        padding: 15px;
        text-align: center;
        color: #000000;
        font-family: arial, sans-serif;
      }
    
}
</style>
<head>
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
  array("label"=> "Prezenti", "y"=> $nr1 ),
  array("label"=> "Absenti", "y"=> $nr2 ),);
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
</head>
<body>
  <div id="chartContainer2" style="height: 370px;margin-left:250px;margin-right:250px"> </div>
  <div id="chartContainer1" style="height: 370px;margin-left:250px;margin-right:250px""> </div>      

</body>
</html>