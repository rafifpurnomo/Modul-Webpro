$(document).ready(function () {
  $("#show-tasks").click(function () {
    loadTasks();
  });
});

function loadTasks() {
  $.getJSON("js/tasks.json", function (data) {
    if (data && data.tasks) {
      displayTasks(data.tasks);
    } else {
      alert("No tasks found in the JSON file.");
    }
  }).fail(function () {
    alert("Failed to load the tasks. Please check the file path.");
  });
}

function displayTasks(tasks) {
  var taskList = $("#task-list");
  taskList.empty();

  tasks.forEach(function (task) {
    var row = $("<tr></tr>");
    var textCell = $("<td></td>").text(task.text);

    var completedCell = $("<td></td>")
      .text(task.completed ? "Completed" : "Not Completed")
      .addClass(task.completed ? "completed" : "not-completed");

    row.append(textCell);
    row.append(completedCell);
    taskList.append(row);
  });
}
