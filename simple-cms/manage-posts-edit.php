<?php require 'header.php'; ?>
<?php
$postId = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

$selectQuery = "SELECT * FROM posts WHERE id = :id";
$selectStatement = $db->prepare($selectQuery);
$selectStatement->execute(array(
  ":id" => $postId
));

$post = $selectStatement->fetch(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $id = $_POST['id'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $status = $_POST['status'];

  $updateQuery = "UPDATE posts SET title = :title, long_content = :long_content, status = :status WHERE id = :id";
  $updateStatement = $db->prepare($updateQuery);
  $updateStatement->execute(array(
    ":id" => $id,
    ":title" => $title,
    ":long_content" => $content,
    ":status" => $status
  ));
  header('Location: manage-posts.php');
  exit();
}
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h1">Edit Post</h1>
  </div>
  <div class="card mb-2 p-4">
    <form method="post">
      <input type="hidden" name="id" value="<?= $post['id'] ?>" />
      <div class="mb-3">
        <label for="post-title" class="form-label">Title</label>
        <input
          type="text"
          class="form-control"
          id="post-title"
          value="<?= $post['title'] ?>" name="title" />
      </div>
      <div class="mb-3">
        <label for="post-content" class="form-label">Content</label>
        <textarea class="form-control" id="post-content" rows="10" name="content"><?= $post['long_content'] ?></textarea>
      </div>
      <div class="mb-3">
        <label for="post-content" class="form-label">Status</label>
        <select class="form-control" id="post-status" name="status">
          <option value="0" <?= $post['status'] == 0 ? "selected" : ""; ?>>Pending for Review</option>
          <option value="1" <?= $post['status'] == 1 ? "selected" : ""; ?>>Publish</option>
        </select>
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
  <div class="text-center">
    <a href="manage-posts.php" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back to Posts</a>
  </div>
</div>

<?php require 'footer.php'; ?>