<?php

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

echo "asd";

$db = new Database(
    'mysql',
    [
        'host' => '127.0.0.1', // need to use this instead of localhost
        'port' => 3308,
        'dbname' => 'phpiggy',
    ],
    'root',
    ''
);

$search = "Hats";
$query = "SELECT * FROM products WHERE name='{$search}'";

$stmt = $db->connection->query($query, PDO::FETCH_ASSOC);

var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
