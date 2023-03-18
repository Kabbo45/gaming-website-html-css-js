<?php
$conn = mysqli_connect("localhost", "root", "", "game");
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$message = mysqli_real_escape_string($conn, $_POST["message"]);
mysqli_query($conn, "INSERT INTO game_chat (name, email, message) VALUES ('$name', '$email', '$message')");
mysqli_close($conn);
?>