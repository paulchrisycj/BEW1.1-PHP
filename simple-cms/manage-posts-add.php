<?php require 'header.php'; ?>
<?php require 'check_user.php'; ?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $title = $_POST['title'];
  $short_content = $_POST['short_content'];
  $long_content = $_POST['long_content'];
  $status = $_POST['status'];
  $post_by = $_SESSION['user_id'];

  $insertQuery = "INSERT INTO posts (title, short_content, long_content, status, post_by) VALUES (:title, :short_content, :long_content, :status, :post_by)";
  $insertStatement = $db->prepare($insertQuery);
  $insertStatement->execute(array(
    ":title" => $title,
    ":short_content" => $short_content,
    ":long_content" => $long_content,
    ":status" => $status,
    ":post_by" => $post_by
  ));
  header('Location: manage-posts.php');
  exit();
}
?>
<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h1">Add New Post</h1>
  </div>
  <div class="card mb-2 p-4">
    <form method='post'>
      <div class="mb-3">
        <label for="post-title" class="form-label">Title</label>
        <input type="text" class="form-control" id="post-title" name="title"/>
      </div>
      <div class="mb-3">
        <label for="post-content" class="form-label">Short Content</label>
        <input type="text" class="form-control" name="short_content" name="short_content">
      </div>
      <div class="mb-3">
        <label for="post-content" class="form-label">Content</label>
        <textarea
          class="form-control"
          id="post-content"
          name="long_content"
          rows="10"></textarea>
      </div>
      <input type="hidden" name="status" value="0">
      <div class="text-end">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
  <div class="text-center">
    <a href="manage-posts.php" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back to Posts</a>
  </div>
</div>

<?php require 'footer.php'; ?>