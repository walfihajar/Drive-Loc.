<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-full md:w-64 p-4 md:min-h-screen">
            <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="?page=home" class="block p-2 hover:bg-gray-700 rounded">Home</a>
                    </li>
                    <li class="mb-2">
                        <a href="?page=analytics" class="block p-2 hover:bg-gray-700 rounded">Analytics</a>
                    </li>
                    <li class="mb-2">
                        <a href="?page=settings" class="block p-2 hover:bg-gray-700 rounded">Settings</a>
                    </li>
                    <li class="mb-2">
                        <a href="?page=profile" class="block p-2 hover:bg-gray-700 rounded">Profile</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-4">
            
        </main>
    </div>
</body>
</html>