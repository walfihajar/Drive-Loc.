<?php
session_start();
require_once '../../config.php';
require_once '../../classes/user.php' ;
require_once '../../classes/client.php' ;
?>
<?php
if (isset($_POST['register'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create a Client object and call register method
    $client = new Client();
    $message = $client->register($name, $email, $password); // Call register function
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <!-- Main Container -->
    <div class=" h-[80%] flex flex-col justify-center items-center px-4">
        <!-- Card -->
        <div class="bg-white w-full max-w-md p-6 md:p-8">
            <!-- Header -->
            <h2 class="text-3xl font-bold text-center text-gray-800">Sign Up</h2>
            <p class="text-center text-gray-500 mt-2">Join us to start your journey!</p>
            
            <!-- Sign-Up Form -->
            <form id="form" class="mt-6 space-y-2" action="" method="post">

                <!--Full Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">First name</label>                    
                    <input type="text" id="name" name="name" placeholder="John"  class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password"  name="password" placeholder="••••••••" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"required>
                </div>
                <!-- Submit Button -->
                <button type="submit" name="register" id="register" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">Sign Up</button>
            </form>

            <!-- Footer -->
            <p class="text-center text-sm text-gray-500 mt-6">Already have an account? <a href="../pages/log_in.php" class="text-blue-600 hover:underline">Log In</a></p>

        </div>
    </div>
</body>
</html>

