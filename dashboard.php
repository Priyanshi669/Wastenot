<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit;
}

$name = $_SESSION["name"] ?? "User";
$role = $_SESSION["role"] ?? "Guest";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Food Waste Exchange</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .chart-container {
      width: 250px;
      height: 250px;
      margin: 0 auto;
    }
    canvas {
      width: 100% !important;
      height: 100% !important;
    }
  </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-white px-4 shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">🍱 Food Exchange</a>
    <div class="d-flex align-items-center">
      <span class="me-3">Hello, <?= htmlspecialchars($name) ?> (<?= ucfirst($role) ?>)</span>
      <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5 text-center">
  <h3>Welcome to your dashboard</h3>
  <p class="text-muted">Use the options below to manage food sharing.</p>

  <?php if ($role === 'Donor'): ?>
    <a href="post_food.php" class="btn btn-primary">Post Food</a>
  <?php else: ?>
    <a href="listings.php" class="btn btn-success">View Available Food</a>
  <?php endif; ?>
</div>

<div class="container mt-5">
  <h4 class="mb-3 text-center">📊 Impact Overview</h4>
  <div class="card shadow-sm p-4">
    <div class="chart-container">
      <canvas id="impactChart"></canvas>
    </div>
  </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
  <div>&copy; <?= date('Y') ?> Food Waste Exchange | Built with ❤️</div>
</footer>

<script>
  fetch("chart_data.php")
    .then(res => res.json())
    .then(data => {
      const ctx = document.getElementById('impactChart').getContext('2d');
      new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['Claimed', 'Unclaimed'],
          datasets: [{
            label: 'Meals',
            data: [data.claimed, data.unclaimed],
            backgroundColor: ['#2196f3', '#f44336'], 
            borderColor: ['#ffffff'],
            borderWidth: 1
          }]
        },
        options: {
          plugins: {
            legend: { position: 'bottom' },
            title: {
              display: true,
              text: 'Claimed vs Unclaimed Meals'
            }
          }
        }
      });
    });
</script>


</body>
</html>
