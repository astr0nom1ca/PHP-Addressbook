<?php
include('key.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST['name'];
    $phone1=$_POST['phone1'];
    $phone2 =$_POST['phone2'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $other = $_POST['other'];

    $sql="INSERT INTO `table_name` (name,phone1,phone2,email,address,other) VALUES('$name','$phone1','$phone2','$email','$address','$other')";

    if ($conn->query($sql) === TRUE){
        echo "Contact Added";

    } else{
        echo"Contact Not Added!!!. Error:" . $sql . "<br>" . $conn->error;
    }


}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New Contact</title>
        <script>
            document.addEventListener('DOMContentLoaded',function(){
                document.querySelector('#submit').disabled= true;

                document.querySelector('#name').onkeyup = () =>{
                    if(document.querySelector('#name').value.length > 0){
                        document.querySelector('#submit').disabled = false;
                    } else{
                        document.querySelector('#submit').disabled = true;
                    }
                }
            })
        </script>
    </head>
    <body>
        <a href='retrieve.php'>See All Contacts</a>
        <h2>Create new contact</h2>
        <form action="save.php" method="post">
            
            Name:<input type="text" name="name" id="name" placeholder="Enter Name">
            Phone:<input type="tel" name="phone1" id="phone1" placeholder="Enter Phone Number">
            Phone:<input type="tel" name="phone2" id="phone2" placeholder="Alternate Phone Number">
            Email:<input type="email" name="email" id="email" placeholder="Enter Email Address">
            Address:<input type="text" name="address" id="address" placeholder="Enter Residential Address">
            <br><br>
            <textarea id="other" name="other" rows="4" cols="50" placeholder="Other Information"></textarea>
            <br><br>
            <input type="submit" id="submit" value="Save">



        </form>
    </body>
</html>

