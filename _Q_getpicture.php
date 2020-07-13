<?php   
    header('Content-Type: image/jpg');
   ?>
<?php
    //require_once('dbER.php');
    $host='127.0.0.1';
    $user='root';
    $pass='apmsetup';
    $dbname='err_report';

    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    $imgpath=$_GET['imgpath'];
        
    //email 중복방지
    $query="select Q_image from question where Q_image='$imgpath'";
    $result=mysqli_query($dbc, $query)
                     or die("Error Querying database.");
    $row=mysqli_fetch_row($result);
    readfile($row[0]);
    mysqli_free_result($result);

   mysqli_close($dbc);
   mysqli_query($dbc,'set names utf8');
  ?>


