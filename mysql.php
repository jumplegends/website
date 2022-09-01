<?php
$host = "sql8.freemysqlhosting.net";
$name = "sql8516220";
$user = "sql8516220";
$passwort = "PFdUqXsvLq";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}
 ?>
