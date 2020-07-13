<?php
    require_once("session.php");
    require_once("header.php");
    //require_once("nav.php");   
?>
<div class="container">
<!--img class="mainImg" src="Images/mainImg.jpg" alt="mainimg"/-->
<div id="mainImg">
            <div id="mainText">

                <h3>&emsp;&emsp;"우리 중 누구도<br>
                우리 모두를 합친 것보다 똑똑하지 못하다."</h3>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Ken H Blanchard</p>
            </div>
</div>
<section class="model">
     

    <form class="search_bar" method="post" action="search.php" >
               <input type="text" name="search" placeholder="질문을 검색하세요.">
               <input id="search_btn" type="submit" value="Search"/>
    
    </form>
    
    
    <div class="solution">
        <div id="shareSol"><a href="_ShareSol.php">Share Solution</a></div>
        <div class="review">
            <div class="user_title">
                <p>위치를 읽는 동안 엑세스 위반</p>
            </div>
            <div class="user_info">
                    <img class="user_thumbnail" src="Images/Proj_Zed.jpg" alt="userImage" />
                    <div class="user_id">SinaKim</div>
                    <div class="user_date">2020.4/14</div>
            </div>
        </div> 
        
        <div class="review">
            <div class="user_title">
                <p>fopen과 open의 차이</p>
            </div>
            <div class="user_info">
                    <img class="user_thumbnail" src="Images/akali.jpg" alt="userImage" />
                    <div class="user_id">olympio</div>
                    <div class="user_date">2020.5/10</div>
            </div>
        </div> 
        
        <div class="review">
            <div class="user_title">
                <p>fork함수에 대해</p>
            </div>
            <div class="user_info">
                    <img class="user_thumbnail" src="Images/pizz.jpg" alt="userImage" />
                    <div class="user_id">lake19</div>
                    <div class="user_date">2020.6/4</div>
            </div>
        </div> 
    </div>


    <div class="Q">
        <div id="shareSol" ><a href="_QnA.php">Question</a></div>
        
        <div class="question">
            <div class="user_title">
                <p>백준 아파트 단지 문제</p>
            </div>
            <div class="user_info">
                    <img class="user_thumbnail" src="Images/Galaxy_Zed.png" alt="userImage" />
                    <div class="user_id">Adam</div>
                    <div class="user_date">2020.4/1</div>
            </div>
        </div> 
        
        <div class="question">
            <div class="user_title">
                <p>Normal Form??</p>
            </div>
            <div class="user_info">
                    <img class="user_thumbnail" src="Images/yasuo.jpg" alt="userImage" />
                    <div class="user_id">Eve</div>
                    <div class="user_date">2020.5/25</div>
            </div>
        </div> 
        
        <div class="question">
            <div class="user_title">
                <p>Primary key와 Foreign Key</p>
            </div>
            <div class="user_info">
                    <img class="user_thumbnail" src="Images/Proj_Zed.jpg" alt="userImage" />
                    <div class="user_id">qls</div>
                    <div class="user_date">2020.12/25</div>
            </div>
        </div> 
    </div>
</section>

</div>

<?php
   require_once("footer.php");
?>