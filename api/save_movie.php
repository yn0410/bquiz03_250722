<?php include_once "db.php";


if(!empty($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'], "../image/".$_FILES['poster']['name']);
    $_POST['poster'] = $_FILES['poster']['name'];
}
if(!empty($_FILES['trailer']['tmp_name'])){
    move_uploaded_file($_FILES['trailer']['tmp_name'], "../image/".$_FILES['trailer']['name']);
    $_POST['trailer'] = $_FILES['trailer']['name'];
}

$_POST['ondate']="{$_POST['year']}-{$_POST['month']}-{$_POST['day']}";
unset($_POST['year'], $_POST['month'], $_POST['day']);

if(!isset($_POST['id'])){ //沒id 是"新增";(有id 是"編輯")
    $_POST['sh']=1;
    $_POST['rank']=$Movie->max('rank')+1;
}



$Movie->save($_POST);
to("../back.php?do=movie");
?>