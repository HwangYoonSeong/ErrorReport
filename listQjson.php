<?php
    header('Content-Type: application/json;charset=UTF-8');
    require_once('dbER.php');
    
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    mysqli_query($dbc,'set names utf8');
   
    $query="select Q_id,Q_title,user_id,email,Q_contents,time from Solution, user where user_id=user.id order by time desc limit 0,4";
    //limit 0,4 : 0 ~ 4까지 잘라서 달라 
    //$reviewsince, $reviewmax변수를 사용해서 활용가능 
    $result=mysqli_query($dbc, $query)
                    or die("Error Querying database.");
    while($row=mysqli_fetch_assoc($result)){
        // $replyquery="select reply_id,user_id,email,reply_contents, time from reply,user
        //             where Sol_id=$row[Sol_id] and user.id=reply.user_id
        //             order by time desc limit 0,30";
        // $replyresult=mysqli_query($dbc,$replyquery) or die("Error Querying Reply.");
        // $replyjson=array();

        // while($replyrow=mysqli_fetch_assoc($replyresult)){
        //     $replyjson['reply'][]=$replyrow;
        // }
        //$json['review'][]=$row+$replyjson;
        $json['question'][]=$row;
        
        //mysqli_free_result($replyresult);

        
    }
    mysqli_free_result($result);
  
    mysqli_close($dbc);  
    echo json_encode($json);              
?>
