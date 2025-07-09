<?php
require_once "includes/db.php";

$success = "";
$error = "";

if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['org_name']);
    $description = trim($_POST['event_desc']);
    $News_update = trim($_POST['news_update']);
    $amount_raised = !empty($_POST['raised_amount']) ? intval($_POST['raised_amount']) : 0;
    $goal_amount = !empty($_POST['goal_amount']) ? intval($_POST['goal_amount']) : 0;

    $imagePath = NULL;
    if (isset($_FILES['media']) && $_FILES['media']['error'] == 0) {
        $targetDir = "uploads/";
        $filename = basename($_FILES["media"]["name"]);
        $targetFile = $targetDir . time() . "_" . $filename;

        if (move_uploaded_file($_FILES["media"]["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;
        } else {
            $error = "Failed to upload image.";
        }
    }

    if (!$error) {
        $stmt = $conn->prepare("INSERT INTO fundraisers (name, description, News_update, image_url, amount_raised, goal_amount) VALUES (?, ?, ?,?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssssii", $name, $description, $News_update, $imagePath, $amount_raised, $goal_amount);
            if ($stmt->execute()) {
                $success = "Donation request posted successfully!";
            } else {
                $error = "Error saving to database.";
            }
        } else {
            $error = "Database error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Post a Request - WasteNot</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-light bg-white shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold text-success" href="#"><img src="logo.png" height="80" class="me-2">WasteNot</a>
    <a href="donation.php" class="btn btn-outline-danger">Logout</a>

  </div>
</nav>

<div class="container bg-white p-4 shadow-sm rounded">
  <h4 class="mb-3">Post a Donation Request</h4>

  <?php if (!empty($success)): ?>
    <div class="alert alert-success"><?= $success ?></div>
  <?php endif; ?>

  <?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Organization Name</label>
      <input type="text" name="org_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Photos or Videos (optional)</label>
      <input type="file" name="media" class="form-control">
    </div>
    
    <div class="mb-3">
      <label class="form-label">Description of Event</label>
      <textarea name="event_desc" class="form-control" rows="4"></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Progress of Event</label>
      <textarea name="news_update" class="form-control" rows="2"></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Goal Amount</label>
      <input type="number" name="raised_amount" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Money raised till Now</label>
      <input type="number" name="goal_amount" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Post Request</button>
  </form>
</div>

</body>
</html>
