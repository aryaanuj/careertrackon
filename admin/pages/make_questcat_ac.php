<?php
include '../../database/config.php';
$ctid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "UPDATE question_category SET status=1 WHERE id='$ctid'";

if ($conn->query($sql) === TRUE) {
    header("location:../question_cat.php?rp=7823");
} else {
    header("location:../question_cat.php?rp=1298");
}

$conn->close();
?>
