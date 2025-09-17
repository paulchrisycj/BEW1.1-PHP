<?php require 'header.php'; ?>
<?php

$role = $_SESSION['role'];

$selectQuery = "SELECT * FROM posts";

if(isUser()){
  $selectQuery = "SELECT posts.*, users.name AS post_by_name FROM posts LEFT JOIN users ON posts.post_by = users.id WHERE posts.post_by = :id";
  $result = $db->prepare($selectQuery);
  $result->execute(array(
    ":id" => $_SESSION['user_id']
  ));
}else if(isEditor()){
  $selectQuery = "SELECT posts.*, users.name AS post_by_name FROM posts LEFT JOIN users ON posts.post_by = users.id WHERE users.role <> 'Admin'";
  $result = $db->prepare($selectQuery);
  $result->execute();
}else{
  $result = $db->prepare($selectQuery);
  $result->execute();
}
$posts = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h1">Manage Posts</h1>
    <div class="text-end">
      <a href="manage-posts-add.php" class="btn btn-primary btn-sm">Add New Post</a>
    </div>
  </div>
  <div class="card mb-2 p-3">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col" style="width: 40%;">Title</th>
          <th scope="col">Status</th>
          <th scope="col">Post By</th>
          <th scope="col" class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($posts as $post): ?>
        <tr>
          <th scope="row"><?= $post['id']; ?></th>
          <td><?= $post['title']; ?></td>
          <td><?= $post['status'] == 0 ? '<span class="badge bg-warning">Pending Review</span>' : '<span class="badge bg-success">Publish</span>' ?></td>
          <td><?= $post['post_by_name']; ?></td>
          <td class="text-end">
            <div class="buttons">
              <a
                href="post.php?id=<?= $post['id'] ?>"
                target="_blank"
                class="btn btn-primary btn-sm me-2 <?= $post['status'] == 0 ? "disabled" : ""; ?>"><i class="bi bi-eye"></i></a>
              <a
                href="manage-posts-edit.php?id=<?= $post['id'] ?>"
                class="btn btn-secondary btn-sm me-2"><i class="bi bi-pencil"></i></a>
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