<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

include '../db.php';

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE songs SET status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: dashboard.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
