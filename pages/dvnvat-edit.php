<?php
  session_start();
  if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    exit();
  }

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>DV Non-VAT</title>
  <link rel="stylesheet" href="../dist/css/dv-nonvat.css">
  <?php include 'link.php' ?>
</head>

<body class="hold-transition sidebar-mini">
  <?php
  include '../inc/conn.php';

  if (isset($_GET['dv_id']) && isset($_GET['dv_type']) && isset($_GET['dv_status'])) {

    $query = mysqli_query($conn, "SELECT tbl_level_auth.*, tbl_dvvat.*  
					FROM tbl_dvvat  
					INNER JOIN tbl_level_auth 
					ON tbl_dvvat.dv_id = tbl_level_auth.dv_id 
			
					WHERE tbl_dvvat.dv_id = '{$_GET['dv_id']}' 
					AND tbl_dvvat.dv_type = '{$_GET['dv_type']}' 
					AND tbl_dvvat.dv_status = '{$_GET['dv_status']}'");
    $result = mysqli_fetch_array($query);
    extract($result);
  }
  ?>




  <?php
  $conn = new mysqli('localhost', 'root', '', 'mdrsystem');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch all authorizers
  function fetch_authorizer($conn)
  {
    $sql = mysqli_query($conn, "SELECT * FROM `tbl_authorizers`");
    return $sql;
  }

  // Fetch authorizer name for level_a
  function fetch_level_a_authorizer($conn, $dv_id)
  {
    $sql = mysqli_query($conn, "SELECT tbl_authorizers.authorizer_id, tbl_authorizers.authorizer_name
    FROM tbl_authorizers
    INNER JOIN tbl_level_auth
    ON tbl_authorizers.authorizer_id = tbl_level_auth.level_a
    WHERE tbl_level_auth.dv_id = $dv_id");

    if ($row = mysqli_fetch_array($sql)) {
      return $row['authorizer_name']; // Return the authorizer name for level_a
    }
    return null;
  }

  // Replace $_GET['dv_id'] with a valid ID for testing
  $dv_id = isset($_GET['dv_id']) ? $_GET['dv_id'] : 1; // Default ID for demonstration

  // Fetch the authorizer name for level_a
  $level_a_authorizer = fetch_level_a_authorizer($conn, $dv_id);




  function fetch_level_b_authorizer($conn, $dv_id)
  {
    $sql = mysqli_query($conn, "SELECT tbl_authorizers.authorizer_id, tbl_authorizers.authorizer_name
    FROM tbl_authorizers
    INNER JOIN tbl_level_auth
    ON tbl_authorizers.authorizer_id = tbl_level_auth.level_b
    WHERE tbl_level_auth.dv_id = $dv_id");

    if ($row = mysqli_fetch_array($sql)) {
      return $row['authorizer_name']; // Return the authorizer name for level_a
    }
    return null;
  }

  // Replace $_GET['dv_id'] with a valid ID for testing
  $dv_id = isset($_GET['dv_id']) ? $_GET['dv_id'] : 1; // Default ID for demonstration

  // Fetch the authorizer name for level_a
  $level_b_authorizer = fetch_level_b_authorizer($conn, $dv_id);


  function fetch_level_c_authorizer($conn, $dv_id)
  {
    $sql = mysqli_query($conn, "SELECT tbl_authorizers.authorizer_id, tbl_authorizers.authorizer_name
    FROM tbl_authorizers
    INNER JOIN tbl_level_auth
    ON tbl_authorizers.authorizer_id = tbl_level_auth.level_c
    WHERE tbl_level_auth.dv_id = $dv_id");

    if ($row = mysqli_fetch_array($sql)) {
      return $row['authorizer_name']; // Return the authorizer name for level_a
    }
    return null;
  }

  // Replace $_GET['dv_id'] with a valid ID for testing
  $dv_id = isset($_GET['dv_id']) ? $_GET['dv_id'] : 1; // Default ID for demonstration

  // Fetch the authorizer name for level_a
  $level_c_authorizer = fetch_level_c_authorizer($conn, $dv_id);


  function fetch_level_d_authorizer($conn, $dv_id)
  {
    $sql = mysqli_query($conn, "SELECT tbl_authorizers.authorizer_id, tbl_authorizers.authorizer_name
    FROM tbl_authorizers
    INNER JOIN tbl_level_auth
    ON tbl_authorizers.authorizer_id = tbl_level_auth.level_d
    WHERE tbl_level_auth.dv_id = $dv_id");

    if ($row = mysqli_fetch_array($sql)) {
      return $row['authorizer_name']; // Return the authorizer name for level_a
    }
    return null;
  }

  // Replace $_GET['dv_id'] with a valid ID for testing
  $dv_id = isset($_GET['dv_id']) ? $_GET['dv_id'] : 1; // Default ID for demonstration

  // Fetch the authorizer name for level_a
  $level_d_authorizer = fetch_level_d_authorizer($conn, $dv_id);



  function fetch_level_e_authorizer($conn, $dv_id)
  {
    $sql = mysqli_query($conn, "SELECT tbl_authorizers.authorizer_id, tbl_authorizers.authorizer_name
    FROM tbl_authorizers
    INNER JOIN tbl_level_auth
    ON tbl_authorizers.authorizer_id = tbl_level_auth.level_e
    WHERE tbl_level_auth.dv_id = $dv_id");

    if ($row = mysqli_fetch_array($sql)) {
      return $row['authorizer_name']; // Return the authorizer name for level_a
    }
    return null;
  }

  // Replace $_GET['dv_id'] with a valid ID for testing
  $dv_id = isset($_GET['dv_id']) ? $_GET['dv_id'] : 1; // Default ID for demonstration

  // Fetch the authorizer name for level_a
  $level_e_authorizer = fetch_level_e_authorizer($conn, $dv_id);


  function fetch_level_f_authorizer($conn, $dv_id)
  {
    $sql = mysqli_query($conn, "SELECT tbl_authorizers.authorizer_id, tbl_authorizers.authorizer_name
    FROM tbl_authorizers
    INNER JOIN tbl_level_auth
    ON tbl_authorizers.authorizer_id = tbl_level_auth.level_f
    WHERE tbl_level_auth.dv_id = $dv_id");

    if ($row = mysqli_fetch_array($sql)) {
      return $row['authorizer_name']; // Return the authorizer name for level_a
    }
    return null;
  }

  // Replace $_GET['dv_id'] with a valid ID for testing
  $dv_id = isset($_GET['dv_id']) ? $_GET['dv_id'] : 1; // Default ID for demonstration

  // Fetch the authorizer name for level_a
  $level_f_authorizer = fetch_level_f_authorizer($conn, $dv_id);





  ?>


  <div class="wrapper">
    <?php include 'sidebar.php' ?>
    <div class="content-wrapper">
      <style>
        .select2-selection.select2-selection--single {
          border: unset !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
          display: none !important;
        }

        .select2-selection__rendered {
          font-family: Arial, Helvetica, sans-serif;
          font-size: 12pt;
          color: #000;

        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
          color: #444;
          line-height: 28px;
          font-weight: 700 !important;
        }
      </style>
      <section class="content">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="dvnvat__head" style="margin-top: 0.5rem;">
              <p style=" display:inline-block;font-size: 1.4rem;margin: unset;background-color: #007bff;color:#fff;padding:0.2rem;">DV (Non-VAT) Form</p>
            </div>
          </div>
          <div class="col-sm-6">

           
          </div>
        </div>

        <div class=" container-fluid">
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class=" main__content col-md-10" id="nvatcontent">
              <div class="main_wrapper  flex flex-justify--center pb--5">

                <body link='blue' vlink='purple'>
                  <form id=".dvnvatform">

                    <input type="hidden" name="dvtype" value="dvnvat">

                    <table border='0' cellpadding='0' cellspacing='0' width='824' style='border-collapse:separate;
												table-layout:fixed;width:730pt'>
                      <col class='x24' width='66' style='mso-width-source:userset;background:none;width:49.5pt' />
                      <col class='x24' width='121' style='mso-width-source:userset;background:none;width:90.75pt' />
                      <col class='x24' width='72' style='mso-width-source:userset;background:none;width:54pt' />
                      <col class='x24' width='75' style='mso-width-source:userset;background:none;width:56.25pt' />
                      <col class='x24' width='124' style='mso-width-source:userset;background:none;width:93pt' />
                      <col class='x24' width='81' style='mso-width-source:userset;background:none;width:60.75pt' />
                      <col class='x24' width='83' style='mso-width-source:userset;background:none;width:62.25pt' />
                      <col class='x24' width='138' style='mso-width-source:userset;background:none;width:103.5pt' />
                      <col width='64' style='width:48pt' />
                      <tr height='24' class='x22' style='mso-height-source:userset;height:18pt'>
                        <td colspan='8' height='24' width='760' style='text-align: left;height:18pt;vertical-align:top;' align='left'><span style='mso-ignore:vglayout;position:absolute;z-index:12;margin-left:77px;margin-top:0px;width:493px;height:113px'><img width='493' height='113' src="data:image/png;base64,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" name='Picture12' alt='1' /></span><span style='mso-ignore:vglayout2'>
                            <table cellpadding='0' cellspacing='0'>
                              <tr>
                                <td colspan='8' height='24' class='x112' width='760' style='height:18pt;'></td>
                              </tr>
                            </table>
                          </span></td>
                        <td class='x23' width='64' style='width:48pt;'></td>
                      </tr>
                      <tr height='24' class='x22' style='mso-height-source:userset;height:18pt'>
                        <td colspan='8' height='24' width='760' style='text-align: left;height:18pt;width:570pt;vertical-align:top;' align='left'><span style='mso-ignore:vglayout;position:absolute;z-index:13;margin-left:530px;margin-top:8px;width:99px;height:68px'><img width='99' height='68' src="data:image/png;base64,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" name='Picture13' alt='1' /></span><span style='mso-ignore:vglayout2'>
                            <table cellpadding='0' cellspacing='0'>
                              <tr>
                                <td colspan='8' height='24' class='x112' width='760' style='height:18pt;width:570pt;'></td>
                              </tr>
                            </table>
                          </span></td>
                        <td class='x23'><button type="button" style="display: none;" name="dvnvatform">SUBMIT</button></td>
                      </tr>
                      <tr height='24' class='x22' style='mso-height-source:userset;height:18pt'>
                        <td colspan='8' height='24' class='x112' style='height:18pt;'></td>
                        <td class='x23'></td>
                      </tr>
                      <tr height='24' class='x22' style='mso-height-source:userset;height:18pt'>
                        <td height='24' class='x25' style='height:18pt;'></td>
                        <td class='x25'></td>
                        <td class='x25'></td>
                        <td class='x25'></td>
                        <td class='x25'></td>
                        <td class='x25'></td>
                        <td class='x25'></td>
                        <td class='x25'></td>
                        <td class='x23'></td>
                      </tr>
                      <tr height='24' style='mso-height-source:userset;height:18pt'>
                        <td colspan='9' height='24' class='x26' style='mso-ignore:colspan;height:18pt;'></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='7' height='19' class='x27' style='mso-ignore:colspan;border-right:1px solid windowtext;height:14.25pt;'></td>
                        <td rowspan='2' height='40' class='x146 flex flex-align--center ' style='border-bottom:1px solid windowtext;height:30pt;'>
                          <p class=" align-self-center  ">Fund:</p>
                          <input name="dv_fund" placeholder="Fund" type="text" id="dv_fund" value="<?php echo $dv_fund ?>"
                            class="general_update "
                            data-table_db="tbl_dvvat"
                            data-column_up="dv_fund"
                            data-condition="dv_id"
                            data-identifier="<?php echo $_GET['dv_id']; ?>">

                        </td>
                      </tr>

                      <tr height='27' style='mso-height-source:userset;height:20.25pt'>
                        <td colspan='7' height='27' class='x131' style='border-right:1px solid windowtext;height:20.25pt;'>
                          <p class="dv_head underline">DISBURSEMENT VOUCHER</p>

                        </td>

                        <td class='x33'>
                          <p>DV No.:<input name="dv_no" placeholder="DV No." type="text" id="dv_no" value="<?php echo $dv_no ?>"
                              class="general_update "
                              data-table_db="tbl_dvvat"
                              data-column_up="dv_no"
                              data-condition="dv_id"
                              data-identifier="<?php echo $_GET['dv_id']; ?>"></p>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='7' height='20' width='622' style='text-align: left;border-right:1px solid windowtext;height:15pt;width:466.5pt;vertical-align:top;' align='left'><span style='mso-ignore:vglayout;position:absolute;z-index:4;margin-left:102px;margin-top:0px;width:392px;height:1px'></span><span style='mso-ignore:vglayout2'>
                            <table cellpadding='0' cellspacing='0'>
                              <tr>
                                <td colspan='7' height='20' class='x134' width='622' style='height:15pt;width:466.5pt;'>
                                </td>
                              </tr>
                            </table>
                          </span></td>
                        <td class='x34'></td>
                        <td></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='7' height='19' class='x35' style='mso-ignore:colspan;height:14.25pt;border-right: 1px solid windowtext;'></td>
                        <td class='x37'>

                          <p>Date <input name="dv_date" placeholder="Date" type="date" value="<?php echo $dv_date ?>" id="dv_date"
                              class="general_update "
                              data-table_db="tbl_dvvat"
                              data-column_up="dv_date"
                              data-condition="dv_id"
                              data-identifier="<?php echo $_GET['dv_id']; ?>"></p>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td rowspan='2' height='41' class='x137' style='border-bottom:1px solid windowtext;height:30.75pt;'>
                          <p>Payee:</p>
                        </td>
                        <td colspan='6' rowspan='2' height='41' class='x142' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:30.75pt;overflow:hidden;'>
                          <input name="dv_payee" placeholder="Payee" type="text" id="dv_payee"
                            class="general_update "
                            data-table_db="tbl_dvvat"
                            data-column_up="dv_payee"
                            data-condition="dv_id"
                            data-identifier="<?php echo $_GET['dv_id']; ?>" value="<?php echo $dv_payee ?>">
                        </td>
                        <td class='x38'>
                          <p>ID No./TIN: <input name="dv_tin" value="<?php echo $dv_tin ?>" placeholder="ID No./TIN:" type="text" id="dv_tin"
                              class="general_update "
                              data-table_db="tbl_dvvat"
                              data-column_up="dv_tin"
                              data-condition="dv_id"
                              data-identifier="<?php echo $_GET['dv_id']; ?>"></p>
                        </td>

                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td class='x37 cafoa__inputs' style="border-bottom: 1px solid windowtext;">
                          <p>CAFOA No.:
                            <input name="dv_cafoa" value="<?php echo $dv_cafoa ?>" placeholder="CAFOA No" type="text" id="dv_cafoa"
                              class="general_update "
                              data-table_db="tbl_dvvat"
                              data-column_up="dv_cafoa"
                              data-condition="dv_id"
                              data-identifier="<?php echo $_GET['dv_id']; ?>">
                          </p>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td rowspan='2' height='42' class='x137' style='height:31.5pt;border-bottom: 1px solid windowtext;'>
                          <p>Address: </p>
                        </td>
                        <td colspan='6' rowspan='2' height='42' class='x142' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;border-right:1px solid windowtext;height:31.5pt;'>
                          <input name="dv_add" placeholder="Address" type="text" value="<?php echo $dv_add ?>" id="dv_add"
                            class="general_update address__field "
                            data-table_db="tbl_dvvat"
                            data-column_up="dv_add"
                            data-condition="dv_id"
                            data-identifier="<?php echo $_GET['dv_id']; ?>">
                        </td>
                        <td class='x39 flex flex-direction--col flex-align--center' style="border-left: 1px solid windowtext;border-bottom: unset !important;border-top: 1px solid windowtext;">
                          <p>Responsibility Center:</p>
                          <input name="dv_rcenter" value="<?php echo $dv_rcenter ?>" placeholder="Responsibility Center " type="text" id="dv_rcenter"
                            class="general_update center__field"
                            data-table_db="tbl_dvvat"
                            data-column_up="dv_rcenter"
                            data-condition="dv_id"
                            data-identifier="<?php echo $_GET['dv_id']; ?>">
                        </td>
                        <td></td>
                      </tr>
                      <tr height='22' style='mso-height-source:userset;height:16.5pt'>
                        <td class='x41' style="border-left:1px solid windowtext;border-bottom: 1px solid windowtext;"></td>
                        <td></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='7' rowspan='2' height='38' class='x152' style='border-right:1px solid windowtext;border-top:1px solid windowtext;height:28.7pt;'>Particulars
                        </td>
                        <td rowspan='2' height='35' class='x158' style='height:26.45pt;border-top: 1px solid windowtext;border-left: 1px solid windowtext;'>Amount</td>
                        <td></td>
                      </tr>
                      <tr height='19' style='mso-height-source:userset;height:14.45pt'>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='7' rowspan='4' height='82' class='x165' style='border-right:1px solid windowtext;height:62.1pt;'>
                          <input type="text" name="dv_particulars" value="<?php echo $dv_particulars ?>" placeholder="Particulars" id="dv_particulars"
                            class="general_update particulars__area "
                            data-table_db="tbl_dvvat"
                            data-column_up="dv_particulars"
                            data-condition="dv_id"
                            data-identifier="<?php echo $_GET['dv_id']; ?>"></input>
                        </td>
                        <td class='x44' style="border-left: 1px solid windowtext;"></td>
                        <td></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td rowspan='3' height='61' class='x164' x:num='9900' style='height:46.35pt;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </span><input name="dv_amnt" placeholder="Amount" type="number" id="dv_amnt" value="<?php echo $dv_amnt ?>"
                            class="general_update"
                            data-table_db="tbl_dvvat"
                            data-column_up="dv_amnt"
                            data-condition="dv_id"
                            data-identifier="<?php echo $_GET['dv_id']; ?>">&nbsp;</td>
                        <td></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15.6pt'>
                        <td></td>
                      </tr>

                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>

                        <td></td>
                      </tr>
                      <tr height='22' style='mso-height-source:userset;height:16.5pt'>
                        <td colspan='5' height='21' class='x46' style='mso-ignore:colspan;height:15.75pt;border-bottom: 2px solid windowtext;'></td>
                        <td class='x48' style="border-bottom: 2px solid windowtext;">
                          <div style='margin-left:-60px'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span>Amount Due</div>
                        </td>
                        <td class='x49' style="border-bottom: 2px solid windowtext;"></td>
                        <td class='x63' style="border-left: 1px solid windowtext;border-bottom: 2px solid windowtext;" align='right' x:num='9900' x:fmla='=SUM(H18-F23)'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </span><input name="dv_amntdue" value="<?php echo $dv_amntdue ?>" placeholder="Amount Due" type="number" id="dv_amntdue"
                            class="general_update"
                            data-table_db="tbl_dvvat"
                            data-column_up="dv_amntdue"
                            data-condition="dv_id"
                            data-identifier="<?php echo $_GET['dv_id']; ?>">&nbsp;</td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='2' height='21' width='187' style='mso-ignore:colspan;text-align: left;height:15.75pt;width:140.25pt;vertical-align:top;' align='left'><span style='mso-ignore:vglayout;position:absolute;z-index:1;margin-left:1px;width:21px;height:20px' class="a__field flex flex-justify--center">A</span><span style='mso-ignore:vglayout2'>
                            <table cellpadding='0' cellspacing='0'>
                              <tr>
                                <td colspan='2' height='21' class='x51' width='187' style='mso-ignore:colspan;height:15.75pt;width:140.25pt;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Certified:</span></td>
                              </tr>
                            </table>
                          </span></td>
                        <td class='x43'></td>
                        <td colspan='2' height='21' width='199' style='mso-ignore:colspan;text-align: left;height:15.75pt;width:149.25pt;vertical-align:top;' align='left'><span style='mso-ignore:vglayout;position:absolute;z-index:5;margin-left:1px;width:21px;height:20px' class="a__field flex flex-justify--center">B</span><span style='mso-ignore:vglayout2'>
                            <table cellpadding='0' cellspacing='0'>
                              <tr>
                                <td colspan='2' height='21' class='x52' width='199' style='mso-ignore:colspan;height:15.75pt;width:149.25pt;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Certified:</td>
                              </tr>
                            </table>
                          </span></td>
                        <td class='x53'></td>
                        <td colspan='2' height='21' width='221' style='mso-ignore:colspan;text-align: left;border-right:2px solid windowtext;height:15.75pt;width:165.75pt;vertical-align:top;' align='left'><span style='mso-ignore:vglayout;position:absolute;z-index:6;margin-left:1px;width:21px;height:20px' class="a__field flex flex-justify--center">C</span><span style='mso-ignore:vglayout2'>
                            <table cellpadding='0' cellspacing='0'>
                              <tr>
                                <td colspan='2' height='21' class='x52' width='221' style='mso-ignore:colspan;height:15.75pt;width:165.75pt;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Certified:</td>
                              </tr>
                            </table>
                          </span></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x113' style='border-right:1px solid windowtext;height:15.75pt;overflow:hidden;vertical-align:top;'>
                          <p>Expenses/Cash Advances necessary,<br>valid,proper, lawful and incurred <br>
                            under my direct supervision.
                          </p>
                        </td>
                        <td colspan='3' class='x116' style='border-right:1px solid windowtext;overflow:hidden;'>
                          <p>Completeness and propriety of supporting <br>
                            documents/previous cash advance <br>
                            liquidated/existence of funds held in <br> trust.
                          </p>
                        </td>
                        <td colspan='2' class='x56' style='mso-ignore:colspan;border-right:2px solid windowtext;vertical-align:top;text-align:center;'>
                          <p>Funds available for the purpose.
                          </p>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x113' style='border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td colspan='3' class='x116' style='border-right:1px solid windowtext;'></td>
                        <td colspan='2' class='x57' style='mso-ignore:colspan;border-right:2px solid windowtext;'></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x113' style='border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td colspan='3' class='x116' style='border-right:1px solid windowtext;'></td>
                        <td colspan='2' class='x57' style='mso-ignore:colspan;border-right:2px solid windowtext;'></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x58' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td colspan='3' class='x116' style='border-right:1px solid windowtext;'></td>
                        <td colspan='2' class='x57' style='mso-ignore:colspan;border-right:2px solid windowtext;'></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x58' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td colspan='3' class='x57' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td colspan='2' class='x57' style='mso-ignore:colspan;border-right:2px solid windowtext;'></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x139 ' style='border-right:1px solid windowtext;height:15.75pt;'>&nbsp;
                          <div class="form-group" style="margin: unset;">
                            <select
                              style="width: 100%;"
                              name="a_name"
                              class="form-control select2 general_update"
                              data-table_db="tbl_level_auth"
                              data-column_up="level_a"
                              data-condition="level_auth_id"
                              data-identifier="<?php echo $level_auth_id; ?>">
                              <?php
                              // Fetch authorizers from the database
                              $fetch_authorizer = fetch_authorizer($conn);

                              while ($result = mysqli_fetch_assoc($fetch_authorizer)) {
                                // Determine if this authorizer is selected (for level_a)
                                $selected = ($result['authorizer_name'] === $level_a_authorizer) ? 'selected="selected"' : '';

                                // Output each authorizer as an option
                                echo "<option value='{$result['authorizer_id']}' $selected>
                                {$result['authorizer_name']}
                              </option>";
                              }
                              ?>
                            </select>
                          </div>

                        </td>
                        <td colspan='3' class='x162' style='border-right:1px solid windowtext;'>
                          <div class="form-group" style="margin: unset;">
                            <select  style="width: 100%;" name="b_name"
                            class="form-control select2 general_update"
                              data-table_db="tbl_level_auth"
                              data-column_up="level_b"
                              data-condition="level_auth_id"
                              data-identifier="<?php echo $level_auth_id; ?>">
                              <?php
                              $fetch_authorizer = fetch_authorizer($conn);
                              while ($result = mysqli_fetch_assoc($fetch_authorizer)) {
                                // Check if the current authorizer is the one in level_a
                                $selected = ($result['authorizer_name'] === $level_b_authorizer) ? 'selected="selected"' : '';
                                echo "<option value='{$result['authorizer_id']}' $selected>
                                {$result['authorizer_name']}
                              </option>";
                              }
                              ?>
                            </select>
                          </div>
                        </td>
                        <td colspan='2' class='x162' style='border-right:2px solid windowtext;'>
                          <div class="form-group" style="margin: unset;">
                            <select style="width: 100%;" name="c_name"
                            class="form-control select2 general_update"
                              data-table_db="tbl_level_auth"
                              data-column_up="level_c"
                              data-condition="level_auth_id"
                              data-identifier="<?php echo $level_auth_id; ?>">
                              <?php
                              $fetch_authorizer = fetch_authorizer($conn);
                              while ($result = mysqli_fetch_assoc($fetch_authorizer)) {
                                // Check if the current authorizer is the one in level_a
                                $selected = ($result['authorizer_name'] === $level_c_authorizer) ? 'selected="selected"' : '';
                                echo "<option value='{$result['authorizer_id']}' $selected>
                                {$result['authorizer_name']}
                              </option>";
                              }
                              ?>

                            </select>
                          </div>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='3' height='20' width='259' style='text-align: left;border-right:1px solid windowtext;height:15pt;width:194.25pt;vertical-align:top;' align='left'><span style='mso-ignore:vglayout2'>
                            <div class="a__position">
                              <table cellpadding='0' cellspacing='0' class="flex flex-justify--center">
                                <tr>
                                  <td colspan='3' height='20' class='x121' width='259' style='height:15pt;width:194.25pt; border-left:unset;'>
                                    <p style="display:inline-block;border-top:1px solid #000;text-align:center;width:17rem;">Local DRRM Officer -II</p>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </span></td>
                        <td colspan='3' height='20' width='280' style='text-align: left;border-right:1px solid windowtext;height:15pt;width:210pt;vertical-align:top;' align='left'><span style='mso-ignore:vglayout2'>
                            <div class="b__position">
                              <table cellpadding='0' cellspacing='0' class="flex flex-justify--center" style="border-left: 1px solid #000;">
                                <tr>
                                  <td colspan='3' height='20' class='x160' width='280' style='height:15pt;width:210pt;border-left:unset;'>
                                    <p style="display:inline-block;border-top:1px solid #000;text-align:center;width:17rem;">Municipal Accountant</p>

                                  </td>
                                </tr>
                              </table>
                            </div>
                          </span></td>
                        <td colspan='2' height='20' width='221' style='text-align: left;border-right:2px solid windowtext;height:15pt;width:165.75pt;vertical-align:top;' align='left'>
                          <span style='mso-ignore:vglayout2'>
                            <div class="c__position">
                              <table cellpadding='0' cellspacing='0' class="  flex flex-justify--center" style="border-left: 1px solid #000;height:27px ;">
                                <tr>
                                  <td colspan='2' height='20' class='x160 flex flex-justify--center' width='221' style='height:15pt;width:165.75pt;border-left:unset; border-top: 1px solid #000;
																	'>
                                    &nbsp;
                                    <p> Municipal Treasurer</p>

                                  </td>

                                </tr>
                              </table>
                            </div>
                          </span>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='3' height='20' class='x126' style='border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='3' class='x129' style='border-right:1px solid windowtext;'></td>
                        <td colspan='2' class='x129' style='border-right:2px solid windowtext;'></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='20' class='x46' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='3' class='x60' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td colspan='2' class='x60' style='mso-ignore:colspan;border-right:2px solid windowtext;'></td>
                        <td></td>
                      </tr>
                      <tr height='23' style='mso-height-source:userset;height:17.25pt'>
                        <td colspan='2' height='23' width='187' style='mso-ignore:colspan;height:17.25pt;width:140.25pt;;' align='left'>
                          <table cellpadding='0' cellspacing='0'>
                            <tr>
                              <td colspan='2' height='23' class='x95 flex' width='187' style='mso-ignore:colspan;height:17.25pt;width:140.25pt;border-left:px solid #000;height:25px; gap:2px;width:14rem;'> <span class="a__field" style="padding: 3px 5px 0px 4px; border-top:unset;">D</span>
                                <p style="padding-top: 5px;">Approved for Payment: ₱</p>
                              </td>

                            </tr>
                          </table>
                        </td>
                        <td class='x101' align='right' x:fmla='=H25' "> 
												<input  type=" text" style="border-bottom: 1px solid #000; height:22px" readonly></td>
                        <td colspan='3' class='x65' style='mso-ignore:colspan;border-right:1px solid windowtext;'> </td>
                        <td colspan='2' height='23' width='221' style='mso-ignore:colspan;text-align: left;border-top:1px solid;border-left:1px solid;border-right:2px solid windowtext;height:17.25pt;width:165.75pt;vertical-align:top;' align='left'>
                          <span class="a__field" style="padding: 3px 5px 0px 4px;border-left:unset;">E</span>
                          <span style='mso-ignore:vglayout2'>
                            <table cellpadding='0' cellspacing='0'>
                              <tr>

                              </tr>
                            </table>
                          </span>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x42' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td colspan='2' class='x69' style='mso-ignore:colspan;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Payment:</td>
                        <td class='x55'></td>
                        <td colspan='2' class='x56' style='mso-ignore:colspan;border-right:2px solid windowtext;'></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x42' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td colspan='3' height='21' width='280' style='mso-ignore:colspan;text-align: left;border-right:1px solid windowtext;height:15.75pt;width:210pt;vertical-align:top;' align='left'><span style='mso-ignore:vglayout2'>
                            <table cellpadding='0' cellspacing='0'>
                              <tr>
                                <td colspan='3' height='21' class='x69' width='280' style='mso-ignore:colspan;height:15.75pt;width:210pt;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </span><label for="checkno" style="margin: unset;">Check No:</label> <input type="text" style="border-bottom:1px solid #000; width:10rem;" readonly></td>
                              </tr>
                            </table>
                          </span></td>
                        <td colspan='2' rowspan='3' height='63' class='x169' x:fmla='=B11' style='border-right:2px solid windowtext;border-bottom:1px solid windowtext;height:47.25pt;'>
                          <div class="form-group" style="margin: unset;">
                            <select  style="width: 100%;" name="e_name"
                            class="form-control select2 general_update"
                              data-table_db="tbl_level_auth"
                              data-column_up="level_e"
                              data-condition="level_auth_id"
                              data-identifier="<?php echo $level_auth_id; ?>">
                              <?php
                              $fetch_authorizer = fetch_authorizer($conn);
                              while ($result = mysqli_fetch_assoc($fetch_authorizer)) {
                                // Check if the current authorizer is the one in level_a
                                $selected = ($result['authorizer_name'] === $level_e_authorizer) ? 'selected="selected"' : '';
                                echo "<option value='{$result['authorizer_id']}' $selected>
                                {$result['authorizer_name']}
                              </option>";
                              }
                              ?>
                            </select>
                          </div>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x42' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td colspan='3' class='x69' style='mso-ignore:colspan;border-right:1px solid windowtext;'>
                          <div class="flex" style="gap:9px">
                            <img src="/dist/img/custom-img/download__1_-removebg-preview.png" alt="">
                            <label for="bankname" style="margin:unset; align-self:center;">Bank Name:</label> <input type="text" style="border-bottom:1px solid #000; width:9.3rem;" readonly>
                          </div>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='20' class='x148' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:15pt;'>
                          <div class="form-group" style="margin: unset;">
                            <select  style="width: 100%;" name="d_name"
                            class="form-control select2 general_update"
                              data-table_db="tbl_level_auth"
                              data-column_up="level_d"
                              data-condition="level_auth_id"
                              data-identifier="<?php echo $level_auth_id; ?>">
                              <?php
                              $fetch_authorizer = fetch_authorizer($conn);
                              while ($result = mysqli_fetch_assoc($fetch_authorizer)) {
                                // Check if the current authorizer is the one in level_a
                                $selected = ($result['authorizer_name'] === $level_d_authorizer) ? 'selected="selected"' : '';
                                echo "<option value='{$result['authorizer_id']}' $selected>
                                {$result['authorizer_name']}
                              </option>";
                              }
                              ?>
                            </select>
                          </div>

                        </td>
                        <td colspan='3' class='x69' style='mso-ignore:colspan;border-right:1px solid windowtext;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </span><label for="date">Date:</label> <input type="text" style="border-bottom:1px solid #000; width:10rem;height:22px" readonly></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x121' style='border-right:1px solid windowtext;height:15.75pt;'>Municipal
                          Mayor</td>
                        <td colspan='3' class='x57' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td colspan='2' class='x124' style='border-right:2px solid windowtext;'>
                          <div style='margin-left:-10px'>&nbsp;Signature Over Printed Name/Position</div>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='21' class='x126' style='border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td colspan='3' class='x57' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td colspan='2' class='x72' style='mso-ignore:colspan;border-right:2px solid windowtext;border-bottom:none;'><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                          <label for="date-signature">Date</label> <input type="text" style="width:6rem;border-bottom:1px solid" readonly>
                        </td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='20' class='x46' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='3' class='x74' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x76' style="border-bottom: 1px solid windowtext;border-left: 1px solid windowtext;border-top: 2px solid windowtext;"></td>
                        <td class='x77'></td>
                        <td></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15.6pt'>
                        <td colspan='3' height='20' width='259' style='text-align: left;border-bottom:1px solid windowtext;border-left:2px solid windowtext;height:15.6pt;width:194.25pt;vertical-align:top;' align='left'> <span style='mso-ignore:vglayout2'>
                            <table cellpadding='0' cellspacing='0'>
                              <tr>
                                <td colspan='3' height='20' class='x118 ' width='259' style='border-left:none;border-bottom: none;height:15.6pt;width:19rem;'>
                                  <span class="a__field" style="padding: 3px 5px 4px 4px;border-bottom:unset;border-left:unset;">F</span>
                                </td>
                              </tr>
                            </table>
                          </span></td>
                        <td colspan='5' class='x64' style='mso-ignore:colspan;border-right:2px solid windowtext;border-bottom: 1px solid windowtext;'></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='4' height='19' class='x119' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:14.25pt;'>Particulars
                        </td>
                        <td class='x81'>Account Code</td>
                        <td colspan='2' class='x120' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                          Debit</td>
                        <td class='x82'>Credit</td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='4' height='20' class='x83' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td class='x84' style="border-left: 1px solid windowtext;border-right: 1px solid windowtext;"></td>
                        <td colspan='2' class='x86' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x87' style="border-left: 1px solid windowtext;"></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='4' height='21' class='x88' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td class='x90' style="border-bottom: 2px solid windowtext;"></td>
                        <td colspan='2' class='x91' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x44' style="border-left: 1px solid windowtext;"></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='4' height='21' class='x88' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td class='x76' style="border-left: 1px solid windowtext;border-right: 1px solid windowtext;"></td>
                        <td colspan='2' class='x91' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x44' style="border-left: 1px solid windowtext;"></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='4' height='21' class='x88' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td class='x76' style="border-left: 1px solid windowtext;border-right: 1px solid windowtext;"></td>
                        <td colspan='2' class='x91' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x44' style="border-left: 1px solid windowtext;"></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='4' height='21' class='x88' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td class='x76' style="border-left: 1px solid windowtext;border-right: 1px solid windowtext;"></td>
                        <td colspan='2' class='x91' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x44' style="border-left: 1px solid windowtext;"></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='4' height='21' class='x88' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td class='x76' style="border-left: 1px solid windowtext;border-right: 1px solid windowtext;"></td>
                        <td colspan='2' class='x91' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x44' style="border-left: 1px solid windowtext;"></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='4' height='20' class='x92' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td class='x76' style="border-left: 1px solid windowtext;border-right: 1px solid windowtext; border-bottom: 1px solid windowtext;"></td>
                        <td colspan='2' class='x91' style='mso-ignore:colspan;border-right:1px solid windowtext;border-bottom: 1px solid windowtext;'></td>
                        <td class='x44' style="border-left: 1px solid windowtext;border-bottom: 1px solid windowtext;"></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='2' height='21' class='x88' style='mso-ignore:colspan;height:15.75pt;border-top: 1px solid windowtext;'>
                          <p style="margin-left: 5px;">Prepared by:</p>
                        </td>
                        <td colspan='2' class='x76' style='mso-ignore:colspan;border-top: 1px solid windowtext;border-right: 1px solid windowtext;'></td>
                        <td class='x86' style="border-top: 1px solid windowtext !important;">Certified Correct:</td>
                        <td colspan='3' class='x84' style='mso-ignore:colspan;border-right:2px solid windowtext;'></td>
                        <td></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='4' height='21' class='x102' style='border-right:1px solid windowtext;height:15.75pt;'></td>
                        <td colspan='4' class='x108' style='border-right:2px solid windowtext;'>
                          <div class="form-group" style="margin: unset;">
                            <select  style="width: 100%;" name="f_name"
                            class="form-control select2 general_update"
                              data-table_db="tbl_level_auth"
                              data-column_up="level_f"
                              data-condition="level_auth_id"
                              data-identifier="<?php echo $level_auth_id; ?>">
                              <?php
                              $fetch_authorizer = fetch_authorizer($conn);
                              while ($result = mysqli_fetch_assoc($fetch_authorizer)) {
                                // Check if the current authorizer is the one in level_a
                                $selected = ($result['authorizer_name'] === $level_f_authorizer) ? 'selected="selected"' : '';
                                echo "<option value='{$result['authorizer_id']}' $selected>
                                {$result['authorizer_name']}
                              </option>";
                              }
                              ?>
                            </select>
                          </div>

                        </td>
                        <td></td>
                      </tr>
                      <tr height='22' style='mso-height-source:userset;height:16.5pt'>
                        <td colspan='4' height='20' class='x105' style='border-right:1px solid windowtext;border-bottom:2px solid windowtext;height:15pt;'>
                          <p style="display:inline-block;border-top:1px solid #000;text-align:center;width:22rem;">Admin-Assistant-1</p>
                        </td>
                        <td colspan='4' class='x110' style='border-right:2px solid windowtext;border-bottom:2px solid windowtext;'>
                          <p style="display:inline-block;border-top:1px solid #000;text-align:center;width:25rem;">Municipal Accountant</p>
                        </td>
                        <td></td>
                      </tr>
                      <![if supportMisalignedColumns]>
                      <tr height='0' style='display:none'>
                        <td width='66' style='width:49.5pt;'></td>
                        <td width='121' style='width:90.75pt;'></td>
                        <td width='72' style='width:54pt;'></td>
                        <td width='75' style='width:56.25pt;'></td>
                        <td width='124' style='width:93pt;'></td>
                        <td width='81' style='width:60.75pt;'></td>
                        <td width='83' style='width:62.25pt;'></td>
                        <td width='138' style='width:103.5pt;'></td>
                        <td width='64' style='width:48pt;'></td>
                      </tr>
                      <![endif]>
                    </table>
                  </form>

                </body>


              </div>
            </div>


          </div>
          <div class="col-md-1">

          </div>
        </div>
    </div>

    </section>
  </div>



  </div>
  <?php include 'script.php' ?>
  <script>
    $(function() {
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
  </script>
</body>

</html>