<?php
$conn = new mysqli("localhost", "root", "", "donorpage");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT fe.*, dr.Name AS donor_name 
        FROM foodentry fe 
        LEFT JOIN donorregistration dr 
        ON fe.contact = dr.`Phone Number` 
        WHERE fe.expiry > CURDATE() 
        ORDER BY fe.expiry DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Available Food Listings</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <style>
    .hover-effect {
      transition: all 0.3s ease-in-out;
    }

    .hover-effect:hover {
      background-color: #e9fce9 !important; /* Light green */
      transform: scale(1.03);
      z-index: 1;
      box-shadow: 0 0 15px rgba(0, 128, 0, 0.3);
    }
  </style>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4">Available Food to Claim</h2>

    <?php if ($result && $result->num_rows > 0): ?>
      <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col-md-6 mb-4">
            <div class="card p-3 shadow-sm hover-effect">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($row["food_name"]) ?></h5>
                <p class="card-text"><strong>Quantity:</strong> <?= $row["quantity"] ?></p>
                <p class="card-text"><strong>Pickup Location:</strong> <?= $row["location"] ?></p>
                <p class="card-text"><strong>Contact:</strong> <?= $row["contact"] ?></p>
                <p class="card-text"><strong>Best Before:</strong> <?= date("d M Y, h:i A", strtotime($row["expiry"])) ?></p>
                <p class="card-text"><strong>Posted by:</strong> <?= $row["donor_name"] ?? 'Unknown' ?></p>
                
                <form action="claim.php" method="POST">
                  <input type="hidden" name="post_id" value="<?= $row["id"] ?? '' ?>">
                  <button type="submit" class="btn btn-primary">Claim</button>
                </form>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-info">No food listings available at the moment.</div>
    <?php endif; ?>

    <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    
  </div>
</body>
</html>


<?php $conn->close(); ?>
