<?php
// Prepare and execute the query
$join = $pdo->prepare("SELECT 
    software_house.company_name AS company_name, 
    project.title AS project_title, 
    project.description, 
    project.due_date, 
    user.name AS member_name 
    FROM company_user 
    JOIN software_house ON company_user.soft_id = software_house.soft_id 
    JOIN user ON company_user.u_id = user.u_id 
    JOIN project ON software_house.soft_id = project.soft_id 
    JOIN task ON task.p_id = project.p_id 
    AND task.assign_to = user.u_id 
    ORDER BY software_house.company_name, project.title, user.name");

$join->execute();
$results = $join->fetchAll(PDO::FETCH_ASSOC);



$total = $pdo->prepare("SELECT COUNT(*) as member FROM company_user");
$total->execute();
$totalmem = $total->fetch(PDO::FETCH_ASSOC);

$projectCountQuery = $pdo->prepare("SELECT COUNT(*) AS total_projects FROM project");
$projectCountQuery->execute();
$projectCount = $projectCountQuery->fetch(PDO::FETCH_ASSOC);

$task=$pdo->prepare("select count(*) as total from task");
$task->execute();
$taskcount = $task->fetch(PDO::FETCH_ASSOC);

$company=$pdo->prepare("select count(*) as company from software_house");
$company->execute();
$companycount = $company->fetch(PDO::FETCH_ASSOC);
?>
<div class="flex pb-3 gap-2">
    <div class="w-full sm:w-[48%] md:w-[30%] lg:w-[25%] bg-green-400 p-4 flex flex-col gap-4 rounded-lg shadow-lg">
        <h2 class="text-2xl text-center font-bold bg-yellow-300 p-2 rounded-lg">Companies</h2>
        <p class="text-white text-center text-lg">Total Companies: <?= $companycount['company'] ?></p>
    </div>
    <div class="w-full sm:w-[48%] md:w-[30%] lg:w-[25%] bg-green-400 p-4 flex flex-col gap-4 rounded-lg shadow-lg">
        <h2 class="text-2xl text-center font-bold bg-yellow-300 p-2 rounded-lg">Members</h2>
        <p class="text-white text-center text-lg">Total Members: <?= $totalmem['member'] ?></p>
    </div>
    <div class="w-full sm:w-[48%] md:w-[30%] lg:w-[25%] bg-green-400 p-4 flex flex-col gap-4 rounded-lg shadow-lg">
        <h2 class="text-2xl text-center font-bold bg-yellow-300 p-2 rounded-lg">Projects</h2>
        <p class="text-white text-center text-lg">Total Projects: <?= $projectCount['total_projects'] ?></p>
    </div>
    <div class="w-full sm:w-[48%] md:w-[30%] lg:w-[25%] bg-green-400 p-4 flex flex-col gap-4 rounded-lg shadow-lg">
        <h2 class="text-2xl text-center font-bold bg-yellow-300 p-2 rounded-lg">Task</h2>
        <p class="text-white text-center text-lg">Total task assign: <?= $taskcount['total'] ?></p>
    </div>
</div>
            
<?php
$currentCompany = "";
$currentProject = "";
foreach ($results as $row) {
    // Check if the company has changed
    if ($currentCompany != $row['company_name']) {
        if ($currentCompany) {
            // Close the previous company section
            echo '</ul></div></div>';
        }
        // Start a new company section
        ?>
        <div class="mb-6 bg-gray-800 flex gap-2">
            <div class="pr-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 bg-yellow-300 text-center"><?= htmlspecialchars($row['company_name']); ?></h2>
                <p class="text-white text-center pb-2"><?= $row['description'] ?></p>
        <?php
        $currentCompany = $row['company_name'];
        $currentProject = ""; // Reset project for the new company
    }

    // Check if the project has changed
    if ($currentProject != $row['project_title']) {
        if ($currentProject) {
            // Close the previous project section
            echo '</ul></div>';
        }
        // Start a new project section, but without the project description
        ?>
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-white mb-2 text-center">Projects</h2>
                <h3 class="text-xl font-semibold text-blue-600 mb-2 text-center"><?= htmlspecialchars($row['project_title']); ?></h3>
                <h1 class="text-yellow-300 pb-2 px-3 text-center">Team Members</h1>
                <ul class=" ml-6 flex gap-2 flex-col ">
        <?php
        $currentProject = $row['project_title'];
    }

    // Display the member under the current project
    ?>
      <li class="text-sm font-medium text-white text-center"><?= htmlspecialchars($row['member_name']); ?></li>
    <?php
}
?>
                </ul>
            </div> <!-- closing div tag for project section -->
        </div> <!-- closing div tag for left side company section -->
