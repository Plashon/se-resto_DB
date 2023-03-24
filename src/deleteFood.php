<?php
require('../connect.php');


$sql = "DELETE from foodmenu where Food_ID = :Food_ID";
$stml = $conn->prepare($sql);
$stml->bindParam(':Food_ID',$_GET['Food_ID']);

if($stml->execute()){
     
if($stml->execute()){
   // $message = "Successfully delete customer".$_GET['CustomerID'].".";
           echo '
        <script type="text/javascript">        
                        $(document).ready(function(){
                    
                            swal({
                                title: "Success!",
                                text: "Successfuly delete that menu",
                                type: "success",
                                timer: 2000,
                                showConfirmButton: false
                            }, function(){
                                    window.location.href = "index.php";
                            });
                        });                    
                        </script>
        ';



                    }
}else{
    $message = "Fail to delete foodmenu information.";
}
echo $message;
$conn = null;
header("location:index.php");




?>


