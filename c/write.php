<?php
$imageInfo = $_POST['imageData'];
imagefilter($imageInfo, IMG_FILTER_PIXELATE, 5, true);
$image = fopen($imageInfo, 'w');

file_put_contents("../snapshots/snapshot.png", $image);
fclose($image);

die();
?>
