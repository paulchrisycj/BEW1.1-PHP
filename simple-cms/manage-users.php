<?php require 'header.php'; ?>
<?php require 'check_user.php'; ?>
<?php 

if(isUser()){
  header('Location: dashboard.php');
  exit();
}

$selectQuery = "SELECT * FROM users";
$result = $db->prepare($selectQuery);
$result->execute();
$users = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h1">Manage Users</h1>
    <div class="text-end">
      <a href="manage-users-add.php" class="btn btn-primary btn-sm">Add New User</a>
    </div>
  </div>
  <div class="card mb-2 p-4">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col" class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user): ?>
          <tr>
            <th scope="row"><?php echo $user['id']; ?></th>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <?php 
              $spanHTML = '<span class="badge bg-warning">User</span>';
              if(strtolower($user['role']) == 'user'){
                $spanHTML = '<span class="badge bg-info">Editor</span>';
              }else if(strtolower($user['role']) == "admin"){
                $spanHTML = '<span class="badge bg-success">Admin</span>';
              }
            ?>
            <td><?= $spanHTML; ?></td>
            <td class="text-end">
              <div class="buttons">
                <a href="manage-users-edit.php?id=<?php echo $user['id']; ?>" class="btn btn-success btn-sm me-2"><i class="bi bi-pencil"></i></a>
                <a href="manage-users-changepwd.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm me-2"><i class="bi bi-key"></i></a>
                <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="text-center">
    <a href="dashboard.php" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back to Dashboard</a>
  </div>
</div>

<?php require 'footer.php'; ?>