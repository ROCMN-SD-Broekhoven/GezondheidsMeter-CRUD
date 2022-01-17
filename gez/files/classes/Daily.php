<?php
Class Daily extends Connection {
    private $conn;

    public function __construct() {
        $this->conn = $this->connectToDatabase();
    }

    public function getQuestions() {
        $query = "SELECT * FROM `questions`; ";
        $result = $this->conn->query($query);
        $questionsArray = [];

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                array_push($questionsArray, [$row['ID'],$row['QuestionText']]);
            }
            return $questionsArray;
        } else {
            return [];
        }
    }

    public function getAnswers($qid) {
        $query = "SELECT * FROM `answer` WHERE `QuestionID` = $qid";
        $result = $this->conn->query($query);
        $questionsArray = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($questionsArray, [$row['ID'],$row['AnswerText'],$row['Points']]);
            }
            return $questionsArray;
        } else {
            return [];
        }
    }
}