<?php
     
    require_once('dbER.php');
    
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    mysqli_query($dbc,'set names utf8');
    
    $Q_id=$_GET['Q_id'];
    $query="delete from question where Q_id=$Q_id ";

    $result=mysqli_query($dbc, $query)
                    or die("Error Querying database.");
   
    echo '<html>\
    <head>\
    <title>Solution</title><meta charset="utf-8" />\
    <link rel="stylesheet" href="styles/inSol.css">\
    
    </head>\
    <body>\
    <script type="text/javascript" src="scripts/inSol.js"></script>
    <header style="background-color:rgb(17, 17, 17); box-sizing:border-box;">
        <a href="../ErrorReport/main.php" class="logo"><img style="width:60px;height:60px;margin:-7px 0 0 -10px " src="Images/느낌표.png"></a>
        </header>
    <div class="container">   
    
    <h1>삭제완료</h1>
    <br>
    <br>
    <a href="main.php">홈으로</a>"';
     
    
    
    echo '</div></body></html>';
 
     
  
    mysqli_close($dbc);  
    echo json_encode($json);              
?>
