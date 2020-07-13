<!DOCTYPE html>
<html>

<head>
    <title>검색결과</title>
    <meta charset="utf-8" />

</head>

<body>
<?php
    
    require_once('dbER.php');
    if(empty($_POST['search'])){
            exit('<a href="javascript:history.go(-1)">검색어를 입력해주세요.</a>');
    }    

    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    $search=mysqli_real_escape_string($dbc,trim($_POST['search']));
   

    //email 중복방지
    $Sol_query="select Sol_title from solution where Sol_title='$search'";
    $Q_query="select Q_title from question where Q_title='$search'";
    
    $result=mysqli_query($dbc, $Sol_query)
                    or die("Error Querying database.");
    $result2=mysqli_query($dbc, $Q_query)
                    or die("Error Querying database.");
   
    $i=0;
    while($row=mysqli_fetch_row($result)){
        echo $row[0];
        $i++;
    }
    while($row2=mysqli_fetch_row($result2)){
        echo $row2[0];
        echo "<br>";
        $i++;
    }
    if($i==0)
        echo "검색결과가 없습니다.";
        
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_query($dbc,'set names utf8');
    mysqli_close($dbc);    
   
?>
</body>
</html>
 
