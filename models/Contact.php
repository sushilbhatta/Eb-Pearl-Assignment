<?php
// models/Contact.php
require_once __DIR__ . '/../config/database.php';

class Contact {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function saveContact($name, $email, $message) {
        $stmt = $this->pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $message]);
    }
}