<?php
require_once '../../config.php';
require_once '../../classes/vehicule.php';
ob_start();
?>

<!-- the admin can add a new vehicule  -->
<section class="Formulaire_client bg-[#f9f3fe] h-[30%] w-full  border border-purple-500 rounded-md grid grid-cols-1 px-8 py-1 ">
    <form id="form" class=" flex flex-wrap md:grid  md:grid-cols-5 gap-2 text-center items-center self-center justify-center" action="" method="post" enctype="multipart/form-data">

        <div class="flex flex-col gap-1">
            <label class="font-bold" for="model">Model</label>
            <input type="text" id="model" name="model" class="bg-gray-50 border border-[#a153c9] text-gray-900 text-sm rounded-lg p-2.5 focus:outline-none focus:ring focus:ring-[#922fc5]">
        </div>

        <div class="flex flex-col gap-1">
            <label class="font-bold" for="category">Category</label>
            <input type="number" id="category" name="category" class="bg-gray-50 border border-[#a153c9] text-gray-900 text-sm rounded-lg p-2.5 focus:outline-none focus:ring focus:ring-[#922fc5]">
        </div>
        
        <div class="flex flex-col gap-1">
            <label class="font-bold" for="price">price</label>
            <input type="text" id="price" name="price" class="bg-gray-50 border border-[#a153c9] text-gray-900 text-sm rounded-lg p-2.5 focus:outline-none focus:ring focus:ring-[#922fc5]">
        </div>

        <div class="flex flex-col gap-1">
            <label class="font-bold" for="availability">Availability</label>
            <select id="availability" name="availability" required class="bg-gray-50 border border-[#a153c9] text-gray-900 text-sm rounded-lg p-2.5 focus:outline-none focus:ring focus:ring-[#922fc5]">
                <option value="1">Available</option>
                <option value="0">Unavailable</option>
            </select>
        </div>

        <div class="flex flex-col gap-1">
            <label class="font-bold"  for="image">Image</label>
            <input type="file" id="image" name="image" accept="image/*" class="bg-gray-50 border border-[#a153c9] text-gray-900 text-sm rounded-lg p-2.5 focus:outline-none focus:ring focus:ring-[#922fc5]">
        </div>
       
        <div  class="col-span-4">
            <button type="submit" name="new_vehicule" id="new_vehicule" class="my-4 items-center bg-[#d5a6f6] w-fit p-4 text-black hover:bg-[#a658d1] py-2 rounded-md">Add Vehicule</button>
        </div>
       
    </form>

</section>

<!-- the admin can see the list of vehicules , edit a vehicule , delete a vehicule, change the availability of a vehicule  -->
<div class="overflow-x-auto mt-8 mb-16 h-[65%]">
    <table class="w-full overflow-auto text-sm text-center text-gray-500 bg-gray-100 border border-purple-500">
        <thead class="text-s text-gray-700 bg-[#f9f3fe]">
            <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Model</th>
                <th class="px-6 py-3">Category</th>
                <th class="px-6 py-3">Price</th>
                <th class="px-6 py-3">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            showA();

            function showA()
            {
                $conn = Database::getInstance();
                $db = $conn->getConnection();
                $result = Vehicule::show($db);

                if ($result) {
                    foreach ($result as $object) {
                        $id = $object->id_vehicule;
                        echo '<tr class="bg-white lowercase hover:bg-purple-50">';
                        echo "<td class='px-6 py-3'>{$object->id_vehicule}</td>";
                        echo "<td class='px-6 py-3'>{$object->model}</td>";
                        echo "<td class='px-6 py-3'>{$object->id_category}</td>";
                        echo "<td class='px-6 py-3'>{$object->price}</td>";
                        echo "<td class='px-6 py-3'>{$object->image}</td>";
                        echo "<td class='px-6 py-3 flex align-center justify-center'>
                                <form action='' method='post'>
                                    <input type='hidden' name='id_reservation' value='{$object->id_vehicule}'>
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



<?php
//to upload images this is what should happen
/*
file: contains information about the file being uploaded like its name size etc
uploadsDir: this defines the directory where the file will be uploaded 
maxsize: specifies the maximum file size allowed for the upload, the defualt is 2MB
allowedTypes: defines an array of allowed MIME types 
 */ 
function uploadImage($file, $uploadsDir = '../../uploads/', $maxSize = 2 * 1024 * 1024, $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']) {
    if (isset($file) && $file['error'] === UPLOAD_ERR_OK) { // this checks if the $file parameter has been provided , if not the f will turn an error
        $photoTmpName = $file['tmp_name'];
        $photoName = basename($file['name']);
        $photoSize = $file['size'];
        $photoType = mime_content_type($photoTmpName);

        // Vérification du type
        if (!in_array($photoType, $allowedTypes)) {
            return ['success' => false, 'message' => "Type de fichier non supporté. Veuillez utiliser JPEG, PNG ou GIF."];
        }

        // Vérification de la taille
        if ($photoSize > $maxSize) {
            return ['success' => false, 'message' => "Le fichier est trop volumineux. Limite de " . ($maxSize / (1024 * 1024)) . " Mo."];
        }

        // Création du chemin d'enregistrement avec un nom unique
        $photoPath = $uploadsDir . uniqid() . '-' . $photoName;
        // Déplacement du fichier
        if (move_uploaded_file($photoTmpName, "$photoPath")) {
            return ['success' => true, 'filePath' => $photoPath];
        } else {
            return ['success' => false, 'message' => "Erreur lors de l'upload de l'image."];
        }
    } else {
        return ['success' => false, 'message' => "Aucun fichier sélectionné ou erreur lors de l'upload."];
    }
}

// Adding a vehicule
if (isset($_POST['new_vehicule'])  ) {
    $model = $_POST['model'];
    $id_category =$_POST['category'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];

    $uploadResult = uploadImage($_FILES['image']);
    if (!$uploadResult['success']) {
        echo $uploadResult['message'];
        exit;
    }
    $image = $uploadResult['filePath'];


    $conn = Database::getInstance();
    $db = $conn->getConnection();

    $newVeh = new Vehicule(0,$model,$id_category,$price,$availability,$image);
    $result = Vehicule::add($newVeh);
    if($result){
        echo "good";
    }
}

?>



<?php
$content = ob_get_clean();
require_once './layoutA.php';
?>