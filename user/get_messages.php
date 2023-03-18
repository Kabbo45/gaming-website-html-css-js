<?php
$conn = mysqli_connect( "localhost", "root", "", "game" );
$result = mysqli_query( $conn, "SELECT * FROM game_chat" );
$messages = array();
while( $row = mysqli_fetch_assoc( $result ) ) {
    $messages[] = $row;
}
echo json_encode( $messages );
mysqli_close( $conn );
?>