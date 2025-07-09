<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donate | WasteNot</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f1fdf1;
      font-family: 'Segoe UI', sans-serif;
    }

    .payment-container {
      max-width: 700px;
      margin: 30px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .upi-box, .bank-box {
      background: #f8fdf8;
      border: 1px solid #d0e6d0;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .btn-success {
      width: 100%;
    }
  </style>
</head>
<body>

<div class="payment-container">
  <h3 class="text-center text-success mb-4">Donate to Grace Shelter Foundation</h3>

  <form>
    <div class="mb-3">
      <label for="donationAmount" class="form-label">Enter Amount (₹)</label>
      <input type="number" class="form-control" id="donationAmount" placeholder="e.g. 1000" required>
    </div>

    <div class="upi-box">
      <h6 class="text-success">Pay via UPI</h6>
      <p><strong>UPI ID:</strong> gracefoundation@upi</p>
      <img src="https://via.placeholder.com/150?text=UPI+QR" alt="QR Code" class="img-thumbnail" style="width: 150px;">
    </div>

    <div class="bank-box">
      <h6 class="text-success">Mock Bank Transfer</h6>
      <p><strong>Account Name:</strong> Grace Shelter Foundation</p>
      <p><strong>Account No:</strong> 1234567890</p>
      <p><strong>IFSC:</strong> GRACE0012345</p>
      <p><strong>Bank:</strong> WasteNot Cooperative Bank</p>
    </div>

    <button type="submit" class="btn btn-success mt-3">Submit Payment</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>