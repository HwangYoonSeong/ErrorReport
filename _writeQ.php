<?php   
    require_once("session.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>QnA</title>
    <meta charset="utf-8" />

</head>

<body>
<?php
    require_once('dbER.php');
      
    if(!isset($_SESSION['id'])){
        exit('<a href="main.php">로그인 상태가 아닙니다. 홈으로</a></body></html>');
    }
    if(empty($_POST['memo'])||empty($_POST['title'])){
        exit('<a href="javascript:history.go(-1)">입력 폼을 채워주세요.</a></body></html>');
    }
    // if(!empty($_FILES['picture']['tmp_name'])){//picture을 입력했다면
    
    //     if(!isset($_FILES['picture'])){
    //         exit('<a href="javascript:history.go(-1)">이미지 업로드 에러가 발생했습니다.</a></body></html>');
    //     }
    // }
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    $id=$_SESSION['id'];
    $title=mysqli_real_escape_string($dbc,trim($_POST['title']));
    $memo=mysqli_real_escape_string($dbc,trim($_POST['memo']));
    
    //파일시스템으로 이미지 저장
    $imgpath="./Images/" . uniqid("img") . "." . pathinfo($_FILES['picture']['name'],PATHINFO_EXTENSION);
    
    if(!move_uploaded_file($_FILES['picture']['tmp_name'],$imgpath)){
        exit('<a href="javascript:history.go(-1)">이미지 에러가 발생했습니다.</a>');
    }
    mysqli_query($dbc,'set names utf8');

    $query="insert into question values (null,'$id','$title','$memo','$imgpath',NOW())";
   
    $result=mysqli_query($dbc, $query)
                     or die("Error Querying database.");

    mysqli_close($dbc);    
   
    echo "질문이 등록되었습니다..<br/><br/>";
    echo '<a href="./main.php">Go to Home</a>';
?>
</body>
</html>
 
