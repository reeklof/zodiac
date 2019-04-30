<?php
session_start();

  class addHoroscope {
    function __construct() {
      include_once('database.php');
      $this->database = new Database();
    }

    public function showHoroscope($chosenDate) {
      $query = $this->database->connection->prepare("SELECT horoscopeSign FROM HoroscopeList
      WHERE (dateFrom <= '$chosenDate') AND (dateUntil >= '$chosenDate');");
      $query->execute();
      $result = $query->fetchAll();


      if (empty($result)){
        return array("error" => "detta gick inte bra");
      }
      return $result;
    }
  } 

  if($_SERVER['REQUEST_METHOD'] == "POST" && !isset($_SESSION['horoscope']) && isset($_POST['newHoroscope'])){
    try {
        $chosenDate = $_POST["newHoroscope"];
        $horoscope = new addHoroscope();
        $databaseData = $horoscope->showHoroscope($chosenDate);
        $_SESSION['horoscope'] = $databaseData;
        echo json_encode($databaseData); 
        exit;
    }
    catch (Exception $error) {
      http_response_code(500);
      echo json_encode($error->getMessage());
    }
  } else {
    echo json_encode(false);
  }
?>