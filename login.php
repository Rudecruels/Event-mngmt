<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        table {
            border-style:solid;
            border-width:2px;
            border-color:pink;
            border-collapse: collapse;
            width: 100%;
            color: #d96459;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        th {
            background-color:#d96459;
            color: white;

        }
        tr:nth-child(even) {background-color: #f2f2f2}



    </style>
</head>
<body>

<?php
$email = $_POST['email'];
$password = $_POST['password'];

//Databse connection
$conn = new mysqli('localhost','root','','niram');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}else {
    $stmt = $conn->prepare("select * from login where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] == $password){

            echo "<table border='1'>";
            echo "<tr>";
            //echo "<th>Id</th>";
            echo "<th>First Name</th>";
            echo "<th>Email</th>";
            echo "<th>Number</th>";
            echo "<th>Department</th>";
            echo "<th>Semester</th>";
            echo "<th>University ID</th>";
            echo "<th>Programme</th>";
            echo "</tr>";
           // echo "</table>";
            $stmt = "SELECT id, firstname, email, number, department, semester, Uid, programme from registration";
            $result = $conn-> query($stmt);

            if ($result-> num_rows > 0 ){
                while ($row = $result-> fetch_assoc()){
                    echo "<tr>";
                    //echo "<td>". $row["id"] ."</td>";
                    echo "<td>". $row["firstname"] ."</td>";
                    echo "<td>". $row["email"] ."</td>";
                    echo "<td>". $row["number"] ."</td>";
                    echo "<td>". $row["department"] ."</td>";
                    echo "<td>". $row["semester"] ."</td>";
                    echo "<td>". $row["Uid"] ."</td>";
                    echo "<td>". $row["programme"] ."</td>";
                    echo "</tr>";

                }
                echo "</table>";
            }
            else {
                echo "0 result";
            }
            $conn->close();

        }else{
            echo "<h2>Invalid email or password</h2>";
        }

    }else{
        echo "<h2>Invalid email or password</h2>";
    }
}

?>
    
</body>
</html>