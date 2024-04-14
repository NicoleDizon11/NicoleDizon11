<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$servername = "localhost";
$username ="root";
$password = "";
$database = "nicole_database";

$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn){
    die("Connection failed:". mysqli_connect_error());
}
$id = $_POST["id"];
$name = $_POST["name"];
$subcode = $_POST["subcode"];
$course_code = $_POST["course_code"];

$sql = "INSERT INTO form(id,name,subcode,course_code) 
VALUES($id,'$name','$subcode','$course_code')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully!";
}else {
    echo "ERROR:" . $sql . "<br>" . $conn->error;

    }

$sql = "SELECT * FROM form";
$result = $conn->query($sql);

$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER REGISTRATION</title>
    <style>
        body{
            text-align: center;
        }
        table{
            border-collapse: collapse;
            width: 70%;
            height:50%;
            text-align: center;
        }
        td {
            text-align: center;
        }
        th {
            background-color: beige;
        }
        .center{
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <h1>REGISTERED</h1>

<table border="2px" class="center">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Subcode</th>
        <th>Course_code</th>
    </tr>

<?php

while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["subcode"] . "</td>";
        echo "<td>" . $row["course_code"] . "</td>";
        echo "</tr>";
    }

    ?>
</table>
</body>

</html>

