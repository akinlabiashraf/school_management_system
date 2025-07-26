<?php

require_once '../private/core/database.core.php'; // Adjust if needed to load your DB and session

// Check user login
if (!Auth::logged_in()) {
    echo "Unauthorized";
    exit;
}

// Get input
$question_id = $_POST['question_id'] ?? null;
$answer = $_POST['answer'] ?? null;

if (!$question_id || !$answer) {
    echo "Missing data";
    exit;
}

// Get user and test info
$user_id = Auth::getUser_id();
$test_id = $_SESSION['CURRENT_TEST_ID'] ?? null; // You must store this in session when test starts

if (!$test_id) {
    echo "No test context";
    exit;
}

// Save the answer (Update if exists)
$query = "INSERT INTO student_answers (user_id, test_id, question_id, answer, date) 
          VALUES (:user_id, :test_id, :question_id, :answer, NOW())
          ON DUPLICATE KEY UPDATE answer = :answer2";

// $db = new Database();
// $db->query($query);
// $db->bind(':user_id', $user_id);
// $db->bind(':test_id', $test_id);
// $db->bind(':question_id', $question_id);
// $db->bind(':answer', $answer);
// $db->bind(':answer2', $answer);
// $db->execute();

echo "Saved";
