<?php
require_once 'class.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUR PROFILE</title>
    <link rel="stylesheet" href="edite.css">
    <script src="https://kit.fontawesome.com/f8618ee835.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="HEADER">
        <h1> WELCOME <?php echo $_SESSION['userInfo']->Pseudo; ?></h1>
        <div class="LOG-OUT-BUTTON"><a href="Registration.php">LOG OUT </a> <i class="fa-solid fa-arrow-right-from-bracket"></i></div>
    </div>
    <h3>YOU CAN MODIFY YOUR INFORMATION</h3>
    <div class="CONTAINER">
        <div class="DIV-DISPLAY-INFO-NAME"><i class="fa-solid fa-plus"></i>Name</div>
        <div class="DIV-DISPLAY-INFO-EMAIL"> <i class="fa-solid fa-plus"></i>Email</div>
        <div class="DIV-DISPLAY-INFO-PASSWORD"><i class="fa-solid fa-plus"></i>Date of Birth</div>
    </div>
    <form method="POST" action="">
        <div class="CONTAINER">
            <input class="DIV-DISPLAY-INFO-NAME"  required name="UPDATED-NAME" placeholder=" UPDATE YOUR  NAME" />
            <input class="DIV-DISPLAY-INFO-EMAIL"  required name="UPDATED-EMAIL" placeholder=" UPDATE YOUR EMAIL" />
            <input class="DIV-DISPLAY-INFO-PASSWORD" type="text" name="UPDATED-DATEOFBIRTH" required onfocus="(this.type='date')"
                onblur="(this.type='text')" placeholder="UPDATE YOUR  DATE OF BIRTH">
        </div>
        <div class="DONE-BUTTON-CONTAINER">
            <button type="submit" class="DONE-BUTTON" >DONE<i class="fa-regular fa-circle-check"></i></button>
        </div>
    </form>
</body>

</html>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $UPDATED_NAME = $_POST['UPDATED-NAME'];
    $UPDATED_EMAIL = $_POST['UPDATED-EMAIL'];
    $UPDATED_DATEOFBIRTH = $_POST['UPDATED-DATEOFBIRTH'];



    $_SESSION['userInfo']->Name = $UPDATED_NAME;
    $_SESSION['userInfo']->Email = $UPDATED_EMAIL;
    $_SESSION['userInfo']->DateofBirth= $UPDATED_DATEOFBIRTH;

echo



    header("Location: successful-edite.php");
    exit();
}






?>