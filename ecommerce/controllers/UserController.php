<?php
require_once 'config/database.php';
require_once 'models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function signup() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->user->username = $_POST['username'];
            $this->user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->user->email = $_POST['email'];

            if ($this->user->signup()) {
                echo "Signup successful. <a href='?controller=user&action=login'>Login</a>";
            } else {
                echo "Signup failed.";
            }
        }

        include 'views/signup.php';
    }

    public function login() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->user->username = $_POST['username'];
            $this->user->password = $_POST['password'];

            if ($this->user->login()) {
                $_SESSION['user_id'] = $this->user->id;
                header("Location: ?controller=product&action=index");
                exit();
            } else {
                echo "Login failed.";
            }
        }

        include 'views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ?controller=user&action=login");
    }
}
?>
