<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "donorpage";


$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$total = $conn->query("SELECT COUNT(*) AS c FROM foodentry")->fetch_assoc()['c'];
$claimed = $conn->query("SELECT COUNT(*) AS c FROM foodentry WHERE status = 'claimed'")->fetch_assoc()['c'];
$unclaimed = $total - $claimed;


header('Content-Type: application/json');
echo json_encode([
  'total' => $total,
  'claimed' => $claimed,
  'unclaimed' => $unclaimed
]);
?>
