<?php 
include('key.php');

$id = $_GET['id'];

$sql = "SELECT * FROM `table_name` WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row){
    echo "Contact Not Found!";
    exit;
}
$cid = $row["ID"];
?>

<html>
    <head>
       <?php
       echo"<title>'{$row["name"]}'</title>";
       ?>
    </head>
    <body>
        <div>
            <?php echo"<input type='hidden' value='$cid'>"?>
            <?php echo "<h3> {$row["name"]} </h3>"; ?>
            <?php echo "<h3> {$row["phone1"]} </h3>"; ?>
            <?php echo "<h3> {$row["phone2"]} </h3>"; ?>
            <?php echo "<h3> {$row["email"]} </h3>"; ?>
            <?php echo "<h3> {$row["address"]} </h3>"; ?>
            <?php echo "<h3> {$row["other"]} </h3>"; ?>
            <?php echo "<a href='edit.php?id=$cid'>Edit</a>     <a href='delete.php?id=$cid'>Delete</a>"; ?>
        </div>

    </body>
</html>

