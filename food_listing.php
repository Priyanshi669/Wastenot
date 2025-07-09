<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

require_once "includes/auth_check.php"; // Session check
require_once "includes/db.php"; // DB connection

$success = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_name = trim($_POST["food_name"]);
    $quantity = trim($_POST["quantity"]);
    $location = trim($_POST["location"]);
    $contact = trim($_POST["contact"]);
    $expiry = $_POST["expiry"];

    if ($food_name && $quantity && $location && $contact && $expiry) {
        $stmt = $conn->prepare("INSERT INTO foodentry (food_name, quantity, location, contact, expiry) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $food_name, $quantity, $location, $contact, $expiry);

        if ($stmt->execute()) {
            $success = "Food entry created successfully!";
        } else {
            $errors[] = "Something went wrong. Try again.";
        }

        $stmt->close();
    } else {
        $errors[] = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Post Food - Food Waste Exchange</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="p-4 bg-white rounded shadow-sm">
      <h2 class="mb-4">Post Food Details</h2>

      <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
      <?php endif; ?>

      <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
          <?php foreach ($errors as $error) echo "<div>$error</div>"; ?>
        </div>
      <?php endif; ?>

      <!-- ✅ YOUR TASK: Frontend form -->
      <form method="POST" action="post_food.php">
        <div class="mb-3">
          <label>Food Name</label>
          <input type="text" name="food_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Quantity (e.g., 5 boxes, 10 plates)</label>
          <input type="text" name="quantity" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Pickup Location</label>
          <input type="text" name="location" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Contact Number</label>
          <input type="text" name="contact" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Best Before (Date/Time)</label>
          <input type="datetime-local" name="expiry" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Post Food</button>
        <a href="dashboard.php" class="btn btn-secondary ms-2">Back to Dashboard</a>
      </form>
    </div>
  </div>
</body>
</html>
