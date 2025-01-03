<?php
require_once ('../../config.php');

class Vehicule 
{
    private int $id_vehicule;
    private string $model;
    private int $id_category;
    private float $price;
    private int $availability;
    private string $image;
    private $db;

    public function __construct(int $id_vehicule=0,?string $model='',?int $id_category=0, ?float $price=0, ?int $availability=1, ?string $image='')
    {
        $this->id_vehicule = $id_vehicule;
        $this->model = $model;
        $this->id_category = $id_category;
        $this->price = $price;
        $this->availability = $availability;
        $this->image = $image;

        $conn = Database :: getInstance();
        $this->db = $conn->getConnection();
    }

    static public function countAll($db)
    {
        $query = "SELECT COUNT(*)
                  FROM  vehicule
                  WHERE availability ='1'
                ";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }

    static public function show($db,$limit = null,$offset= null)
    {
        $query = "SELECT v.id_vehicule, v.id_category, v.model, c.name, c.description, v.price, v.image
                  FROM vehicule AS v
                  INNER JOIN category AS c ON v.id_category = c.id_category
                  WHERE v.availability = '1'
                  LIMIT :limit OFFSET :offset
                ";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':limit',$limit,PDO::PARAM_INT);
        $stmt->bindParam(':offset',$offset,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->FETCHALL(PDO::FETCH_OBJ);
        return $result;
    }

    static public function add($newVeh)
    {
        $query = "INSERT INTO vehicule (model, id_category, price, availability, image)
                VALUES (:model, :id_category, :price, :availability, :image)";

        $stmt = $newVeh->db->prepare($query);

        $stmt->bindParam(':model', $newVeh->model);
        $stmt->bindParam(':id_category', $newVeh->id_category);
        $stmt->bindParam(':price', $newVeh->price);
        $stmt->bindParam(':availability', $newVeh->availability);
        $stmt->bindParam(':image', $newVeh->image);

        $result = $stmt->execute();
        return $result;
    }


    public function delete($id_vehicule)
    {
        $query = " UPDATE vehicule
                   SET archive = '1'
                   WHERE id_vehicule = :id_vehicule
                ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_vehicule',$id_vehicule,PDO::PARAM_INT);
        $stmt->execute();
    }

    function modify($modifiedVeh)
    {
        $query = " UPDATE vehicule 
                   SET id_vehicule = :id_vehicule , model =:model, id_category =:id_category, price =:price,availability=:availability,image=:image
                   WHERE id_vehicule = :id_vehicule
                   AND id_user = :id_user
                 ";
        
        $stmt = $modifiedVeh->db->prepare($query);

        $stmt->bindParam(':id_vehicule',$modifiedVeh->id_vehicule, PDO::PARAM_INT);
        $stmt->bindParam(':id_vehicule',$modifiedVeh->model, PDO::PARAM_INT);
        $stmt->bindParam(':id_vehicule',$modifiedVeh->id_category, PDO::PARAM_INT);
        $stmt->bindParam(':id_vehicule',$modifiedVeh->price, PDO::PARAM_INT);
        $stmt->bindParam(':id_vehicule',$modifiedVeh->availability, PDO::PARAM_INT);
        $stmt->bindParam(':id_vehicule',$modifiedVeh->image, PDO::PARAM_INT);

        $stmt->execute();
    }
}