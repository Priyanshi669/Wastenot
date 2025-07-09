<?php
require_once "includes/db.php";

$sql = "SELECT * FROM fundraisers ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>NGO Fundraisers | WasteNot</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f9f9f9; }
    .ngo-card {
  background: white;
  border-radius: 12px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  padding: 20px;
  margin-bottom: 20px;
  display: flex;
  gap: 15px;
  align-items: flex-start;
  transition: transform 0.3s ease, background-color 0.3s ease;
}

.ngo-card:hover {
  background-color: #fff9c4;
  transform: scale(1.02); 
}

    .ngo-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 20px;
      margin-bottom: 20px;
      display: flex;
      gap: 15px;
      align-items: flex-start;
    }
    .ngo-img {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 8px;
      background: #eee;
    }
    .progress-bar { background-color: #28a745; }
    .topbar {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .logo-title { font-weight: bold; color: #198754; font-size: 1.4rem; }
    .donate-btn { padding: 6px 14px; font-size: 14px; }
  </style>
</head>
<body>

<nav class="navbar topbar p-3">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="logo-title">
      <img src="logo.png" alt="logo" style="height: 50px; vertical-align: middle;" class="me-2">
      WasteNot
    </div>
    <a href="my_donations.php" class="btn btn-success donate-btn">My Donations</a>
  </div>
</nav>

<div class="container mt-4">
  <h4 class="text-center mb-4">NGO Fundraisers</h4>

  <?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): 
      $percentage = ($row['goal_amount'] > 0) ? ($row['amount_raised'] / $row['goal_amount']) * 100 : 0;
    ?>
      <div class="ngo-card">
        <img src="<?= htmlspecialchars($row['image_url'] ?: 
        'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') ?>" class="ngo-img" alt="NGO Image">
        <div>
          <p class="mb-1 text-muted"><?= htmlspecialchars($row['name']) ?></p>
          <h6><?= htmlspecialchars($row['description']) ?></h6>
          <div class="progress mb-1" style="height: 6px;">
            <div class="progress-bar" style="width: <?= min(100, $percentage) ?>%"></div>
          </div>
          <p class="fw-bold small">₹<?= $row['amount_raised'] ?: 0 ?> raised of ₹<?= $row['goal_amount'] ?> goal</p>
          <a href="donate1.php?id=<?= $row['id'] ?>" class="btn btn-outline-success btn-sm mt-1">See more</a>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p class="text-center">No fundraisers found.</p>
  <?php endif; ?>
</div>

</body>
</html>
