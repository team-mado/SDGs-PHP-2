<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('php_act/functions.php');

// $clients_id = $_SESSION["id"];

// var_dump($_GET["id"]);
// exit;

// 初期画面/
if(!isset($_GET["id"])){
  $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:　,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png";
}


// OGP編集時にID取得
if(isset($_GET["id"])){
  $id = $_GET["id"];
}

// すでにOGPを作成しているときはデータが入っている状態
if(isset($_GET["id"])){

$pdo = connect_to_db();
$sql = "SELECT * FROM ogp_table2 where id = :id";
// var_dump($sql);
// exit;
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $post = $stmt->fetch(PDO::FETCH_ASSOC);
  $id = $post["id"];
  $clients_id= $post["clients_id"];
  $img = $post["img"];
  $color_check = $post["color_check"];
  $project_title = $post["project_title"];
  $job_category = $post["job_category"];
  $project_overview = $post["project_overview "];
  $project_detail = $post["project_detail"];
  $production_period = $post["production_period"];
  $remote_availability = $post["remote_availability"];

  }
}

?>


