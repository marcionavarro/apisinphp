<?php

if (!empty($_GET["name"])) {
    /*$response  = file_get_contents("https://example.com");
    echo $response;*/

    /*$response  = file_get_contents("https://randomuser.me/api");
    $data = json_decode($response, true);
    echo $data["results"][0]["name"]["first"], "\n";*/

    $response = file_get_contents("https://api.agify.io?name={$_GET['name']}"); // Dave/michael/jane
    $data = json_decode($response, true);
    $age = $data["age"];
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Example</title>
</head>
<body>
<?php
if (isset($age)): ?>
    Idade: <?= $age;?>
<?php
endif; ?>
<form>
    <label for="name">Nome</label>
    <input name="name" id="name"/>
    <button>Adivinhe a idade</button>
</form>
</body>
</html>
