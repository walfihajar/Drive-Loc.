<?php
require_once('../../config.php');

class User 
{
    protected int $id_user;
    protected string $name;
    protected string $email;
    protected string $password;
    protected int $id_role; 
    protected $db; // Changed to protected to allow access in child classes

    public function __construct(int $id_user = 0, ?string $name = '', ?string $email = '', ?string $password = '', ?int $id_role = 0)
    {
        $this->id_user = $id_user;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->id_role = $id_role;

        // Initialize database connection
        $conn = Database::getInstance();
        $this->db = $conn->getConnection();
    }

    public function login(string $email, string $password): bool
    {
        // Ensure the session is started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $query = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user && password_verify($password, $user->password)) {
            // Set session variables
            $_SESSION['id_user'] = $user->id_user; // Store user ID in session
            $_SESSION['email'] = $user->email; // Store user email in session
            $_SESSION['id_role'] = $user->id_role; // Store user role in session

            return true; // Login successful
        }

        return false; // Login failed
    }

    public function logout(): void
    {
        // Ensure the session is started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Destroy the session
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }
}
