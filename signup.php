<!DOCTYPE html>
<html>

<head>
    <title>회원 가입</title>
    <meta charset="utf-8" />

</head>

    
<body>
<?php
    //저장 방법
    //DB에 파일명만을 저장하고 실제 이미지는 File System에 저장
    //DB 내에 이미지 저장 
    require_once('dbER.php');
    if(empty($_POST['email'])||empty($_POST['pass'])
        ||empty($_POST['passcon'])||empty($_POST['id'])||(!isset($_FILES['userimg']))){
            echo("<script>location.href='signup.html';alert('입력 폼을 채워 주세요');</script>");
        }else{    
    
       //파일시스템으로 이미지 저장
        $imgpath="./Images/" . uniqid("img") . "." . pathinfo($_FILES['userimg']['name'],PATHINFO_EXTENSION);
        
        if(!move_uploaded_file($_FILES['userimg']['tmp_name'],$imgpath)){
            exit('<a href="javascript:history.go(-1)">이미지 에러가 발생했습니다.</a>');
        }

        $dbc=mysqli_connect($host,$user,$pass,$dbname)
                            or die("Error Connecting to MySQL Server.");
        $id=mysqli_real_escape_string($dbc,trim($_POST['id']));
        $email=mysqli_real_escape_string($dbc,trim($_POST['email']));
        $pass=mysqli_real_escape_string($dbc,trim($_POST['pass']));
        $passcon=mysqli_real_escape_string($dbc,trim($_POST['passcon']));


        //email 중복방지
        $query="select id from user where email='$email'";
        $result=mysqli_query($dbc, $query)
                         or die("Error Querying database.");

        if(mysqli_num_rows($result)!=0){ //이미 존재할 경우 
            exit('<a href="javascript:history.go(-1)">이미 등록된 E-mail입니다.</a>');
        }
        mysqli_free_result($result);

        mysqli_query($dbc,'set names utf8');

        $query="insert into user values ('$id',SHA('$pass'),'$email','$imgpath')";
    
        $result=mysqli_query($dbc, $query)
                         or die("Error Querying database.");

        mysqli_close($dbc);    
    
        // echo "<img src='userimg.php?email=$email' alt='User Image' style='width:80px;height:80px;'/><br/>";
        // echo "$email"."님의 회원 가입을 축하드립니다.<br/><br/>";
        // echo '<a href="main.php">Go to Home</a>';
        echo("<script>location.href='main.php';alert('".$email."님의 회원 가입을 축하드립니다.');</script>");
}
?>
</body>
</html>
 
