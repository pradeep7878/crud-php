<style>
    <?php
        include('style.css');
    ?>
</style>

<?php

$con = new mysqli('localhost','root','','fruits');

if($con -> connect_error){
    die('CONNECTION ERROR REASON : '.$con->connect_error);
}

$sql = "SELECT * FROM fruits_table";

$result = mysqli_query($con, $sql);
echo '<br><br>';

$numOfRows = mysqli_num_rows($result);

if($result){
    ?>

<form action="delete.php" method="POST" enctype="multipart/form-data">
<table class='table-php'>
        <h2>Fruits Table</h2>
            </br>
            <tr>
                <th colspan="7"><h3><a href="form.html">Form Fill</a></h3></th>
            </tr>
            <tr>
                <th>Id</th>
                <th>Fruit Name</th>
                <th>Fruit Quantity</th>
                <th>Fruit Price</th>
                <th>Fruit Image</th>
                <th>Edit Action</th>
                <th>Delete Action</th>
            </tr>
    
    <?php

    if($numOfRows > 0){
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $fruitName = $row['fruit_name'];
        $fruitQuantity = $row['fruit_quantity'];
        $fruitPrice = $row['fruit_price'];
        $fruitImage = $row['fruit_image'];
        // print_r($row);
        // echo '<br>';
    ?>  
            <tr>
                <td><?=$id ?></td>
                <td><?=$fruitName?></td>
                <td><?=$fruitQuantity?></td>
                <td><?=$fruitPrice?></td>
                <td><?="<img src='$fruitImage' width='50%' />"?></td>
                <td><a href="update.php?id=<?=$id?>">Edit</a></td>
                <td>
                    <a href="delete.php?id=<?=$id?>" onclick="return confirm('Are you delete this record?')">Delete</a>
                    <input type="checkbox" name="id[]" value="<?=$id?>"/>
                </td>
            </tr>


    <?php
    }
 }else{
    echo '<tr><td colspan="7"><h2>NO RECORDS</h2></td></tr>';
 }
    
    ?>
            <tr>
                <td colspan="6"></td>
                <td><a href="delete.php"><button name="deleteChecked" onclick="return confirm('Are you delete these records?')">Delete Checked</button></a></td>
            </tr>

        </table>
</form>
    


    <?php
}else{
    echo '$result error';
}


?>