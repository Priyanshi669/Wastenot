<?php
session_start();
require_once "includes/db.php"; // DB connection

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $role = $_POST["role"];

    $sql = "SELECT * FROM money WHERE `Your Name` = ? AND `Phone Number` = ? AND `iden` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $name, $phone, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION["user_name"] = $user["Your Name"];
        $_SESSION["phone"] = $user["Phone Number"];
        $_SESSION["role"] = $user["iden"];

        
        
    if ($role === "Donor") {
        header("Location: donaton_donor.php");
        exit;
    } else {
        header("Location: donation_receiver.php");
        exit;
    } }
    else {
        $errors[] = "Invalid credentials. Please check your details.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Money Support</title>
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
    .login-box {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h3 class="text-center mb-4">Login to <span style="color: #3c763d;">Money Support</span></h3>

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error) echo "<div>$error</div>"; ?>
      </div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label"><i class="bi bi-person-fill"></i> Your Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label"><i class="bi bi-phone-fill"></i> Phone Number</label>
        <input type="text" name="phone" class="form-control" required>
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
        <button type="submit" class="btn btn-success" >Login</button>
        <a href="moneydonor.php" class="btn btn-outline-secondary">Register as Donor</a>
        <a href="moneyreceiver.php" class="btn btn-outline-secondary">Register as Receiver</a>
      </div>
    </form>
  </div>
</body>
</html>
