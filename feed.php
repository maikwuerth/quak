<?php

//welcher feed
$tag = $_GET["tag"];
if( !isset($_GET['tag'] ) AND $_GET['tag'] != "" ) {
  $tag = $_GET['tag'];
}  else {
  $tag = "*";
}
$sql = "SELECT id, text, user, tags FROM Posts WHERE tag=".$tag." ORDER BY id ASC";

//DB Config
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//hole daten
$posts = $conn->query($sql);

//zeige daten
foreach($posts as $post) {
  //MAX HTML CODE für einzelne posts
}

// ende
$conn->close();
?> 
