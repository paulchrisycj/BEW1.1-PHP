<?php require 'header.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];

  $selectQuery = "SELECT * FROM users WHERE email = :email";
  $selectStatement = $db->prepare($selectQuery);
  $selectStatement->execute(array(
    ":email" => $email
  ));

  $result = $selectStatement->fetch(PDO::FETCH_ASSOC);
  if(!$result){
    print_r($result);
    header('Location: login.php');
    exit();
  }

  if($result['password'] == $password){
    $_SESSION['email'] = $email;
    //Do This
    $_SESSION['user_id'] = $result['id'];
    $_SESSION['role'] = $result['role'];
    //Access it like this
    // $user_id = $_SESSION['user_id'];
    // $role = $_SESSION['role'];

    //Or This
    // $_SESSION['user'] = array(
    //   "id"=>$result['id'],
    //   "role"=>$result['role']
    // );
    //Access it like this
    // $user_id = $_SESSION['user']['id'];
    // $role = $_SESSION['user']['role'];
    header("Location: dashboard.php");
  }
}

?>

<div class="container my-5 mx-auto" style="max-width: 500px;">
  <h1 class="h1 mb-4 text-center">Login</h1>

  <div class="card p-4">
    <form method="POST" action="login.php">
      <div class="mb-2">
        <label for="email" class="visually-hidden">Email</label>
        <input
          type="text"
          class="form-control"
          id="email"
          name="email"
          placeholder="email@example.com" />
      </div>
      <div class="mb-2">
        <label for="password" class="visually-hidden">Password</label>
        <input
          type="password"
          class="form-control"
          id="password"
          name="password"
          placeholder="Password" />
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>

  <!-- links -->
  <div
    class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-3">
    <a href="index.php" class="text-decoration-none small"><i class="bi bi-arrow-left-circle"></i> Go back</a>
    <a href="signup.php" class="text-decoration-none small">Don't have an account? Sign up here
      <i class="bi bi-arrow-right-circle"></i></a>
  </div>
</div>
<?php require 'footer.php'; ?>