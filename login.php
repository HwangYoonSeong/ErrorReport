<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>로그인 결과</title>
    <meta charset="utf-8" />

</head>

<body>
<?php
    require_once('dbER.php');
    if(isset($_SESSION['id'])){
        exit('<a href="main.php">세션을 통해서 로그인 정보를 확인했습니다.</a></body></html>');
    }


    if(empty($_POST['id'])||empty($_POST['pass'])){
            exit('<a href="javascript:history.go(-1)">로그인 폼을 채워주세요.</a></body></html>');
    }  
    
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    $id=mysqli_real_escape_string($dbc,trim($_POST['id'])); //공백문자 제거//mysql에 맞는 문자를 전달 받는다 
    $pass=mysqli_real_escape_string($dbc,trim($_POST['pass']));
     
    $query="select id from user where id='$id' and pw=SHA('$pass')"; //mysql 명령어 
    $result=mysqli_query($dbc, $query)//mysql에 전달 
                    or die("Error Querying database.");

    $query_admin="select admin_id from admin where admin_id='$id' and admin_pw='$pass' ";
    $result_admin=mysqli_query($dbc, $query_admin)//mysql에 전달 
                    or die("Error Querying database.");

    //cookie 설정 
    if(mysqli_num_rows($result)==1){ //결과가 한개일 경우 
       $row=mysqli_fetch_assoc($result);
       $userid=$row['id'];
       $_SESSION['id']=$userid;
       setcookie('id',$row['id'],time()+(60*60*24));
       setcookie('email',$row['email'],time()+(60*60*24));

       //echo "$id"."님의 로그인에 성공했습니다.<br/><br/><a href='main.php'>홈으로</a>";
       echo("<script>location.href='main.php';alert('".$id."님의 로그인에 성공했습니다.');</script>");
    }else{
        
        if(mysqli_num_rows($result_admin)==1){ //결과가 한개일 경우 
            $row=mysqli_fetch_assoc($result_admin);
            $adminid=$row['admin_id'];
            $_SESSION['id']=$adminid;
            setcookie('id',$row['id'],time()+(60*60*24));
             
     
            echo "관리자 로그인에 성공했습니다.<br/><br/><a href='main.php'>홈으로</a>";
        }else{
            echo("<script>location.href='loginform.html';alert('로그인에 실패했습니다.');</script>");
        }
        
    }
    mysqli_free_result($result);
    mysqli_free_result($result_admin);
   
?>
</body>
</html>


