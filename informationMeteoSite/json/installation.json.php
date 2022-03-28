<?php
require("../config/config.inc.php");
require("../class/Installation.class.php");
header('Content-Type: application/json');

$ins = new Installation();

$dateBefore = strtotime($_POST["date_ins"]);
$insAddDB = array(
    'id_ins' => $_POST['id_ins'],
    'date_ins' => date("Y-m-d", $dateBefore),
);


if ($_POST['ch'] != "checked")
    echo $ins ->desactive($insAddDB);
else
    echo $ins ->active($insAddDB);

echo json_encode($insAddDB);