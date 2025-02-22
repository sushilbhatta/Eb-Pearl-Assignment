<?php
// models/PaymentFeature.php
require_once __DIR__ . '/../config/database.php';

class PaymentFeature {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllFeatures() {
        $stmt = $this->pdo->prepare("SELECT * FROM payment_features ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // add initial data to db
    public function addFeature($icon_path, $title, $description) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO payment_features (icon_path, title, description) VALUES (?, ?, ?)"
        );
        return $stmt->execute([$icon_path, $title, $description]);
    }
}