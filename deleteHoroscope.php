<?php
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_SESSION['horoscope'])){
        unset($_SESSION["horoscope"]);
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
?>