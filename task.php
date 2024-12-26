<?php 
$title ='';
$description='';
$due_date='';
$status='';
$assign='';
$projectid='';
$submited=time();
$error =[];
$p_id='';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['title'])) {
      if ($_POST['title'] == '') {
          $error[] = 'Please enter the title of the task';
      }
      $title = $_POST['title'];
  }
  if (isset($_POST['description'])) {
      if ($_POST['description'] == '') {
          $error[] = 'Please add the description';
      }
      $description = $_POST['description'];
  }

  if (isset($_POST['due_date'])) {
      if ($_POST['due_date'] == '') {
          $error[] = 'Please add the due date';
      }
      $due_date = $_POST['due_date'];
  }
  if (isset($_POST['status'])) {
      if ($_POST['status'] == '') {
          $error[] = 'Please select the status';
      }
      $status = $_POST['status'];
  }
  if (isset($_POST['assign_to'])) {
      if ($_POST['assign_to'] == '') {
          $error[] = 'Please select the assignee';
      }
      $assign = $_POST['assign_to'];
  }
  if (isset($_POST['p_id'])) {
      if ($_POST['p_id'] == '') {
          $error[] = 'Please select the project';
      }
      $projectid = $_POST['p_id'];
  }

  if (empty($error)) {
      $insert = $pdo->prepare("INSERT INTO task (task_title, description, due_date, status, assign_to, p_id, submited) VALUES (:task_title, :description, :due_date, :status, :assign_to, :p_id, :submited)");
      $parms = [
          ':task_title' => $title,
          ':description' => $description,
          ':due_date' => $due_date,
          ':status' => $status,
          ':assign_to' => $assign,
          ':p_id' => $projectid,
          ':submited' => $submited
      ];
      $insert->execute($parms);
      // header("location: companies.php?add=taskmember&soft_id={$soft_id}");
      // exit();

  }
}
$soft_id = $_GET['soft_id'];
  
// members
$mem = $pdo->prepare("SELECT user.u_id, user.name 
    FROM company_user 
left JOIN user ON company_user.u_id = user.u_id 
 WHERE company_user.soft_id = :soft_id");
$mem->execute([
  'soft_id' => $soft_id
]);

$mems = $mem->fetchAll(PDO::FETCH_ASSOC);
// project
$project = $pdo->prepare("SELECT * FROM project where soft_id=:soft_id");
$project->execute([
   'soft_id' => $soft_id
]);
$projected = $project->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
  <h2 class="text-2xl font-semibold mb-6 text-center text-gray-700">Add Task</h2>
  <form action="companies.php?add=task&soft_id=<?php echo $soft_id?>" method="POST" class="space-y-6">
    <!-- Task Title -->
    <div>
      <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
      <input type="text" id="title" name="title" value="<?php echo $title ?>" 
             class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Task Description -->
    <div>
      <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
      <textarea id="description" name="description" rows="4" required 
                class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"><?php echo $description ?></textarea>
    </div>

    <!-- Due Date -->
    <div>
      <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
      <input type="date" id="due_date" name="due_date" required  value="<?php echo $due_date?>"
             class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Status -->
    <div>
      <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
      <select id="status" name="status" required  value="<?php echo  $status?>"
              class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        <option value="ToDo">To Do</option>
        <option value="In_progress">In Progress</option>
        <option value="completed">Completed</option>
      </select>
    </div>

    <!-- Assign To -->
    <div>
      <label  class="block text-sm font-medium text-gray-700">Assign To</label>
      <select  name="assign_to" required 
              class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
              <option value="">Select the member</option>
              <?php
           foreach ($mems as $member) {
             echo "<option value='" . $member['u_id'] . "'>" . $member['name']  ."Drupak"."</option>";
           }
              ?>
      </select>
    </div>

    <div>
      <label  class="block text-sm font-medium text-gray-700">Projects</label>
      <select  name="p_id" required 
              class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      
              <option value="">Select the project</option>
              <?php
             foreach ($projected as $proj) {
              echo "<option value='" . $proj['p_id'] . "'>" . $proj['title'] . "</option>";
          } 
                ?>
      </select>
    </div>

    <!-- Submit Button -->
    <div class="flex justify-center">
      <input type="submit" value="Create Task" class="w-full px-4 py-2 text-white bg-blue-600 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
      
    </div>
  </form>
</div>
<!-- 
<details>
  <summary>
    hello this accordin 
      </summary>
      <p>hello</p>
</details> -->