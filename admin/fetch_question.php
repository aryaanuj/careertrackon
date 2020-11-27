<?php
include '../database/config.php';
if(!isset($_POST)){
    echo json_encode(["ques"=>"","count"=>0]);
    exit;
}
$query = '';
if($_POST['subtags']=="NULL"){
    $query = $conn->prepare("SELECT * FROM tbl_questions WHERE tags = ? AND exam_id != ? ");
    $query->bind_param("ss", $_POST['tags'],$_POST['eid']);
}else{
    $query = $conn->prepare("SELECT * FROM tbl_questions WHERE tags = ? AND subtags = ? AND exam_id != ? ");
    $query->bind_param("sss", $_POST['tags'], $_POST['subtags'],$_POST['eid']);
}
$counter = 0;
$output = '';

$query->execute();
$result = $query->get_result();
$totalCount = $result->num_rows;
while($row = $result->fetch_assoc()){
$counter +=1;
$id = $row['question_id'];
$output .= '<tr id="tr-'.$id.'" >
    <th>Q'. $counter .' #</th>
    <th>'. $row['question'] .'
        <br><br>
        <p>
            <span>(A) '. $row['option1'] .'</span>
            <span style="padding-left:10px;">(B) '. $row['option2'] .'</span>
            <br>
            <span>(C) '. $row['option3'] .'</span>
            <span style="padding-left:10px;">(D) '. $row['option4'].'</span>
            <br>
            <span class="text-danger">(Ans) '. $row['answer'] .'</span>
        </p>
    </th>';
if($row['qcheck']==1){
    $output .='<th><a  id="'. $id .'" onclick="addQues(this)" class="btn btn-warning"><i class="fa fa-plus"></i></a></th>
    </tr>';
}
else{
    $output .='<th><a  id="'. $id .'" onclick="addQues(this)" class="btn btn-success"><i class="fa fa-plus"></i></a></th>
    </tr>';
}

}
echo json_encode(["ques"=>$output,"count"=>$totalCount]);
?>