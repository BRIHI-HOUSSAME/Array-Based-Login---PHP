<?php

require_once 'class.php';
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUR PROFILE </title>
    <link rel="stylesheet" href="profil.css">
    <script src="https://kit.fontawesome.com/f8618ee835.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="HEADER">
    <h1> WELCOME <?php print_r($_SESSION['userInfo']->Pseudo);  ?></h1>
<div class="LOG-OUT-BUTTON" ><a href="Registration.php">LOG OUT  </a> <i class="fa-solid fa-arrow-right-from-bracket"></i></div>

    </div>
    <h3> THIS IS YOUR INFORMATION:</h3>

    <div class="CONTAINER">
        <div class="DIV-DISPLAY-INFO-NAME"><i class="fa-solid fa-plus"></i>Name</div>
        <div class="DIV-DISPLAY-INFO-EMAIL"> <i class="fa-solid fa-plus"></i>Email</div>
        <div class="DIV-DISPLAY-INFO-PASSWORD"><i class="fa-solid fa-plus"></i>Date of Birth</div>
    </div>
    <div class="CONTAINER">
        <div class="DIV-DISPLAY-INFO-NAME"><?php print_r($_SESSION['userInfo']->Name);  ?></div>
        <div class="DIV-DISPLAY-INFO-EMAIL"><?php print_r($_SESSION['userInfo']->Email);  ?></div>
        <div class="DIV-DISPLAY-INFO-PASSWORD"><?php print_r($_SESSION['userInfo']->DateofBirth);  ?></div>
    </div>

        <div class="EDITE-BUTTON">
            <div>
<a href="edite.php">EDITE  </a><i class="fa-regular fa-pen-to-square"></i></div>
        </div>
</body>

</html>