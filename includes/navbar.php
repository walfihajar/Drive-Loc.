<nav class="bg-white shadow px-4 py-2">
    <div class="container mx-auto flex items-center justify-between">
        <a href="#" class="flex items-center space-x-3">
            <h1 class="text-2xl text-primary font-bold flex items-center">
                <i class="fas fa-car-alt mr-3"></i>Cental
            </h1>
        </a>
        <div class="flex items-center space-x-6">
            <a href="/pages/client/home.php" class="text-gray-700 hover:text-primary <?php echo basename($_SERVER['PHP_SELF']) == 'home.php' ? 'font-bold text-primary' : ''; ?>">Home</a>
            <a href="/pages/client/galery.php" class="text-gray-700 hover:text-primary <?php echo basename($_SERVER['PHP_SELF']) == 'cars.php' ? 'font-bold text-primary' : ''; ?>">Cars</a>  
            <a href="#" class="text-gray-700 hover:text-primary">Service</a>
            <a href="#" class="text-gray-700 hover:text-primary">Blog</a>
            <a href="#" class="text-gray-700 hover:text-primary">Contact</a>

            <!-- Check if the user is logged in -->
            <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                if (isset($_SESSION['email'])) {
                    // Admin Navbar
                    if ($_SESSION['id_role'] == 1) {
                        echo '<a href="/pages/admin/statistiques" class="bg-primary text-white rounded-full py-2 px-4">Admin Profile</a>';
                        echo '<a href="/logout.php" class="bg-primary text-white rounded-full py-2 px-4">Logout</a>';
                    }
                    // Client Navbar
                    else if ($_SESSION['id_role'] == 2) {
                        echo '<a href="/pages/client/manage_reservations.php" class="bg-primary text-white rounded-full py-2 px-4">Client Profile</a>';
                        echo '<a href="/logout.php" class="bg-primary text-white rounded-full py-2 px-4">Logout</a>';
                    }
                } else {
                    // If no user is logged in, show Login and Register
                    echo '<a href="../auth/log_in.php" class="bg-primary text-white rounded-full py-2 px-4">Login</a>';
                    echo '<a href="../auth/register.php" class="bg-primary text-white rounded-full py-2 px-4">Register</a>';
                }
            ?>
        </div>
    </div>
</nav>
