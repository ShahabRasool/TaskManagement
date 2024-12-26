<?php 
$soft_id = '';
$companyData = [];

if (isset($_GET['soft_id'])) {
    $soft_id = $_GET['soft_id'];

    $query = $pdo->prepare("SELECT * FROM software_house WHERE soft_id = :soft_id");
    $query->execute([':soft_id' => $soft_id]);
    $companyData = $query->fetch(PDO::FETCH_ASSOC);
}
include 'drupak.php';
 ?>