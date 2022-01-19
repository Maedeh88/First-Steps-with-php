<?php
error_reporting(E_ERROR | E_PARSE);
require_once "ConnectDB.php";
$table = "CREATE TABLE IF NOT EXISTS post (
    id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    writername VARCHAR (30) NOt NULL,
    title VARCHAR(50) NOT NULL,
    body VARCHAR(1000) NOT NULL
)";
if ($conn->query($table) == TRUE) {
    echo "table is created";
} else {
    echo "ERROR";
}