<?php

/*$ch = curl_init();

curl_setopt_array(
    $ch,
    [
        CURLOPT_URL => "https://api.github.com/gists/67a0a1086b70f7f0a912699d6d6ca45b",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_USERAGENT => 'marcionavarro'
    ]
);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
print_r($data);
//foreach ($data as $gist) {
//    echo $gist["id"], " - ", $gist["description"], "\n";
//}*/

/*************************************************************************************************************/

/*require __DIR__ . "/vendor/autoload.php";

$client = new \GuzzleHttp\Client;

$response = $client->request("GET", "https://api.github.com/user/repos", [
    "headers" => [
        "Authorization" => "token YOUR_ACCESS_TOKEN",
        "User-Agent" => "marcionavarro"
    ]
]);

echo $response->getStatusCode(), "\n";
echo $response->getHeader("content-type")[0], "\n";
echo substr($response->getBody(), 0, 200), "...\n";*/

/*************************************************************************************************************/

require __DIR__ . "/vendor/autoload.php";

$api_key = "YOUR_API_KEY"; //YOUR_API_KEY

$data = [
  "name" => "Bob",
  "email" => "bob@example.com"
];

$stripe = new \Stripe\StripeClient($api_key);
$customer = $stripe->customers->create($data);
echo $customer;

/*$ch = curl_init();
curl_setopt_array(
    $ch,
    [
        CURLOPT_URL => "https://api.stripe.com/v1/customers",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_USERPWD => $api_key,
        CURLOPT_POSTFIELDS => http_build_query($data)
    ]
);
$response = curl_exec($ch);
curl_close($ch);
echo $response;*/



