<?php
session_start();
require_once "includes/db.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $role = $_POST["dorr"];
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    } else {
        $stmt = $conn->prepare("SELECT Donor_id FROM donorregistration WHERE E_mail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Email is already registered.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO donorregistration (Name, dorr, `Phone Number`, E_mail, Password, `Confirm password`) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $name, $role, $phone, $email, $hashed, $hashed);

            if ($stmt->execute()) {
                $_SESSION["name"] = $name;
                $_SESSION["role"] = $role;
                header("Location: login.php");
                exit;
            } else {
                $errors[] = "Registration failed. Try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Food Waste Exchange</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  body {
    background-color: rgba(197, 247, 213, 0.95);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 60px 15px;
    min-height: 100vh;
  }

  .register-box {
    background: rgba(255, 255, 255, 0.95);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 500px;
    margin: auto;

    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  }

  .register-box:hover {
    transform: scale(1.03);
    box-shadow: 0 0 40px rgba(0, 128, 0, 0.3);
  }

  .form-control::placeholder {
    color: #aaa;
  }
</style>

</head>
<body style="background-color: rgba(187, 248, 187, 0.95);">
<div class="d-flex justify-content-center align-items-start">
<div class="register-box">
  <h3 class="text-center mb-4">Create an Account on <span style="color: rgba(141, 87, 87, 0.95); font-weight: 600;">Food Exchange</span></h3>

  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error) echo "<div>$error</div>"; ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label class="form-label"><i class="bi bi-person-fill"></i> Your Name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="bi bi-person-badge-fill"></i> Register As</label>
      <select name="dorr" class="form-select" required>
        <option value="">-- Select Role --</option>
        <option value="Donor">Donor</option>
        <option value="Receiver">Receiver</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="bi bi-telephone-fill"></i> Phone Number</label>
      <input type="text" name="phone" class="form-control" placeholder="Enter phone number" required>
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="bi bi-envelope-fill"></i> Email Address</label>
      <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="bi bi-lock-fill"></i> Password</label>
      <input type="password" name="password" class="form-control" placeholder="Create password" required>
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="bi bi-lock-fill"></i> Confirm Password</label>
      <input type="password" name="confirm_password" class="form-control" placeholder="Repeat password" required>
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary" style="background-color: rgb(24, 105, 51)">Register</button>
      <a href="index.php" class="btn btn-outline-secondary">← Back to Home</a>
    </div>

    <p class="mt-3 text-center small">Already have an account? <a href="login.php">Login here</a></p>
  </form>
</div>
</div>
</body>
</html>
