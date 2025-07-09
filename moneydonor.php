<?php
session_start();
require_once "includes/db.php";

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $role = "Donor";

    if ($name && $phone) {
        $stmt = $conn->prepare("INSERT INTO money (`Your Name`, `iden`, `Phone Number`) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $name, $role, $phone);
        if ($stmt->execute()) {
            $success = "Donor registered successfully!";
        } else {
            $errors[] = "Failed to register.";
        }
    } else {
        $errors[] = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register as Donor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: rgba(187, 248, 187, 0.95);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-box {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
  </style>
</head>
<body>
<div class="register-box">
  <h3 class="text-center mb-4 text-success">Register as Donor</h3>

  <?php if (!empty($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
  <?php if (!empty($errors)) foreach ($errors as $error) echo "<div class='alert alert-danger'>$error</div>"; ?>

  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Your Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Phone Number</label>
      <input type="number" name="phone" class="form-control" required>
    </div>
    <input type="hidden" name="role" value="Donor">
    <button type="submit" class="btn btn-success w-100">Register</button>
    <p class="mt-3 text-center small">Already registered? <a href="donation_donor.php">Login here</a></p>
  </form>
</div>
</body>
</html>
