<?php
  function connect_db() {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "pizzadb";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$database);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }
?>