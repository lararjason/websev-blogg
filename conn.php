<?php
  $_ENV = parse_ini_file('.env');
  $host = $_ENV['DB_HOST'];
  $port = $_ENV['DB_PORT'];
  $database = $_ENV['DB_DATABASE'];
  $username = $_ENV['DB_USERNAME'];
  $password = $_ENV['DB_PASSWORD'];

  $conn = new mysqli($host, $username, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>