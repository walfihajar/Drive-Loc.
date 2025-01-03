<?php 
require_once ('../../config.php');

enum status: string 
{
    case confirmed = 'confirmed';
    case pending = 'pending';
    case canceled = 'canceled';
}

class Reservation 
{
    private int $id_reservation;
    private int $id_user;
    private int $id_vehicule;
    private status $status;
    private ?string $start_date;
    private ?string $end_date;
    private $db;


    public function __construct(int $id_reservation=0, ?int $id_user=0, ?int $id_vehicule=0, ?status $status=null, ?string $start_date='', ?string $end_date='')
    {
        $this->id_reservation = $id_reservation;
        $this->id_user = $id_user;
        $this->id_vehicule = $id_vehicule;
        $this->status = $status ?? status::pending;
        $this->start_date = $start_date ?:date('Y-m-d H:i:s');
        $this->end_date = $end_date ?:date('Y-m-d H:i:s');

        $conn = Database :: getInstance();
        $this->db = $conn->getConnection();

    }
    
    static public function show($db)
    {
        $query = " SELECT r.id_reservation, u.name , v.model, r.start_date, r.end_date, v.price , r.status
                   FROM reservation as r
                   INNER JOIN user as u on  r.id_user = u.id_user 
                   INNER JOIN vehicule as v on r.id_vehicule = v.id_vehicule
                   WHERE r.archive = '0'
                 ";

        $stmt = $db->prepare($query);
        $stmt-> execute();
        $result = $stmt->fetchall(PDO::FETCH_OBJ);
        return $result;
    }

    static public function add($newRes)
    {
        $query = " INSERT INTO reservation (id_user, id_vehicule, status, start_date, end_date)
                   VALUES (:id_user, :id_vehicule, :status, :start_date, :end_date)
                 ";

        $stmt = $newRes->db->prepare($query);
        $statusValue = $newRes->status->value;

        $stmt->bindParam(':id_user',$newRes->id_user);
        $stmt->bindParam(':id_vehicule',$newRes->id_vehicule);
        $stmt->bindParam(':status',$statusValue);
        $stmt->bindParam(':start_date',$newRes->start_date);
        $stmt->bindParam(':end_date',$newRes->end_date);

        $result = $stmt->execute();
        return $result;
    }

    /*
     the client can modify the informations of his reservations 
     by changing the vehicule he wants, the date , the address
    */

    function modify($modifiedRes)
    {
        $query = " UPDATE reservation
                   SET id_vehicule = :id_vehicule , start_date = :start_date, end_date = :end_date 
                   WHERE id_reservation = :id_reservation
                   AND id_user = :id_user
                 ";
        
        $stmt = $modifiedRes->db->prepare($query);

        $stmt->bindParam(':id_reservation',$modifiedRes->id_reservation, PDO::PARAM_INT);
        $stmt->bindParam(':id_vehicule',$modifiedRes->id_vehicule, PDO::PARAM_INT);
        $stmt->bindParam(':start_date',$modifiedRes->start_date, PDO::PARAM_STR);
        $stmt->bindParam(':end_date',$modifiedRes->end_date,PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $modifiedRes->id_user, PDO::PARAM_INT);
        
        $stmt->execute();
    }

    function changeVehicule($id_reservation, $newVehicule)
    {
        $query = " UPDATE reservation 
                   SET id_vehicule = :newVehicule
                   WHERE id_reservation = :id_reservation
                 ";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_reservation',$id_reservation);
        $stmt->bindParam(':newVehicule',$newVehicule,PDO::PARAM_STR);
        $stmt->execute();

    }

    /* the ADMIN can modify the reservation : 
        - by changing its status
        - by deleting it 
    since we adopted this approach of not deleting things 
    from the database that's delete = archive */

    function modifyStatus($id_reservation,$newStatus)
    {
        $query = " UPDATE reservation 
                   SET status = :status
                   WHERE id_reservation = :id_reservation
                 ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_reservation',$id_reservation,PDO::PARAM_INT);
        $stmt->bindParam(':status',$newStatus,PDO::PARAM_STR);
        $stmt->execute();
    }

    function delete($id_reservation)
    {
        $query = " UPDATE reservation
                   SET archive = '1'
                   WHERE id_reservation = :id_reservation
                 ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_reservation',$id_reservation,PDO::PARAM_INT);
        $stmt->execute();
    }

}

   
