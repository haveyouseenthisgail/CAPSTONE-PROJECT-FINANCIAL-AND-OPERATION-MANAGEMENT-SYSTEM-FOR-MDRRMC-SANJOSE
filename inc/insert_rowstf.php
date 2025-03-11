<?php
$conn = new mysqli('localhost', 'root', '', 'mdrsystem');

// Check for connection error
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get and sanitize the inputs
  $prog_type = $conn->real_escape_string($_POST['prog_type']);
  $reference_id = isset($_POST['reference_id']) ? $conn->real_escape_string($_POST['reference_id']) : null;

  $sql = "SELECT fallotment_id FROM `tbl_stf` WHERE `reference_id` = '$reference_id'";
  $result = $conn->query($sql);
  $row = $result->fetch_array();
  $fallotment_id = $row['fallotment_id'];


  $fetch = "SELECT stf_year FROM `tbl_stf` WHERE `reference_id` = '$reference_id'";
  $result = $conn->query($fetch);
  $row = $result->fetch_array();
  $stf_year = $row['stf_year'];

  // Ensure reference_id is not empty
  if (empty($reference_id)) {
    echo "Error: reference_id is required.";
    exit; // Stop script if reference_id is empty
  }

  // Insert the row into the database
  $sql = "INSERT INTO `tbl_stf`(`reference_id`,`fallotment_id`,`stf_year`, `prog_type`)
          VALUES ('$reference_id','$fallotment_id','$stf_year','$prog_type')";

  if ($conn->query($sql)) {
    echo 'Row inserted successfully';
  } else {
    echo 'Error: ' . $conn->error;
  }
}
?>
