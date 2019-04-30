<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Horoscope</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div>
        <label for="birthDate">Birthday:</label>
        <input type="date" name="birthDate" id="birthDate">
        <br>
        <button type="submit" value="sign" id="save" onclick="saveHoroscope()">Save</button>
        <button type="submit" value="update" id="update" onclick="updateHoroscope()">Update</button>
        <button type="submit" value="remove" id="remove" onclick="removeHoroscope()">Remove</button>

        <div id="container"></div>
    </div>
</body>

</html>
<script src="logic.js"></script>
