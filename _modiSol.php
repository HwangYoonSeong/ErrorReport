<?php   
    require_once("session.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Solution</title>
    <meta charset="utf-8" />

</head>

<body>
<?php
    require_once('dbER.php');
      
    
    if(empty($_POST['memo'])||empty($_POST['title'])){
        exit('<a href="javascript:history.go(-1)">입력 폼을 채워주세요.</a></body></html>');
    }
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    mysqli_query($dbc,'set names utf8');
    $id=mysqli_real_escape_string($dbc,trim($_POST['user_id']));
    $title=mysqli_real_escape_string($dbc,trim($_POST['title']));
    $memo=mysqli_real_escape_string($dbc,trim($_POST['memo']));
    $Sol_id=mysqli_real_escape_string($dbc,trim($_POST['Sol_id']));
    
    if(empty($_FILES['picture']['tmp_name'])){//picture을 입력하지 않았다면 기존 사진 사용
        $query="select Sol_image from Solution where Sol_id='$Sol_id'";
        $result=mysqli_query($dbc, $query)
                     or die("Error Querying database.");
        $row=mysqli_fetch_row($result);
        $originImg=$row[0];
        $query="insert into solution values (null,'$id','$title','$memo','$originImg',NOW())";
   
    }else{
        //파일시스템으로 이미지 저장
        $imgpath="./Images/" . uniqid("img") . "." . pathinfo($_FILES['picture']['name'],PATHINFO_EXTENSION);
        
        if(!move_uploaded_file($_FILES['picture']['tmp_name'],$imgpath)){
            exit('<a href="javascript:history.go(-1)">이미지 에러가 발생했습니다.</a>');
            }
        $query="insert into solution values ($Sol_id,'$id','$title','$memo','$imgpath',NOW())";
   
        }
    
    $result=mysqli_query($dbc, $query)
                     or die("Error Querying database.");
        //기존 데이터는 삭제 
    $query="delete from solution where Sol_id='$Sol_id'";
    $result=mysqli_query($dbc, $query)
                     or die("Error Querying database.");
    
    mysqli_close($dbc);    
   
    echo "Solution이 수정되었습니다..<br/><br/>";
    echo '<a href="./main.php">Go to Home</a>';
?>
</body>
</html>
