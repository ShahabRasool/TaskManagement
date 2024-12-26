<?php
$title='';
$description='';
$start_date='';
$due_date='';
$soft_id='';
$submited=time();
$error=[];
 if(isset($_GET['soft_id'])){
    $soft_id=$_GET['soft_id'];
 }
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 if(isset($_POST['title'])){
    if($_POST['title']==''){
        $error[]='Please add the title';
    }
    $title=$_POST['title'];
 }
 if(isset($_POST['description'])){
    if($_POST['description']==''){
        $error[]='Please add the description';
    }
    $description=$_POST['description'];
 }   
 if(isset($_POST['start_date'])){
    if($_POST['start_date']==''){
        $error[]='Please add the start_date';
    }
    $start_date=$_POST['start_date'];
 } 
 if(isset($_POST['due_date'])){
    if($_POST['due_date']==''){
        $error[]='Please add the start_date';
    }
    $due_date=$_POST['due_date'];
 
 }
 if(empty($error)){
    $insert=$pdo->prepare("insert into project(title,description,start_date,due_date, submited, soft_id) values(:title, :description, :start_date,:due_date,:submited,:soft_id)");
    $parms=[
        ':title'=>$title,
        ':description'=>$description,
        ':start_date'=>$start_date,
        ':due_date'=>$due_date,
        ':submited'=>$submited,
        ':soft_id'=>$soft_id
    ];
    $insert->execute($parms);
    // header("Location: companies.php?add=projectdetail");
    // exit();
 }

}


?>



<div class="container mx-auto p-8">
  <form action="companies.php?add=project&soft_id=<?php echo $soft_id ?>" method="POST" class="space-y-6">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full md:w-1/2 xl:w-1/2 p-3">
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" id="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="w-full md:w-1/2 xl:w-1/2 p-3">
        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
    </div>
    <div class="flex flex-wrap -mx-3">
      <div class="w-full md:w-1/2 xl:w-1/2 p-3">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea type="text" name="description" id="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
      </div>
      <div class="w-full md:w-1/2 xl:w-1/2 p-3">
        <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
        <input type="date" name="due_date" id="due_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
    </div>
    <div class="">
      <input type="submit" value="Submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
    </div>
  </form>
</div>
