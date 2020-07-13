<?php
    require_once("session.php");
    require_once("header.php");
    require_once("nav.php");   
?>

<div id="btn_grade_desc">표시 안함</div>

<section class="grade_desc">
    <table border="1" style="width:100%">

        <thead>
            <tr>
                <th>등급</th>
                <th>설명</th>
                <th>스케일</th>

            <tr>
        <thead>
        <tbody>

                    <td>SD</td>
                    <td colspan="2">Super Deformed</td>

            </tr>
            <tr>
                <td>HG</td>
                <td>High Grade</td>
                <td rowspan="2">1/144</td>
            </tr>
            <tr>
                <td>RG</td>
                <td>Real Grade</td>

            </tr>
            <tr>
                <td>MG</td>
                <td>Master Grade</td>
                <td>1/100</td>
            </tr>
        <tbody>
        <tfoot>
            <tr>
                <td colspan="3">처음엔 SD, HG, MG, RG 순으로 추천</td>
            </tr>
            <tfoot>

    </table>
</section>


<section>
    <header>
        <h2>건담 프라모델 등급</h2>
    </header>
    <article id="SD">
        <h3>SD (Super Deformed)</h3>
        <p>머리를 전체 비율에 비해서 크게 표현한 모델</p>
        <img src="Galaxy_zed.png" alt="SD Gundam" style="width:350px; height:200px" />
    </article>
    <article id="HG">
        <h3>HG (High Grade)</h3>
        <p>1/144 모델로서 가격이 저렴하고 매우 다양한 라인업이 특징</p>
    </article>
    <article id="RG">
        <h3>RG (Real Grade)</h3>
        <p>MG를 HG사이즈로 줄인 정교한 1/144 모델</p>
    </article>
    <article id="MG">
        <h3>MG (Master Grade)</h3>
        <p>1/100 모델로서 정교함이 특징</p>
    </article>
</section>


<?php
   require_once("footer.php");
?>