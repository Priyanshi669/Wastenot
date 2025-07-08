<?php

session_start();                         
require_once __DIR__ . '/includes/db.php'; 


if (isset($_SESSION['user_id'])) {

    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Waste Exchange | Reduce. Share. Save.</title>
  <meta name="description"
        content="Connect surplus food donors with NGOs in seconds. Reduce waste, feed people, track impact.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  
  <link rel="stylesheet" href="style.css">

  <style>
    
.navbar {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  color: white;
}
.carousel-container {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    .carousel-item img {
      width: 100%;
      height: 400px;
      object-fit: cover;
    }

    .text-block {
      padding: 30px;
    }

    @media (max-width: 768px) {
      .carousel-item img {
        height: 250px;
      }
    }
</style>

</head>
<body class="d-flex flex-column min-vh-100">



  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">Food Waste Exchange</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navMenu" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-light py-5 border-bottom">

<div class="container mt-5">
  <div class="row align-items-center">
    
    <!-- ✅ Text Column FIRST (left) -->
    <div class="col-md-6 text-block">
      <h1 class="display-5 fw-semibold">Turn Surplus Food into Smiles</h1>
      <p class="lead mb-4">
        We match restaurants, events, and households with nearby NGOs—fast.
        <br class="d-none d-md-block">Join us in fighting food waste and hunger today.
      </p>
      <a href="register.php" class="btn btn-success btn-lg me-2 mb-2">Get Started</a>
      <a href="login.php" class="btn btn-outline-success btn-lg mb-2">I already have an account</a>
      <a href="aboutus.php" class="btn btn-outline-success btn-lg mb-2">About Us</a>
    </div>

    <!-- ✅ Carousel Column SECOND (right) -->
    <div class="col-md-6 mb-4 mb-md-0">
      <div id="photoCarousel" class="carousel slide carousel-fade carousel-container" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://media.istockphoto.com/id/1254808170/photo/hungry-african-children-asking-for-food-africa.jpg?s=612x612&w=0&k=20&c=F2KWOujxMUi-CpyxGk7-kSzakodRHj6XIE20NZIA6yY=" class="d-block w-100" alt="Food 1">
          </div>
          <div class="carousel-item">
            <img src="https://plus.unsplash.com/premium_photo-1683141173692-aba4763bce41?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Food 2">
          </div>
          <div class="carousel-item">
            <img src="https://plus.unsplash.com/premium_photo-1661962834814-2086d028cda1?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Food 3">
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  

    
  </header>

  
  <section class="py-5" style="background-color: rgba(109, 207, 109, 0.95); ">
    <div class="container" style="background-color: rgba(109, 207, 109, 0.95);">
      <h2 class="h3 text-center mb-4">How It Works</h2>
      <div class="row g-4">
        <div class="col-md-4 text-center">
          <span class="display-6">1️⃣</span>
          <h3 class="h5 mt-2">Sign Up</h3>
          <p>Create a free donor or NGO account in <strong>&lt;1 min</strong>.</p>
        </div>
        <div class="col-md-4 text-center">
          <span class="display-6">2️⃣</span>
          <h3 class="h5 mt-2">Post or Claim</h3>
          <p>Donors list surplus food. NGOs see live listings and claim what they need.</p>
        </div>
        <div class="col-md-4 text-center">
          <span class="display-6">3️⃣</span>
          <h3 class="h5 mt-2">Track Impact</h3>
          <p>Your dashboard shows meals served &amp; kg of food saved—instantly!</p>
        </div>
      </div>
    </div>
  </section>

  
  <section class="bg-success text-white py-4">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-4"><h3 class="mb-0">⏱️ 24h</h3><small>Average pickup time</small></div>
        <div class="col-md-4 border-start border-end"><h3 class="mb-0">⭐ 98%</h3><small>Successful matches</small></div>
        <div class="col-md-4"><h3 class="mb-0">🥗 12K+</h3><small>Meals donated</small></div>
      </div>
    </div>
  </section>


  <footer class="mt-auto bg-dark text-white-50 py-3">
    <div class="container text-center small">
      © <?= date('Y'); ?> Food Waste Exchange · <a href="#" class="link-light text-decoration-none">Contact</a>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
