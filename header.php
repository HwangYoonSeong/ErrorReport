<!DOCTYPE html>
<html>

<head>
    <title>Error Report</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
    <script type="text/javascript" src="scripts/ErrReport.js"></script>
    
    <header style="box-sizing:border-box;">
        <a href="#" class="logo"><img style="width:60px;height:60px;margin:-7px 0 0 -10px " src="Images/느낌표.png"></a>
        <ul>
            <?php
                if(!isset($_SESSION['id'])){
                    
                    echo '<li><a href="loginform.html"><b>LogIn<b></a></li>
                    <li><a href="signup.html"><b>회원가입</b></a></li>';
                }else{
                    if($_SESSION['id']=='admin')
                        echo '<li><a href="logout.php"><b>admin LogOut<b></a></li>';
                    else{
                        $id=$_SESSION['id'];
                        require_once('dbER.php');
                        $dbc=mysqli_connect($host,$user,$pass,$dbname)
                            or die("Error Connecting to MySQL Server.");
                        mysqli_query($dbc,'set names utf8');
                        $query="select email from user where id='$id'";
                        $result=mysqli_query($dbc, $query)
                         or die("Error Querying database.");
                        $row=mysqli_fetch_assoc($result);
                        echo '<li style="color:white;margin-right:15px;"><b>'.$row['email'].'</b></li>';
                        echo '<li><a href="logout.php"><b>LogOut<b></a></li>';
                
                }    
                        
                }
                   
            ?>
             
            
            <!-- <li><a href="_QnA.php"><b>QnA</b></a></li> -->
        </ul>
        <p><b>Error Report</b> </p>

    </header>