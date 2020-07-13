<?php
    header('Content-Type: application/json;charset=UTF-8');
    require_once('dbER.php');
    
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    mysqli_query($dbc,'set names utf8');
    $query2="select Sol.Sol_id
             from Solution as Sol
             join reply as rep
             on  Sol.Sol_id =rep.reply_Sol_id";
     
    $result=mysqli_query($dbc, $query2)
                    or die("Error Querying database.");
    $row2=mysqli_fetch_assoc($result);
    $query="select reply_id,user_id,email,reply_contents, time from reply,user
                    where  reply_Sol_id=$row2[Sol_id]
                    order by time desc limit 0,30";
    $result=mysqli_query($dbc, $query)
                    or die("Error Querying database.");
    $i=0;
    
    while($row=mysqli_fetch_assoc($result)){
        $json['reply'][]=$row;
        $i++;
    }
    echo $i;
    
    mysqli_free_result($result);
    
    mysqli_close($dbc);  
    echo json_encode($json);              
?>   