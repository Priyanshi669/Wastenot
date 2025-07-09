
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Post a Request - WasteNot</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-light bg-white shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold text-success" href="#"><img src="logoWasteNot.jpeg" height="30" class="me-2">WasteNot</a>
  </div>
</nav>

<div class="container bg-white p-4 shadow-sm rounded">
  <h4 class="mb-3">Post a Donation Request</h4>
  <form action="submit_post.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Organization Name</label>
      <input type="text" name="org_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Photos or Videos</label>
      <input type="file" name="media" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">News Update</label>
      <textarea name="news_update" class="form-control" rows="2"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Description of Event</label>
      <textarea name="event_desc" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Amount Raised So Far</label>
      <input type="number" name="raised_amount" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Post Request</button>
  </form>
</div>

</body>
</html>
