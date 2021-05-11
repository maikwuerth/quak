<?php

function new_quak_insert($Titel, $Quak_ID, $Benutzer_ID, $Inhalt) {
 $sql = "INSERT INTO Quaks (Titel, Quak_ID, Benutzer_ID, Inhalt)
 VALUES ('$Titel', '$Quak_ID', '$Benutzer_ID', '$Inhalt')";
 return $sql;
}



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quak";

// Verbindung Herstellen

$conn =new mysqli($servername, $username, $password, $dbname);

//Prüfe Verbindung
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 $sql=new_quak_insert("Test", 001, 001, "test12345");
 
 if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>