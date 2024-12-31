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
                <input type="email" name="email" id="email" placeholder="you@example.com" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Password -->
                <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Submit Button -->
                <button type="submit" name="login" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">Log In</button>
            </form>

            <!-- Footer -->
            <p class="text-center text-sm text-gray-500 mt-6">Don't have an account? <a href="../pages/signup.php" class="text-blue-600 hover:underline">Sign Up</a></p>

        </div>

    </div>

</body>
</html>