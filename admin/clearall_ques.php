<?php
include '../database/config.php';
if(isset($_POST)){
    $examid = $_POST['examid'];
    $query = $conn->prepare("DELETE FROM tbl_question_set WHERE examid= ?");
    $query->bind_param("s", $examid);
    if($query->execute()){
        echo json_encode(["status"=>true]);
        exit;
    }else{
        echo json_encode(["status"=>false]);
        exit;
    }
}
?>