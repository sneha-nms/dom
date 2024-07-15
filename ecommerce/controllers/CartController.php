<?php
require_once 'config/database.php';
require_once 'models/Cart.php';

class CartController {
    private $db;
    private $cart;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->cart = new Cart($this->db);
    }

    public function add() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?controller=user&action=login");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
            $this->cart->user_id = $_SESSION['user_id'];
            $this->cart->product_id = htmlspecialchars($_POST['product_id']); // Prevent XSS
            $this->cart->quantity = 1; // Default quantity

            if ($this->cart->addToCart()) {
                header("Location: ?controller=product&action=index&message=Product+added+to+cart");
                exit();
            } else {
                echo "Failed to add product to cart.";
            }
        } else {
            header("Location: ?controller=product&action=index");
            exit();
        }
    }

    public function view() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?controller=user&action=login");
            exit();
        }

        $this->cart->user_id = $_SESSION['user_id'];
        $result = $this->cart->readCart();
        include 'views/cart.php';
    }

    public function remove() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?controller=user&action=login");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
            $this->cart->user_id = $_SESSION['user_id'];
            $this->cart->product_id = htmlspecialchars($_POST['product_id']); // Prevent XSS

            if ($this->cart->removeFromCart()) {
                header("Location: ?controller=cart&action=view&message=Product+removed+from+cart");
                exit();
            } else {
                echo "Failed to remove product from cart.";
            }
        } else {
            header("Location: ?controller=cart&action=view");
            exit();
        }
    }
}
?>
