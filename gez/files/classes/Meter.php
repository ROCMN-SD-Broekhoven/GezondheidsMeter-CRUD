<?php
Class Meter extends Connection {
    private $conn;
    private $score;
    private $date;

    public function __construct() {
        $this->conn = $this->connectToDatabase();
    }

    public function newScore($score) {
        $this->score = $score;
        $userid = $_SESSION['uid'];
        $date = new DateTime();
        $this->date = $date->format('Y-m-d');

        $query = "INSERT INTO `results` (UserID, Score, Date) VALUES ('$userid', '$this->score', '$this->date')";
        if ($this->conn->query($query)) {
            return true;
        }
        return false;
    }

    public function checkToday() {
        $userid = $_SESSION['uid'];
        $date = new DateTime();
        $this->date = $date->format('Y-m-d');

        $query = "SELECT * FROM `results` WHERE `UserID` = '$userid' AND `Date` = '$this->date'";
        if ($result = $this->conn->query($query)) {
            if ($result->num_rows > 0) {
                return true;
            }
        }
        return false;
    }

    public function getMeterValues() {
        $userid = $_SESSION['uid'];
        $date = new DateTime();
        $this->date = $date->format('Y-m-d');

        $arr = [];
        $res = 0;

        $query = "SELECT * FROM `results` WHERE `UserID` = '$userid'";
        if ($result = $this->conn->query($query)) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($arr, $row['Score']);
                }

                for ($i = 0; $i < sizeof($arr); $i++) {
                    $res = $res + $arr[$i];
                }

                return (100 / 38) * ($res / $result->num_rows);
            }
        }
    }
}