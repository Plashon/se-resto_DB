<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
        <link rel="stylesheet" href="style.css">
        <title>CRUD Customer Information</title>
    </head>
    <body>
    
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3>รายการอาหาร<a href="addFood_dropdown.php" class="btn btn-info float-end">+เพิ่มรายการอาหาร</a> </h3>
                    <br>
                    <table id="customerTable" class="display table table-striped  table-hover table-responsive table-bordered ">
                    <!--<table class="table table-striped  table-hover table-responsive table-bordered">-->
                        <thead align="center">                        
                            <tr>
                                <th width="10%">รหัสอาหาร</th>
                                <th width="30%">รายการอาหาร</th>
                                <th width="20%">ราคา</th>
                                <th width="20%">รูปอาหาร</th>
                                <th width="20%">ประเภทอาหาร</th>
                                
                            </tr>                       
                        </thead>

                        <tbody>
                          <?php
                            require '../connect.php';
                            $sql =  "SELECT * FROM foodmenu, foodtype WHERE foodmenu.FoodType_ID = foodtype.FoodType_ID " ;
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $r) { ?>
                            <tr>
                                <td><?= $r['Food_ID'] ?></td>
                                <td><?= $r['Food_Name'] ?></td>
                                <td><?= $r['Food_Price'] ?></td>
                                <td><img src="./image/<?= $r['image']; ?>" width="50px" height="50px" alt="image" onclick="enlargeImg()" id="img1" ></td>
                                <td><?= $r['FoodType_Name'] ?></td>
                                <td><a href="updateFoodForm.php?Food_ID=<?= $r['Food_ID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="deleteFood.php?Food_ID=<?= $r['Food_ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                          <?php 
                            }
                            $conn = null;
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
        
     
        
    </body>
</html>