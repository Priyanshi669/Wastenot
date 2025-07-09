<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>NGO Fundraisers | WasteNot</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f9f9f9;
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
    .progress-bar {
      background-color: #28a745;
    }
    .topbar {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .logo-title {
      font-weight: bold;
      color: #198754;
      font-size: 1.4rem;
    }
    .donate-btn {
      padding: 6px 14px;
      font-size: 14px;
    }
    .main-layout {
      display: flex;
      gap: 20px;
    }
    .sidebar-profile {
      width: 280px;
      background-color: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      height: fit-content;
    }
    .sidebar-profile h5 {
      color: #198754;
    }
    .sidebar-profile .value {
      font-size: 1.2rem;
      font-weight: bold;
      color: #198754;
    }
    @media (max-width: 768px) {
      .main-layout {
        flex-direction: column;
      }
      .sidebar-profile {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<!-- 🔷 Top Navbar -->
<nav class="navbar topbar p-3">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="logo-title">
      <img src="logoWasteNot.jpeg" alt="logo" style="height: 30px; vertical-align: middle;" class="me-2">
      WasteNot
    </div>
    <a href="my_donations.php" class="btn btn-success donate-btn">My Donations</a>
  </div>
</nav>

<!-- 🔶 Page Content -->
<div class="container mt-4">
  <h4 class="text-center mb-4">NGO Fundraisers</h4>

  <div class="main-layout">

    <!-- 🟢 Sidebar Profile -->
    <div class="sidebar-profile">
      <h5>👤 Donor Profile</h5>
      <p class="mb-1 text-muted">Name: <strong>Priya Sharma</strong></p>
      <p class="mb-1 text-muted">Email: <strong>priya@example.com</strong></p>
      <hr>
      <p class="mb-1">Total Donations</p>
      <div class="value">₹1,85,000</div>
      <p class="mb-1 mt-3">Donation Count</p>
      <div class="value">5 Donations</div>
      <a href="my_donations.php" class="btn btn-outline-success btn-sm mt-4 w-100">View History</a>
    </div>

    <!-- 🟢 NGO Cards -->
    <div class="flex-grow-1">

      <!-- Fundraiser Card 1 -->
      <div class="ngo-card">
        <img src="hackathonproject/assets/pexels-rdne-6647119.jpg" class="ngo-img" alt="NGO">
        <div>
          <p class="mb-1 text-muted">Grace Shelter Foundation</p>
          <h6>Raising funds for shelter renovation and utilities</h6>
          <div class="progress mb-1" style="height: 6px;">
            <div class="progress-bar" style="width: 80%"></div>
          </div>
          <p class="fw-bold small">₹80,000 raised of ₹1,00,000 goal</p>
          <a href="donate1.php" class="btn btn-outline-success btn-sm mt-1">Donate Now</a>
        </div>
      </div>

      <!-- Fundraiser Card 2 -->
      <div class="ngo-card">
        <img src="hackathonproject/oib.jpg" class="ngo-img" alt="NGO">
        <div>
          <p class="mb-1 text-muted">Sahyog Trust</p>
          <h6>Help provide clean water and education to slums</h6>
          <div class="progress mb-1" style="height: 6px;">
            <div class="progress-bar" style="width: 65%"></div>
          </div>
          <p class="fw-bold small">₹65,000 raised of ₹1,00,000 goal</p>
          <a href="donate2.php" class="btn btn-outline-success btn-sm mt-1">Donate Now</a>
        </div>
      </div>

      <!-- Fundraiser Card 3 -->
      <div class="ngo-card">
        <img src="hackathonproject/flood1.jpg" class="ngo-img" alt="NGO">
        <div>
          <p class="mb-1 text-muted">Aasha NGO</p>
          <h6>Emergency aid for flood-affected families</h6>
          <div class="progress mb-1" style="height: 6px;">
            <div class="progress-bar" style="width: 40%"></div>
          </div>
          <p class="fw-bold small">₹40,000 raised of ₹1,00,000 goal</p>
          <a href="donate3.php" class="btn btn-outline-success btn-sm mt-1">Donate Now</a>
        </div>
      </div>

      <!-- Show More Button -->
      <div class="text-center mt-4">
        <button class="btn btn-outline-secondary btn-sm">Show More</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
