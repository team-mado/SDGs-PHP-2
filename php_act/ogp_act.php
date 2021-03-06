<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('functions.php');
check_session_id();


$clients_id = $_SESSION["id"];
$color_check = implode('  ',$_POST["color_check"]);

$project_title = $_POST["project_title"];

$job_category = implode(' | ',$_POST["job_category"]);
$project_overview = $_POST["project_overview"];
$project_detail = $_POST["project_detail"];
$production_period = $_POST["production_period"];
$remote_availability = $_POST["remote_availability"];

// https://res.cloudinary.com/defgonsxv/image/upload/      v1618795101/banar1_mnwvwv.png
// $v1 = 'https://res.cloudinary.com/defgonsxv/image/upload/l_text:Sawarabi%20Gothic_95_black:';
https://res.cloudinary.com/defgonsxv/image/upload/v1618795101/banar1_mnwvwv.png
$v1 = 'https://res.cloudinary.com/defgonsxv/image/upload/l_text:zcekgbuh654xmkklci8z.otf_95_black:';
// var_dump($v1);
// exit;
$img_in1 = $project_title;
$img_in2 = $job_category;
$v3 = ',co_rgb:fff,h_900,w_1270,c_fit/v1618795101/banar1_mnwvwv.png';
// $img = $v1.$img_in1."%0A%0A"."デザイナー募集"."%0A".$img_in2.$v3;
$img = $v1.$img_in1."%0A"."デザイナー募集"."%0A".$img_in2.$v3;



// include('functions_.php');
$pdo = connect_to_db();



$sql = 'INSERT INTO ogp_table2(id, clients_id, img, color_check, project_title, job_category, project_overview, project_detail, production_period, remote_availability) VALUES(NULL, :clients_id, :img, :color_check, :project_title, :job_category, :project_overview, :project_detail, :production_period, :remote_availability)';
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':clients_id', $clients_id, PDO::PARAM_INT);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$stmt->bindValue(':color_check', $color_check, PDO::PARAM_STR);
$stmt->bindValue(':project_title', $project_title, PDO::PARAM_STR);
$stmt->bindValue(':job_category', $job_category, PDO::PARAM_STR);
$stmt->bindValue(':project_overview', $project_overview, PDO::PARAM_STR);
$stmt->bindValue(':project_detail', $project_detail, PDO::PARAM_STR);
$stmt->bindValue(':production_period', $production_period, PDO::PARAM_STR);
$stmt->bindValue(':remote_availability', $remote_availability, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {

}


// 入れたばかりのデータを持ってくる
$pdo = connect_to_db();

$sql = "SELECT * FROM ogp_table2 WHERE id = (SELECT MAX(id) FROM ogp_table2); ";
$stmt = $pdo->prepare($sql);

$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $posts = $stmt->fetch(PDO::FETCH_ASSOC);
  $id = $posts["id"];
  $clients_id = $posts["clients_id"];
  $img = $posts["img"];
  $color_check = $posts["color_check"];
  $project_title = $posts["project_title"];
  $job_category = $posts["job_category"];
  $project_overview = $posts["project_overview"];
  $project_detail = $posts["project_detail"];
  $production_period = $posts["production_period"];
  $remote_availability = $posts["remote_availability"];

  header("Location:../ogp-send.php");
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>