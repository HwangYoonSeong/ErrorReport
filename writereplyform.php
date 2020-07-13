<?php
    require_once("session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>reply</title>
    <meta charset="utf-8" />
</head>

<body>
    <?php
            if(!isset($_SESSION['id'])){
                exit('<a href="main.php">로그인 상태가 아닙니다. 홈으로</a></body></html>');
            }
        ?>
    <h1>Register a Reply</h1>
    <form method="post" action="writereply.php">
        댓글:<br />
        <textarea name="memo" cols="50" rows="10" maxlength="5000"></textarea>
        <input type="hidden" name="sol_id" value="<?php echo $_GET['sol_id']; ?>" />
        <br>
        <br>
        <input type="submit" value="댓글등록" />

    </form>
</body>

</html>