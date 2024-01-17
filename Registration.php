<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BP-11</title>
    <link rel="stylesheet" href="Registration.css">
</head>
<body>
    <div class="form-structor">
        <div class="signup">
            <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>

                <form method="POST" action="">
                <div class="form-holder">

                <input type="text" class="input"  name="Name"   required  placeholder="Name" />
                <input type="email" class="input" name="Email"   required placeholder="Email" />
                <input type="text" class="input"  name="Pseudo"  required  placeholder="Pseudo" />
                <input type="password" class="input"  name="Password" required  placeholder="Password"/>
                <input class="input" type="text"   name="Date-of-Birth"  required onfocus="(this.type='date')"
                onblur="(this.type='text')"  placeholder="Date Of Birth">

                </div>
                <input  type="submit" value="Sign up" class="submit-btn" name="form1_submit" ></input>

            </form>
        </div>

        <div class="login slide-up">
            <div class="center">
                <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                <form method="POST" action="">

                <div class="form-holder">
                    <input type="email"     name="EMAIL-LOGIN"    class="input" placeholder="Email" />
                    <input type="password"   name="PASSWORD-LOGIN"   class="input" placeholder="Password" />
                </div>

                <input  type="submit" value="Log in" class="submit-btn" name="form2_submit"></input>
                </form>
            </div>
        </div>
    </div>

    <?php
session_start(); // Start the session

class Membre {
    public $Name;
    public $Email;
    public $Pseudo;
    public $Password;
    public $DateofBirth;

    public function __construct($Name, $Email, $Pseudo, $Password, $DateofBirth) {
        $this->Name = $Name;
        $this->Email = $Email;
        $this->Pseudo = $Pseudo;
        $this->Password = $Password;
        $this->DateofBirth = $DateofBirth;
    }
}


if (isset($_SESSION['DATA'])) {

    $ARRAY_DATA = $_SESSION['DATA'];
} else {
    $ARRAY_DATA = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sign up 

    if (isset($_POST['form1_submit'])) {
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Pseudo = $_POST['Pseudo'];
        $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
        $DateofBirth = $_POST['Date-of-Birth'];

        // if (empty($Name) || empty($Email) || empty($Pseudo) || empty($Password) || empty($DateofBirth)) {
        //     echo "Please enter all Your information <br>";
        // }



        if (!empty($Name) && !empty($Email) && !empty($Pseudo) && !empty($Password) && !empty($DateofBirth)) {

            $MEMBRE = new Membre($Name, $Email, $Pseudo, $Password, $DateofBirth);

            $ARRAY_DATA[] = $MEMBRE;

            $_SESSION['DATA'] = $ARRAY_DATA;

            header("location: successful.php");

            // echo "<pre>";
            // print_r($ARRAY_DATA);
            // echo "</pre>";
        }
    } 

    // Login 
    elseif (isset($_POST['form2_submit'])) {
        $Email_logIn = $_POST['EMAIL-LOGIN'];
        $Password_logIn = $_POST['PASSWORD-LOGIN'];
        $startsWith = "admin";


    //     if (strpos($Email_logIn, $startsWith) === 0 && !empty($Password_logIn)) {
    //     header("location: Admin.php");
    //     exit(); 
    // } 

        if (empty($Email_logIn) || empty($Password_logIn)) {
            echo "Please enter both your email and password. <br>";
        } else {
            $loginSuccessful = false;
            foreach ($ARRAY_DATA as $USER) {

            
                if ($Email_logIn == $USER->Email && password_verify($Password_logIn, $USER->Password)) {

                    $_SESSION['userInfo'] = $USER;

                    $loginSuccessful = true;
                    header("location: profil.php");
                    exit(); 
                }
            }
            if (!$loginSuccessful) {
                echo "Incorrect email or password. Please try again. <br>";
            }
        }
    }
}


?> 
    <script src="Registration.js"></script>
</body>
</html>