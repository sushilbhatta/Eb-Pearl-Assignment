<?php
// controllers/task-ajax.php
require_once __DIR__ . '/../models/Task.php';

ob_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    ob_end_flush();
    exit;
}

$taskModel = new Task();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add':
            $title = trim($_POST['title'] ?? '');
            if (!empty($title)) {
                try {
                    $taskModel->addTask($title);
                    $tasks = $taskModel->getAllTasks();
                    $newTask = end($tasks);
                    if (!$newTask) {
                        throw new Exception('Failed to retrieve new task');
                    }
                    echo json_encode(['success' => true, 'task' => $newTask]);
                } catch (Exception $e) {
                    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Title is required']);
            }
            break;

        case 'toggle':
            $id = $_POST['id'] ?? 0;
            try {
                $taskModel->toggleTask($id);
                echo json_encode(['success' => true]);
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'error' => 'Toggle error: ' . $e->getMessage()]);
            }
            break;

        case 'delete_bulk':
            $ids = json_decode($_POST['ids'] ?? '[]', true);
            if (empty($ids)) {
                echo json_encode(['success' => false, 'error' => 'No tasks selected']);
            } else {
                try {
                    foreach ($ids as $id) {
                        $taskModel->deleteTask($id);
                    }
                    echo json_encode(['success' => true]);
                } catch (Exception $e) {
                    echo json_encode(['success' => false, 'error' => 'Bulk delete error: ' . $e->getMessage()]);
                }
            }
            break;

        case 'reorder':
            $order = json_decode($_POST['order'] ?? '[]', true);
            try {
                $taskModel->updateTaskOrder($order);
                echo json_encode(['success' => true]);
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'error' => 'Reorder error: ' . $e->getMessage()]);
            }
            break;

        default:
            echo json_encode(['success' => false, 'error' => 'Invalid action']);
            break;
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No action specified']);
}

ob_end_flush();
exit;