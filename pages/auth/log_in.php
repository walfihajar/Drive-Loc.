<?php
session_start();
require_once '../../classes/user.php';
require_once '../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $user = new User();
    if ($user->login($email, $password)) {
        // After login, check the role and redirect accordingly
        $id_role = $_SESSION['id_role']; // Assuming the role is stored in the session after login

        if ($id_role == 1) {
            // If the user is an admin, redirect to the admin dashboard
            header("Location: ../admin/statistiques.php"); // Change to the correct dashboard page
        } elseif ($id_role == 2) {
            // If the user is a client, redirect to the gallery
            header("Location:../client/galery.php"); // Change to the correct gallery page
        } else {
            // If the role is something unexpected, handle it or show an error
            $error_message = "Invalid role.";
        }
        exit();
    } else {
        // Display an error message if login fails
        $error_message = "Invalid email or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

    <!-- Main Container -->
    <div class="h-screen flex justify-center items-center">
        <!-- Card -->
        <div class="bg-white w-full max-w-md p-6 md:p-8 rounded-lg shadow-lg">

            <!-- Header -->
            <h2 class="text-3xl font-bold text-center text-gray-800">Log In</h2>
            <p class="text-center text-gray-500 mt-2">Enter your credentials to access your account</p>

            <!-- Login Form -->
            <form action="" method="POST" class="mt-6 space-y-6">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" placeholder="you@example.com" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>

                <!-- Error Message -->
                <?php if (isset($error_message)): ?>
                    <div class="text-red-500 text-sm mt-2"><?= $error_message ?></div>
                <?php endif; ?>

                <!-- Submit Button -->
                <button type="submit" name="login" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">Log In</button>
            </form>

            <!-- Footer -->
            <p class="text-center text-sm text-gray-500 mt-6">Don't have an account? <a href="../pages/signup.php" class="text-blue-600 hover:underline">Sign Up</a></p>

        </div>

    </div>

</body>
</html>
