<?php 

$name='';
$phone='';
$address='';
// $password='';
$city='';
$edit='';
$error=[];
if(isset($_GET['soft_id'])){
    $edit=$_GET['soft_id'];
}

$query=$pdo->prepare("select * from software_house where soft_id= :soft_id");
$query->execute([':soft_id'=>$edit]);
$result=$query->fetch(PDO::FETCH_ASSOC);
if($result){
    $name = $result['company_name'];
    $phone = $result['phone'];
    $address = $result['address'];
    $city = $result['city'];
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['name'])){
        if($_POST['name']==''){
            $error[]='Edit the name';
        }
        $name=$_POST['name'];
    }
    if(isset($_POST['phone'])){
        if($_POST['phone']==''){
            $error[]='Edit the phone';
        }
        $phone=$_POST['phone'];
    }
    
    if(isset($_POST['address'])){
        if($_POST['address']==''){
            $error[]='Edit the address';
        }
        $address=$_POST['address'];
    }
  
    if(isset($_POST['city'])){
        if($_POST['city']==''){
            $error[]='Edit the city';
        }
        $city=$_POST['city'];
    }
    if(empty($error)){
        $insert=$pdo->prepare("UPDATE software_house SET name=:name, phone=:phone, address=:address, city=:city WHERE soft_id=:soft_id");
        $params=[
            ':name'=>$name,
            ':phone'=>$phone,
            ':address'=>$address,
            ':city'=>$city,
            ':soft_id'=>$edit
        ];
        $insert->execute($params);
    }
}
?>

<div class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Edit your company</h1>
        <form action="admin.php?page=compedit&soft_id=<?php echo $edit?>" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo htmlspecialchars($name) ?>">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                <input type="text" id="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo htmlspecialchars($phone) ?>">
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                <input type="text" id="address" name="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo htmlspecialchars($address) ?>">
            </div>
            <div class="mb-4">
                <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City:</label>
                <input type="text" id="city" name="city" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo htmlspecialchars($city) ?>">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
            </div>
        </form>
    </div>
</div>
