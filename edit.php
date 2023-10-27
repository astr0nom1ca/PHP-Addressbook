<?php
include('key.php');
$id = $_GET['id'];

$url = "edit.php?id=$id";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $email = $_POST['email'];
    $address = $_POST['address']; 
    $other = $_POST['other'];

    $sql = "UPDATE `table_name` SET `name`=?,`phone1`=?,`phone2`=?,`email`=?,`address`=?,`other`=? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss",$name,$phone1,$phone2,$email,$address,$other,$id);
    $stmt->execute();

    if ($stmt->affected_rows > 0){
        echo "Changes Saved!";
        header("Location: edit.php?id=$id");


    } else{
        echo "Failed to save changes!";
    }
    $stmt->close();
}



$sql = "SELECT * FROM `contacts` WHERE ID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row){
    echo "Contact Not Found!";
    exit;
}

?>
<html>
    <head>
        <title>Edit Contact</title>
    </head>
    <body>
        <form method='POST' action='edit.php'>
            <?php
             $cid = $row["ID"];
            echo "<form method='POST' action='<?php echo $url; ?>'>";
            $sql = "SELECT * FROM `table_name` WHERE ID=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();


            echo "<input type='hidden' name='id' value= $cid ><br>";
            echo " <input type='text' name='name' id='name' value='{$row["name"]}'><br>";
            echo " <input type='tel' name='phone1' id='phone1' value='{$row["phone1"]}'><br>";
            echo "<input type='tel' name='phone2' id='phone2' value='{$row["phone2"]}'><br>";
            echo "<input type='email' name='email' id='email' value='{$row["email"]}'><br>";
            echo "<input type='text' name='address' id='address' value='{$row["address"]}'><br>";
            echo"<br><br>";
            echo "<textarea id='other' name='other' rows='4' cols='50' value='{$row["other"]}'></textarea><br>";
            echo"<br><br>";
            echo "<input type='submit' id='submit' value='Save Changes'>";
            echo "</form>";
            ?>


    </body>
</html>
<?php
$stmt->close();
$conn->close();
?>