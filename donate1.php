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
    background-color: #f3f3f3;
    font-family: 'Segoe UI', sans-serif;
  }

  .ngo-container {
    max-width: 1000px;
    margin: 30px auto;
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  }

  .section-box, .donation-box {
    background: #f9f9f9;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 20px;
    transition: transform 0.3s ease, background-color 0.3s ease;
  }

  .section-box:hover, .donation-box:hover {
    background-color: #fff9c4; /* light yellow */
    transform: scale(1.02);
  }

  .title-bold {
    font-weight: bold;
    font-size: 1.5rem;
    color: #333;
  }

  .btn-donate {
    width: 100%;
  }

  .img-thumbnail {
    width: 100%;
    max-height: 250px;
    object-fit: cover;
    border-radius: 8px;
  }
</style>
</head>
<body style="background-color:#fff9c4;">

<div class="ngo-container">
  <div class="section-box">
    <div class="title-bold"><?= htmlspecialchars($row['name']) ?></div>
    <p><?= htmlspecialchars($row['description']) ?></p>
  </div>

  <div class="row">
    <div class="col-md-6 section-box">
      <h6>Photos or Videos</h6>
      <img src="<?= htmlspecialchars($row['image_url'] ?:
       'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') ?>" class="img-thumbnail" alt="NGO">
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
        <p><strong>₹<?= $row['amount_raised'] ?: 0 ?></strong> raised of ₹<?= $row['goal_amount'] ?> goal</p>
        <div class="progress" style="height: 6px;">
          <div class="progress-bar bg-success" style="width: <?= min(100, $percentage) ?>%"></div>
        </div>
      </div>
<a href="paymentdonate.php" class="btn btn-success btn-donate custom-donate-btn">Donate Now</a>
    </div>
  </div>
</div>

</body>
</html>
