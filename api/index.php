<?php

$id = @$_GET['id'];
$user_ip = $_SERVER['REMOTE_ADDR'];
$currentTimestamp = time();
$portal = "jiotv.be";
$mac = "00:1A:79:5A:4C:DB";
$deviceid = "CAFCA331327FAC81909CC41108019FA4E9A0287201DFB8CD515BDFDBB3439398";
$deviceid2 = "CAFCA331327FAC81909CC41108019FA4E9A0287201DFB8CD515BDFDBB3439398";
$serial = "7F4385AEA4693";
$sig = "850285292324D841DEB429F0AC07235A566EA304C211EB9E6C5949D83C78C61E";

$n1 = "http://$portal/stalker_portal/server/load.php?type=stb&action=handshake&prehash=false&JsHttpRequest=1-xml";

$h1 = [
    "Cookie: mac=$mac; stb_lang=en; timezone=GMT",
    "X-Forwarded-For: $user_ip",
    "Referer: http://$portal/stalker_portal/c/",
    "User-Agent: Mozilla/5.0 (QtEmbedded; U; Linux; C) AppleWebKit/533.3 (KHTML, like Gecko) MAG200 stbapp ver: 2 rev: 250 Safari/533.3",
    "X-User-Agent: Model: MAG250; Link:",
];

$c1_curl = curl_init();
curl_setopt($c1_curl, CURLOPT_URL, $n1);
curl_setopt($c1_curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($c1_curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c1_curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c1_curl, CURLOPT_HTTPHEADER, $h1);
curl_setopt($c1_curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (QtEmbedded; U; Linux; C) AppleWebKit/533.3 (KHTML, like Gecko) MAG200 stbapp ver: 2 rev: 250 Safari/533.3');
$res1 = curl_exec($c1_curl);
curl_close($c1_curl);

$response = json_decode($res1, true);
$token = $response['js']['random'];
$real = $response['js']['token'];

$h2 = [
    "Cookie: mac=$mac; stb_lang=en; timezone=GMT",
    "X-Forwarded-For: $user_ip",
    "Authorization: Bearer 4EAD4862CF98476592930C6BB391B885",
    "Referer: http://$portal/stalker_portal/c/",
    "User-Agent: Mozilla/5.0 (QtEmbedded; U; Linux; C) AppleWebKit/533.3 (KHTML, like Gecko) MAG200 stbapp ver: 2 rev: 250 Safari/533.3",
    "X-User-Agent: Model: MAG250; Link:",
];

$n2 = "http://$portal/stalker_portal/server/load.php?type=stb&action=get_profile&hd=1&ver=ImageDescription: 0.2.18-r14-pub-250; ImageDate: Fri Jan 15 15:20:44 EET 2016; PORTAL version: 5.5.0; API Version: JS API version: 328; STB API version: 134; Player Engine version: 0x566&num_banks=2&sn=$serial&stb_type=MAG254&image_version=218&video_out=hdmi&device_id=$deviceid&device_id2=$deviceid2&signature=$sig&auth_second_step=1&hw_version=1.7-BD-00&not_valid_token=0&client_type=STB&hw_version_2=7c431b0aec69b2f0194c0680c32fe4e3&timestamp=$currentTimestamp&api_signature=263&metrics={\"mac\":\"$mac\",\"sn\":\"$serial\",\"model\":\"MAG254\",\"type\":\"STB\",\"uid\":\"$deviceid\",\"random\":\"$token\"}&JsHttpRequest=1-xml";

$c2_curl = curl_init();
curl_setopt($c2_curl, CURLOPT_URL, $n2);
curl_setopt($c2_curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($c2_curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c2_curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c2_curl, CURLOPT_HTTPHEADER, $h2);
curl_setopt($c2_curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (QtEmbedded; U; Linux; C) AppleWebKit/533.3 (KHTML, like Gecko) MAG200 stbapp ver: 2 rev: 250 Safari/533.3');
$res2 = curl_exec($c2_curl);
curl_close($c2_curl);

$n3 = "http://$portal/stalker_portal/server/load.php?type=itv&action=create_link&cmd=ffrt%http://localhost/ch/$id&JsHttpRequest=1-xml";

$c3_curl = curl_init();
curl_setopt($c3_curl, CURLOPT_URL, $n3);
curl_setopt($c3_curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($c3_curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c3_curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c3_curl, CURLOPT_HTTPHEADER, $h2);
curl_setopt($c3_curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (QtEmbedded; U; Linux; C) AppleWebKit/533.3 (KHTML, like Gecko) MAG200 stbapp ver: 2 rev: 250 Safari/533.3');
$res3 = curl_exec($c3_curl);
curl_close($c3_curl);

$i6 = json_decode($res3, true);
$d7 = $i6["js"]["cmd"];

header("Location: ".$d7);
die;
