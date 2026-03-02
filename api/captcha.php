<?php
include_once "db.php";

// 產生英數混合字元集 (A-Z, a-z, 0-9)
$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
$code = "";
for ($i = 0; $i < 4; $i++) {
    $code .= $chars[rand(0, strlen($chars) - 1)];
}

// 存入 Session 以供後續驗證
$_SESSION['ans'] = $code;

// 設定圖片寬高
$width = 120;
$height = 45;

// 建立畫布
$image = imagecreatetruecolor($width, $height);

// 定義背景色與基本顏色
$bgColor = imagecolorallocate($image, 245, 245, 245); // 極淺灰色背景
$noiseColor = imagecolorallocate($image, 210, 210, 210); // 噪點顏色

// 填滿背景
imagefill($image, 0, 0, $bgColor);

// 1. 強化干擾線 (從左側延伸至右側, 數量隨機 4~8)
$lines = rand(4, 8);
for ($i = 0; $i < $lines; $i++) {
    $lineColor = imagecolorallocate($image, rand(150, 200), rand(150, 200), rand(150, 200));
    imageline($image, 0, rand(0, $height), $width, rand(0, $height), $lineColor);
}

// 2. 加入隨機噪點
for ($i = 0; $i < 80; $i++) {
    imagesetpixel($image, rand(0, $width), rand(0, $height), $noiseColor);
}

// 3. 寫入驗證碼文字 (使用 Arial.ttf, 旋轉且放大, 每個字元顏色不同)
$fontFile = __DIR__ . "/arial.ttf";
$fontSize = 20;

for ($i = 0; $i < strlen($code); $i++) {
    $angle = rand(-15, 15); // 隨機旋轉角度
    
    // 為每個字元產生一個隨機深色 (確保清晰度)
    $charColor = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));
    
    // 計算每個字元的大概位置
    $x = 10 + ($i * 25);
    $y = 30 + rand(-5, 5); // 隨機垂直微調
    
    imagettftext($image, $fontSize, $angle, $x, $y, $charColor, $fontFile, $code[$i]);
}

// 輸出圖片
header('Content-Type: image/png');
imagepng($image);

// 銷毀畫布
imagedestroy($image);
?>
