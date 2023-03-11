<?php

require 'vendor/autoload.php';

try {
    $pdo = new PDO('mysql:host=' . DB_HOST . '; charset=utf8', DB_USER, DB_PASSWORD);

    $pdo->exec('DROP DATABASE IF EXISTS ' . DB_NAME);
    $pdo->exec('CREATE DATABASE ' . DB_NAME);
    $pdo->exec('USE ' . DB_NAME);

    if (is_file(DB_DUMP_PATH) && is_readable(DB_DUMP_PATH)) {
        $sql = file_get_contents(DB_DUMP_PATH);
        $statement = $pdo->prepare($sql);
        $statement->execute();
    } else {
        echo DB_DUMP_PATH . ' file does not exist';
    }

    sleep(1);
} catch (PDOException $exception) {
    echo $exception->getMessage();
}