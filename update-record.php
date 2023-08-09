<?php

include('config.php');



if(isset($_POST['update'])){
    $newId = $_POST['id'];
    $newName = $_POST['name'];
    $newQuantity = $_POST['quantity'];
    $newPrice = $_POST['price'];

    $newImage = $_FILES['image']['name']; 
    $nameSeparate = explode('.',$newImage);
    $extension = strtolower($nameSeparate[1]);
   
    if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png'){

        $newImageLocation = 'fruitImages/'.$newImage;
        move_uploaded_file($_FILES['image']['tmp_name'],$newImageLocation);

        $sql = "UPDATE fruits_table
                   SET fruit_name = '$newName',fruit_quantity = '$newQuantity',fruit_price = '$newPrice',fruit_image = '$newImageLocation' WHERE id=$newId";

        $result = mysqli_query($con, $sql);

        if($result){
            ?>
                <script>
                    alert('Image Inserted Successfully');
                    window.location.href = 'fetch.php';
                </script>

            <?php
        }else{
            echo 'Not updated';
        }


    }else{
        echo 'Please upload valid file';
    }


    
}


?>