<?php
    require_once("session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Solution</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles/QnA.css">
</head>

<body>
    <?php
            if(!isset($_SESSION['id'])){
                exit('<a href="main.php">로그인 상태가 아닙니다. 홈으로</a></body></html>');
            }
        ?>
         <header style="background-color:rgb(17, 17, 17); box-sizing:border-box;">
        <a href="../ErrorReport/main.php" class="logo"><img style="width:60px;height:60px;margin:-7px 0 0 -10px " src="Images/느낌표.png"></a>
        </header>

    <div class="container">   
        <h1>Share Solution</h1>
        <br/>
        <form method="post" enctype="multipart/form-data" action="_writeSol.php">
         
            <p>제목<p>
            <input type="text" name="title" placeholder="제목을 입력하세요" style="width:360px" >
            <br/>
            <br/>
            <span>내용<span>
            <label for="file_button">사진첨부</label>
            <input id="file_button" type="file" name="picture"  />
                <br/>
                <br/>
            <textarea name="memo" cols="50" rows="15" maxlength="5000" ></textarea>
            
            <br>
            <br>
            <input id="button" type="submit" value="Upload" />

        </form>
    </div>
</body>

</html>