<?php
require_once '../../config.php';
require_once '../../classes/reservation.php';
ob_start();
session_start();

// if (!isset($_SESSION['id_user'])) {
//     header("Location: login.php");
//     exit;
// }

if (isset($_POST['edit'])) {
    $id_reservation = intval($_POST['edit']);

    $conn = Database::getInstance();
    $db = $conn->getConnection();

    $query = "SELECT * FROM reservation WHERE id_reservation = :id_reservation";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_reservation', $id_reservation, PDO::PARAM_INT);
    $stmt->execute();
    $reservation = $stmt->fetch(PDO::FETCH_OBJ);

    if ($reservation && $reservation->id_user == $_SESSION['id_user']) {
        echo "
        <form action='' method='post'>
            <input type='hidden' name='id_reservation' value='{$reservation->id_reservation}'>
            <label for='id_vehicule'>Vehicule ID:</label>
            <input type='text' name='id_vehicule' value='{$reservation->id_vehicule}' required><br>
            <label for='start_date'>Start Date:</label>
            <input type='date' name='start_date' value='{$reservation->start_date}' required><br>
            <label for='end_date'>End Date:</label>
            <input type='date' name='end_date' value='{$reservation->end_date}' required><br>
            <label for='pickup_address'>Pick-up Address:</label>
            <input type='text' name='pickup_address' value='{$reservation->pickup_address}' required><br>
            <label for='dropoff_address'>Drop-off Address:</label>
            <input type='text' name='dropoff_address' value='{$reservation->dropoff_address}' required><br>
            <button type='submit' name='update' value='update'>Update</button>
        </form>";
    } else {
        echo "You are not authorized to edit this reservation.";
    }
}

if (isset($_POST['update'])) {
    $id_reservation = intval($_POST['id_reservation']);
    $id_vehicule = htmlspecialchars($_POST['id_vehicule']);
    $start_date = htmlspecialchars($_POST['start_date']);
    $end_date = htmlspecialchars($_POST['end_date']);
    $pickup_address = htmlspecialchars($_POST['pickup_address']);
    $dropoff_address = htmlspecialchars($_POST['dropoff_address']);

    $conn = Database::getInstance();
    $db = $conn->getConnection();

    $query = "SELECT id_user FROM reservation WHERE id_reservation = :id_reservation";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_reservation', $id_reservation, PDO::PARAM_INT);
    $stmt->execute();
    $reservation = $stmt->fetch(PDO::FETCH_OBJ);

    if ($reservation && $reservation->id_user == $_SESSION['id_user']) {
        $reservationObj = new Reservation();
        $reservationObj->modify([
            'id_reservation' => $id_reservation,
            'id_vehicule' => $id_vehicule,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'pickup_address' => $pickup_address,
            'dropoff_address' => $dropoff_address
        ]);
        echo "Reservation updated successfully.";
    } else {
        echo "You are not authorized to update this reservation.";
    }
}

if (isset($_POST['cancel'])) {
    $id_reservation = intval($_POST['id_reservation']);
    $newStatus = htmlspecialchars($_POST['cancel']);
    $reservation = new Reservation();
    $result = $reservation->modifyStatus($id_reservation, $newStatus);
}
?>

<div class="overflow-x-auto mt-8 mb-16 h-[65%]">
    <table class="w-full overflow-auto text-sm text-center text-gray-500 bg-gray-100 border border-purple-500">
        <thead class="text-s text-gray-700 bg-[#f9f3fe]">
            <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Vehicule</th>
                <th class="px-6 py-3">Start date</th>
                <th class="px-6 py-3">End date</th>
                <th class="px-6 py-3">Pick-up address</th>
                <th class="px-6 py-3">Drop-off address</th>
                <th class="px-6 py-3">Price</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            function showA()
            {
                $conn = Database::getInstance();
                $db = $conn->getConnection();
                $result = Reservation::show($db);

                if ($result) {
                    foreach ($result as $object) {
                        echo '<tr class="bg-white lowercase hover:bg-purple-50">';
                        echo "<td class='px-6 py-3'>{$object->id_reservation}</td>";
                        echo "<td class='px-6 py-3'>{$object->name}</td>";
                        echo "<td class='px-6 py-3'>{$object->model}</td>";
                        echo "<td class='px-6 py-3'>{$object->start_date}</td>";
                        echo "<td class='px-6 py-3'>{$object->end_date}</td>";
                        echo "<td class='px-6 py-3'>{$object->pickup_address}</td>";
                        echo "<td class='px-6 py-3'>{$object->dropoff_address}</td>";
                        echo "<td class='px-6 py-3'>{$object->price}</td>";
                        echo "<td class='px-6 py-3'>
                                <form action='' method='post'>
                                    <input type='hidden' name='id_reservation' value='{$object->id_reservation}'>
                                    <button type='submit' name='cancel' value='canceled' class='text-red-500 hover:text-red-700 transition-colors duration-200'><i class='fas fa-times-circle'></i> Cancel</button>
                                    <button type='submit' name='edit' value='{$object->id_reservation}' class='text-blue-500 hover:text-blue-700 transition-colors duration-200'><i class='fas fa-edit'></i> Edit</button>
                                </form>
                            </td>";
                        echo "</tr>";
                    }
                }
            }

            showA();
            ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once '../client/layoutC.php';
?>
