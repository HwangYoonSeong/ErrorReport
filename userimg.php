<?php   
    header('Content-Type: image/png');
?>
<?php
     
   //require_once('dbER.php');
   $host='127.0.0.1';
   $user='root';
   $pass='apmsetup';
   $dbname='err_report';

   $dbc=mysqli_connect($host,$user,$pass,$dbname)
                          or die("Error Connecting to MySQL Server.");
   $email=$_GET['email'];
        
   //email 중복방지
   $query="select image from user where email='$email'";
   //$query="select image from user where id=54";
   
   $result=mysqli_query($dbc, $query)
                    or die("Error Querying database.");
   
   $row=mysqli_fetch_row($result);
   
   readfile($row[0]);
   
   mysqli_free_result($result);

   mysqli_query($dbc,'set names utf8');

  ?> 


