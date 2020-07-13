<?php   
    require_once("session.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Reply</title>
    <meta charset="utf-8" />

</head>

<body>
<?php
    require_once('dbER.php');
      
    if(!isset($_SESSION['id'])){
        exit('<a href="main.php">로그인 상태가 아닙니다. 홈으로</a></body></html>');
    }
    if(empty($_POST['memo'])){
        exit('<a href="javascript:history.go(-1)">입력 폼을 채워주세요.</a></body></html>');
    }
    
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    
    $sol_id=mysqli_real_escape_string($dbc,trim($_POST['sol_id']));
     
    $id=$_SESSION['id'];
    $memo=mysqli_real_escape_string($dbc,trim($_POST['memo']));
     
    mysqli_query($dbc,'set names utf8');

    $query="insert into reply values (null,$sol_id, '$id','$memo', NOW())";
   
    $result=mysqli_query($dbc, $query)
                     or die("Error Querying database.");

    mysqli_close($dbc);    
     

    echo("<script>location.href='_inSol.php?Sol_id=$sol_id';</script>");
?>
</body>
</html>
 
