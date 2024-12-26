<?php 

$company_id = $_GET['soft_id']; 
$company_name = $_SESSION['company_name']; 


$task = $pdo->prepare(" SELECT  task.task_title, task.description, task.due_date, task.status, task.submited, user.name AS assigned_user, project.title AS project_title, software_house.company_name 
    FROM 
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
        software_house.soft_id = :company_id");


$task->execute([
    ':company_id' => $company_id 
]);
$tasks = $task->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="pl-8 w-full flex justify-end">
  <a href="companies.php?add=task&soft_id=<?php echo $soft_id ?>" 
     class="bg-gray-800 text-white flex justify-center items-center  py-2 shadow-md rounded-lg" 
     style="width: 140px;">
    <i class="fas fa-plus px-2"></i> Add Task
  </a>
</div>
<div class='container mx-auto p-4'>
    <table class='min-w-full table-auto border-collapse border border-gray-300'>
        <thead>
            <tr class='bg-gray-800 text-white'>
                <th class='border border-gray-300 px-4 py-2 text-left'>Task Title</th>
                <th class='border border-gray-300 px-4 py-2 text-left'>Description</th>
                <th class='border border-gray-300 px-4 py-2 text-left'>Due Date</th>
                <th class='border border-gray-300 px-4 py-2 text-left'>Status</th>
                <th class='border border-gray-300 px-4 py-2 text-left'>Assigned User</th>
                <th class='border border-gray-300 px-4 py-2 text-left'>Project Title</th>
                <th class='border border-gray-300 px-4 py-2 text-left'>submited</th>
                <th class='border border-gray-300 px-4 py-2 text-left'>Company</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr class='bg-white hover:bg-gray-100'>
                    <td class='border border-gray-300 px-4 py-2'><?= $task['task_title']; ?></td>
                    <td class='border border-gray-300 px-4 py-2'><?= $task['description']; ?></td>
                    <td class='border border-gray-300 px-4 py-2'><?= $task['due_date']; ?></td>
                    <td class='border border-gray-300 px-4 py-2'><?= $task['status']; ?></td>
                    <td class='border border-gray-300 px-4 py-2'><?= $task['assigned_user']; ?></td>
                    <td class='border border-gray-300 px-4 py-2'><?= $task['project_title']; ?></td>
                    <td class='border border-gray-300 px-4 py-2'><?= date('Y-m-d h:i:s a',$task['submited']) ?></td>
                    <td class='border border-gray-300 px-4 py-2'><?= $task['company_name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

