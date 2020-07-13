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
    $Sol_id=$_GET['Sol_id'];
        
    $query="select Sol_id,Sol_title,Sol_contents,Sol_image,user_id,email,time from Solution, user where Sol_id='$Sol_id'";
     
                 
    $replyQuery="select reply_contents from reply where reply_Sol_id='$Sol_id'";
    $result=mysqli_query($dbc, $query)
                    or die("Error Querying database.");
    $row=mysqli_fetch_assoc($result);

    $result=mysqli_query($dbc, $replyQuery)
                    or die("Error Querying database.");
    
     
    
    //echo $row['Sol_title'];
    echo '<html>
    <head>
    <title>Solution</title><meta charset="utf-8" />
    <link rel="stylesheet" href="styles/inSol.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    </head>
    <body>
    <script type="text/javascript" src="scripts/reply.js"></script>
    <header style="background-color:rgb(17, 17, 17); box-sizing:border-box;">
        <a href="../ErrorReport/main.php" class="logo"><img style="width:60px;height:60px;margin:-7px 0 0 -10px " src="Images/느낌표.png"></a>
        </header>
    <div class="container">   
    <h1>'.$row['Sol_title'].'</h1>
    <hr>
    <img src="_Sol_getpicture.php?imgpath='.$row['Sol_image'].'" art="참고사진" style="width:380;height:220">
    <pre>'.$row['Sol_contents'].'</pre>
    <hr>
     
    <div class="replylist">';
    
    while($replyRow=mysqli_fetch_assoc($result)){
        echo '<div class="user_reply">
        <pre>
        '.$replyRow["reply_contents"].'
        </pre>
        </div>';  
    }
    

      
    echo '</div>
    <div class="writeReply">
    <a><b>Reply<b></a>
    <br>
    <form method="post" action="writereply.php">
         
        <textarea id="textarea" name="memo" placeholder="댓글을 입력하세요" cols="50" rows="10" maxlength="5000"></textarea>
        <input type="hidden" name="sol_id" value='.$Sol_id.' />
        <br>
        <br>
        <input id="button" type="submit" value="댓글등록" />


    </form>
    </div>
    <br>
    <br>
    <hr>
    <br>

    
    ';
    
    if($_SESSION['id']=='admin'||$_SESSION['id']==$row['user_id']){
        echo '<a  href="_deleteSol.php?Sol_id='.$row["Sol_id"].'" style="margin:0 0 0 5px"><b>삭제</b></a>';
        echo '<a  href="_modiSolform.php?Sol_id='.$row["Sol_id"].'" style="margin:0 0 0 10px"><b>수정</b></a>';

    }
        
    echo '<br><br><br></div></body></html>';
 
             
     

    mysqli_free_result($result);

    

  ?> 

 