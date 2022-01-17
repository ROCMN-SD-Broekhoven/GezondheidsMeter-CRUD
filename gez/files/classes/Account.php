<?php
Class Account extends Connection {
    private $firstname;
    private $lastname;
    private $email;
    private $gender;
    private $height;
    private $birthday;
    private $weight;
    private $password;
    private $password2;
    private $conn;

    public function __construct() {
        $this->conn = $this->connectToDatabase();
    }

    public function login($email, $password) {
        $this->email = $email;
        $this->password = $password;

        $query = "SELECT * FROM `user` WHERE `Email`= ?";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($ID, $firstname, $lastname, $birthday, $gender, $weight, $height, $email2, $password2);
                $stmt->fetch();

                if (password_verify($this->password, $password2)) {
                    $_SESSION["uid"] = $ID;
                    $_SESSION["name"] = $firstname;
                    $_SESSION["login"] = true;

                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function register($firstname, $lastname, $birthday, $email, $gender, $length, $weight, $password1, $password2) {
        if ($password1 != $password2) {
            return "Passwords are not the same";
        }

        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->height = $length;
        $this->weight = $weight;
        $this->gender = $gender;

        $this->password = $password1;
        $this->password2 = $password2;

        $date = new DateTime($birthday);
        $this->birthday = $date->format('Y-m-d');

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `user` (Firstname, Lastname, Height, Gender, Birthday, Weight ,Email, Password) VALUES ('$this->firstname', '$this->lastname', '$this->height', '$this->gender', '$this->birthday', '$this->weight', '$this->email', '$hashedPassword')";
        if ($this->conn->query($query)) {
            return $this->login($this->email, $password1);
        }
        return false;
    }
}