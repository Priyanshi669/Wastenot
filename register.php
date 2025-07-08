<?php
session_start();
require_once "includes/db.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $role = $_POST["dorr"]; // 'Donor' or 'Receiver'
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:rgb(197, 247, 213);">
  <div class="container mt-5">
    <h2 class="mb-4">Create an Account</h2>

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error) echo "<div>$error</div>"; ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="register.php" class="bg-white p-4 rounded shadow-sm">
      <div class="mb-3">
        <label>Your Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Register As</label>
        <select name="dorr" class="form-select" required>
          <option value="">Select Role</option>
          <option value="Donor">Donor</option>
          <option value="Receiver">Receiver</option>
        </select>
      </div>

      <div class="mb-3">
        <label>Phone Number</label>
        <input type="text" name="phone" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Email Address</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Register</button>
      <p class="mt-3 small">Already have an account? <a href="login.php">Login here</a></p>
    </form>
  </div>
</body>
</html>
