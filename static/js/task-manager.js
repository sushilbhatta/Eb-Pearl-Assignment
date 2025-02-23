// Function to update delete button visibility
function updateDeleteButton() {
  const taskList = document.getElementById("task-list");
  const taskItems = taskList.querySelectorAll(".task-list__item");
  let deleteButton = taskList.querySelector(".task-list__delete");

  if (taskItems.length === 0) {
    // Remove delete button if no tasks exist
    if (deleteButton) {
      deleteButton.remove();
    }
  } else {
    // Add delete button if tasks exist and it’s not already present
    if (!deleteButton) {
      deleteButton = document.createElement("button");
      deleteButton.className = "task-list__delete";
      deleteButton.innerHTML =
        '<i class="fa-solid fa-x fa-sm"></i><span>Delete</span>';
      deleteButton.onclick = deleteCheckedTasks;
      taskList.appendChild(deleteButton);
    }
  }
}

// Modified addTask function
async function addTask(event) {
  event.preventDefault();
  const title = document.getElementById("task-title").value;
  console.log("Sending title:", title);

  try {
    const response = await fetch("controllers/task-ajax.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `action=add&title=${encodeURIComponent(title)}`,
    });
    const data = await response.json();
    console.log("Parsed data:", data);

    if (data.success) {
      const task = data.task;
      const taskList = document.getElementById("task-list");
      const li = document.createElement("li");
      li.className = "task-list__item";
      li.dataset.id = task.id;
      li.draggable = true;
      li.innerHTML = `
              <div class="task-list__checkbox-wrapper">
                  <input type="checkbox" class="task-list__checkbox" id="task-${
                    task.id
                  }" 
                      ${task.completed ? "checked" : ""} onchange="toggleTask(${
        task.id
      })">
                  <label for="task-${task.id}" class="task-list__text">${
        task.title
      }</label>
              </div>
          `;
      li.addEventListener("dragstart", handleDragStart);
      li.addEventListener("dragover", handleDragOver);
      li.addEventListener("drop", handleDrop);
      li.addEventListener("dragend", handleDragEnd);
      taskList.insertBefore(li, taskList.firstChild);

      // Update delete button visibility after adding a task
      updateDeleteButton();
    } else {
      alert(data.error || "Failed to add task");
    }
  } catch (error) {
    console.error("Fetch error:", error);
    alert("Error adding task: " + error.message);
  }

  document.getElementById("task-form").reset();
}

// Modified deleteCheckedTasks function
async function deleteCheckedTasks() {
  const checkedTasks = document.querySelectorAll(
    ".task-list__checkbox:checked"
  );
  const taskList = document.getElementById("task-list");

  if (checkedTasks.length === 0) {
    alert("No tasks selected to delete");
    return;
  }

  if (confirm("Are you sure you want to delete all selected tasks?")) {
    const taskIds = Array.from(checkedTasks).map(
      (checkbox) => checkbox.closest(".task-list__item").dataset.id
    );

    try {
      const response = await fetch("controllers/task-ajax.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `action=delete_bulk&ids=${encodeURIComponent(
          JSON.stringify(taskIds)
        )}`,
      });
      const data = await response.json();
      if (data.success) {
        checkedTasks.forEach((checkbox) => {
          const li = checkbox.closest(".task-list__item");
          li.remove();
        });

        // Update delete button visibility after deletion
        updateDeleteButton();
      } else {
        alert(data.error || "Failed to delete tasks");
      }
    } catch (error) {
      console.error("Fetch error:", error);
      alert("Error deleting tasks: " + error.message);
    }
  }
}

// Toggle task function (unchanged)
async function toggleTask(id) {
  try {
    const response = await fetch("controllers/task-ajax.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `action=toggle&id=${id}`,
    });
    const data = await response.json();
    if (!data.success) {
      alert("Failed to toggle task");
    }
  } catch (error) {
    console.error("Fetch error:", error);
    alert("Error toggling task: " + error.message);
  }
}

// Drag-and-Drop Functions (unchanged)
let draggedItem = null;
function handleDragStart(event) {
  draggedItem = event.target.closest(".task-list__item");
  event.dataTransfer.effectAllowed = "move";
  setTimeout(() => draggedItem.classList.add("dragging"), 0);
}

function handleDragOver(event) {
  event.preventDefault();
  event.dataTransfer.dropEffect = "move";
}

function handleDrop(event) {
  event.preventDefault();
  const dropTarget = event.target.closest(".task-list__item");
  if (dropTarget && draggedItem !== dropTarget) {
    const taskList = document.getElementById("task-list");
    const allItems = Array.from(taskList.querySelectorAll(".task-list__item"));
    const draggedIndex = allItems.indexOf(draggedItem);
    const targetIndex = allItems.indexOf(dropTarget);

    if (draggedIndex < targetIndex) {
      dropTarget.after(draggedItem);
    } else {
      dropTarget.before(draggedItem);
    }
  }
}

async function handleDragEnd(event) {
  draggedItem.classList.remove("dragging");
  draggedItem = null;

  const taskList = document.getElementById("task-list");
  const order = {};
  taskList.querySelectorAll(".task-list__item").forEach((item, index) => {
    order[index] = item.dataset.id;
  });

  try {
    const response = await fetch("controllers/task-ajax.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `action=reorder&order=${encodeURIComponent(JSON.stringify(order))}`,
    });
    const data = await response.json();
    if (!data.success) {
      alert("Failed to update task order");
    }
  } catch (error) {
    console.error("Fetch error:", error);
    alert("Error updating task order: " + error.message);
  }
}

// Initialize on page load
document.addEventListener("DOMContentLoaded", () => {
  const taskItems = document.querySelectorAll(".task-list__item");
  taskItems.forEach((item) => {
    item.draggable = true;
    item.addEventListener("dragstart", handleDragStart);
    item.addEventListener("dragover", handleDragOver);
    item.addEventListener("drop", handleDrop);
    item.addEventListener("dragend", handleDragEnd);
  });

  // Set initial delete button state
  updateDeleteButton();
});
