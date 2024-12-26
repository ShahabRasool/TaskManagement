<?php 
// ob_clean();
session_start();
include 'include/database.php';
include 'loginfunction.php';
$status='';
$soft_id='';


// if(isloggedin()){

// }
$soft_id = '';
$companyData = [];

if (isset($_GET['soft_id'])) {
    $soft_id = $_GET['soft_id'];
}

    $query = $pdo->prepare("SELECT * FROM software_house WHERE soft_id = :soft_id");
    $query->execute([':soft_id' => $soft_id]);
    $companydata = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Nav Bar -->
    <?php include 'include/headercompany.php'; ?>

    <!-- Sidebar and Main Content -->
    <div class="flex w-full mt-4">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-gray-800 shadow-lg p-4">
        <div class="flex items-center gap-4 py-2">
    <i class="fa-solid fa-house text-white text-1.5xl px-4"></i>
    <?php if (isset($companydata) && !empty($companydata)) : ?>
        <a href="companies.php?add=drupak&soft_id=<?php echo $soft_id ?>"><h1 class="font-bold text-2xl text-white">
            <?php echo $companydata['company_name'] ?>
        </h1></a>
    <?php else : ?>
        <h1 class="font-bold text-2xl text-white">
            Home
        </h1>
    <?php endif; ?>
</div>

           
                <div class="py-2 border-b-4">
                    <a href="companies.php?add=companydashborad&soft_id=<?php echo $soft_id ?>" class="block p-2 bg-gray-900 text-white rounded">Dashboard</a>
                </div>
                <div class="py-2 border-b-4">
                    <a href="companies.php?add=companyprofile&soft_id=<?php echo $soft_id ?>" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-layer-group px-3"></i>Company Profile
                    </a>
                </div>
                <div class="py-2 border-b-4">
                    <a href="companies.php?add=register&status=member&soft_id=<?php echo $soft_id ?>" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-users px-3"></i>Add Member
                    </a>
                </div>
                <div class="py-2 border-b-4">
                    <a href="companies.php?add=projectdetail&soft_id=<?php echo $soft_id ?>" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-newspaper px-3"></i>Projects
                    </a>
                </div>
                <!-- <div class="py-2 border-b-4">
                    <a href="#" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-layer-group px-3"></i>
                    </a>
                </div> -->
                <div class="py-2 border-b-4">   
                    <a href="companies.php?add=taskmember&soft_id=<?php echo $soft_id ?>" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-tasks px-3"></i> Task
                    </a>
                </div>
                <div class="py-2 border-b-4">
                    <a href="#" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-star px-3"></i>Points
                    </a>
                </div>
                <div class="py-2 border-b-4">
                    <a href="#" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-regular fa-comment px-3"></i>Comments
                    </a>
                </div>
                <!-- <div class="py-2 border-b-4">
                    <a href="#" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-list px-3"></i>Categories
                    </a>
                </div>

                <div class="py-2 border-b-4">
                    <a href="#" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-tasks px-3"></i>Task
                    </a>
                </div> -->
                <!--
                <div class="py-2 ">
                    <a href="#" class="block p-2 hover:bg-gray-700 text-white rounded"><i class="fa-regular fa-comment px-3"></i>Comments</a>
                </div>
                <div class="py-2 ">
                    <a href="#" class="block p-2 hover:bg-gray-700 text-white rounded "><i class="fa-solid fa-list px-3"></i>Categories</a>
                </div>
                -->
            
        </aside>

        <!-- Main Content -->
        <div class="flex-grow p-6 w-3/4">
            <?php  if(isset($_GET['add'])){
                include $_GET['add']. ".php";
            }else{ ?>
                <?php include 'include/maincontent.php';?>
            <?php } ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>

</body>
</html>
