<?php
require("../config/config.inc.php");
require("../class/Webcam.class.php");
header('Content-Type: application/json');

$web = new Webcam();
//$wb = array(
    $id_webRa = $_POST["id_webRa"];
    $act = $_POST['chWeb'];
    $id_webCh = $_POST["id_webCh"];
//);
echo $web->modificationdef($id_webRa);

if ($act == "checked"){
    echo $web->modificationAct($id_webCh);
}else{
    echo $web->modificationDesAct($id_webCh);
}



echo json_encode($id_webRa);
