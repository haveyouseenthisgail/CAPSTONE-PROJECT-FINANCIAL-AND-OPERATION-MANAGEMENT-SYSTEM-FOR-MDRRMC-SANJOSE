<?php
$conn = new mysqli('localhost', 'root', '', 'mdrsystem');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to calculate the sum of fund_allotment and fund_allotmentbal for 'Genfund'
$sql = "SELECT 
            SUM(first_quart+second_quart+third_quart+fourth_quart) AS funds_disbursed, 
            SUM(remarks) AS funds_remaining 
        FROM tbl_genfund 
      ";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode([
        'funds_disbursed' => $data['funds_disbursed'],
        'funds_remaining' => $data['funds_remaining']
    ]);
} else {
    echo json_encode([
        'funds_disbursed' => 0,
        'funds_remaining' => 0
    ]);
}

$conn->close();
