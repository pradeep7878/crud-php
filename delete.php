<?php

include('config.php');


if(isset($_POST['deleteChecked'])){
    $idArray = $_POST['id'];
    // print_r($idArray); 
    // echo "<br>";
    // foreach($idArray as $id){
    //     print_r($id);
    //     echo "<br>";
    // }

    foreach($idArray as $id){
        $sql = "SELECT fruit_image FROM fruits_table WHERE id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            $imagesLocation = $row['fruit_image'];
            if(file_exists($imagesLocation)){
                unlink($imagesLocation);
            }
        }
    }

    foreach($idArray as $id){
    $sql = "DELETE FROM fruits_table WHERE id=$id";    
    $result = mysqli_query($con, $sql);
    }
    if($result){
        ?>
        <script>
            alert('Deleted successfully');
            window.location.href = 'fetch.php';
        </script>

        <?php
    }else{
        echo 'Not deleted';
    }
}


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT fruit_image FROM fruits_table WHERE id =$id";
    $result = mysqli_query($con, $sql);

    if($result){
        $row = mysqli_fetch_assoc($result);
        $imageLocation = $row['fruit_image'];
          if(file_exists($imageLocation)){
            unlink($imageLocation);
          }
    }
  
    $sql = "DELETE FROM fruits_table WHERE id=$id";
  
    $result = mysqli_query($con, $sql);
    if($result){
      ?>
          <script>
              alert('Deleted successfully');
              window.location.href = 'fetch.php';
          </script>
  
      <?php
    }else{
      echo 'Not deleted';
    }
  
  }
  
  
  ?>

