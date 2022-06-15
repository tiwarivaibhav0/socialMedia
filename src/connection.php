<?php
session_start();
$servername = "mysql-server";
$username = "root";
$password = "secret";

try {
  $conn = new PDO("mysql:host=$servername;dbname=social_media", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  echo "Connected successfully";

// $sql = "CREATE TABLE User (
//     user_id INT(50) UNSIGNED PRIMARY KEY,
//     fname VARCHAR(100) NOT NULL,
//     lname VARCHAR(100) NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     username VARCHAR(60) NOT NULL,
//     mobile INT NOT NULL,
//     city VARCHAr(60) NOT NULL,
//     country VARCHAR(60),
//     pin INT NOT NULL,
//     password VARCHAR(60) NOT NULL
//  )";

//      $conn->query($sql);
  

//      $sql1="CREATE TABLE Post (
//       post_id INT(50) UNSIGNED PRIMARY KEY,
//       user_id INT,
//       image VARCHAR(100),
//       details VARCHAR(400),
//       post_date timestamp,
//       likes INT,
//       comments INT
    
//     )";


// $conn->query($sql1);

//      $sql2="CREATE TABLE request (
//       user_id INT(50) UNSIGNED ,
//       request_id INT(50) UNSIGNED
//       )";


// $conn->query($sql2);


//      $sql2="CREATE TABLE friend (
//       user_id INT(50) UNSIGNED ,
//       friend_id INT(50) UNSIGNED,
//       mute BIT
//       )";


// $conn->query($sql2);

//      $sql2="CREATE TABLE friend (
//       user_id INT(50) UNSIGNED ,
//       friend_id INT(50) UNSIGNED,
//       mute BIT
//       )";


// $conn->query($sql2);

//      $sql2="CREATE TABLE comments (
//       comment_id INT(50) UNSIGNED PRIMARY KEY, 
//       post_id INT(50) UNSIGNED ,
//       user_id INT(50) UNSIGNED,
//       comment varchar(100),
//       replies BIT
//       )";


// $conn->query($sql2);
//      $sql2="CREATE TABLE likes ( 
//       user_id INT(50) UNSIGNED,
//       post_id INT(50) UNSIGNED

//       )";


// $conn->query($sql2);






} catch(PDOException $e) {
  echo "Connectiono failed: " . $e->getMessage();
}


?>