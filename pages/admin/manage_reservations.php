<?php
require_once '../../config.php';
require_once '../../classes/reservation.php';
?>
<?php
    if(isset($_POST["changeStatus"])){
        $id_reservation = intval($_POST["id_reservation"]);
        $newStatut = $_POST["changeStatus"];
        $reservation = new Reservation() ; 
        $resutlt = $reservation->modifyStatus($id_reservation , $newStatut);

    }

    if (isset($_POST["archive"])) {
        $id_reservation = intval($_POST["archive"]);
        $reservation = new Reservation();
        $reservation->delete($id_reservation);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
   
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
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            showA();

            function showA()
            {
                $conn = Database::getInstance();
                $db = $conn->getConnection();
                $result = Reservation::show($db);

                if ($result) {
                    foreach ($result as $object) {
                        $id = $object->id_reservation;
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
                                    <select name='changeStatus' onchange='this.form.submit()' class='w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm focus:ring-2 focus:ring-red-300'>
                                        <option value='pending' " . ($object->status == 'pending' ? 'selected' : '') . ">Pending</option>
                                        <option value='confirmed' " . ($object->status == 'confirmed' ? 'selected' : '') . ">Confirmed</option>
                                        <option value='canceled' " . ($object->status == 'canceled' ? 'selected' : '') . ">Canceled</option>
                                    </select>
                                </form>
                             </td>";
                        echo "<td class='px-6 py-3 flex align-center justify-center'>
                                <form action='' method='post'>
                                    <input type='hidden' name='id_reservation' value='{$object->id_reservation}'>
                                    <button type='submit' name='archive' value='$id' class='text-red-500 hover:text-red-700 transition-colors duration-200'>
                                        <span class='material-symbols-outlined'>folder</span>
                                    </button>
                                </form>
                              </td>";
                        echo '</tr>';
                    }
                }
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html> 

