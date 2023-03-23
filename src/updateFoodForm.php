<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Update customer </title>
  </head>
  <body>

<?php
require '../connect.php';

$sql_select ="select * from foodtype order by FoodType_ID" ;
$stmt = $conn->prepare($sql_select);
$stmt->execute();
echo "Food_ID = ".$_GET['Food_ID'];

if (isset($_GET['Food_ID'])) {
    $sql_select_customer = 'SELECT * FROM foodmenu WHERE food_ID=?';
    $stmt = $conn->prepare($sql_select_customer);
    $stmt->execute([$_GET['Food_ID']]);
    echo "get = ".$_GET['Food_ID'];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

    
<div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
          <h3>ฟอร์มแก้ไขข้อมูลลูกค้า</h3>
          <form action="updateFood.php" method="POST">
           <input type="hidden" name="Food_ID" value="<?= $result['Food_ID']; ?>">
            
                <label for="name" class="col-sm-3 col-form-label"> ชื่อเมนูอาหาร:  </label>
              
                <input type="text" name="Food_Name" class="form-control" required value="<?= $result['Food_Name']; ?>">            
           
            
                <label for="name" class="col-sm-4 col-form-label"> ราคาอาหาร :  </label>
             
                <input type="text" name="Food_Price" class="form-control" required value="<?= $result['Food_Price']; ?>">
          
            <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>