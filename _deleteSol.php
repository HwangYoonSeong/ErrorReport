<?php
     
    require_once('dbER.php');
    
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    mysqli_query($dbc,'set names utf8');
    
    $Sol_id=$_GET['Sol_id'];
    $checkquery="select reply_id from reply where reply_Sol_id=$Sol_id";
    $result=mysqli_query($dbc, $checkquery)
                    or die("Error Querying database.");
    if(mysqli_num_rows($result)!=0){
        $query="delete sol,rep from Solution as sol
                join reply as rep
                on rep.reply_Sol_id = sol.Sol_id
                where sol.Sol_id=$Sol_id;";
        
        $result=mysqli_query($dbc, $query)
                    or die("Error Querying database.");
    }else{
        $query="delete from Solution where Sol_id=$Sol_id;";
        $result=mysqli_query($dbc, $query)
                    or die("Error Querying database.");
    }
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


