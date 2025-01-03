<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-full md:w-44 p-4 md:min-h-screen">
            <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="../admin/statistiques.php" class="block p-2 hover:bg-gray-700 rounded">Statistics</a>
                    </li>
                    <li class="mb-2">
                        <a href="../admin/manage_reservations.php" class="block p-2 hover:bg-gray-700 rounded">Reservations</a>
                    </li>
                    <li class="mb-2">
                        <a href="../Admin/manage_vehicules.php" class="block p-2 hover:bg-gray-700 rounded">Vehicules</a>
                    </li>
                    <li class="mb-2">
                        <a href="../admin/manage__reviews.php" class="block p-2 hover:bg-gray-700 rounded">Reviews</a>
                    </li>
                    <li class="mb-2">
                        <a href="../admin/manage_categories.php" class="block p-2 hover:bg-gray-700 rounded">Categories</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-4">
            <?php
                echo $content;
            ?>
        </main>
    </div>
</body>
</html>