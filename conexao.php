<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "masculife_db"; // ALTERE para o nome do seu banco

$mysqli = new mysqli($host, $user, $password, $dbname);

if($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}
?>