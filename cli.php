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
$query = "SELECT * FROM products WHERE name=?"; // method 1
// $query = "SELECT * FROM products WHERE name=:name"; // method 2

$stmt = $db->connection->prepare($query);

// $stmt->bindValue(':name', $search, PDO::PARAM_STR); // method 3 -- here we do not need to pass parameter list to execute commands

$stmt->execute(
    [$search] // method 1
    // [$name=>$search]// method 2
);

var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
