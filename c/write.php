<?php
$imageInfo = $_POST['imageData'];

$image = fopen($imageInfo, 'w');
file_put_contents("../snapshots/snapshot.png", $image);
fclose($image);

die();
?>
