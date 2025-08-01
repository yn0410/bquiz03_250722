<?php include_once "db.php";

/* $_POST['movie']
$_POST['date']
$_POST['session']
$_POST['seats'] */


$_POST['tickets']=count($_POST['seats']);
$_POST['seats']=serialize($_POST['seats']);
$_POST['no']=date("Ymd");
$maxNo=$Order->max('id')+1;
$_POST['no'] .= sprintf("%04d", $maxNo); //string print format &不足四位digit時，補0

$Order->save($_POST);

echo $_POST['no'];

?>
