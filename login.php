<?php
session_start();
require_once "includes/db.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_or_number = trim($_POST["email_or_number"]);
    $password = $_POST["password"];
    $role = $_POST["role"];

    $is_email = filter_var($email_or_number, FILTER_VALIDATE_EMAIL);

    $sql = $is_email
        ? "SELECT * FROM donorregistration WHERE E_mail = ? AND dorr = ?"
        : "SELECT * FROM donorregistration WHERE `Phone Number` = ? AND dorr = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email_or_number, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["Password"])) {
            $_SESSION["user_id"] = $user["Donor_id"];
            $_SESSION["name"] = $user["Name"];
            $_SESSION["role"] = $user["dorr"];
            header("Location: " . ($user["dorr"] === "Receiver" ? "listing.php" : "dashboard.php"));
            exit;
        } else {
            $errors[] = "Invalid password.";
        }
    } else {
        $errors[] = "No account found with those credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Food Waste Exchange</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
     
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    .form-control::placeholder {
      color: #aaa;
    }
  </style>
</head>
<body style="background-color: rgba(187, 248, 187, 0.95);">


<div class="login-box">
  <h3 class="text-center mb-4">Login to <span style="color: rgba(141, 87, 87, 0.95); font-weight: 600;"">Food Exchange</span></h3>

  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error) echo "<div>$error</div>"; ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label class="form-label"><i class="bi bi-person-fill"></i> Email or Phone Number</label>
      <input type="text" name="email_or_number" class="form-control" placeholder="Enter email or phone" required>
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="bi bi-lock-fill"></i> Password</label>
      <input type="password" name="password" class="form-control" placeholder="Enter password" required>
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="bi bi-person-badge-fill"></i> Login As</label>
      <select name="role" class="form-select" required>
        <option value="">-- Select Role --</option>
        <option value="Donor">Donor</option>
        <option value="Receiver">Receiver</option>
      </select>
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-success">Login</button>
      <a href="index.php" class="btn btn-outline-secondary">← Back to Home</a>
    </div>

    <p class="mt-3 text-center small">Don't have an account? <a href="register.php">Register here</a></p>
  </form>
</div>

</body>
</html>
