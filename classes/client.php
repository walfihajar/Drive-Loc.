<?php
require_once('../../config.php');
require_once('user.php');

class Client extends User 
{
    public function __construct(int $id_user = 0, ?string $name = '', ?string $email = '', ?string $password = '')
    {
        // Call parent constructor to initialize common properties
        parent::__construct($id_user, $name, $email, $password, 2); // id_role = 2 for clients
    }

    public function register(string $name, string $email, string $password): string
    {
        // Check if email is already registered
        $query = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_OBJ)) {
            return "Email is already registered."; // Email exists
        }

        // Hash the password for secure storage
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new client into the database
        $query = "INSERT INTO user (name, email, password, id_role) VALUES (:name, :email, :password, :id_role)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':id_role', $this->id_role, PDO::PARAM_INT); // id_role = 2 for clients

        if ($stmt->execute()) {
            return "Registration successful!";
        }

        return "Registration failed. Please try again.";
    }
}

