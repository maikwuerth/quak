<?php

var_dump($_POST);

function new_user($dbname, $Benutzername, $Name, $Passwort, $Biographie) {
 $sql = "INSERT INTO benutzer (Benutzername, Name, Passwort, Biographie)
 VALUES ('$Benutzername', '$Name', '$Passwort', '$Biographie')";
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
$Benutzername = $_POST["username"];
$Biographie = $_POST["bio"];
$Name = $_POST["name"];
$Passwort = $_POST["password"];
$Passwort2 = $_POST["password2"];

//Passwort prüfen
if ($Passwort!= $Passwort2) {
	echo "Passwörter stimmen nicht überein";
}

// Verbindung Herstellen

$conn =new mysqli($servername, $username, $password, $dbname);

//Prüfe Verbindung
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 
 //SQL QUERY bauen für neuen User
 $sql = new_user($dbname, $Benutzername, $Name, $Passwort, $Biographie);
 
 //Neuen User der DB hinzufügen
 insert($sql, $conn);
 


$conn->close();
 ?>