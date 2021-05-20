<?php

var_dump($_POST);

function delete_quak($Quak_ID) {
 $sql = "Delete quaks Where Quak_ID = '$Quak_ID";
 return $sql;
}

function insert($sql, $conn) {
	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	}
	else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "QUAK_DB";

//Inhalt von Post-Methode in locale variablen abspeichern
$Quak_ID = $_POST["ID"];

// Verbindung Herstellen

$conn =new mysqli($servername, $username, $password, $dbname);

//Prüfe Verbindung
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 
 //SQL QUERY bauen für neuen User
 $sql = delete_quak($Quak_ID);
 
 //Neuen User der DB hinzufügen
 insert($sql, $conn);

$conn->close();
 ?>