<?php
include 'include/database.php';

$soft_id = '';
$companyData = [];

if (isset($_GET['soft_id'])) {
    $soft_id = $_GET['soft_id'];

    $query = $pdo->prepare("SELECT * FROM software_house WHERE soft_id = :soft_id");
    $query->execute([':soft_id' => $soft_id]);
    $companyData = $query->fetch(PDO::FETCH_ASSOC);
}
?>


    <style>
        .fade-in {
            animation: fadeIn 1s ease-in-out forwards;
            width: 80%;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    
        <?php if ($companyData): ?>
            <div class="bg-white shadow-lg rounded-lg p-8 fade-in">
                <h1 class="text-4xl font-bold mb-4 text-center text-gray-800"><?php echo htmlspecialchars($companyData['company_name']); ?></h1>
                <div class="flex flex-col md:flex-row justify-between mb-6">
                    <div class="w-full md:w-1/2 mb-4 md:mb-0">
                        <p class="text-lg flex items-center py-2">
                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i><strong>Start Date:</strong> <?php echo htmlspecialchars($companyData['startdate']); ?>
                        </p>
                        <p class="text-lg flex items-center py-2">
                            <i class="fas fa-envelope mr-2 text-blue-500"></i><strong>Email:</strong> <?php echo htmlspecialchars($companyData['email']); ?>
                        </p>
                        <p class="text-lg flex items-center py-2">
                            <i class="fas fa-phone-alt mr-2 text-blue-500"></i><strong>Phone:</strong> <?php echo htmlspecialchars($companyData['phone']); ?>
                        </p>
                    </div>
                    <div class="w-full md:w-1/2">
                        <p class="text-lg flex items-center py-2">
                            <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i><strong>Address:</strong> <?php echo htmlspecialchars($companyData['address']); ?>
                        </p>
                        <p class="text-lg flex items-center py-2">
                            <i class="fas fa-city mr-2 text-blue-500"></i><strong>City:</strong> <?php echo htmlspecialchars($companyData['city']); ?>
                        </p>
                    </div>
                </div>
                <div>
                    <p class="text-lg"><strong>Description:</strong></p>
                    <p class="text-lg text-gray-700 mt-2"><?php echo htmlspecialchars($companyData['description']); ?></p>
                </div>
            </div>
        <?php endif; ?>
   

