<?php

function new_quak($Tags, $Benutzer_ID, $Inhalt) {
 $sql = "INSERT INTO Quaks (Tags, Benutzer_ID, Inhalt)
 VALUES ('$Tags', '$Benutzer_ID', '$Inhalt')";
 return $sql;
}

function insert($sql) {
	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	}
	else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}


$Inhalt = $_POST["inhalt"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "QUAK_DB";

// Verbindung Herstellen

$conn =new mysqli($servername, $username, $password, $dbname);

//Prüfe Verbindung
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 
 //Neuen Quak in DB einfügen
 $sql = new_quak("Test",, $Inhalt);
 
 //Insert durchführen
 insert($sql);
 


$conn->close();
 ?>