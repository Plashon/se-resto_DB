<?php
require('../connect.php');


$sql = "DELETE from foodmenu where Food_ID = :Food_ID";
$stml = $conn->prepare($sql);
$stml->bindParam(':Food_ID',$_GET['Food_ID']);

if($stml->execute()){
    $message = "Successfully delete foodmenu".$_GET['Food_ID'].".";
}else{
    $message = "Fail to delete foodmenu information.";
}
echo $message;
$conn = null;
header("location:index.php");




?>


