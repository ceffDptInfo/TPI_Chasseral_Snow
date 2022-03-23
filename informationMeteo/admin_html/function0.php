<?php

echo json_encode([
    'firstname' => 'Michael',
    'lastname' => 'Vogel',

]);

//exit();


//$path = preg_replace('/wp-content.*$/', '', __DIR__);

//require_once($path."wp-load.php");

//if (isset($_POST['buleletinMeteo']) && $_POST['buleletinMeteo'] == "1"){
//    $textI = sanitize_text_field($_POST["textI"]);
//
//    $query = "INSERT INTO wp_bs_meteo (id_met, etat_met) VALUES ('10','$textI')";
//
//    mysqli_query($query);

//
//}


//$conn = new mysqli("localhost", "root", "1234", "tpi_chasseralsnow");
//
////if($_POST["action"] == "insert"){
////    insert();
////}
//
//function insert()
//{
//    global $conn;

    $date = $_POST["datePicker"];
//    $heur = $_POST["timeInput"],
//    $temp = $_POST["tempInput"],
//    $meteo = $_POST["meteoSelect"],
//    $pistes = $_POST["pistesSelect"],
//    $neige = $_POST["neigeSelect"],
//    $webcam = $_POST["webcamSelect"],
//    $textI = $_POST["textinput"],



echo json_encode([
    'date' => $date,
//    $heur = $_POST["timeInput"],
//    $temp = $_POST["tempInput"],
//    $meteo = $_POST["meteoSelect"],
//    $pistes = $_POST["pistesSelect"],
//    $neige = $_POST["neigeSelect"],
//    $webcam = $_POST["webcamSelect"],
//    $textI = $_POST["textinput"],
]);
//exit();
//    echo "here : " . $textI;
?>
<?php
//if (empty($date) || empty($heur) || empty($temp)|| empty($meteo)|| empty($pistes)|| empty($neige) || empty($webcam)|| empty($textI)){
////    if (empty($textI)){
//echo "";
//exit();
//}
//$query = "INSERT INTO wp_bs_meteo VALUES ('','$date', '$heur', '$temp', '$meteo', '$pistes', '$neige', '$webcam', '$textI')";
//    $query = "INSERT INTO wp_bs_meteo (id_met, etat_met) VALUES ('10','$textI')";
//    mysqli_query($conn, $query);

echo json_encode($test);
//}
