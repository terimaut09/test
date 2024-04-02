


<?php
$m3uFile = 't4k.m3u';
$userAgent = $_SERVER['HTTP_USER_AGENT'];

if (strpos($userAgent, 'OTT Navigator') !== false) {

    $m3uContent = file_get_contents($m3uFile);

    echo $m3uContent;
} else {
    echo "<h1>BETA KRLE CHORI</h1>";
     header('Location: ' .'https://pbs.twimg.com/media/F4r7iOEXYAAho-t.jpg');
    exit;
}
?>