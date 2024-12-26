<?php

$name=$_SESSION['company_name'];
$soft_id = $_GET['soft_id'];

$query=$pdo->prepare("select * from project where soft_id= :soft_id");
$query->execute(['soft_id' => $soft_id]);
$project = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="pl-8 w-full flex justify-end">
  <a href="companies.php?add=project&soft_id=<?php echo $soft_id ?>" 
     class="bg-gray-800 text-white flex justify-center items-center  py-2 shadow-md rounded-lg" 
     style="width: 140px;">
    Add Your Project
  </a>
</div>

<div class="bg-gray-100 p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($project as $projects): ?>
            <div class="bg-gray-800 text-white shadow-lg rounded-lg overflow-hidden border border-gray-700 transform transition-transform hover:scale-105 hover:shadow-xl hover:border-gray-600 hover:bg-gray-700">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4 text-yellow-300 hover:text-yellow-400 transition-colors"><?php echo htmlspecialchars($projects['title']); ?></h3>
                    <div class="mb-4">
                        <span class="text-sm font-medium text-blue-300 hover:text-blue-400 transition-colors">Description:</span>
                        <p class="text-gray-200 mt-1"><?php echo htmlspecialchars($projects['description']); ?></p>
                    </div>
                    <div class="mb-4 flex justify-between">
                        <span class="text-sm font-medium text-green-300 hover:text-green-400 transition-colors">Start Date:</span>
                        <span class="text-gray-200"><?php echo htmlspecialchars($projects['start_date']); ?></span>
                    </div>
                    <div class="mb-4 flex justify-between">
                        <span class="text-sm font-medium text-red-300 hover:text-red-400 transition-colors">Due Date:</span>
                        <span class="text-gray-200"><?php echo htmlspecialchars($projects['due_date']); ?></span>
                    </div>
                    <div class="mb-4 flex justify-between">
                        <span class="text-sm font-medium text-purple-300 hover:text-purple-400 transition-colors">Submitted On:</span>
                        <span class="text-gray-200"><?php echo date('Y-m-d h:i:s a', $projects['submited']); ?></span>
                    </div>
                    <div class="mb-4 flex justify-between">
                        <span class="text-sm font-medium text-teal-300 hover:text-teal-400 transition-colors">Company:</span>
                        <span class="text-gray-200"><?php echo htmlspecialchars($name); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<!-- <div class="proj hidden">
    <?php //include 'project.php'?>
</div> -->

 <!-- <script>
    let btn = document.querySelector('.btn');
    let proj = document.querySelector('.proj'); 
    btn.addEventListener("click", function(e) {
        e.preventDefault();
        proj.classList.toggle('hidden');
    });
 </script> -->