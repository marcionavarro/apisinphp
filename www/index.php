<?php

$ch = curl_init();

//curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*$headers = [
    "Authorization: Client-ID YOUR_ACCESS_TOKEN"
];

$response_headers = [];
$header_callback = function ($ch, $header) use (&$response_headers) {
    $len = strlen($header);

    $parts = explode(":", $header, 2);
    if (count($parts) < 2) {
        return $len;
    }

    $response_headers[$parts[0]] = trim($parts[1]);
    return $len;
};

curl_setopt_array(
    $ch,
    [
        CURLOPT_URL => "https://api.unsplash.com/photos/random",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_HEADERFUNCTION => $header_callback
    ]
);

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo $status_code, "\n";
print_r($response_headers);
echo $response, "\n";*/

$headers = [
    "Authorization: token YOUR_ACCESS_TOKEN",
//    "User-agent: marcionavarro"
];

$payload = json_encode(
    [
        "name" => "Create from API",
        "description" => "an example API-created repo"
    ]
);

curl_setopt_array(
    $ch,
    [
        CURLOPT_URL => "https://api.github.com/user/repos",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_USERAGENT => "marcionavarro",
//        CURLOPT_CUSTOMREQUEST => 'POST',
       // CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload
    ]
);

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo $status_code, "\n";
echo $response, "\n";

