<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: *');
include "configs.php"; // include file with database connection.
if($_SERVER['REQUEST_METHOD']==="POST"){

$data = json_decode(file_get_contents("php://input"));
$name=$data->name;
$sql=mysqli_query($conn,"SELECT * FROM rollNo WHERE studentName LIKE '%$name%'");
$sql2=mysqli_query($conn,"INSERT INTO rollNoSearch(name) VALUES('$name')");
if(mysqli_num_rows($sql)>0){
    $data=[];
    while($row=mysqli_fetch_assoc($sql)){
        $data[]=$row;
    }
    echo json_encode($data);
}else{
    echo json_encode(array("error"=>"No data found"));
}

}else{
    echo json_encode(array("error"=>"Method not allowed"));
}

?>