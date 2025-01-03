<?php
session_start();
// echo '<pre>';
// print_r($_SESSION['id_user']);
// echo '</pre>';

require_once '../../config.php';
require_once '../../classes/vehicule.php';
require_once '../../includes/navbar.php';
require_once '../../classes/reservation.php';

$conn = Database::getInstance();
$db = $conn->getConnection();
$records_per_page = 3;
$total_records = Vehicule::countAll($db);
$total_pages = ceil($total_records / $records_per_page);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cental - Car Rent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#EA001E',
                    }
                }
            }
        };
    </script>
</head>
<body class="font-sans">

    <!-- Hero Section Start -->
    <div class="relative h-screen">
        <video src="/uploads/carHero.mp4" autoplay loop muted class="w-full h-full object-cover"></video>
    </div>
    <!-- Hero Section End -->

    <!-- Car Menu Start -->
    <div class="container mx-auto py-16">
        <div class="text-center mx-auto pb-5 max-w-2xl">
            <h1 class="text-4xl font-bold mb-3">Our <span class="text-primary">Cars</span></h1>
            <p class="text-gray-600">Choose from a wide variety of cars that suit your style and needs. Drive your dream today!</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card Start -->
            <?php
            function showA($db, $limit, $offset) {
                $result = Vehicule::show($db, $limit, $offset);

                if ($result) {
                    foreach ($result as $object) {
                        $image = htmlspecialchars($object->image);
                        $model = htmlspecialchars($object->model);
                        $price = htmlspecialchars($object->price);
                        $id_vehicule = htmlspecialchars($object->id_vehicule);

                        echo "
                        <div class='bg-white shadow-lg rounded-lg overflow-hidden'>
                            <img src='$image' alt='Car Image' class='w-full h-48 object-cover'>
                            <div class='p-6'>
                                <h2 class='text-lg font-semibold text-gray-800'>{$model}</h2>
                                <p class='text-sm text-gray-600'>\${$price}</p>
                                <button type='button' class='bg-primary text-white mt-4 py-2 px-4 rounded-full w-full' onclick='openModal(\"$id_vehicule\", \"$model\", \"$price\")'>Book Now</button>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p class='text-gray-600 text-center'>No cars available at the moment.</p>";
                }
            }
            showA($db, $records_per_page, $offset);
            ?>
        </div>
    </div>

    <div class="pagination flex justify-center space-x-4 mt-8 pb-6">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" class="px-4 py-2 rounded-lg text-primary <?php echo ($i == $page) ? 'bg-primary text-white font-semibold' : 'bg-gray-200 hover:bg-primary hover:text-white'; ?> transition duration-200">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>

    <!-- Modal Template -->
    <div id="modal-vehicle" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg w-96 relative">
            <h2 id="modal-model" class="text-2xl font-semibold text-gray-800"></h2>
            <p id="modal-price" class="text-sm text-gray-600"></p>
            <form method="POST" action="" class="mt-4">
                <input type="hidden" name="id_vehicule" id="modal-id-vehicule">
                <div class="mb-4">
                    <label for="start_date" class="block text-sm text-gray-600">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="end_date" class="block text-sm text-gray-600">End Date:</label>
                    <input type="date" name="end_date" id="end_date" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <button type="submit" name="book" class="bg-primary text-white py-2 px-4 rounded-full w-full">Confirm Booking</button>
            </form>
            <button onclick="toggleModal('modal-vehicle')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>


    <script>
        function openModal(id, model, price) {
            document.getElementById('modal-id-vehicule').value = id;
            document.getElementById('modal-model').textContent = model;
            document.getElementById('modal-price').textContent = '$' + price;
            document.getElementById('modal-vehicle').classList.remove('hidden');
        }

        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>

    <footer class="bg-gray-800 text-white py-12">
        <!-- Footer content remains unchanged -->
    </footer>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["book"])) {
    if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 2) {
        $id_user = $_SESSION['id_user'];
        $id_vehicule = $_POST['id_vehicule'];
        $status = status::pending ;
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Use prepared statement for security
        $vehicule = new Reservation(0, $id_user, $id_vehicule, $status, $start_date, $end_date);
        $result = Reservation::add($vehicule);

        if ($result) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Reservation Created',
                    text: 'Your reservation has been successfully added!',
                    confirmButtonText: 'OK'
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to create reservation. Please try again.',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Not Authorized',
                text: 'You must be logged in as a client to make a reservation.',
                confirmButtonText: 'OK'
            });
        </script>";
    }
}
?>
