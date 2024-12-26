<?php 
include 'include/database.php';

$email = '';
$password = '';
$status = '';
$error = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['email'])) {
        if ($_POST['email'] == '') {
            $error[] = 'Enter your email';
        } else {
            $email = $_POST['email'];
        }
    }

    if (isset($_POST['password'])) {
        if ($_POST['password'] == '') {
            $error[] = 'Enter the password';
        } else {
            $password = $_POST['password'];
        }
    }

    // Proceed only if no initial validation errors
    if (empty($error)) {
        $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $query->execute([':email' => $email]);
        $records = $query->fetch(PDO::FETCH_ASSOC);

        // Check if a record is found with the provided email
        if ($records) {
            $status = $records['user_status'];

            // Verify password
            if (password_verify($password, $records['password'])) {
                // Proceed with session creation based on user status
                if ($status == 'admin') {
                    // Set session variables for admin
                    $_SESSION["isLoggedIn"] = true;
                    $_SESSION["username"] = htmlspecialchars($records["username"]);
                    $_SESSION["u_id"] = htmlspecialchars($records["u_id"]);
                    $_SESSION["email"] = htmlspecialchars($records["email"]);
                    $_SESSION["company_name"] = htmlspecialchars($records["company_name"]);
                    $_SESSION['soft_id'] = htmlspecialchars($records['soft_id']);
                    $_SESSION["status"] = htmlspecialchars($status);

                    // Fetch additional software house data
                    $querySoft = $pdo->prepare("SELECT soft_id, company_name FROM software_house WHERE u_id = :u_id");
                    $querySoft->execute([':u_id' => $records['u_id']]);
                    $softRecord = $querySoft->fetch(PDO::FETCH_ASSOC);

                    if ($softRecord) {
                        $_SESSION["soft_id"] = htmlspecialchars($softRecord['soft_id']);
                        $_SESSION["company_name"] = htmlspecialchars($softRecord['company_name']);
                    }

                    // Redirect to the admin dashboard
                    header('Location: admin.php?page=admindashboard');
                    exit();
                } elseif ($status == 'member') {
                    // Set session variables for member
                    $_SESSION["username"] = htmlspecialchars($records["username"]);
                    $_SESSION["email"] = htmlspecialchars($records["email"]);
                    $_SESSION["u_id"] = htmlspecialchars($records["u_id"]);
                    $_SESSION["status"] = htmlspecialchars($status);

                    // Redirect to the admin page
                    header('location: admin.php');
                    exit();
                } else {
                    $error[] = "Invalid Software House ID";
                }
            } else {
                // Password is incorrect
                $error[] = "Invalid password. Please try again.";
            }
        } else {
            // Email does not exist
            $error[] = "No account found with that email address.";
        }
    }
}
?>


<!-- Your HTML code here -->

<div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold mb-4 text-center">Management System</h2>
         
          <?php if (!empty($error)): ?>
            <div class="mb-4 text-red-500">
                <?php foreach ($error as $err): ?> 
                    <p><?php echo $err; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
            
            <form action="admin.php?page=login" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Enter your email" name="email">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Enter your password" name="password">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Sign In
                    </button>
                </div>
                <a href="admin.php?page=softwarehouse" class="block text-center mt-4 font-bold text-blue-700 hover:underline">Sign up</a>

            </form>
        </div>
    </div>
</div>