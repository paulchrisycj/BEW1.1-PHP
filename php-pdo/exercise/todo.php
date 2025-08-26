<?php
require 'db_conn.php';

$query = "SELECT * FROM todos;";
$statement = $db->prepare($query);
$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);
// foreach($result as $todo){
//     echo "<h1>" . $todo['label'] . "</h1>";
// }

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $action = $_REQUEST['action'];

    if ($action == "add") {
        $label = $_REQUEST['label'];

        $insertQuery = "INSERT INTO todos (label) VALUES (:label)";
        $insertStatement = $db->prepare($insertQuery);
        $insertStatement->execute(
            array(
                "label" => $label
            )
        );
        // To load back the same page
        header('Location: ' . $_SERVER['PHP_SELF']);
    }

    if ($action == "update") {
        $id = $_REQUEST['id'];
        $completed = $_REQUEST["completed"];
        $flipCompleted = $completed == 0 ? 1 : 0;

        $updateQuery = "UPDATE todos SET completed = :completed WHERE id = :id";
        $updateStatement = $db->prepare($updateQuery);
        $updateStatement->execute(
            array(
                ":completed" => $flipCompleted,
                ":id" => $id
            )
        );
        header('Location: ' . $_SERVER['PHP_SELF']);
    }

    if ($action == "delete") {
        $id = $_REQUEST['id'];

        $deleteQuery = "DELETE FROM todos WHERE id = :id";
        $deleteStatement = $db->prepare($deleteQuery);
        $deleteStatement->execute(
            array(
                ":id" => $id
            )
        );
        header('Location: ' . $_SERVER['PHP_SELF']);
    }
}
?>
<div
    class="card rounded shadow-sm"
    style="max-width: 500px; margin: 30px auto;">
    <div class="card-body">
        <h3 class="card-title mb-3">My Todo List</h3>
        <ul class="list-group">
            <?php
            foreach ($result as $task) {
                if ($task['completed']) {
                    echo "<li
                                    class='list-group-item d-flex justify-content-between align-items-center'>
                                    <div>
                                        <form method='post' style='display: inline;'>
                                            <input type='hidden' name='action' value='update'>
                                            <input type='hidden' name='id' value='" . $task['id'] . "'>
                                            <input type='hidden' name='completed' value='" . $task['completed'] . "'>
                                            <button class='btn btn-sm btn-success' type='submit'>
                                                <i class='bi bi-check-square'></i>
                                            </button>
                                        </form>
                                        <span class='ms-2 text-decoration-line-through'>" . $task['label'] . "</span>
                                    </div>
                                    <div>
                                        <form method='POST'>
                                            <input type='hidden' name='action' value='delete'>
                                            <input type='hidden' name='id' value='" . $task['id'] . "'>
                                            <button class='btn btn-sm btn-danger'>
                                                <i class='bi bi-trash'></i>
                                            </button>
                                        </form>
                                    </div>
                                </li>";
                } else {
                    echo "<li
                                    class='list-group-item d-flex justify-content-between align-items-center'>
                                    <div>
                                        <form method='post' style='display: inline;'>
                                            <input type='hidden' name='action' value='update'>
                                            <input type='hidden' name='id' value='" . $task['id'] . "'>
                                            <input type='hidden' name='completed' value='" . $task['completed'] . "'>
                                            <button class='btn btn-sm btn-light' type='submit'>
                                                <i class='bi bi-square'></i>
                                            </button>
                                        </form>
                                        <span class='ms-2'>" . $task['label'] . "</span>
                                    </div>
                                    <div>
                                        <form method='POST'>
                                            <input type='hidden' name='action' value='delete'>
                                            <input type='hidden' name='id' value='" . $task['id'] . "'>
                                            <button class='btn btn-sm btn-danger'>
                                                <i class='bi bi-trash'></i>
                                            </button>
                                        </form>
                                    </div>
                                </li>";
                }
            }
            ?>

        </ul>
        <div class="mt-4">
            <form class="d-flex justify-content-between align-items-center" method="POST">
                <input type="hidden" name="action" value="add">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Add new item..."
                    name="label"
                    required />
                <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <a href="logout.php" class="text-center w-100">Logout</a>
        </div>
    </div>
</div>


<?php require 'footer.php' ?>