<?php include_once "db.php";
$movie = $Movie->find($_POST['id']);

$movie['sh']=($movie['sh']+1)%2; //沒錄??????(根本沒專心聽)

$Movie->save($movie);

?>