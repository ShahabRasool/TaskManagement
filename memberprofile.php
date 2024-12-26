<?php 
if(isset($_GET['']))
$member=$pdo->prepare("select * from user");
$member->execute();
$mmber=$member->fetchAll(PDO::FETCH_ASSOC);
print_r($mmber);


?>