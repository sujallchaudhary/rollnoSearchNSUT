<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: *');
include "configs.php"; // include file with database connection.
if($_SERVER['REQUEST_METHOD']==="POST"){
$data = json_decode(file_get_contents("php://input"));
$name=$data->name;
$year=$data->year;
if($year==="2023"){
    $sql=mysqli_query($conn,"SELECT rollNo,email,studentName,fatherName,specialization,Degree,section FROM studentDetails WHERE studentName LIKE '%$name%' AND year='2023'");
}
elseif($year==="2024"){
    $sql=mysqli_query($conn,"SELECT rollNo,email,studentName,fatherName,specialization,Degree,section FROM studentDetails WHERE studentName LIKE '%$name%' AND year='2024'");
}
elseif($year==="2022"){
    $sql=mysqli_query($conn,"SELECT rollNo,email,studentName,fatherName,specialization,Degree,section FROM studentDetails WHERE studentName LIKE '%$name%' AND year='2022'");
}
else{
    echo json_encode(array("error"=>"Invalid year"));
    exit();
}
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