<?php
class Cart {
    private $conn;
    private $table_name = "cart";

    public $id;
    public $user_id;
    public $product_id;
    public $quantity;
    public $image;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addToCart() {
        $query = "INSERT INTO " . $this->table_name . " SET user_id=:user_id, product_id=:product_id, quantity=:quantity";

        $stmt = $this->conn->prepare($query);

        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));

        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":quantity", $this->quantity);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function readCart() {
        $query = "
            SELECT products.id, products.name, products.price, cart.quantity, products.image
            FROM " . $this->table_name . "
            JOIN products ON cart.product_id = products.id
            WHERE cart.user_id = :user_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->execute();

        return $stmt;
    }

    public function removeFromCart() {
        $query = "DELETE FROM " . $this->table_name . " WHERE user_id = :user_id AND product_id = :product_id";

        $stmt = $this->conn->prepare($query);

        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));

        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":product_id", $this->product_id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
