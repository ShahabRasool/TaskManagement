<?php 
    $name = '';
    $startdate = '';
    $email = '';
    $description='';
    $phone = '';
    $password = '';
    $address = '';
    $city = '';
    $submited = time();
    if(isset($_SESSION['u_id'])){

        $uerid=$_SESSION['u_id'];
    }
    $error = [];
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['company_name'])) {
            if ($_POST['company_name'] == '') {
                $error[] = 'Please enter the name of the Company';
            }
            $name = $_POST['company_name'];
        }
    
        if (isset($_POST['startdate'])) {
            if ($_POST['startdate'] == '') {
                $error[] = 'Please enter the date';
            }
            $startdate = $_POST['startdate'];
        }
    
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $query = $pdo->prepare("SELECT * FROM software_house WHERE email = :email ");
            $query->execute([':email' => $_POST['email']]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                $error[] = 'Email already exists';
            } else {
                $email = $_POST['email'];
            }
        } else {
            $error[] = 'Enter your email';
        }

        if (isset($_POST['description'])) {
            if ($_POST['description'] == '') {
                $error[] = 'Please add the description';
            }
            $description = $_POST['description'];
        }
    
        if (isset($_POST['phone'])) {
            if ($_POST['phone'] == '') {
                $error[] = 'Please add the phone';
            }
            $phone = $_POST['phone'];
        }
        if (isset($_POST['password'])) {
            if ($_POST['password'] == '') {
                $error[] = 'Enter the password';
            }
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
    
        if (isset($_POST['address'])) {
            if ($_POST['address'] == '') {
                $error[] = 'Please enter the address';
            }
            $address = $_POST['address'];
        }
    
        if (isset($_POST['city'])) {
            if ($_POST['city'] == '') {
                $error[] = 'Please add the city';
            }
            $city = $_POST['city'];
        }
    
        $insert = false;
        if (count($error) == 0) {
            $insert = true;
        }
        if ($insert) {
            $insertvalue = $pdo->prepare("INSERT INTO software_house (company_name, startdate, email, description, phone, password, address, city, submited, u_id) VALUES (:company_name, :startdate, :email,:description, :phone, :password, :address, :city, :submited, :u_id)");
            $params = [
                ':company_name' => $name,
                ':startdate' => $startdate,
                ':email' => $email,
                ':description' => $description,
                ':phone' => $phone,
                ':password' => $password,
                ':address' => $address,
                ':city' => $city,
                ':submited' => $submited,
                ':u_id' => $uerid
            ];
            $insertvalue->execute($params);
        } else {
            echo 'Your company is registered';
        }
    }
   


?>
    <div class=" flex justify-center items-center min-h-screen">
    <div class="bg-white p-12 rounded-lg shadow-lg w-full max-w-6xl mx-4">
        <h1 class="text-3xl font-bold text-center mb-8">Company Register Form</h1>
        <form action="admin.php?page=softwarehouse" method="POST">
            <div class="grid grid-cols-2 gap-8 mb-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 font-medium">Name</label>
                        <input type="text" name="company_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Start Date</label>
                        <input type="date" name="startdate" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Email</label>
                        <input type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Phone</label>
                        <input type="text" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <!-- Right Column -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 font-medium">Description</label>
                        <textarea name="description" class="w-full h-24 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Password</label>
                        <input type="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">Address</label>
                        <input type="text" name="address" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium">City</label>
                        <input type="text" name="city" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Submit
                </button>
            </div>
            <div class="text-center mt-6">
                <a href="admin.php?page=login" class="font-bold text-blue-700 hover:underline">Sign in</a>
            </div>
        </form>
    </div>
</div>


