<?php

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

?>