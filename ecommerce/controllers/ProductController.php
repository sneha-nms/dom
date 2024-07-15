<?php
require_once 'config/database.php';
require_once 'models/Product.php';

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function index() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?controller=user&action=login");
            exit();
        }

        $result = $this->product->readAll();
        include 'views/products.php';
    }

    public function show() {
        if (isset($_GET['id'])) {
            $this->product->id = $_GET['id'];
            $result = $this->product->readOne();
            $product = $result->fetch(PDO::FETCH_ASSOC);
            include 'views/product_detail.php';
        } else {
            header("Location: ?controller=product&action=index");
            exit();
        }
    }
}
?>
