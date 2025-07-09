<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>NGO Details | WasteNot</title>
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

    .section-box {
      background: #f9f9f9;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 20px;
    }

    .title-bold {
      font-weight: bold;
      font-size: 1.5rem;
      color: #333;
    }

    .donation-box {
      background: #e9f7ef;
      border: 1px solid #c3e6cb;
      padding: 15px;
      border-radius: 8px;
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
<body>

<div class="ngo-container">
  <!-- Org Name -->
  <div class="section-box">
    <div class="title-bold">Grace Shelter Foundation</div>
    <p>Raising funds for shelter renovation and utilities</p>
  </div>

  <!-- Media + News -->
  <div class="row">
    <div class="col-md-6 section-box">
      <h6>Photos or Videos</h6>
      <img src="https://via.placeholder.com/500x250.png?text=NGO+Image" class="img-thumbnail" alt="NGO">
    </div>
    <div class="col-md-6 section-box">
      <h6>News Update</h6>
      <p>Recently we started the roof work for the shelter. Thank you for your continued support!</p>
    </div>
  </div>

  <!-- Description + Donation -->
  <div class="row">
    <div class="col-md-8 section-box">
      <h6>Description of Events</h6>
      <p>We are renovating shelters for women and children with no home support. This fundraiser will help us provide beds, clean water, and hygienic food. We aim to complete the renovation in the next 2 months.</p>
    </div>
    <div class="col-md-4">
      <div class="donation-box mb-3">
        <p><strong>₹80,000</strong> raised of ₹1,00,000 goal</p>
        <div class="progress" style="height: 6px;">
          <div class="progress-bar bg-success" style="width: 80%"></div>
        </div>
      </div>
      <a href="paymentdonate.php" class="btn btn-success btn-donate">Donate Now</a>
    </div>
  </div>
</div>

</body>
</html>