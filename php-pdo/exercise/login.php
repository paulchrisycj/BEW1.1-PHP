<?php
require 'header.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    try {
        require 'db_conn.php';

        // This is the code for retrieving username from DB
        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $db->prepare($query);
        $statement->execute(array(
            ':email' => $email
        ));

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        print_r($result);
        // This is the code for retrieving username from DB

        //This is to check if password matches the user's password
        if ($password == $result["password"]) {
            $_SESSION["email"] = $email;
            header("Location: index.php");
            exit();
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div
                class="card rounded shadow-sm"
                style="max-width: 500px; margin: 60px auto;">
                <div class="card-body">
                    <h3 class="card-title mb-3 text-center">Login To Your Account</h3>
                    <form method="post">
                        Email address <br>
                        <input class="form-control" type="email" name="email" id="email"><br>
                        Password <br>
                        <input class="form-control" type="password" name="password" id="password"><br>
                        <button type="submit" class="btn btn-primary form-control">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>