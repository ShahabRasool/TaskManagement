<?php
$user_id =$_SESSION['u_id'];
$deligation='';
$nic='';
$location='';
$dob='';




// $user_id = $_SESSION['u_id'];
// $query = "SELECT profile_complete FROM users WHERE id = u_id";
// $stmt = $conn->prepare($query);



// Check if the profile is complete
// if ($profile_complete) {
//     header('Location: dashboard.php');
// } else {
//     header('Location: complete_profile.php');
// }

// exit;
?>


<div class="bg-cover  flex items-center justify-center" style="background-image: url('upload-image/website.jpg');">
   
    <div class="bg-white bg-opacity-80 backdrop-blur-md p-8   w-full">
       
        <h2 class="text-2xl font-bold text-center mb-2">Complete Your Profile</h2>
        <p class="text-center text-gray-600 mb-6">Please fill out the form to complete your profile.</p>
        
 
        <form action="" method="POST" class="space-y-6">
          
            <div class="relative">
                <label for="deligation" class="block text-sm text-gray-600">Delegation:</label>
                <input type="text" id="deligation" name="deligation"  required
                    class="w-full border-b-2 border-gray-300 bg-transparent focus:border-yellow-500 focus:ring-0 outline-none transition duration-300">
            </div>
            
           
            <div class="relative">
                <label for="NIC" class="block text-sm text-gray-600">NIC:</label>
                <input type="text" id="NIC" name="NIC"  required
                    class="w-full border-b-2 border-gray-300 bg-transparent focus:border-yellow-500 focus:ring-0 outline-none transition duration-300">
            </div>

            
            <div class="relative">
                <label for="location" class="block text-sm text-gray-600">Location:</label>
                <input type="text" id="location" name="location" required
                    class="w-full border-b-2 border-gray-300 bg-transparent focus:border-yellow-500 focus:ring-0 outline-none transition duration-300">
            </div>

         
            <div class="relative">
                <label for="dob" class="block text-sm text-gray-600">Date of Birth:</label>
                <input type="date" id="dob" name="dob"  required
                    class="w-full border-b-2 border-gray-300 bg-transparent focus:border-yellow-500 focus:ring-0 outline-none transition duration-300">
            </div>
            <div class="relative">
            <label for="" class="block text-sm text-gray-600 py-2">Upload-Image:</label>
            <input type="file" class="image cursor-pointer border-b-2 bg-transparent focus:border-yellow-500 focus:ring-0 outline-none transition duration-300" name="image"  required>
            </div>

            <div class="text-center">
                <input type="submit" value="Save Profile"
                    class="bg-yellow-500 text-white py-3 w-full px-6 rounded-lg cursor-pointer hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 transition duration-300">
            </div>
        </form>
    </div>
</div>

