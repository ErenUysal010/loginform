<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oop_wigmans";

$conn = new PDO("mysql:host=$servername;dbname=$connect_DB", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);