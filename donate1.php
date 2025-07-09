<?php
require_once "includes/db.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  echo "Invalid request.";
  exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM fundraisers WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
  echo "No fundraiser found.";
  exit;
}

$row = $result->fetch_assoc();
$percentage = ($row['goal_amount'] > 0) ? ($row['amount_raised'] / $row['goal_amount']) * 100 : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($row['name']) ?> | WasteNot</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to bottom right,rgba(118, 223, 127, 0.85),rgb(74, 90, 105));
      font-family: 'Segoe UI', sans-serif;
      color: #2e3b3f;
    }

    .ngo-container {
      max-width: 1000px;
      margin: 40px auto;
      background: white;
      padding: 35px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .section-box, .donation-box {
      background: #f7fdfc;
      border: 1px solid #d3e8e1;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .section-box:hover, .donation-box:hover {
      background-color: #fffde7;
      transform: scale(1.015);
    }

    .title-bold {
      font-size: 1.8rem;
      font-weight: 700;
      color: #1b5e20;
    }

    .img-thumbnail {
      width: 100%;
      max-height: 260px;
      object-fit: cover;
      border-radius: 10px;
      border: 1px solid #ccc;
    }

    .btn-donate {
      width: 100%;
      font-weight: 600;
      padding: 12px;
      border-radius: 8px;
      font-size: 15px;
    }

    .custom-donate-btn {
      background-color: #a5d6a7;
      border: none;
      color: #154734;
    }

    .custom-donate-btn:hover {
      background-color: #66bb6a;
      color: white;
    }

    .btn-secondary {
      background-color: #d7ccc8;
      color: #3e2723;
    }

    .btn-secondary:hover {
      background-color: #a1887f;
      color: white;
    }

    .progress {
      height: 10px;
      background-color: #e0e0e0;
      border-radius: 5px;
    }

    .progress-bar {
      background-color: #388e3c;
      border-radius: 5px;
    }

    h6 {
      color: #2e7d32;
      font-weight: 600;
    }

    p {
      margin-bottom: 0.6rem;
    }
  </style>
</head>
<body>

<div class="ngo-container">
  <div class="section-box">
    <div class="title-bold"><?= htmlspecialchars($row['name']) ?></div>
    <p><?= htmlspecialchars($row['description']) ?></p>
  </div>

  <div class="row">
    <div class="col-md-6 section-box">
      <h6>Photos or Videos</h6>
      <img src="<?= htmlspecialchars($row['image_url'] ?: 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6') ?>" class="img-thumbnail" alt="NGO Image">
    </div>
    <div class="col-md-6 section-box">
      <h6>News Update</h6>
      <p><?= htmlspecialchars($row['News_update'] ?: 'No updates available.') ?></p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 section-box">
      <h6>Description of Events</h6>
      <p><?= htmlspecialchars($row['description']) ?></p>
    </div>
    <div class="col-md-4">
      <div class="donation-box mb-3">
        <p><strong>₹<?= number_format($row['amount_raised'] ?: 0) ?></strong> raised of ₹<?= number_format($row['goal_amount']) ?> goal</p>
        <div class="progress">
          <div class="progress-bar" style="width: <?= min(100, $percentage) ?>%"></div>
        </div>
      </div>
      <a href="paymentdonate.php" class="btn btn-donate custom-donate-btn mb-2">Donate Now</a>
      <a href="donaton_donor.php" class="btn btn-donate btn-secondary">Go Back</a>
    </div>
  </div>
</div>

</body>
</html>
