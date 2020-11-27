<?php
include '../../database/config.php';
$catid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM question_category WHERE id='$catid'";

if ($conn->query($sql) === TRUE) {
    header("location:../question_cat.php?rp=7823");
} else {
    header("location:../question_cat.php?rp=1298");
}

$conn->close();
?>
