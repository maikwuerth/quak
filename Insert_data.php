<?php

function new_quak_insert($Titel, $Quak_ID, $Benutzer_ID, $Inhalt) {
 $sql = "INSERT INTO Quaks (Tags, Quak_ID, Benutzer_ID, Inhalt)
 VALUES ('$Titel', '$Quak_ID', '$Benutzer_ID', '$Inhalt')";
 return $sql;
}


$Inhalt = $_POST["inhalt"];
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
 // Ermittle neue Quak_ID
 $Quak_ID = $conn->query("SELECT Quak_ID From Quaks ORDER BY Quak_ID DESC LIMIT 1");
 echo $Quak_ID;
 //Neuen Quak in DB einfügen
 $sql = new_quak_insert("Test", $Quak_ID, 001, $Inhalt);
 
 if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>