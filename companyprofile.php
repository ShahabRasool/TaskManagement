<?php 
$query = $pdo->prepare("SELECT * FROM software_house");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="bg-gray-100 p-6">
    <div class="max-w-full mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Software House Details</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border border-gray-300">ID</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border border-gray-300">Company Name</th>
                        <th class="text-left py-3 px-2 uppercase font-semibold text-sm border border-gray-300">Start Date</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border border-gray-300">Email</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border border-gray-300">Phone</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border border-gray-300">Address</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border border-gray-300">City</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border border-gray-300">Submitted</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm border border-gray-300">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $record): ?>
                        <tr class="bg-white border-b border-gray-300">
                            <td class="text-left py-3 px-4 border border-gray-300"><?php echo $record['soft_id']; ?></td>
                            <td class="text-left py-3 px-4 border border-gray-300">
                            <a href="admin.php?page=drupak&soft_id=<?php echo htmlspecialchars($record['soft_id']); ?>" class="text-blue-600 hover:text-blue-800">
                                <?php echo htmlspecialchars($record['company_name']); ?>
                            </a>
                        </td>

                            <td class="text-left py-3  border border-gray-300"><?php echo $record['startdate']; ?></td>
                            <td class="text-left py-3 px-4 border border-gray-300"><?php echo $record['email']; ?></td>
                            <td class="text-left py-3 px-4 border border-gray-300"><?php echo $record['phone']; ?></td>
                            <td class="text-left py-3 px-4 border border-gray-300"><?php echo $record['address']; ?></td>
                            <td class="text-left py-3 px-4 border border-gray-300"><?php echo $record['city']; ?></td>
                            <td class="text-left py-3 px-4 border border-gray-300"><?php echo date(' d-m-Y h:i:s:a', $record['submited']); ?></td>
                            <td class="text-left py-3 px-4"><a href="admin.php?page=compedit&soft_id=<?php echo $record['soft_id']?>" class="text-white hover:text-red-500 bg-green-500 rounded-lg shadow:md px-2 py-1">Edit</a></td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
