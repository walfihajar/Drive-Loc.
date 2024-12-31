<?php


class Login
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function login($email, $password)
    {
        $sql = "SELECT id_user, name, password, role FROM user WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['password'])) {
                
                session_regenerate_id();
                $_SESSION['login'] = true;
                $_SESSION['id'] = $user['id_user'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $user['role'];

                return "Login successful!";
            } else {
                return "Invalid password.";
            }
        } else {
            return "No user found with this email.";
        }
    }
}
