<?php
$conn = new mysqli('localhost', 'root', '', 'mdrsystem');
extract($_POST);
session_start();
// extract($_GET);
// extract($_SESSION);

if (isset($_POST['loginBtn'])) {
  $admin_user = $_POST['admin_user'];
  $admin_pass = $_POST['admin_pass'];
  $stmt = $conn->prepare("SELECT * FROM `admin` WHERE `admin_user` = ?");
  $stmt->bind_param("s", $admin_user);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
    if ($admin_pass == $admin['admin_pass']) {
      $_SESSION['admin_id'] = $admin['admin_id'];
      $_SESSION['admin_user'] = $admin['admin_user'];
      header('Location: ../pages/dashboard.php');
      exit();
    } else {
      header('Location: ../index.php?invalid');
      exit();
    }
  } else {
    header('Location: ../index.php?invalid');
    exit();
  }
  $stmt->close();
}




if (isset($dvnvatform) || isset($dvvatform)) {
  $sql = "INSERT INTO `tbl_dvvat` (`dv_payee`, `dv_add`, `dv_fund`, `dv_no`, `dv_date`, `dv_tin`, `dv_cafoa`, `dv_rcenter`, `dv_particulars`, `dv_amnt`, `dv_amntdue`, `dv_type`, `dv_status`) 
            VALUES ('$dv_payee', '$dv_add', '$dv_fund', '$dv_no', '$dv_date', '$dv_tin', '$dv_cafoa', '$dv_rcenter', '$newParticulars', '$dv_amnt', '$dv_amntdue', '$dvtype', 'pending')";
  $query = $conn->query($sql);

  if ($query) {
    $last_id = mysqli_insert_id($conn);

    $sql1 = "INSERT INTO `tbl_level_auth` (`dv_id`, `level_a`, `level_b`, `level_c`, `level_d`, `level_e`, `level_f1`, `level_f2`) 
                 VALUES ('$last_id', '$a_name', '$b_name', '$c_name', '$d_name', '$e_name', '$f_name1', '$f_name2')";
    $query1 = $conn->query($sql1);
  }
}


if (isset($supplyform)) {
  $sql = "INSERT INTO `tbl_supply`( `supply_type`) VALUES ('$supply_type')";
  $query =  $conn->query($sql);
}

if (isset($unitform)) {

  $sql = "INSERT INTO `tbl_unit`(`unit_name`) VALUES ('$unit_name')";
  $query = $conn->query($sql);
}

if (isset($productform)) {
  // Check if $item_expdate is set and not empty; if not, set it to NULL
  $item_expdate = !empty($item_expdate) ? "'$item_expdate'" : "NULL";

  $sql = "INSERT INTO `tbl_product`(`item_name`, `item_quantity`, `unit_id`, `item_condition`, `item_remarks`, `item_started`, `item_expdate`, `supply_id`) 
          VALUES ('$item_name', '$item_quantity', '$unit_id', '$item_condition', '$item_remarks', NOW(), $item_expdate, '$supply_id')";

  $query = $conn->query($sql);
}


if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $sql = "SELECT * FROM `tbl_product` WHERE `product_id` = $product_id";
  $result = $conn->query($sql);
  echo json_encode($result->fetch_assoc());
}


// if (isset($_GET['dv_id'])) {
//     $dv_id = $_GET['dv_id'];

//     // Correct query and join on authorizer_id
//     $query = mysqli_query($conn, "SELECT tbl_dvvat_authorizers.*, tbl_authorizers.a_name, tbl_dvvat.* 
//     FROM tbl_dvvat  
//     INNER JOIN tbl_dvvat_authorizers 
//     ON tbl_dvvat.dv_id = tbl_dvvat_authorizers.dv_id 
//     INNER JOIN tbl_authorizers 
//     ON tbl_authorizers.authorizer_id = tbl_dvvat_authorizers.authorizer_id 
//     WHERE tbl_dvvat.dv_id = $dv_id");

//     // Fetch the result and encode as JSON
//     if ($query) {
//         $result = mysqli_fetch_assoc($query);
//         echo json_encode($result);
//     } else {
//         echo json_encode(["error" => "No data found"]);
//     }
// }



if (isset($editproductform)) {
  $item_expdate = !empty($item_expdate) ? "'$item_expdate'" : "NULL";
  $sql = "UPDATE `tbl_product` SET `item_name`='$item_name',`item_quantity`='$item_quantity',`unit_id`='$unit_id',`item_condition`='$item_condition',`item_remarks`='$item_remarks',`item_expdate`=$item_expdate,`supply_id`='$supply_id' WHERE `product_id`= $product_id";
  $query = $conn->query($sql);
}

// if (isset($_GET['product_id'])) {
//   $product_id = $_GET['product_id'];
//   $sql = "UPDATE `tbl_product` SET `product_status`=0 WHERE `product_id`=$product_id";
//   $query = $conn->query($sql);
// }

if (isset($employeeform)) {
  $filename = $_FILES['employee_img']['name'];
  $filetemp = $_FILES['employee_img']['tmp_name'];
  $exp = explode(".", $filename);
  $extension = end($exp);
  $newfilename = time() . "." . $extension;
  move_uploaded_file($filetemp, "../profile/" . $newfilename);
  $sql = "INSERT INTO `tbl_employee`( `employee_name`, `employee_position`, `employee_add`, `employee_phone`, `employee_email`, `employee_bd`, `employee_img`,`status`) VALUES ('$employee_name','$employee_position','$employee_add','$employee_phone','$employee_email','$employee_bd', '$newfilename', 1)";
  $query = $conn->query($sql);
}

if (isset($seminarform)) {;
  $filename  = $_FILES['seminar_cert']['name'];
  $filetemp = $_FILES['seminar_cert']['tmp_name'];
  $exp = explode(".", $filename);
  $extension =  end($exp);
  $newfilename = time() . "." . $extension;
  move_uploaded_file($filetemp, "../seminar-certificates/" . $newfilename);
  $sql = "INSERT INTO `tbl_seminar`( `seminar_name`, `seminar_date`, `seminar_cert`, `employee_id`, `event_type`) VALUES ('$seminar_name','$seminar_date','$newfilename','$employee_id','$event_type')";
  $query = $conn->query($sql);
}

if (isset($authorizerform)) {
  $sql = "INSERT INTO `tbl_authorizers`( `authorizer_name`, `app_level`) VALUES ('$authorizer_name','$app_level')";
  $query = $conn->query($sql);
}



// if (isset($genfundForm) || isset($stfForm)) {
//   function handleNull($value)
//   {
//     return ($value === '' || $value === null) ? 'NULL' : "'$value'";
//   }

//   $programs = [
//     [
//       'programs' => $_POST['programone'],
//       'office' => $_POST['officeone'],
//       'exp_outputs' => $_POST['exp_outputsone'],
//       'exp_mooe' => $_POST['exp_mooeone'],
//       'first_quart' => $_POST['first_quartone'],
//       'second_quart' => $_POST['second_quartone'],
//       'third_quart' => $_POST['third_quartone'],
//       'fourth_quart' => $_POST['fourth_quartone'],
//       'prog_type' => 'prevention'

//     ],
//     [
//       'programs' => $_POST['program2'],
//       'office' => $_POST['office2'],
//       'exp_outputs' => $_POST['exp_outputs2'],
//       'exp_mooe' => $_POST['exp_mooe2'],
//       'first_quart' => $_POST['first_quart2'],
//       'second_quart' => $_POST['second_quart2'],
//       'third_quart' => $_POST['third_quart2'],
//       'fourth_quart' => $_POST['fourth_quart2'],
//       'prog_type' => 'preparedness'
//     ],
//     [
//       'programs' => $_POST['program3'],
//       'office' => $_POST['office3'],
//       'exp_outputs' => $_POST['exp_outputs3'],
//       'exp_mooe' => $_POST['exp_mooe3'],
//       'first_quart' => $_POST['first_quart3'],
//       'second_quart' => $_POST['second_quart3'],
//       'third_quart' => $_POST['third_quart3'],
//       'fourth_quart' => $_POST['fourth_quart3'],
//       'prog_type' => 'support'
//     ],
//     [
//       'programs' => $_POST['program4'],
//       'office' => $_POST['office4'],
//       'exp_outputs' => $_POST['exp_outputs4'],
//       'exp_mooe' => $_POST['exp_mooe4'],
//       'first_quart' => $_POST['first_quart4'],
//       'second_quart' => $_POST['second_quart4'],
//       'third_quart' => $_POST['third_quart4'],
//       'fourth_quart' => $_POST['fourth_quart4'],
//       'prog_type' => 'response'
//     ]
//   ];

//   $reference_id_counter = 1;

//   if (isset($genfundForm)) {
//     foreach ($programs as $data) {
//       $genfund_year = $_POST['genfund_year'];
//       foreach ($data['programs'] as $key => $program) {
//         // SQL insert statement
//         $sql = "INSERT INTO `tbl_genfund`(`program`, `office`, `exp_outputs`, `exp_mooe`, `first_quart`, `second_quart`, `third_quart`, `fourth_quart`, `genfund_year`, `prog_type`)
//                         VALUES (
//                             '{$data['programs'][$key]}',
//                             '{$data['office'][$key]}',
//                             '{$data['exp_outputs'][$key]}',
//                             " . handleNull($data['exp_mooe'][$key]) . ",
//                             " . handleNull($data['first_quart'][$key]) . ",
//                             " . handleNull($data['second_quart'][$key]) . ",
//                             " . handleNull($data['third_quart'][$key]) . ",
//                             " . handleNull($data['fourth_quart'][$key]) . ",
//                             '$genfund_year',
//                             '{$data['prog_type']}'
//                         )";

//         if ($conn->query($sql)) {
//           $last_id = $conn->insert_id;

//           $update_sql = "UPDATE `tbl_genfund` SET `reference_id` = '{$reference_id_counter}' WHERE `prog_id` = '{$last_id}'";
//           $conn->query($update_sql);

//           $reference_id_counter++;
//         } else {
//           echo "Error: " . $conn->error;
//         }
//       }
//     }
//   }

//   if (isset($stfForm)) {
//     foreach ($programs as $data) {
//       $stf_year = $_POST['stf_year'];
//       foreach ($data['programs'] as $key => $program) {
//         $sql = "INSERT INTO `tbl_stf`(`program`, `office`, `exp_outputs`, `exp_mooe`, `first_quart`, `second_quart`, `third_quart`, `fourth_quart`, `stf_year`, `prog_type`)
//                         VALUES (
//                             '{$data['programs'][$key]}',
//                             '{$data['office'][$key]}',
//                             '{$data['exp_outputs'][$key]}',
//                             " . handleNull($data['exp_mooe'][$key]) . ",
//                             " . handleNull($data['first_quart'][$key]) . ",
//                             " . handleNull($data['second_quart'][$key]) . ",
//                             " . handleNull($data['third_quart'][$key]) . ",
//                             " . handleNull($data['fourth_quart'][$key]) . ",
//                             '$stf_year',
//                             '{$data['prog_type']}'
//                         )";

//         if ($conn->query($sql)) {
//           $last_id = $conn->insert_id;

//           $update_sql = "UPDATE `tbl_stf` SET `reference_id` = '{$reference_id_counter}' WHERE `prog_id` = '{$last_id}'";
//           $conn->query($update_sql);

//           $reference_id_counter++;
//         } else {
//           echo "Error: " . $conn->error;
//         }
//       }
//     }
//   }
// }


if (isset($genfundForm) || isset($stfForm)) {
  function handleNull($value)
  {
    return ($value === '' || $value === null) ? 'NULL' : "'$value'";
  }

  $programs = [
    [
      'programs' => $_POST['programone'],
      'office' => $_POST['officeone'],
      'exp_outputs' => $_POST['exp_outputsone'],
      'exp_mooe' => $_POST['exp_mooeone'],
      'first_quart' => $_POST['first_quartone'],
      'second_quart' => $_POST['second_quartone'],
      'third_quart' => $_POST['third_quartone'],
      'fourth_quart' => $_POST['fourth_quartone'],
      'prog_type' => 'prevention',
      'remarks' => $_POST['remark_one']
    ],
    [
      'programs' => $_POST['program2'],
      'office' => $_POST['office2'],
      'exp_outputs' => $_POST['exp_outputs2'],
      'exp_mooe' => $_POST['exp_mooe2'],
      'first_quart' => $_POST['first_quart2'],
      'second_quart' => $_POST['second_quart2'],
      'third_quart' => $_POST['third_quart2'],
      'fourth_quart' => $_POST['fourth_quart2'],
      'prog_type' => 'preparedness',
      'remarks' => $_POST['remark_two']
    ],
    [
      'programs' => $_POST['program3'],
      'office' => $_POST['office3'],
      'exp_outputs' => $_POST['exp_outputs3'],
      'exp_mooe' => $_POST['exp_mooe3'],
      'first_quart' => $_POST['first_quart3'],
      'second_quart' => $_POST['second_quart3'],
      'third_quart' => $_POST['third_quart3'],
      'fourth_quart' => $_POST['fourth_quart3'],
      'prog_type' => 'support',
      'remarks' => $_POST['remark_three']
    ],
    [
      'programs' => $_POST['program4'],
      'office' => $_POST['office4'],
      'exp_outputs' => $_POST['exp_outputs4'],
      'exp_mooe' => $_POST['exp_mooe4'],
      'first_quart' => $_POST['first_quart4'],
      'second_quart' => $_POST['second_quart4'],
      'third_quart' => $_POST['third_quart4'],
      'fourth_quart' => $_POST['fourth_quart4'],
      'prog_type' => 'response',
      'remarks' => $_POST['remark_four']
    ]
  ];

  $funds_remaining = $_POST['funds_remaining'];




  if (isset($genfundForm)) {
    $funds_inserted = false;
    $firstinsert_id = null;

    foreach ($programs as $data) {
      $genfund_year = $_POST['genfund_year'];
      $fallotment_id  = isset($_POST['fallotment_id']) ? $_POST['fallotment_id'] : null;

      if (!$fallotment_id) {
        echo "Error: Fallotment ID is required.";
        exit;
      }

      foreach ($data['programs'] as $key => $program) {
        $sql = "INSERT INTO `tbl_genfund`(`fallotment_id`, `program`, `office`, `exp_outputs`, `exp_mooe`, `first_quart`, `second_quart`, `third_quart`, `fourth_quart`, `genfund_year`, `prog_type`, `remarks`)
                    VALUES (
                        '$fallotment_id',
                        '{$data['programs'][$key]}',
                        '{$data['office'][$key]}',
                        '{$data['exp_outputs'][$key]}',
                        " . handleNull($data['exp_mooe'][$key]) . ",
                        " . handleNull($data['first_quart'][$key]) . ",
                        " . handleNull($data['second_quart'][$key]) . ",
                        " . handleNull($data['third_quart'][$key]) . ",
                        " . handleNull($data['fourth_quart'][$key]) . ",
                        '$genfund_year',
                        '{$data['prog_type']}',
                        " . handleNull($data['remarks'][$key]) . "
                    )";

        if ($conn->query($sql)) {
          if ($firstinsert_id === null) {
            $firstinsert_id = $conn->insert_id;
          }

          $update_sql = "UPDATE `tbl_genfund` SET `reference_id` = '$firstinsert_id' WHERE `reference_id` IS NULL";
          $conn->query($update_sql);

          $update_sql1 = "UPDATE `tbl_fundallotment` SET `reference_id` = '$firstinsert_id', `fund_allotmentbal` = '$funds_remaining' WHERE `fallotment_id` = '$fallotment_id'";
          $conn->query($update_sql1);
        } else {
          echo "Error: " . $conn->error;
        }
      }
    }
  }


  if (isset($stfForm)) {
    foreach ($programs as $data) {
      $stf_year = $_POST['stf_year'];

      foreach ($data['programs'] as $key => $program) {
        $sql = "INSERT INTO `tbl_stf`(`fallotment_id`,`program`, `office`, `exp_outputs`, `exp_mooe`, `first_quart`, `second_quart`, `third_quart`, `fourth_quart`, `stf_year`, `prog_type`, `remarks`)
                        VALUES (
                             '$fallotment_id',
                            '{$data['programs'][$key]}',
                            '{$data['office'][$key]}',
                            '{$data['exp_outputs'][$key]}',
                            " . handleNull($data['exp_mooe'][$key]) . ",
                            " . handleNull($data['first_quart'][$key]) . ",
                            " . handleNull($data['second_quart'][$key]) . ",
                            " . handleNull($data['third_quart'][$key]) . ",
                            " . handleNull($data['fourth_quart'][$key]) . ",
                            '$stf_year',
                            '{$data['prog_type']}',
                            " . handleNull($data['remarks'][$key]) . "
                        )";

        if ($conn->query($sql)) {
          if ($firstinsert_id === null) {
            $firstinsert_id = $conn->insert_id;
          }

          $update_sql = "UPDATE `tbl_stf` SET `reference_id` = '$firstinsert_id' WHERE `reference_id` IS NULL";
          $conn->query($update_sql);



          $update_sql1 = "UPDATE `tbl_fundallotment` SET `reference_id` = '$firstinsert_id', `fund_allotmentbal` = '$funds_remaining' WHERE `fallotment_id` = '$fallotment_id'";
          $conn->query($update_sql1);
        } else {
          echo "Error: " . $conn->error;
        }
      }
    }
  }
}



if (isset($UpdategenfundForm) || isset($UpdatestfForm)) {

  function handleNull($value)
  {
    return ($value === '' || $value === null) ? 'NULL' : "'$value'";
  }

  $programs = [
    [
      'programs' => $_POST['programone'],
      'office' => $_POST['officeone'],
      'exp_outputs' => $_POST['exp_outputsone'],
      'exp_mooe' => $_POST['exp_mooeone'],
      'first_quart' => $_POST['first_quartone'],
      'second_quart' => $_POST['second_quartone'],
      'third_quart' => $_POST['third_quartone'],
      'fourth_quart' => $_POST['fourth_quartone'],
      'prog_type' => 'prevention',
      'remarks' => $_POST['remark_one']
    ],
    [
      'programs' => $_POST['program2'],
      'office' => $_POST['office2'],
      'exp_outputs' => $_POST['exp_outputs2'],
      'exp_mooe' => $_POST['exp_mooe2'],
      'first_quart' => $_POST['first_quart2'],
      'second_quart' => $_POST['second_quart2'],
      'third_quart' => $_POST['third_quart2'],
      'fourth_quart' => $_POST['fourth_quart2'],
      'prog_type' => 'preparedness',
      'remarks' => $_POST['remark_two']
    ],
    [
      'programs' => $_POST['program3'],
      'office' => $_POST['office3'],
      'exp_outputs' => $_POST['exp_outputs3'],
      'exp_mooe' => $_POST['exp_mooe3'],
      'first_quart' => $_POST['first_quart3'],
      'second_quart' => $_POST['second_quart3'],
      'third_quart' => $_POST['third_quart3'],
      'fourth_quart' => $_POST['fourth_quart3'],
      'prog_type' => 'support',
      'remarks' => $_POST['remark_three']
    ],
    [
      'programs' => $_POST['program4'],
      'office' => $_POST['office4'],
      'exp_outputs' => $_POST['exp_outputs4'],
      'exp_mooe' => $_POST['exp_mooe4'],
      'first_quart' => $_POST['first_quart4'],
      'second_quart' => $_POST['second_quart4'],
      'third_quart' => $_POST['third_quart4'],
      'fourth_quart' => $_POST['fourth_quart4'],
      'prog_type' => 'response',
      'remarks' => $_POST['remark_four']
    ]
  ];

  $funds_remaining = $_POST['funds_remaining'];




  if (isset($UpdategenfundForm)) {
    $funds_inserted = false;
    $firstinsert_id = null;

    foreach ($programs as $data) {
      $genfund_year = $_POST['genfund_year'];
      $fallotment_id  = isset($_POST['fallotment_id']) ? $_POST['fallotment_id'] : null;

      if (!$fallotment_id) {
        echo "Error: Fallotment ID is required.";
        exit;
      }

      foreach ($data['programs'] as $key => $program) {
        $sql = "INSERT INTO `tbl_genfund`(`reference_id`,`fallotment_id`, `program`, `office`, `exp_outputs`, `exp_mooe`, `first_quart`, `second_quart`, `third_quart`, `fourth_quart`, `genfund_year`, `prog_type`, `remarks`)
                    VALUES (
                        '$reference_id',
                        '$fallotment_id',
                        '{$data['programs'][$key]}',
                        '{$data['office'][$key]}',
                        '{$data['exp_outputs'][$key]}',
                        " . handleNull($data['exp_mooe'][$key]) . ",
                        " . handleNull($data['first_quart'][$key]) . ",
                        " . handleNull($data['second_quart'][$key]) . ",
                        " . handleNull($data['third_quart'][$key]) . ",
                        " . handleNull($data['fourth_quart'][$key]) . ",
                        '$genfund_year',
                        '{$data['prog_type']}',
                        " . handleNull($data['remarks'][$key]) . "
                    )";

        if ($conn->query($sql)) {

          $update_sql1 = "UPDATE `tbl_fundallotment` SET `fund_allotmentbal` = '$funds_remaining' WHERE `fallotment_id` = '$fallotment_id'";
          $conn->query($update_sql1);
        } else {
          echo "Error: " . $conn->error;
        }
      }
    }
  }


  if (isset($UpdatestfForm)) {
    $funds_inserted = false;
    $firstinsert_id = null;

    foreach ($programs as $data) {
      $stf_year = $_POST['stf_year'];
      $fallotment_id  = isset($_POST['fallotment_id']) ? $_POST['fallotment_id'] : null;

      if (!$fallotment_id) {
        echo "Error: Fallotment ID is required.";
        exit;
      }

      foreach ($data['programs'] as $key => $program) {
        $sql = "INSERT INTO `tbl_stf`(`reference_id`,`fallotment_id`, `program`, `office`, `exp_outputs`, `exp_mooe`, `first_quart`, `second_quart`, `third_quart`, `fourth_quart`, `stf_year`, `prog_type`, `remarks`)
                    VALUES (
                        '$reference_id',
                        '$fallotment_id',
                        '{$data['programs'][$key]}',
                        '{$data['office'][$key]}',
                        '{$data['exp_outputs'][$key]}',
                        " . handleNull($data['exp_mooe'][$key]) . ",
                        " . handleNull($data['first_quart'][$key]) . ",
                        " . handleNull($data['second_quart'][$key]) . ",
                        " . handleNull($data['third_quart'][$key]) . ",
                        " . handleNull($data['fourth_quart'][$key]) . ",
                        '$stf_year',
                        '{$data['prog_type']}',
                        " . handleNull($data['remarks'][$key]) . "
                    )";

        if ($conn->query($sql)) {

          $update_sql1 = "UPDATE `tbl_fundallotment` SET `fund_allotmentbal` = '$funds_remaining' WHERE `fallotment_id` = '$fallotment_id'";
          $conn->query($update_sql1);
        } else {
          echo "Error: " . $conn->error;
        }
      }
    }
  }
}





// if (isset($EDitgenfundForm) || isset($EDitstfForm)) {
//   function handleNull($value)
//   {
//     return ($value === '' || $value === null) ? 'NULL' : "'$value'";
//   }

//   $programs = [
//     [
//       'programs' => $_POST['programone'],
//       'office' => $_POST['officeone'],
//       'exp_outputs' => $_POST['exp_outputsone'],
//       'exp_mooe' => $_POST['exp_mooeone'],
//       'first_quart' => $_POST['first_quartone'],
//       'second_quart' => $_POST['second_quartone'],
//       'third_quart' => $_POST['third_quartone'],
//       'fourth_quart' => $_POST['fourth_quartone'],
//       'prog_type' => 'prevention',
//       'remarks' => $_POST['remark_one']
//     ],
//     [
//       'programs' => $_POST['program2'],
//       'office' => $_POST['office2'],
//       'exp_outputs' => $_POST['exp_outputs2'],
//       'exp_mooe' => $_POST['exp_mooe2'],
//       'first_quart' => $_POST['first_quart2'],
//       'second_quart' => $_POST['second_quart2'],
//       'third_quart' => $_POST['third_quart2'],
//       'fourth_quart' => $_POST['fourth_quart2'],
//       'prog_type' => 'preparedness',
//       'remarks' => $_POST['remark_two']
//     ],
//     [
//       'programs' => $_POST['program3'],
//       'office' => $_POST['office3'],
//       'exp_outputs' => $_POST['exp_outputs3'],
//       'exp_mooe' => $_POST['exp_mooe3'],
//       'first_quart' => $_POST['first_quart3'],
//       'second_quart' => $_POST['second_quart3'],
//       'third_quart' => $_POST['third_quart3'],
//       'fourth_quart' => $_POST['fourth_quart3'],
//       'prog_type' => 'support',
//       'remarks' => $_POST['remark_three']
//     ],
//     [
//       'programs' => $_POST['program4'],
//       'office' => $_POST['office4'],
//       'exp_outputs' => $_POST['exp_outputs4'],
//       'exp_mooe' => $_POST['exp_mooe4'],
//       'first_quart' => $_POST['first_quart4'],
//       'second_quart' => $_POST['second_quart4'],
//       'third_quart' => $_POST['third_quart4'],
//       'fourth_quart' => $_POST['fourth_quart4'],
//       'prog_type' => 'response',
//       'remarks' => $_POST['remark_four']
//     ]
//   ];

//   $funds_remaining = $_POST['funds_remaining'];



//   if (isset($EDitgenfundForm)) {
//     foreach ($programs as $data) {
//       $genfund_year = $_POST['genfund_year'];
//       $check_sql = "SELECT * FROM `tbl_genfund` WHERE `prog_id` = '$prog_id'";
//       $check_result = $conn->query($check_sql);

//       if ($check_row[0] == 0) { // No matching prog_id found
//         // If prog_id does not exist, perform the insert
//         $sql = "INSERT INTO `tbl_genfund`(`reference_id`,`program`, `office`, `exp_outputs`, `exp_mooe`, `first_quart`, `second_quart`, `third_quart`, `fourth_quart`, `genfund_year`, `prog_type`, `remarks`)
//                 VALUES ('$reference_id', 
//                         '{$data['programs'][$key]}', 
//                         '{$data['office'][$key]}', 
//                         '{$data['exp_outputs'][$key]}', 
//                         " . handleNull($data['exp_mooe'][$key]) . ", 
//                         " . handleNull($data['first_quart'][$key]) . ", 
//                         " . handleNull($data['second_quart'][$key]) . ", 
//                         " . handleNull($data['third_quart'][$key]) . ", 
//                         " . handleNull($data['fourth_quart'][$key]) . ", 
//                         '$genfund_year', 
//                         '{$data['prog_type']}', 
//                         " . handleNull($data['remarks'][$key]) . "
//                 )";


//         $query = $conn->query($sql);
//       }
//     }
//   }
//   if (isset($EDitstfForm)) {


//     foreach ($programs as $data) {
//       $genfund_year = $_POST['genfund_year'];
//       $check_sql = "SELECT * FROM `tbl_genfund` WHERE `prog_id` = '$prog_id'";
//       $check_result = $conn->query($check_sql);

//       if ($check_row[0] == 0) { // No matching prog_id found
//         // If prog_id does not exist, perform the insert
//         $sql = "INSERT INTO `tbl_genfund`(`reference_id`,`program`, `office`, `exp_outputs`, `exp_mooe`, `first_quart`, `second_quart`, `third_quart`, `fourth_quart`, `genfund_year`, `prog_type`, `remarks`)
//                 VALUES ('$reference_id', 
//                         '{$data['programs'][$key]}', 
//                         '{$data['office'][$key]}', 
//                         '{$data['exp_outputs'][$key]}', 
//                         " . handleNull($data['exp_mooe'][$key]) . ", 
//                         " . handleNull($data['first_quart'][$key]) . ", 
//                         " . handleNull($data['second_quart'][$key]) . ", 
//                         " . handleNull($data['third_quart'][$key]) . ", 
//                         " . handleNull($data['fourth_quart'][$key]) . ", 
//                         '$genfund_year', 
//                         '{$data['prog_type']}', 
//                         " . handleNull($data['remarks'][$key]) . "
//                 )";


//         $query = $conn->query($sql);
//       }
//     }
//   }
// }













if (isset($fundAllotmentform)) {
  $sql = "INSERT INTO `tbl_fundallotment`( `fund_allotment`, `fallotment_year`, `fund_type`) VALUES ('$fund_allotment','$fallotment_year','$fund_type')";
  $query = $conn->query($sql);
}

if (isset($editfundAllotmentform)) {
  $sql = "UPDATE `tbl_fundallotment` SET `fund_allotment`='$fund_allotment',`fallotment_year`='$fallotment_year',`fund_type`='$fund_type' WHERE `fallotment_id` = '$fallotment_id'";
  $query = $conn->query($sql);
}

if (isset($_GET['fallotment_id'])) {
  $fallotment_id = $_GET['fallotment_id'];
  $fund_type = $_GET['fund_type'];
  $query = "SELECT * FROM `tbl_fundallotment` WHERE `fallotment_id` = '$fallotment_id' AND `fund_type` = '$fund_type'";
  $result = $conn->query($query);
  echo json_encode($result->fetch_assoc());
}


if (isset($_GET['employee_id'])) {
  $employee_id = mysqli_real_escape_string($conn, $_GET['employee_id']);
  $query = "SELECT * FROM `tbl_employee` WHERE `employee_id` = '$employee_id'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
  } else {
    echo json_encode(["error" => "Employee not found"]);
  }
}


if (isset($employeeformUpdate)) {

  if (!empty($_FILES['employee_img']['name'])) {
    $fileName = $_FILES['employee_img']['name'];
    $fileTemp = $_FILES['employee_img']['tmp_name'];
    $exp = explode(".", $fileName);
    $extension = end($exp);

    $newFileName = time() . "." . $extension;
    move_uploaded_file($fileTemp, "../profile/" . $newFileName);
  } else {

    $newFileName = $_POST['current'];
  }

  $sql = "UPDATE `tbl_employee` SET `employee_name`='$employee_name',`employee_position`='$employee_position',`employee_add`='$employee_add',`employee_phone`='$employee_phone',`employee_email`='$employee_email',`employee_bd`='$employee_bd',`employee_img`='$newFileName' WHERE `employee_id` = '$employee_id'";

  $query = $conn->query($sql);
}


if (isset($cafoaForm)) {
  // Insert into tbl_cafoa
  $sql = "INSERT INTO `tbl_cafoa`(
              `cafoa__request`, `cafoa__payee`, `cafoa__budget`, 
              `cafoa__amountreq`, `cafoa__amountwords`, 
              `cafoa__tresurer`, 
              `cafoa__requesting`, `cafoa__requestingdate`, 
              `cafoa__accountant`, `date`
          ) VALUES (
              '$cafoa__request', '$cafoa__payee', '$cafoa__budget', 
             '$cafoa__amountreq', '$cafoa__amountwords', 
              '$cafoa__tresurer', 
              '$cafoa__requesting', '$cafoa__requestingdate', 
              '$cafoa__accountant', NOW()
          )";

  $query = $conn->query($sql);

  if ($query) {
    // Get the last inserted ID for tbl_cafoa
    $last_id = $conn->insert_id;

    // Ensure inputs are arrays
    if (is_array($function) && is_array($allotment) && is_array($expense) && is_array($amount)) {
      // Loop through the arrays of inputs
      for ($i = 0; $i < count($function); $i++) {
        $currentFunction = $function[$i] ?? '';
        $currentAllotment = $allotment[$i] ?? '';
        $currentExpense = $expense[$i] ?? '';
        $currentAmount = $amount[$i] ?? '';

        // Insert into tbl_cafoajoin
        $sql1 = "INSERT INTO `tbl_cafoajoin`(
                        `cafoa_id`, `function`, `allotment`, `expense`, `amount`
                     ) VALUES (
                        '$last_id', '$currentFunction', '$currentAllotment', 
                        '$currentExpense', '$currentAmount'
                     )";

        $query1 = $conn->query($sql1);

        if (!$query1) {
          echo "Error inserting row $i into tbl_cafoajoin: " . $conn->error;
        }
      }
    } else {
      echo "Error: Input variables are not arrays.";
    }
  } else {
    echo "Error inserting into tbl_cafoa: " . $conn->error;
  }
}





if (isset($_GET['supply_id'])) {
  $supply_id = $_GET['supply_id'];
  $query = "SELECT * FROM `tbl_supply` WHERE `supply_id` = '$supply_id'";
  $result = $conn->query($query);
  echo json_encode($result->fetch_assoc());
}


if (isset($Updatesupplyform)) {

  $sql = "UPDATE `tbl_supply` SET `supply_type`='$supply_type' WHERE `supply_id` = '$supply_id'";
  $query = $conn->query($sql);
  if ($query) {
    echo "1";
  } else {
    echo "0";
  }
}




if (isset($_GET['unit_id'])) {
  $unit_id = $_GET['unit_id'];
  $query = "SELECT * FROM `tbl_unit` WHERE `unit_id` = '$unit_id'";
  $result = $conn->query($query);
  echo json_encode($result->fetch_assoc());
}


if (isset($UpdateUnitform)) {

  $sql = "UPDATE `tbl_unit` SET `unit_name`='$unit_name' WHERE `unit_id` = '$unit_id'";
  $query = $conn->query($sql);
  if ($query) {
    echo "1";
  } else {
    echo "0";
  }
}


if (isset($_GET['removetenants'])) {
  $employee_id = $_GET['employee_id'];
  // Update the tenant's room_id to NULL and status to 3
  $sql = "UPDATE `tbl_employee` SET `status` = 0 WHERE `employee_id` = '$employee_id'";
  $query = $conn->query($sql);
}



if (isset($_GET['deleteproduct'])) {
  $product_id = $_GET['product_id'];
  $sql = "DELETE FROM `tbl_product` WHERE `product_id` = '$product_id'";
  $query = $conn->query($sql);
  if ($query) {
    echo "Product deleted successfully.";
  } else {
    echo "Failed to delete product.";
  }
  exit;
}

if (isset($_GET['deletesupply'])) {
  $supply_id = $_GET['supply_id'];

  // Delete from tbl_supply
  $sql = "DELETE FROM `tbl_supply` WHERE `supply_id` = '$supply_id'";
  $query1 = $conn->query($sql);

  // Delete from tbl_product
  $sql1 = "DELETE FROM `tbl_product` WHERE `supply_id` = '$supply_id'";
  $query2 = $conn->query($sql1);

  if ($query1 && $query2) {
    echo "Supply and associated products deleted successfully.";
  } else {
    echo "Failed to delete supply or products.";
  }

  exit;
}




if (isset($_GET['deleterow'])) {
  $prog_id = $_GET['prog_id'];
  $reference_id = $_GET['reference_id'];

  $fetch = "SELECT * FROM `tbl_genfund` WHERE `prog_id` = '$prog_id'";
  $result = $conn->query($fetch);
  $row = $result->fetch_array();
  $exp_mooe = $row['exp_mooe'];

  $fetch = "SELECT * FROM `tbl_fundallotment` WHERE `reference_id` = '$reference_id'";
  $result = $conn->query($fetch);
  $row = $result->fetch_array();
  $fund_allotmentbal = $row['fund_allotmentbal'];

  $new = $exp_mooe + $fund_allotmentbal;



  $updatethis = "UPDATE `tbl_fundallotment` SET `fund_allotmentbal`='$new' WHERE  `reference_id` = '$reference_id'";
  $query = $conn->query($updatethis);


  $deletethis = "DELETE FROM `tbl_genfund` WHERE  `prog_id` = '$prog_id'";
  $query = $conn->query($deletethis);
}


if (isset($_GET['deleterows'])) {
  $prog_id = $_GET['prog_id'];
  $reference_id = $_GET['reference_id'];

  $fetch = "SELECT * FROM `tbl_stf` WHERE `prog_id` = '$prog_id'";
  $result = $conn->query($fetch);
  $row = $result->fetch_array();
  $exp_mooe = $row['exp_mooe'];

  $fetch = "SELECT * FROM `tbl_fundallotment` WHERE `reference_id` = '$reference_id'";
  $result = $conn->query($fetch);
  $row = $result->fetch_array();
  $fund_allotmentbal = $row['fund_allotmentbal'];

  $new = $exp_mooe + $fund_allotmentbal;



  $updatethis = "UPDATE `tbl_fundallotment` SET `fund_allotmentbal`='$new' WHERE  `reference_id` = '$reference_id'";
  $query = $conn->query($updatethis);


  $deletethis = "DELETE FROM `tbl_stf` WHERE  `prog_id` = '$prog_id'";
  $query = $conn->query($deletethis);
}


if (isset($_GET['approved'])) {
  $dv_id = $_GET['dv_id'];
  // Update the tenant's room_id to NULL and status to 3
  $sql = "UPDATE `tbl_dvvat` SET `dv_status` = 'Approved' WHERE `dv_id` = '$dv_id'";
  $query = $conn->query($sql);
}
if (isset($_GET['disapproved'])) {
  $dv_id = $_GET['dv_id'];
  // Update the tenant's room_id to NULL and status to 3
  $sql = "UPDATE `tbl_dvvat` SET `dv_status` = 'Rejected' WHERE `dv_id` = '$dv_id'";
  $query = $conn->query($sql);
}



if (isset($_GET['authorizer_id'])) {
  $authorizer_id = $_GET['authorizer_id'];
  $query = "SELECT * FROM `tbl_authorizers` WHERE `authorizer_id` = '$authorizer_id'";
  $result = $conn->query($query);
  echo json_encode($result->fetch_assoc());
}


if (isset($authorizerformupdate)) {
  $sql = "UPDATE `tbl_authorizers` SET`authorizer_name`='$authorizer_name',`app_level`='$app_level' WHERE `authorizer_id` ='$authorizer_id'";
  $query = $conn->query($sql);
}
