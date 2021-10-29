<?php
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$number = $_POST['number'];
$department = $_POST['department'];
$semester = $_POST['semester'];
$Uid = $_POST['Uid'];
$programme = $_POST['programme'];

//Database connection
$conn = new mysqli('localhost','root','','niram');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}else {
    $stmt = $conn->prepare("insert into registration(firstname, email, number, department, semester, Uid, programme)values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissss", $firstname, $email, $number, $department, $semester, $Uid, $programme);
    $stmt->execute();
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>