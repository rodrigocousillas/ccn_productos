<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.fastly.com/public-ip-list");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Accept: application/json"]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
