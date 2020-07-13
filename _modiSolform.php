<?php
     
    require_once('dbER.php');
    
    $dbc=mysqli_connect($host,$user,$pass,$dbname)
                        or die("Error Connecting to MySQL Server.");
    mysqli_query($dbc,'set names utf8');
    
    $Sol_id=$_GET['Sol_id'];
    $query="select * from solution where Sol_id='$Sol_id' ";

    $result=mysqli_query($dbc, $query)
                    or die("Error Querying database.");
    $row=mysqli_fetch_assoc($result);
    
    echo '<html>\
    <head>\
    <title>Solution</title><meta charset="utf-8" />\
    <link rel="stylesheet" href="styles/QnA.css">\
    
    </head>\
    <body>\
    <header style="background-color:rgb(17, 17, 17); box-sizing:border-box;">
        <a href="../ErrorReport/main.php" class="logo"><img style="width:60px;height:60px;margin:-7px 0 0 -10px " src="Images/느낌표.png"></a>
        </header>
    <div class="container">   
    <h1>Modify Solution</h1>
    <br>

    <form method="post" enctype="multipart/form-data" action="_modiSol.php">
         
            <p>제목<p>
            <input type="text" name="title" style="width:360px" value='.$row["Sol_title"].' >
            <br/>
            <br/>
            <span>내용<span>
            <label for="file_button">사진첨부</label>
            <input id="file_button" type="file" name="picture"  />
                <br/>
                <br/>
            <textarea name="memo" cols="50" rows="15" maxlength="5000" >'.$row['Sol_contents'].'</textarea>
            
            <br>
            <br>
            <input type="hidden" name="Sol_id" value='.$Sol_id.' />
            <input type="hidden" name="user_id" value='.$row['user_id'].' />
            <input id="button" type="submit" value="Upload" />
           
            <br>
            <br>
            

        </form>

        </div></body></html>';
   
    
    
        
    mysqli_free_result($result);
     

    mysqli_close($dbc);  
               
?>
