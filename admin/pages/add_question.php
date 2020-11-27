<?php
include '../../database/config.php';
include '../../includes/uniques.php';
$examid = mysqli_real_escape_string($conn, htmlspecialchars($_POST['exam_id']));
$question_id = 'QS-'.get_rand_numbers(6).'';
$question = mysqli_real_escape_string($conn, str_replace("'", "", $_POST['question']));
$answer = mysqli_real_escape_string($conn, str_replace("'", "", $_POST['answer']));

if (isset($_GET['type'])) {
$question_type = $_GET['type'];	
if ($question_type == "mc") {	
$opt1 = mysqli_real_escape_string($conn, str_replace("'", "", $_POST['opt1']));
$opt2 = mysqli_real_escape_string($conn, str_replace("'", "", $_POST['opt2']));
$opt3 = mysqli_real_escape_string($conn, str_replace("'", "", $_POST['opt3']));
$opt4 = mysqli_real_escape_string($conn, str_replace("'", "", $_POST['opt4']));
$lang = mysqli_real_escape_string($conn, str_replace("'", "", $_POST['ques-lang']));
$exp = mysqli_real_escape_string($conn, str_replace("'", "", $_POST['explanation']));
$tags = mysqli_real_escape_string($conn, $_POST['tags']);
$subtags = mysqli_real_escape_string($conn, $_POST['subtags']);

if($lang=="hindi"){
    $opt1 = '<span style="font-family:kruti;">'.$opt1.'</span>';
    $opt2 = '<span style="font-family:kruti;">'.$opt2.'</span>';
    $opt3 = '<span style="font-family:kruti;">'.$opt3.'</span>';
    $opt4 = '<span style="font-family:kruti;">'.$opt4.'</span>';
}

if($answer=='option1')
{
    $answer = $opt1;
}
else if($answer=="option2")
{
    $answer = $opt2;
}
else if($answer=='option3')
{
    $answer = $opt3;
}
else if($answer=='option4')
{
    $answer = $opt4;
}

$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question' AND option1='$opt1' AND option2 = '$opt2' AND option3='$opt3' AND option4='$opt4'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
 header("location:../add-questions.php?rp=1185&eid=$examid&msg='Question Already Exists.'");
    }
} else {

$sql = "INSERT INTO tbl_questions (question_id, exam_id, type, question, option1, option2, option3, option4, answer, tags, subtags, explanation)
VALUES ('$question_id', '$examid', 'MC', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$answer', '$tags', '$subtags', '$exp')";

if ($conn->query($sql) === TRUE) {
    header("location:../add-questions.php?rp=0357&eid=$examid&msg=success");	
} else {
 header("location:../add-questions.php?rp=3903&eid=$examid&msg=error");	
}

}


}else if($question_type == "fib") {
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
header("location:../add-questions.php?rp=1185&eid=$examid");
    }
} else {

$sql = "INSERT INTO tbl_questions (question_id, exam_id, type, question, answer)
VALUES ('$question_id', '$examid', 'FB', '$question', '$answer')";

if ($conn->query($sql) === TRUE) {
  header("location:../add-questions.php?rp=0357&eid=$examid");  	
} else {
 header("location:../add-questions.php?rp=3903&eid=$examid");
}


}


}else{
	
}
	
}else{
	
header("location:../");	
	
}


?>