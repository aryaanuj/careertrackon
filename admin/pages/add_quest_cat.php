<?php
// Set timezone 
date_default_timezone_set('Asia/Kolkata'); 
include '../../database/config.php';
include '../../includes/uniques.php';

$qcat =   strtolower(mysqli_real_escape_string($conn, $_POST['qcat']));
$new_qcat = strtolower(mysqli_real_escape_string($conn, $_POST['new_qcat']));
$qsubcat = strtolower(mysqli_real_escape_string($conn, $_POST['qsubcat']));

if($new_qcat != ''){
	$qcat = $new_qcat;
}
if($qsubcat==''){
	$qsubcat = 'NULL';
}
$sql = "SELECT * FROM question_category WHERE ques_category = '$qcat' AND ques_subcategory = '$qsubcat'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    header("location:../question_cat.php?rp=1185");
    }
} else {

$sql = "INSERT INTO question_category ( ques_category, ques_subcategory)
VALUES ('$qcat', '$qsubcat')";

if ($conn->query($sql) === TRUE) {
    header("location:../question_cat.php?rp=3598");
} else {
    header("location:../question_cat.php?rp=1925");
}


}
$conn->close();
?>


