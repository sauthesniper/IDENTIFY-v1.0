<?php
$servername = "localhost";
$dbname = "youlear1_DB";
$username = "youlear1_admin_user"; 
$password = "IDentify2005"; 
$val = $_GET['val'];
$key= $_GET['key'];
if ($key==="E9873D79C6D87DC0FB6A57786333891273AICSIACU1231F4453213303DA61F20BD67FC233AA33262")
{
    //trimitem datele catre IDevice
    echo "R:";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM employees WHERE CARD_ID='$val'";
    $data=$conn->query($sql);$result=$data->num_rows;
    if ($result==1) 
    {
        echo "G";
        //actualizam bazele de date
        $data=$data->fetch_assoc();
        $cardnr=$data["CARD_ID"];
        $nume=$data["NAME"];
        if ($data["IS_PRESENT"]==1)
        {
            //CHECKED OUT
             $sql="INSERT INTO `statements` (`id`, `card`, `type`,`description`,`name`) VALUES (NULL, '$cardnr', '0','CHECKED-OUT','$nume'); "; 
             $conn->query($sql);
             $sql= "UPDATE employees SET IS_PRESENT='0' WHERE CARD_ID='$cardnr';"; $conn->query($sql);
        }else
        {
            //CHECKED IN
            $sql="INSERT INTO `statements` (`id`, `card`, `type`,`description`,`name`) VALUES (NULL, '$cardnr', '1','CHECKED-IN','$nume'); ";  $conn->query($sql);
            $sql= "UPDATE employees SET IS_PRESENT='1' WHERE CARD_ID='$cardnr';"; $conn->query($sql);
        }
    } else echo "D";
}else if ($key==="ABNSDHUJ123780FB6A57786333891273AICSIACU123189712938BASJKHDGUIBD67FC212312ASRDF62")
{
    echo "R:";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM pins WHERE value='$val' AND valid='1';";
    $data=$conn->query($sql);$result=$data->num_rows;
    if ($result==1) 
        {
            echo "G";
            $sql= "UPDATE pins SET valid='0' WHERE value='$val';"; $conn->query($sql);
             $sql="INSERT INTO `statements` (`id`, `card`, `type`,`description`,`name`) VALUES (NULL, '$val', '1','FOLOSIRE PIN','NECUNOSCUT'); "; 
             $conn->query($sql);
        }
    else {echo "D";}
}
?>