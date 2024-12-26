<?php 
    $user_id = $_SESSION['u_id']; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_id = $_POST['t_id'];
    $status = $_POST['status'];
    $que = $pdo->prepare("UPDATE task SET status = :status WHERE t_id = :t_id");
    $result = $que->execute([
        ':status' => $status,
        ':t_id' => $task_id
    ]);

    
    if ($result) {
        echo "Task status updated successfully!";
    } else {
        echo "Failed to update task status.";
    }

    // header("Location: admin.php?page=assignmem");
    // exit;
}

$query = $pdo->prepare("SELECT task.task_title, task.description, task.due_date, task.status, task.t_id, task.assign_to, project.title AS project_title, software_house.company_name 
    FROM task
    LEFT JOIN project ON task.p_id = project.p_id
    LEFT JOIN company_user ON task.assign_to = company_user.u_id
    LEFT JOIN software_house ON company_user.soft_id = software_house.soft_id
    WHERE task.assign_to = :user_id");

$query->execute([':user_id' => $user_id]);
$user_task = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="task-list space-y-4">
    <?php foreach ($user_task as $task): ?>
        <div class="task-item bg-white p-4 rounded-lg shadow-md hover:bg-gray-100">
            <div class="task-header flex justify-between items-center mb-2">
                <h2 class="font-semibold text-lg"><?= $task['task_title']; ?></h2>
                <form action="" method="POST" class="flex items-center space-x-2">
                    <input type="hidden" name="t_id" value="<?= $task['t_id']; ?>">
                    <select name="status" class="border border-gray-300 rounded">
                        <option value="To-Do" <?= $task['status'] == 'To-Do' ? 'selected' : ''; ?>>To-Do</option>
                        <option value="In Progress" <?= $task['status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                        <option value="Complete" <?= $task['status'] == 'Complete' ? 'selected' : ''; ?>>Complete</option>
                    </select>
                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Update</button>
                </form>
            </div>
            <p class="text-gray-600 mb-2"><?= $task['description']; ?></p>
            <div class="task-meta text-gray-500 text-sm">
                <span>Due Date: <?= $task['due_date']; ?></span>
                <span class="ml-4">Project: <?= $task['project_title']; ?></span>
                <span class="ml-4">Company: <?= $task['company_name']; ?></span>
            </div>
        </div>
    <?php endforeach; ?>
</div>
