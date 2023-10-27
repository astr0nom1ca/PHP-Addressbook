<?php
include('key.php');

$id = $_GET['id'];
$sql = "DELETE FROM `table_name` WHERE id= ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();

if ($stmt->affected_rows > 0){
    header("Location: retrieve.php");
    exit;
} else{
    echo"Contact Not Found.";
}

$stmt->close();
$conn->close();
?>