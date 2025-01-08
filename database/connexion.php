<?php

require_once "config.php";

try {
    $pdo = new PDO(DSN, USER, PASS);
} catch (PDOException $o) {
    header("location : error.php");
}