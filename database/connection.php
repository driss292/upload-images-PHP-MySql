<?php
try {
    $db = new PDO(
        "mysql:host=localhost;chartset=utf8;dbname=polaroid",
        "root",
        "root"
    );
} catch (PDOException $ex) {
    echo "Error $ex";
}
