<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Choose Role - Donate Money</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #e9fce9, #fff3f3);
    }

    .role-section {
      height: 100vh;
      display: flex;
      flex-wrap: wrap;
      margin-top: 56px; 
    }

    .role-half {
      flex: 1 1 50%;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.4s ease;
      cursor: pointer;
      overflow: hidden;
    }

    .role-half:hover {
      transform: scale(1.02);
      z-index: 1;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .donor {
      background: linear-gradient(to bottom right,rgb(193, 199, 193),rgb(119, 173, 119));
    }

    .receiver {
      background: linear-gradient(to bottom left,rgb(199, 133, 133),rgb(212, 194, 209));
    }

    .overlay-content {
      color: #333;
      padding: 2rem;
    }

    .overlay-content h2 {
      font-size: 2.5rem;
      font-weight: bold;
    }

    .overlay-content p {
      font-size: 1.2rem;
      margin-top: 10px;
    }

    .overlay-content i {
      font-size: 3rem;
      color:rgb(96, 173, 137);
      margin-bottom: 15px;
    }

    .receiver i {
      color:rgb(160, 90, 97);
    }

    .btn-custom {
      margin-top: 1.5rem;
      font-size: 1.1rem;
      padding: 10px 25px;
      transition: transform 0.3s ease;
    }

    .btn-custom:hover {
      transform: scale(1.05);
    }

    @media (max-width: 768px) {
      .role-half {
        flex: 1 1 100%;
      }
    }
  </style>
</head>
<body>

  
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold text-success" href="#">Money Donation</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="aboutus.php">About</a></li>
        </ul>
      </div>
    </div>
  </nav>

  
  <div class="role-section">
    
    <div class="role-half donor" onclick="window.location.href='moneydonor.php'">
      <div class="overlay-content">
        <i class="bi bi-heart-fill"></i>
        <h2>Be a Donor</h2>
        <p>Contribute financially and support those who need help the most.</p>
        <button class="btn btn-success btn-custom">Donate Now</button>
      </div>
    </div>

  
    <div class="role-half receiver" onclick="window.location.href='moneyreceiver.php'">
      <div class="overlay-content">
        <i class="bi bi-hand-index-thumb-fill"></i>
        <h2>Be a Receiver</h2>
        <p>If you're in need, register here and receive support.</p>
        <button class="btn btn-danger btn-custom">Get Help</button>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
