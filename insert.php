<?php

$con = mysqli_connect('localhost','root','','fruits');

if(!$con){
    die('CONNECTION ERROR REASON : '.mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    print_r($image);
    echo '<br>';
    $nameSeparate = explode('.',$image);
    print_r($nameSeparate);
    echo '<br>';
    $extension = strtolower($nameSeparate[1]);
    print_r($extension);
    echo '<br><br><br><br><br><br><br><br><br><br>';

    if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png'){

       $imageLocation = 'fruitImages/'.$image; 
       move_uploaded_file($_FILES['image']['tmp_name'],$imageLocation);

       $sql = "INSERT INTO fruits_table(fruit_name,fruit_quantity,fruit_price,fruit_image)
                    VALUES('$name',$quantity,$price,'$imageLocation') ";

       $result = mysqli_query($con, $sql);
       if($result){
            ?>
                <script>
                    alert('Image Inserted Successfully');
                    window.location.href = 'form.html';
                </script>

            <?php
       }else{
            echo 'Image not Inserted';
       }

    }else{
        echo 'Please upload valid file';
    }


}


?>