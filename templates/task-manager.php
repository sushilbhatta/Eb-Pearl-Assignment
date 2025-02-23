<?php
// templates/task-manager.php
// $tasks is passed from index.php
?>
<section id="task-manager">
    <header class="task-manager__header">
        <h1 class="task-manager__title">Task Manager</h1>
        <p class="task-manager__subtitle">Your daily to do list</p>
    </header>

    <section class="task-card">
        <ul class="task-list" id="task-list">
            <?php foreach ($tasks as $task): ?>
            <li class="task-list__item" data-id="<?php echo $task['id']; ?>">
                <div class="task-list__checkbox-wrapper">
                    <input type="checkbox" class="task-list__checkbox" id="task-<?php echo $task['id']; ?>"
                        <?php echo $task['completed'] ? 'checked' : ''; ?>
                        onchange="toggleTask(<?php echo $task['id']; ?>)">
                    <label for="task-<?php echo $task['id']; ?>"
                        class="task-list__text"><?php echo htmlspecialchars($task['title']); ?></label>
                </div>
            </li>
            <?php endforeach; ?>
            <?php if (!empty($tasks)): ?>
            <button class="task-list__delete" onclick="deleteCheckedTasks()">
                <i class="fa-solid fa-x fa-sm"></i>
                <span>Delete</span>
            </button>
            <?php endif; ?>
        </ul>
        <!-- task add button -->
        <form class="task-form" id="task-form" onsubmit="addTask(event)">
            <input type="text" class="task-form__input" id="task-title" placeholder="Add new task" required>
            <button type="submit" class="btn task-form__button">Add Task</button>
        </form>
    </section>
</section>