<?php
include '../database/config.php';
if(isset($_POST)){
    $examid = $_POST['examid'];
    $query = $conn->prepare("SELECT * FROM tbl_question_set WHERE examid = ? AND questionid=?");
    $query->bind_param("ss", $examid, $_POST['id']);
    $query->execute();
    $result = $query->get_result();
    if($result->num_rows>0){
        echo json_encode(['status'=>false, 'msg'=>'Question Already Exist']);
        $query->close();
        exit;
    }else{
        $query = $conn->prepare("INSERT INTO tbl_question_set (examid,questionid) VALUES (?, ?) ");
        $query->bind_param("ss", $examid, $_POST['id']);
        if($query->execute()){
            $check = 1;
            $sql = $conn->prepare("UPDATE tbl_questions SET qcheck = ? WHERE question_id = ?");
            $sql->bind_param("is", $check, $_POST['id']);
            $sql->execute();
            $sql->close();
            echo json_encode(['status'=>true, 'msg'=>'Question Added']);
        }else{
             echo json_encode(['status'=>false, 'msg'=>'Question not Added']);
        }
        $query->close();
    }  
}
?>