<?php
include '../database/config.php';
if(isset($_POST)){
    $examid = $_POST['examid'];
    $query = $conn->prepare("DELETE FROM tbl_question_set WHERE examid= ? AND questionid= ?");
    $query->bind_param("ss", $examid, $_POST['id']);
    if($query->execute()){
    	$sql1 = $conn->prepare("SELECT * FROM tbl_question_set WHERE questionid=?");
    	$sql1->bind_param("s",$_POST['id']);
    	$sql1->execute();
    	$result = $sql1->get_result();
    	if($result->num_rows < 1){
	    	$sql=$conn->prepare("UPDATE tbl_questions SET qcheck = 0 WHERE question_id=?");
	        $sql->bind_param("s", $_POST['id']);
	        $sql->execute();
	        $sql->close();
	        echo json_encode(["status"=>true,"check"=>true]);
	        exit;
	    }
        echo json_encode(["status"=>true,"check"=>false]);
        exit;
    }else{
       echo json_encode(["status"=>false,"check"=>false]);
       exit;
    }
}
?>