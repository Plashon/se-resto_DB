<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<title>User Registration</title>
</head>
<body>


<?php
require '../connect.php';

$sql_select = "SELECT * from foodtype order by FoodType_ID ";
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();


if (isset($_POST['submit'])) {
    echo "food_ID=".$_POST['Food_ID'];
    echo "food_Name=".$_POST['Food_Name'];
    
    if (!empty($_POST['Food_ID']) && !empty($_POST['Food_Name'])) {
        echo '<br> line25' . $_POST['Food_ID'];
        //require 'connect.php';
echo "Food_ID".$_POST['Food_ID'];
echo "Food_Name".$_POST['Food_Name']; 
echo "Food_Price".$_POST['Food_Price'];
echo "FoodType_ID".$_POST['FoodType_ID'];

        $sql = "INSERT into foodmenu values (:Food_ID, :Food_Name, :Food_Price, :FoodType_ID)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Food_ID', $_POST['Food_ID']);
        $stmt->bindParam(':Food_Name', $_POST['Food_Name']);
        $stmt->bindParam(':Food_Price', $_POST['Food_Price']);
        $stmt->bindParam(':FoodType_ID', $_POST['FoodType_ID']);
    
        

        try {
            if ($stmt->execute()):
                $message = 'Successfully add new food';
            else:
                $message = 'Fail to add new food';
            endif;
            echo $message;
        } catch (PDOException $e) {
            echo 'Fail! ' . $e;
        }

        $conn = null;
    }

     header("location:index.php");
}
?>



    <div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
            <h3>ฟอร์มเพิ่มรายการอาหาร</h3>
            <form  action="addFood_dropdown.php" method="POST">

            <input type="text" placeholder="Enter Food ID" name="Food_ID"> 
            <br> <br>
            <input type="text" placeholder="Food Name" name="Food_Name">
            <br> <br>
            <input type="text" placeholder="Food Price" name="Food_Price">
            <br> <br> 

            <label>Select a FoodType</label>
                <select name="FoodType_ID">
                    <?php while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $cc['FoodType_ID']; ?>">
                            <?php echo $cc['FoodType_Name']; ?>
                        </option>
                    <?php } ?>
                </select>       
            <br> <br>

            <input type="submit" value="submit" name="submit" />
            </form>
            </div>
        </div>
    </div>
</body>
</html>



