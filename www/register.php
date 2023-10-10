<?php

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $database = new Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASS"]);
    $conn = $database->getConnection();

    $sql = "INSERT INTO user (name, username, password_hash, api_key) 
            VALUES (:name, :username, :password_hash, :api_key)";
    $stmt = $conn->prepare($sql);

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $api_key = bin2hex(random_bytes(16));

    $stmt->bindValue(":name", $_POST["name"], PDO::PARAM_STR);
    $stmt->bindValue(":username", $_POST["username"], PDO::PARAM_STR);
    $stmt->bindValue(":password_hash", $password_hash, PDO::PARAM_STR);
    $stmt->bindValue(":api_key", $api_key, PDO::PARAM_STR);
    $stmt->execute();

    echo "Obrigado por se registrar. Sua chave de API é " . $api_key;
    exit;
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
<main class="container">
    <h1>Registrar</h1>
    <form method="POST">
        <label for="name">Nome
            <input type="text" name="name" id="name">
        </label>

        <label for="name">User Nome
            <input type="text" name="username" id="username">
        </label>

        <label for="password">Password
            <input type="password" name="password" id="password">
        </label>

        <button>Registrar</button>

    </form>
</main>
</body>
</html>