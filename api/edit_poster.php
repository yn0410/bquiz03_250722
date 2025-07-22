<?php include_once "db.php";

foreach($_POST['id'] as $idx => $id){
    if(isset($_POST['del']) && in_array($id, $_POST['del'])){ //先看是否要刪除
        $Poster->del($id);
    }else{ //沒有要刪除，再看要不要編輯
        $poster=$Poster->find($id);
        $poster['name']=$_POST['name'][$idx];
        $poster['sh']=(isset($_POST['sh']) && in_array($id, $_POST['sh']))?1:0;
        $poster['ani']=$_POST['ani'][$idx];
        $Poster->save($poster);
    }
}

to("../back.php?do=poster");
?>