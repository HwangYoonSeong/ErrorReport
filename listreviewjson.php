<?php
    header('Content-Type: application/json;charset=UTF-8');
    require_once('dbER.php');
    
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    mysqli_query($dbc,'set names utf8');
   
    $query="select Sol_id,Sol_title,user_id,email,time from Solution, user where user_id=user.id order by time desc limit 0,4";
    $query2="select Q_id,Q_title,user_id,email,time from question, user where user_id=user.id order by time desc limit 0,4";
    // //limit 0,4 : 0 ~ 4까지 잘라서 달라 
    // //$reviewsince, $reviewmax변수를 사용해서 활용가능 
      
    $result2=mysqli_query($dbc, $query2)
                    or die("Error Querying database.");
    
    while($row=mysqli_fetch_assoc($result2))
                    $json['question'][]=$row;
    
    $result=mysqli_query($dbc, $query)
                    or die("Error Querying database.");
    
    while($row=mysqli_fetch_assoc($result))
                    $json['review'][]=$row;
         
    
    mysqli_free_result($result);
    mysqli_free_result($result2);
  
    mysqli_close($dbc);  
    echo json_encode($json);              
?>
