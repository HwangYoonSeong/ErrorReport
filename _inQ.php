 
<?php
    
    @session_start();
    ob_start();
    if(!isset($_SESSION['id'])){
        if(isset($_COOKIE['id'])||isset($_COOKIE['email'])){
            $userid=$_COOKIE['id'];
            $_SESSION['id']=$userid;
        }
    }

    //require_once('session.php');  
    require_once('dbER.php');
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                          or die("Error Connecting to MySQL Server.");
    mysqli_query($dbc,'set names utf8');
    $Q_id=$_GET['Q_id'];
        
    $query="select Q_id,Q_title,Q_contents,Q_image,user_id,email,time from question, user where Q_id='$Q_id'";
    //$query="select image from user where id=54";
    
    $result=mysqli_query($dbc, $query)
                    or die("Error Querying database.");
    
    $row=mysqli_fetch_assoc($result);
    
    //echo $row['Sol_title'];
    echo '<html>\
    <head>\
    <title>Question</title><meta charset="utf-8" />\
    <link rel="stylesheet" href="styles/inSol.css">\
    
    </head>\
    <body>\
    <header style="background-color:rgb(17, 17, 17); box-sizing:border-box;">
        <a href="../ErrorReport/main.php" class="logo"><img style="width:60px;height:60px;margin:-7px 0 0 -10px " src="Images/느낌표.png"></a>
        </header>
    <div class="container">   
    <h1>'.$row['Q_title'].'</h1>
    <hr>
    <img src="_Q_getpicture.php?imgpath='.$row['Q_image'].'" art="참고사진" style="width:380;height:220">
    <pre>'.$row['Q_contents'].'</pre>';
    
    if($_SESSION['id']=='admin'||$_SESSION['id']==$row['user_id']){
        echo '<a class="delete" href="_deleteQ.php?Q_id='.$row["Q_id"].'"><b>삭제</b></a>';
        echo '<a class="delete" href="_modiQform.php?Q_id='.$row["Q_id"].'" style="margin-left:10px"><b>수정</b></a>';
    }
        
    echo '</div></body></html>';
 
    
     

    mysqli_free_result($result);

    

  ?> 


