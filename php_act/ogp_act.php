<?
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('functions.php');








$clients_id = $_SESSION["id"];
$color_check = $_POST["color_check"];
$project_title = $_POST["project_title"];
// $job_category = $_POST["job_category"];
$job_category = implode('  ',$_POST["job_category"]);
$project_overview = $_POST["project_overview"];
$project_detail = $_POST["project_detail"];
$production_period = $_POST["production_period"];
$remote_availability = $_POST["remote_availability"];

// var_dump($clients_id);
// var_dump(job_category);
// var_dump($project_title);
// var_dump($project_overview);
// var_dump($project_detail);
// var_dump($production_period);
// var_dump($remote_availability);
// exit;


// $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:,co_rgb:333,w_500,c_fit//v1616471824/UbpRDEkE_uqbs0d.png";
// $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/v1616468990/sample.jpg";
https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Noto%20Sans%20JP_50_bold:テスト,co_rgb:fff,w_750,c_fit/v1617152888/banar1_zf56ul.png

// $v1 = 'https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_21_bold:';
// $v1 = 'https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_55_bold:';
$v1 = 'https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_50_black:';
// $v1 = 'https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Noto%20Sans%20JP_50_bold:';
$img_in1 = $project_overview;
$img_in2 = $job_category;
// $img_in3 = $project_detail;
// $img_in4 = $production_detail;
// $v3 = ',co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png';
$v3 = ',co_rgb:fff,w_750,c_fit/v1617152888/banar1_zf56ul.png';
// $img = $v1.$img_in1."%0A%0A"."デザイナー募集"."%0A".$img_in2."%0A%0A".$img_in3."%0A".$v3;
$img = $v1.$img_in1."%0A%0A"."デザイナー募集"."%0A".$img_in2.$v3;



// $project_overview = $_POST["project_overview"];
// // $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png";
// $v1 = 'https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:';
// $img_in = $project_overview;
// $v3 = ',co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png';
// $img = $v1.$img_in.$v3;
// $detail = $_POST["detail"];
// $production_period = $_POST["production_period"];
// $remote_availability = $_POST["remote_availability"];


// var_dump($_SESSION["id"]);
// var_dump($clients_id);
// var_dump($img);
// var_dump($project_overview);
// var_dump($detail);
// var_dump($production_period);
// var_dump($remote_availability);
// exit;



// include('functions_.php');
$pdo = connect_to_db();



$sql = 'INSERT INTO ogp_table2(id, clients_id, img, color_check, project_title, job_category, project_overview, project_detail, production_period, remote_availability) VALUES(NULL, :clients_id, :img, :color_check, :project_title, :job_category, :project_overview, :project_detail, :production_period, :remote_availability)';
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':clients_id', $clients_id, PDO::PARAM_INT);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$stmt->bindValue(':color_check', $color_check, PDO::PARAM_INT);
$stmt->bindValue(':project_title', $project_title, PDO::PARAM_STR);
$stmt->bindValue(':job_category', $job_category, PDO::PARAM_STR);
$stmt->bindValue(':project_overview', $project_overview, PDO::PARAM_STR);
$stmt->bindValue(':project_detail', $project_detail, PDO::PARAM_INT);
$stmt->bindValue(':production_period', $production_period, PDO::PARAM_STR);
$stmt->bindValue(':remote_availability', $remote_availability, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // header("Location:ogp_check.php");
  // exit();
}


// 入れたばかりのデータを持ってくる
$pdo = connect_to_db();
// $sql = "SELECT * FROM ogp_table where id ";
$sql = "SELECT * FROM ogp_table2 WHERE id = (SELECT MAX(id) FROM ogp_table2); ";
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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

  header("Location:ogp_check2.php?id=$id");
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