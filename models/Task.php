<?php
// models/Task.php
require_once __DIR__ . '/../config/database.php';

class Task {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllTasks() {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks ORDER BY position ASC, created_at ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($title) {
        try {
            // Step 1: Get the maximum position
            $stmt = $this->pdo->prepare("SELECT IFNULL(MAX(position), 0) FROM tasks");
            $stmt->execute();
            $maxPosition = $stmt->fetchColumn();
            $newPosition = $maxPosition + 1;

            // Step 2: Insert the new task with the calculated position
            $stmt = $this->pdo->prepare("INSERT INTO tasks (title, position) VALUES (?, ?)");
            $result = $stmt->execute([$title, $newPosition]);
            if (!$result) {
                throw new Exception('Failed to insert task');
            }
            return $result;
        } catch (PDOException $e) {
            error_log("Add Task Error: " . $e->getMessage());
            throw $e;
        }
    }

    public function toggleTask($id) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET completed = NOT completed WHERE id = ?");
        $result = $stmt->execute([$id]);
        if (!$result) {
            throw new Exception('Failed to toggle task');
        }
        return $result;
    }

    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ?");
        $result = $stmt->execute([$id]);
        if (!$result) {
            throw new Exception('Failed to delete task');
        }
        return $result;
    }

    public function updateTaskOrder($taskOrder) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET position = ? WHERE id = ?");
        foreach ($taskOrder as $position => $id) {
            $result = $stmt->execute([$position, $id]);
            if (!$result) {
                throw new Exception('Failed to update task order');
            }
        }
    }
}