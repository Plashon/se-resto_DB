<?php

if (isset($_POST['Food_ID'])) {
    require '../connect.php';

    $Food_ID = $_POST['Food_ID'];
    $Food_Name = $_POST['Food_Name'];
    $Food_Price = $_POST['Food_Price'];

    echo 'Food_ID = ' . $Food_ID;
    echo 'Food_Name = ' . $Food_Name;
    echo 'Food_Price = ' . $Food_Price; 
    $sql =  "UPDATE  foodmenu set Food_Name = :Food_Name , Food_Price = :Food_Price Where Food_ID = :Food_ID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Food_ID', $_POST['Food_ID']);
    $stmt->bindParam(':Food_Name', $_POST['Food_Name']);
    $stmt->bindParam(':Food_Price', $_POST['Food_Price']);
    $stmt->execute();

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update foodmenu information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
    header("location:index.php");
}
?>
