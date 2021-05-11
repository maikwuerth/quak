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
if ($posts->num_rows > 0) {
  while($post = $posts->fetch_assoc()) {
    //zeige daten
    <ul>
    //MAX HTML CODE für einzelne posts
    <li>
      <img src="Bilder/avatar.PNG" alt="Avatar">
      <div class="beitrag">
        <strong>$post["user"] <span>@daddy69</span></strong>
        <p>$post["text"]</p>
        <div class="actions">
          <a href=""><alt="kommentieren">Kommentieren</alt="kommentieren"></a>
          <a href=""><alt="zwitschern">Zwitschern</alt="zwitschern"></a>
          <a href=""><alt="gefällt mir">Gefällt mir</alt="gefällt"></a>
        </div>
      </div>
    </li>
    }
    </ul>
  }
// ende
$conn->close();
?> 
