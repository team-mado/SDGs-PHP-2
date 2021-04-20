<?php
error_reporting(E_ALL & ~E_NOTICE);
include('functions.php');


$ogp_id = $_POST['ogp_id'];
$designer_name = $_POST['designer_name'];
$designer_email = $_POST['designer_email'];
$portfolio = $_POST['portfolio'];
$remote_availability = $_POST['remote_availability'];


$pdo = connect_to_db();



$sql = 'INSERT INTO designer_table(id, ogp_id, designer_name, designer_email, portfolio, remote_availability) VALUES(NULL, :ogp_id, :designer_name, :designer_email, :portfolio, :remote_availability)';
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ogp_id', $ogp_id, PDO::PARAM_INT);
$stmt->bindValue(':designer_name', $designer_name, PDO::PARAM_STR);
$stmt->bindValue(':designer_email', $designer_email, PDO::PARAM_STR);
$stmt->bindValue(':portfolio', $portfolio, PDO::PARAM_STR);
$stmt->bindValue(':remote_availability', $remote_availability, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:../thanks.php");
    exit();
}

?>