<?php
echo "OK";
require("../config/config.inc.php");
require("../class/BulletinMeteo.class.php");
require ("../json/meteo.json.php");
//
//
////$bul = new BulletinMeteo();

//$bul->setHeureBul("07:45");
//$bul->setDateBul("2022-03-14");
//$bul->setTemperatureBul("-150");
//$bul->setIdMet("2");
//$bul->setIdPst("2");
//$bul->setIdNge("2");
//$bul->setIdWeb("2");
//$bul->setTexteBul("OKKKKKKKKKKKKOKOKOKOk");
//
//echo $bul;
//echo "\n database OK";
//const BASE_NAME = "tpi_chasseralsnow";
//const SQL_HOST = "localhost";
//const SQL_USER = "root";
//const SQL_PASSWORD = "1234";



//$dateBefore = strtotime($_POST["date_bul"]);
//$tab['heure_bul'] = date("Y-m-d", $dateBefore);
//$tab['date_bul'] = $_POST["heure_bul"];
//$tab['temperature_bul'] = $_POST["temperature_bul"];
//$tab['id_met'] = $_POST["id_met"];
//$tab['id_pst'] = $_POST["id_pst"];
//$tab['id_nge'] = $_POST["id_nge"];
//$tab['id_web'] = $_POST["id_web"];
//$tab['texte_bul'] = $_POST["texte_bul"];

//$dateBefore = strtotime("16.03.2022");
//$tab['heure_bul'] = "09:30";
//$tab['date_bul'] = $dateBefore;
//$tab['temperature_bul'] = "-55";
//$tab['id_met'] = "1";
//$tab['id_pst'] = "1";
//$tab['id_nge'] = "1";
//$tab['id_web'] = "1";
//$tab['texte_bul'] = "WHY";
//print_r("Befor ADD   // ");
//echo $bul->add($tab);
//print_r("After ADD");

print_r($_POST);

//
//    $date = strtotime($_POST["date"]);
//    $date= date("Y-m-d",$date);
//    $heur = $_POST["heur"];
//    $temp = $_POST["temp"];
//    $meteo = $_POST["meteo"];
//    $pistes = $_POST["pistes"];
//    $neige = $_POST["neige"];
//    $webcam = $_POST["webcam"];
//    $textI = $_POST["textI"];
//
//global $wpdb;
//$conn = new mysqli("localhost", "root", "1234", "tpi_chasseralsnow");
//if ($conn-> connect_errno){
//    exit("unable to connect to database");
//}
//$sql = "INSERT INTO wp_bs_bulletin (`id_bul`,`heure_bul`, `date_bul`, `temperature_bul`, `id_met`, `id_pst`, `id_nge`, `id_web`, `texte_bul`) VALUES ('$date', '$heur', '$temp', '$meteo', '$pistes', '$neige', '$webcam', '$textI')";
//
////mysqli_query($conn, $sql);
//$stmt = $conn->prepare($sql);
////$stmt->bind_param("s", $_POST['q']);
//$stmt->execute();
//$stmt->store_result();
//$stmt->bind_result($date, $heur, $temp, $meteo, $pistes, $neige, $webcam, $textI);
//$stmt->fetch();
//$stmt->close();
//echo json_encode([
//    'date' => $date,
//    'heur' => $heur,
//    'temp' => $temp,
//    'meteo' => $meteo,
//    'pistes' => $pistes,
//    'neige' => $neige,
//    'webcam' => $webcam,
//    'textI' => $textI,
//]);

exit();
