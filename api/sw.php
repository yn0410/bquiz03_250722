<?php include_once "db.php";

$table=${$_POST['table']}; //把變數引進來使用?
$row1=$table->find($_POST['id']);
$row2=$table->find($_POST['sw']);

$tmp_rank=$row1['rank'];
$row1['rank']=$row2['rank'];
$row2['rank']=$tmp_rank;

$table->save($row1);
$table->save($row2);

// 是ajax 所以不用to("url") 前面有寫reload()了
?>