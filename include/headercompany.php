<?php


$status = '';
$u_id = '';
$username='';
if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}


if (isset($_SESSION['u_id'])) {
    $u_id = $_SESSION['u_id'];

    $query = $pdo->prepare("SELECT soft_id, company_name FROM software_house WHERE u_id = :u_id");
    $params = [':u_id' => $u_id];
    $query->execute($params);
    $companyData = $query->fetchAll(PDO::FETCH_ASSOC);

  
} 
?>

<nav class="bg-gray-800 p-4 px-12">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-white text-2xl font-semibold"><i class="fa-solid fa-layer-group px-3"></i>SAAS</a>
        <div class="flex space-x-4 items-center">
            <?php if(isloggedin() && $status == 'admin') { ?>
                <div class="flex space-x-4 items-center">
                    <div class="relative ">
                        <button class="text-gray-300 hover:text-white mx-2" id="dropdown-button">
                         <div class="flex gap-4 align-items items-center"><a href="admin.php"><img src="https://www.shareicon.net/data/128x128/2016/05/24/770137_man_512x512.png" style="width: 30px;"></a><?php echo $username ;?><i class="fa-solid fa-caret-down px-2"></i></div>
                        </button>
                        <div class="absolute z-50 bg-gray-800 text-gray-300  hidden z-[10000]"style="
    right: 13px;
    width: 117px;
    text-align: center;" id="dropdown-menu" >
                            <a href="companies.php?add=admindashborad&soft_id=<?php echo $soft_id ?>" class="text-gray-300 px-2 hover:text-white">Dashboard</a>
                            <?php foreach ($companyData as $company): ?>
                                <a href="companies.php?add=drupak&soft_id=<?php echo htmlspecialchars($company['soft_id']); ?>" class="block px-4 py-2 hover:bg-gray-700">
                                    <?php echo htmlspecialchars($company['company_name']); ?>
                                </a>
                            <?php endforeach; ?>
                            <a href="admin.php?page=logout" class="block px-4 py-2 hover:bg-gray-700">Logout</a>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <a href="admin.php?page=softwarehouse" class="text-gray-300 hover:text-white mx-2">Sign Up</a>
                <a href="admin.php?page=login" class="text-gray-300 hover:text-white mx-2">Sign In</a>
            <?php } ?>
        </div>
    </div>
</nav>
<script>
    document.getElementById('dropdown-button').addEventListener('click', function() {
        let dropdownMenu = document.getElementById('dropdown-menu');
        dropdownMenu.classList.toggle('hidden');
    });
</script>
