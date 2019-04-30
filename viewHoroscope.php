<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['horoscope'])){
    $databaseData = $_SESSION['horoscope'];
    echo json_encode($databaseData); 
} else {
    echo json_encode(false);
}

?>
