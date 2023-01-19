<?php
session_start();
$questionNumber = $_SESSION['questionNumber'];
$data = json_decode(file_get_contents('php://input'), true);
$questionNumber += $data['questionNumber'];
echo json_encode(['success' => true]);
