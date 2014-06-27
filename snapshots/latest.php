<?php

recordIP();

$file_location = $_SERVER["DOCUMENT_ROOT"] . "/snapshots/snapshot.png";

header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
header("Cache-Control: public"); // necesario para i.e.
header("Content-Type: image/png");
header("Content-Transfer-Encoding: Binary");
header("Content-Length:".filesize($file_location));

readfile($file_location);
die();


function recordIP(){
    $file = "../c/clients.txt";

    $date = date('m/d/Y h:i:s a', time());

    $json = json_decode(file_get_contents($file), true);

    $ip = "";

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $json["clients"] = array("ip" => $ip, "date" => $date);

    file_put_contents($file, json_encode($json));
}
?>
