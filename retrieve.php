<?php
include('key.php');


$sql = "SELECT * FROM `table_name`";
$result = mysqli_query($conn,$sql);
?>
    <html lang="en">
      <head>
        <title>Contacts</title>
      </head>
    <body>
        <h4><a href="save.php">New</a></h4>
        <?php
    while ($row = mysqli_fetch_assoc($result)){
        $name = $row["name"];
        $cid = $row["ID"];
        ?>
            <div id="screen">
                <?php echo "<a href='view.php?id=$cid'><p>$cid $name <a href='edit.php?id=$cid'>Edit</a> <a href='delete.php?id=$cid'>Delete</a></p></a>";?>
                   
            </div>
    </body>
    </html>
<?php
}
mysqli_close($conn);
?>