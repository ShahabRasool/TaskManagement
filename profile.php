<?php 

$u_id = $_SESSION['u_id'];

$profile = $pdo->prepare("SELECT * FROM user WHERE u_id = :u_id");
$profile->execute(['u_id' => $u_id]);

$memberProfile = $profile->fetch(PDO::FETCH_ASSOC);

$companyQuery = $pdo->prepare("SELECT software_house.soft_id, software_house.company_name
    FROM company_user LEFT JOIN software_house ON company_user.soft_id = software_house.soft_id
    WHERE company_user.u_id = :u_id");

$companyQuery->execute([':u_id' => $u_id]);

$userCompany = $companyQuery->fetch(PDO::FETCH_ASSOC);
?>
<style>
    *{
        outline: 2px solid red;
    }
</style>

<div class="container grid grid-cols-12 gap-3 items-start">
    <div class="col-start-1 col-span-5">
        <img src="./upload-image/website.jpg" class="object-cover w-full h-auto">
    </div>
    <div class="col-start-6 col-span-4 mt-0">
        <h1 class="uppercase text-4xl font-bold ">
            <?php echo $memberProfile['username'] ?>
        </h1>
        <strong class="py-2 text-green-500 px-4">
            <?php echo $memberProfile['email']; ?>
        </strong>
    </div>
    <div>
        
    </div>
</div>



