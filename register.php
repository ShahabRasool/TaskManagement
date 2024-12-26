<?php 
$userid=$_SESSION['u_id'];
$name = '';
$username = '';
$email = '';
$password = '';
$phone = '';
$city = '';
$user_status = $_SESSION['status'];
$submitted = time();
$error = [];
$soft_id='';
if (isset($_GET['soft_id'])) {
    $soft_id = $_GET['soft_id'];
}
// Fetch existing users
// $register = $pdo->prepare("select * from user");
// $register->execute();
// $result = $register->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['name'])) {
        if ($_POST['name'] == '') {
            $error[] = 'Enter the name';
        }
        $name = $_POST['name'];
    }
    if (isset($_POST['username'])) {
        if ($_POST['username'] == '') {
            $error[] = 'Enter the username';
        }
        $username = $_POST['username'];
    }
    if (isset($_POST['email'])) {
        if ($_POST['email'] == '') {
            $error[] = 'Enter the email';
        }
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        if ($_POST['password'] == '') {
            $error[] = 'Enter the password';
        }
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    if (isset($_POST['phone'])) {
        if ($_POST['phone'] == '') {
            $error[] = 'Enter the phone';
        }
        $phone = $_POST['phone'];
    }
    if (isset($_POST['city'])) {
        if ($_POST['city'] == '') {
            $error[] = 'Please add the city';
        }
        $city = $_POST['city'];
    }
    if (isset($_POST['status'])) {
        if ($_POST['status'] == '') {
            $error[] = 'Please add the user status';
        }
        $user_status = $_POST['status'];
    }
 

    if (empty($error)) {
        $insertValue = $pdo->prepare("insert into user (name, username, email, password, phone, city, user_status,  submited) values(:name, :username, :email, :password, :phone, :city, :user_status,  :submited)");
        $params = [
            ':name' => $name,
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':phone' => $phone,
            ':city' => $city,
            ':user_status' => $user_status,
            ':submited' => $submitted
        ];


        $insertValue->execute($params);
        $uid=$pdo->lastInsertId();
    }
    //  the junction table where the company will register his member and will go there 
    $query=$pdo->prepare("Insert into company_user (u_id, soft_id) values (:u_id, :soft_id)");
    $paarms=[
        ':u_id'=>$uid,
        ':soft_id'=>$soft_id
    ];
     print_r($paarms);
    $query->execute($paarms);
}
?>

<div class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6">User Registration</h1>
        <form action="companies.php?add=register&status=member&soft_id=<?php echo $soft_id?>" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="city" class="block text-gray-700">City</label>
                <input type="text" id="city" name="city" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <input type="hidden" id="city" value="member" name="status" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <!-- <div class="mb-4">
                <label for="user_status" class="block text-gray-700">User Status</label>
                <select id="user_status" name="user_status" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Please Select the Status</option>    
                    <option value="company">Company</option>
                    <option value="member">Member</option>
                    <option value="hr">HR</option>
                </select>
            </div> -->
            <!-- <div class="mb-4">
    <label for="soft_id" class="block text-gray-700">Company</label>
    <select id="soft_id" name="soft_id" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">Please select the company</option>
        <?php //foreach ($company as $comp): ?>
            <option value="<?php //echo $comp['soft_id']; ?>"><?php //echo $comp['name']; ?></option>
        <?php //endforeach; ?>
    </select>
</div> -->
      
            <div class="flex justify-center">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Register</button>
            </div>
        </form>
    </div>
</div>
