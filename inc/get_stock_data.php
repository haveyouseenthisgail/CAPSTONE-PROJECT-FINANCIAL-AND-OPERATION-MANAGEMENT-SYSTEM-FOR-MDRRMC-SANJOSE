<?php
header('Content-Type: application/json');

$conn = new mysqli('localhost', 'root', '', 'mdrsystem');
if ($conn->connect_error) {
  echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
  exit;
}

$query = "SELECT item_name, item_quantity FROM tbl_product ORDER BY item_name";
$result = $conn->query($query);

$data = [];
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row; // Add each item_name and item_quantity
  }
  echo json_encode($data);
} else {
  echo json_encode(['error' => 'Failed to fetch data: ' . $conn->error]);
}

$conn->close();
