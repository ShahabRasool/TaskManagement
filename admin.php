<?php 
ob_clean();
include 'include/database.php';
include 'loginfunction.php';

session_start();
$status='';
$username='';
    if(isset($_SESSION['status'])){
        $status=$_SESSION['status'];
    }
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Nav Bar -->
    <?php include 'include/header.php'; ?>

    <!-- Sidebar and Main Content -->
    <div class="flex flex-col md:flex-row w-full mt-4">
        <!-- Sidebar -->
        <aside class="w-full md:w-1/3 lg:w-1/4 bg-gray-800 shadow-lg p-4 px-12">
            <?php if(isloggedin() && $status == 'admin'){ ?>
                <div class="py-2">
                    <i class="fa-solid fa-house text-white text-1.5xl px-2"></i>
                    <a href="#" class="text-white text-xl font-semibold"><?= $username ?></a>
                </div>
                <div class="py-2 border-b-4 flex items-center">
                    <i class="fa-solid fa-chart-line text-white text-1.5xl px-3"></i>
                    <a href="admin.php?page=admindashboard" class="block p-2 hover:bg-gray-900 text-white rounded">Dashboard</a>
                </div>
                <div class="py-2 border-b-4">
                    <a href="admin.php?page=companyprofile" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-layer-group px-3"></i>Company Profile
                    </a>
                </div>
                <div class="py-2 border-b-4">
                    <a href="admin.php?page=softwarehouse" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-layer-group px-3"></i>Add Company
                    </a>
                </div>
            <?php } elseif ($status == 'member'){ ?>
                <div class="py-2">
                    <i class="fa-solid fa-house text-white text-2xl px-2"></i>
                    <a href="#" class=" capitalize text-white text-2xl font-semibold"><?= $username ?></a>
                </div>
                <div class="py-2 border-b-4">
                    <a href="#" class="block p-2 hover:bg-gray-700 text-white rounded">
                    <i class="fa-solid fa-ghost px-3"></i>Dashboard</a>
            </div>
                <div class="py-2 border-b-4">
                    <a href="admin.php?page=profile" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-tasks px-3"></i>Profile</a>
                </div>
                <div class="py-2 border-b-4">
                    <a href="admin.php?page=assignmem" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-solid fa-tasks px-3"></i>Task</a>
                </div>
                <div class="py-2">
                    <a href="#" class="block p-2 hover:bg-gray-700 text-white rounded">
                        <i class="fa-regular fa-comment px-3"></i>Comments</a>
                    </div>
                    <?php } ?>
        </aside>

        <!-- Main Content -->
        <div class="flex-grow  md:px-6 w-full md:w-2/3 lg:w-3/4">
            <?php if(isset($_GET['page'])){
                include $_GET['page']. ".php";
            } else { ?>
                <?php include 'include/maincontent.php'; ?>
            <?php } ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>

