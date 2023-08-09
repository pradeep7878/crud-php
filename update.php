<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Fruits Form</title>
</head>
<body>


<?php

    if(isset($_GET['id'])){

        include('config.php');

        $id = $_GET['id'];

        $sql = "SELECT id,fruit_name,fruit_quantity,fruit_price,fruit_image FROM fruits_table
                    WHERE id=$id";
        
        $result = mysqli_query($con,$sql);
        print_r($result);
        echo '<br><br>';
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $fruitName = $row['fruit_name'];
            $fruitQuantity = $row['fruit_quantity'];
            $fruitPrice = $row['fruit_price'];
            $fruitImage = $row['fruit_image'];
            print_r($row);
            echo '<br>';

        }
    }

?>

    <form class="insert-form" action="update-record.php" method="POST" enctype="multipart/form-data">
        <table border="1">
            <thead>
                <tr>
                    <td colspan="2" class="heading">Update Fruits Form</td>
                </tr>
            </thead>

            <tbody>
                
                <input type="hidden" name="id" value="<?=$id?>"/></td>

                <tr>
                    <td>Fruit Name</td>
                    <td><input type="text" name="name" value="<?=$fruitName?>"/></td>
                </tr>
                <tr>
                    <td>Fruit Quantity</td>
                    <td><input type="number" name="quantity" value="<?=$fruitQuantity ?>"/></td>                
                </tr>
                <tr>
                    <td>Fruit Price</td>
                    <td><input type="number" name="price" value="<?=$fruitPrice?>" /></td>                
                </tr>
                <!-- <tr>
                    <td>Reason to buy</td>
                    <td>
                        <input type="checkbox" name="reason[]" value="Hygienic" /><label>Hygienic</label>
                        <input type="checkbox" name="reason[]" value="Taste" /><label>Taste</label>
                    </td>                
                </tr> -->
                <tr>
                    <td>Upload New Image</td>
                    <td>
                        <img src="<?=$fruitImage?>" width="100" />
                        <br>
                        <input type="file" name="image"/>
                    </td>                
                </tr>
                <tr>
                    <td colspan="2" class="button-td"><button name="update">UPDATE</button></td>
                </tr>

                <tr>
                    <td colspan="2"><a href="fetch.php">View Data..</a></td>
                </tr>

            </tbody>
        </table>

    </form>
    


</body>
</html>