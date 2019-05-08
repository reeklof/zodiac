<?php

include './addHoroscope.php';
    
if (($_SERVER['REQUEST_METHOD'] == 'POST') AND ($_POST['action'] == 'update')){
    $date = $_POST['newHoroscope'];
    $horoscope = new addHoroscope();
    $newHoro = $horoscope->showHoroscope($date);

    if (isset($_SESSION['horoscope'])) {
      unset($_SESSION['horoscope']);
      $_SESSION['horoscope'] = $newHoro;
      exit;
    } else {
      echo json_encode(false);
    }
  } else {
      echo json_encode(false);
  }
?>