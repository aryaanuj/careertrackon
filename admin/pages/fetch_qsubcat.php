<?php
include '../../database/config.php';
$tags = mysqli_real_escape_string($conn, $_POST['tags']);
$output = '<option value="NULL" selected>-Select Sub Category-</option>';
$sql = "SELECT DISTINCT ques_subcategory FROM question_category WHERE ques_category='$tags' AND status = 1 ORDER BY ques_subcategory";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$output .=  '<option value="'.$row['ques_subcategory'].'">'.ucfirst($row['ques_subcategory']).'</option>';
}
} 
echo $output;
$conn->close();
?>