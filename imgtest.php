<?php
// // Content-Type 헤더를 전송함
// header('Content-type: image/png');
// // IE가 Content-Type 헤더를 무시하지 않게 함
 

// // 이미지를 생성함
// $image =imagecreatefrompng("./Images/Zed.png");
// // 이미지의 배경색에 빨간색을 설정함
// // 제2~4인수에 RGB의 각 값을 0~255의 정수로 지정함
// //$bg_color = imagecolorallocate($image, 255, 0, 0);
// //imagefill($image, 0, 0, $bg_color);

// // 브라우저에 이미지를 출력함
// imagepng($image);

// // 이미지를 삭제하고 메모리 점유를 해제함
// imagedestory($image);


$name = "./Images/Zed.png";
$fp = fopen($name, 'rb');

header("Content-Type: image/png");
header("Content-Length: " . filesize($name));

fpassthru($fp);
?>