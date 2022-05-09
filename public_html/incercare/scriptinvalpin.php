    <?php 
    echo "DADA";
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
                
                $data=$_POST['valinval'];
                echo $data;
                $servername = "localhost";
                $dbname = "youlear1_DB"; 
                $username = "youlear1_admin_user"; 
                $password = "IDentify2005";
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                $sql= "DELETE FROM pins WHERE value='$data'";
                $conn->query($sql);
                echo "Element invalidat!";
              } 
    ?>