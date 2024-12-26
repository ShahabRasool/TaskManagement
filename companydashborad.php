<?php 
$comp = $_GET['soft_id'];
$project = $pdo->prepare("SELECT * FROM project WHERE soft_id = :soft_id");
$project->execute([
    ':soft_id' => $comp
]);
$proj = $project->fetchAll(PDO::FETCH_ASSOC);
// total member
$total = $pdo->prepare("SELECT COUNT(*) as member FROM company_user WHERE soft_id = :soft_id");
$total->execute([
':soft_id' => $comp
]);
$totalmem = $total->fetch(PDO::FETCH_ASSOC);

//  total project count
$projectCountQuery = $pdo->prepare("SELECT COUNT(*) AS total_projects FROM project WHERE soft_id = :soft_id");
$projectCountQuery->execute([
    ':soft_id' => $comp
]);
$projectCount = $projectCountQuery->fetch(PDO::FETCH_ASSOC);


$mem = $pdo->prepare("SELECT user.name, user.email FROM user  LEFT JOIN company_user ON user.u_id = company_user.u_id WHERE company_user.soft_id = :soft_id");
$mem->execute([
    ':soft_id' => $comp
]);
$members = $mem->fetchAll(PDO::FETCH_ASSOC); 

$task=$pdo->prepare("SELECT count(*) as total FROM 
        task
    LEFT JOIN 
        user ON task.assign_to = user.u_id
    LEFT JOIN 
        project ON task.p_id = project.p_id
    LEFT JOIN 
        company_user ON user.u_id = company_user.u_id
    LEFT JOIN 
        software_house ON company_user.soft_id = software_house.soft_id
    WHERE 
        software_house.soft_id= :soft_id");
$task->execute([
    ':soft_id' => $comp
    ]);

    $taskcount = $task->fetch(PDO::FETCH_ASSOC);


?>


    <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex  items-center">
  <i class="fa-solid fa-circle-user px-3"></i>
  <h2 class="text-xl font-semibold text-gray-700">Member</h2>
</div>                    <p class="text-gray-600">Total member <?= $totalmem['member']?></p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex  items-center">
                <i class="fa-solid fa-newspaper px-3"></i><h2 class="text-xl font-semibold text-gray-700">Projects</h2>
                </div>
                    <p class="text-gray-600">Total Projects <?=$projectCount['total_projects']?></p>

                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex  items-center">
                <i class="fa-solid fa-newspaper px-3"></i><h2 class="text-xl font-semibold text-gray-700">Task</h2></div>
                <p>Total task <?=$taskcount['total']?></p>
 <div class="flex flex-col gap-2">
  <strong>ToDo <input class="range-todo" type="range"></strong>
  <strong>Progress <input class="range-progress" type="range"></strong>
  <strong>Complete <input class="range-complete" type="range"></strong>
</div>
                </div>
    </div>
    <h2 class="text-3xl pb-2">Project Details</h2>
    <div class="flex flex-wrap bg-gray-800 text-white">
        <?php foreach ($proj as $project) { ?>
            <div class="flex flex-col gap-4 w-full md:w-1/2 p-4 border border-white">
                <h2 class="text-2xl bg-yellow-400 text-center py-2 "><?php echo htmlspecialchars($project['title']); ?></h2>
                <p><?php echo htmlspecialchars($project['description']); ?></p>
                <p>Due Date: <?php echo htmlspecialchars($project['due_date']); ?></p>
            </div>
        <?php } ?>
    </div>

    <div class="flex flex-wrap">
        <h2 class="text-3xl py-2 w-full">Project Members</h2>
        <?php foreach ($members as $member) { ?>
            <div class="flex flex-col gap-2 w-full md:w-1/2 p-4">
                <p><?php echo htmlspecialchars($member['name']); ?></p>
                <strong>
                    <p><?php echo htmlspecialchars($member['email']); ?></p>
                </strong>
            </div>
        <?php } ?>
    </div>




