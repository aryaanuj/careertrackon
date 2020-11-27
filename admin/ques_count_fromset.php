<?php
include '../database/config.php';
if(isset($_POST)){
    $examid = $_POST['examid'];
    $query = "SELECT * FROM tbl_questions tq LEFT JOIN tbl_question_set tqs ON tq.question_id=tqs.questionid WHERE tq.exam_id='$examid' OR tqs.examid='$examid'";
    $res = $conn->query($query);
    $count = $res->num_rows;
    echo json_encode(['status'=>true, 'count'=>$count]);
}
?>