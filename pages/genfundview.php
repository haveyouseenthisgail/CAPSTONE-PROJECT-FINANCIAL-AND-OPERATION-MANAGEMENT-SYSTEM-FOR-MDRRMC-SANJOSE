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
  <title>AIP-GENFUND VIEW</title>
  <link rel="stylesheet" href="../dist/css/aip-genfund.css">
  <?php include 'link.php' ?>
</head>

<body class="hold-transition sidebar-mini">
  <style>
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>

  <div class="wrapper">
    <?php include 'sidebar.php' ?>
    <div class="content-wrapper">
      <?php
      include '../inc/conn.php';

      if (isset($_GET['reference_id'])) {
        $reference_id = $_GET['reference_id'];
        $query = mysqli_query($conn, "SELECT * FROM `tbl_genfund` WHERE `reference_id` = '$reference_id' ");
        $result = mysqli_fetch_array($query);
        extract($result);
      }

      $sql = "SELECT * FROM tbl_genfund ORDER BY reference_id ASC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row_count = 1;
        $rows = [];

        while ($row = $result->fetch_assoc()) {
          $row['row_count'] = $row_count;
          $rows[] = $row;
          $row_count++;
        }
      }




      $query = mysqli_query($conn, "SELECT SUM(exp_mooe) AS total_exp_mooe, SUM(first_quart) AS total_first_quart, SUM(second_quart) AS total_second_quart, SUM(third_quart) AS total_third_quart, SUM(fourth_quart) AS total_fourth_quart, SUM(remarks) AS total_remarks FROM `tbl_genfund` WHERE `reference_id` = '$reference_id'");
      if ($query) {
        $result = mysqli_fetch_array($query);
        $totalExpMooe = $result['total_exp_mooe'] ?? 0;
        $totalFirstQuart = $result['total_first_quart'] ?? 0;
        $totalSecondQuart = $result['total_second_quart'] ?? 0;
        $totalThirdQuart = $result['total_third_quart'] ?? 0;
        $totalFourthQuart = $result['total_fourth_quart'] ?? 0;
        $totalRemarks = $result['total_remarks'] ?? 0;
      }

      ?>


      <form action="../inc/controller.php" method="POST" id="genfundForm">


        <section class="content">
          <div class="container-fluid">
            <div class="row">
             
              <div class="col-md-12">
                <div class="" style="background-color:white;">

                  <body link='blue' vlink='purple' bgcolor='white'>
                    <div id='section'>
                      <div id='table_0' sheetName='AIP View (3)'>

                        <body link='blue' vlink='purple'>

                          <table border='0' cellpadding='0' cellspacing='0' width='1190' style='border-collapse:collapse;
														width:100%'>
                            <col width='50' style='mso-width-source:userset;width:37.5pt' />
                            <col width='35' style='mso-width-source:userset;width:26.25pt' />
                            <col width='157' style='mso-width-source:userset;width:117.75pt' />
                            <col width='86' style='mso-width-source:userset;width:64.5pt' />
                            <col width='72' style='mso-width-source:userset;width:54pt' />
                            <col width='71' style='mso-width-source:userset;width:53.25pt' />
                            <col width='177' style='mso-width-source:userset;width:132.75pt' />
                            <col width='65' style='mso-width-source:userset;width:48.75pt' />
                            <col width='64' style='width:48pt' />
                            <col width='84' style='mso-width-source:userset;width:63pt' />
                            <col width='74' style='mso-width-source:userset;width:55.5pt' />
                            <col width='96' style='mso-width-source:userset;width:72pt' />
                            <col width='88' style='mso-width-source:userset;width:66pt' />
                            <col width='71' style='mso-width-source:userset;width:53.25pt' />


                            <?php include 'includes/aip-genfund-tbl.php' ?>

                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
                              <td colspan='9' class='x46'>CARAGA REGION XIII</td>
                              <td colspan='2' class='x22' style='mso-ignore:colspan;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
                              <td colspan='9' class='x46'>PROVINCE OF DINAGAT ISLANDS</td>
                              <td colspan='2' class='x22' style='mso-ignore:colspan;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
                              <td colspan='9' class='x46'>SAN JOSE</td>
                              <td colspan='2' class='x22' style='mso-ignore:colspan;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='14' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
                              <td colspan='9' class='x46'>MUNICIPAL DISASTER RISK REDUCTION AND MANAGEMENT OFFICE</td>
                              <td colspan='2' class='x22' style='mso-ignore:colspan;'></td>
                            </tr>
                           
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='14' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
                              <td colspan='9' class='x46'>


                                <?php echo date('Y', strtotime($reference_id)) ?> ANNUAL INVESTMENT PROGRAM (AIP)
                              </td>
                              <td colspan='2' class='x22' style='mso-ignore:colspan;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'>
                                <input type="number" class="funds__remaining no-print" id="remaining-funds" style="outline:0;border:1px solid #fff;text-align:center;" readonly name="funds_remaining" inputmode="numeric" pattern="[0-9]*" value="<?php echo $funds_remaining ?>">
                              </td>
                              <td colspan='9' class='x46'>By Program/ Project/ Activity by Sector</td>
                              <td colspan='2' class='x22' style='mso-ignore:colspan;'></td>
                            </tr>
                            <![if supportMisalignedColumns]>
                            <tr height='0' style='display:none'>
                              <td width='50' style='width:37.5pt;'></td>
                              <td width='35' style='width:26.25pt;'></td>
                              <td width='157' style='width:117.75pt;'></td>
                              <td width='86' style='width:64.5pt;'></td>
                              <td width='72' style='width:54pt;'></td>
                              <td width='71' style='width:53.25pt;'></td>
                              <td width='177' style='width:132.75pt;'></td>
                              <td width='65' style='width:48.75pt;'></td>
                              <td width='64' style='width:48pt;'></td>
                              <td width='84' style='width:63pt;'></td>
                              <td width='74' style='width:55.5pt;'></td>
                              <td width='96' style='width:72pt;'></td>
                              <td width='88' style='width:66pt;'></td>
                              <td width='71' style='width:53.25pt;'></td>
                            </tr>
                            <![endif]>
                          </table>

                        </body>

                      </div>
                      <div id='table_1' sheetName='SHEET'>

                        <body link='blue' vlink='purple'>

                          <table border='0' cellpadding='0' cellspacing='0' width='1007' style='border-collapse:collapse;
														table-layout:fixed;width:100%'>
                            <col width='35' style='mso-width-source:userset;width:26.25pt' />
                            <col width='157' style='mso-width-source:userset;width:117.75pt' />
                            <col width='86' style='mso-width-source:userset;width:64.5pt' />
                            <col width='177' style='mso-width-source:userset;width:132.75pt' />
                            <col width='95' style='mso-width-source:userset;width:71.25pt' />
                            <col width='114' span='2' style='mso-width-source:userset;width:85.5pt' />
                            <col width='115' style='mso-width-source:userset;width:86.25pt' />
                            <col width='114' style='mso-width-source:userset;width:85.5pt' />
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='9' height='20' width='1007' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <tr height='40' style='mso-height-source:userset;height:30pt'>
                              <td height='38' class='x34' style='height:28.5pt;'></td>
                              <td class='x34'>Program/Project/Activities</td>
                              <td class='x34'>Implementing Office</td>
                              <td class='x34'>Expected Outputs</td>
                              <td class='x34'>Expenses (MOOE)</td>
                              <td colspan='4' class='x58' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>IMPLEMENTED</td>
                              <td class="x34 ">Remarks</td>
                            </tr>
                            <tr height='29' style='mso-height-source:userset;height:21.75pt'>
                              <td height='27' class='x34' style='height:20.25pt; cursor: pointer;'>

                              </td>
                              <td colspan='3' class='x48' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>PREVENTION AND MITIGATION</td>
                              <td class='x34'></td>
                              <td class='x44'>1ST QUARTER</td>
                              <td class='x44'>2nd QUARTER</td>
                              <td class='x44'>3rd QUARTER</td>
                              <td class='x44'>4th QUARTER</td>
                              <td class='x44'></td>
                            </tr>

                            <div class="prevmt__row" id="prevMt">
                              <?php
                              $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                              $query = mysqli_query($conn, "SELECT * FROM `tbl_genfund` WHERE `prog_type` = 'prevention'");

                              $counter = 1;

                              while ($result = mysqli_fetch_array($query)) {
                                extract($result);
                              ?>
                                <tr height='54' style='mso-height-source:userset;height:40.5pt' id="prevMtRow">
                                  <td height='52' class='x34' style='height:39pt;'>
                                    <input type="text" name="prog_no"
                                      value="<?php echo $counter; ?>"
                                      style="height: 32px;width: 30px;border: 1px solid #fff;outline:0;text-align: center;font-size: 13px;"
                                      readonly>
                                  </td>

                                  <td class='x31' style="padding-left:6px;">
                                    <textarea name="program1[]" id=""
                                      style="height: 51px;width:148px;border:1px solid #fff;outline:0;font-size:9pt;resize:none;"
                                      readonly> <?php echo $program ?> </textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea name="office1[]" id=""
                                      style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;"
                                      readonly> <?php echo $office ?> </textarea>
                                  </td>
                                  <td class='x29'>
                                    <textarea class="ex__outputs" name="exp_outputs1[]" id="textInput"
                                      style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;"
                                      readonly><?php echo $exp_outputs ?> </textarea>
                                  </td>
                                  <td class='x32'>
                                    <input type="number" name="exp_mooe1[]"
                                      style="height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;"
                                      value="<?php echo $exp_mooe ?>" readonly>
                                  </td>
                                  <td class='x38' style="align-items: center;height: 5rem;padding-left: 8px; padding-bottom:15px;">
                                    <input type="number" name="first_quart1[]"
                                      style="height: 51px;width:100px;outline:0;border:1px solid #fff;text-align:center;"
                                      value="<?php echo $first_quart ?>" readonly>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="second_quart1[]"
                                        style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;"
                                        value="<?php echo $second_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="third_quart1[]"
                                        style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;"
                                        value="<?php echo $third_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="fourth_quart1[]"
                                        style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;"
                                        value="<?php echo $fourth_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class="x38">
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="remark_one"
                                        style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;"
                                        readonly value="<?php echo $remarks ?>">
                                    </div>
                                  </td>

                                </tr>
                              <?php
                                $counter++;
                              }
                              ?>
                            </div>

                            <tr height='29' style='mso-height-source:userset;height:21.75pt'>
                              <td height='29' style='height:21.75pt;border-left:1px solid #000;padding-left:11px;padding-bottom: 3px;'>
                              </td>
                              <td colspan='3' class='x52' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>PREPAREDNESS</td>
                              <td class='x42'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                            </tr>
                            <div class="preparedness_row">
                              <?php
                              $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                              $query = mysqli_query($conn, "SELECT * FROM `tbl_genfund` WHERE `prog_type`= 'preparedness' ");

                              while ($result = mysqli_fetch_array($query)) {
                                extract($result);
                              ?>
                                <tr height='67' style='mso-height-source:userset;height:50.25pt' id="prepRow">
                                  <td height='65' class='x34' style='height:48.75pt;'>
                                    <input type="text" name="prog_no" value="<?php echo $counter ?>" style="height: 32px;width: 30px;border: 1px solid #fff;outline:0;text-align: center;font-size: 13px;">
                                  </td>
                                  <td class='x31' style="height: 5rem;padding-left: 8px;padding-top: 4px;">
                                    <textarea name="program2[]" id="" style="resize:none;border:1px solid #fff;outline:0;height:72px;width:144px;" readonly> <?php echo $program ?>  </textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea name="office2[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;" readonly><?php echo $office ?></textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea class="ex__outputs" name="exp_outputs2[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;" readonly><?php echo $exp_outputs ?></textarea>
                                  </td>
                                  <td class='x32' '>
															<input type="number" name="exp_mooe2[]" style=" height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;" value="<?php echo $exp_mooe ?>" readonly>
													</td>
														<td class=' x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="first_quart2[]" style="height: 51px;width:
														    		105px;outline:0;border:1px solid #fff;text-align:center;" value="<?php echo $first_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="second_quart2[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;" value="<?php echo $second_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="third_quart2[]" style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $third_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="fourth_quart2[]" style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $fourth_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class="x38">
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="remark_two" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;" readonly value="<?php echo $remarks ?>">
                                    </div>
                                  </td>

                                </tr>
                              <?php
                                $counter++;
                              }
                              ?>
                            </div>

                            <tr height='29' style='mso-height-source:userset;height:21.75pt'>
                              <td height='29' style='height:21.75pt;border-left:1px solid #000;padding-left: 11px;padding-bottom: 3px;'>

                              </td>
                              <td colspan='3' class='x55' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>PROVISION OF SUPPORT ON DRR/OPCEN OPERATIONS</td>
                              <td class='x43'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                            </tr>
                            <div class="support__row">
                              <?php
                              $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                              $query = mysqli_query($conn, "SELECT * FROM `tbl_genfund` WHERE `prog_type`= 'support' ");
                              while ($result = mysqli_fetch_array($query)) {
                                extract($result);

                              ?>
                                <tr height='67' style='mso-height-source:userset;height:50.25pt' id="supRow">
                                  <td height='65' class='x34' style='height:48.75pt;'>
                                    <input type="text" name="prog_no" value="<?php echo $counter ?>" style="height: 32px;width: 30px;border: 1px solid #fff;outline:0;text-align: center;font-size: 13px;">
                                  </td>
                                  <td class='x31' style="height: 5rem;padding-left: 8px;padding-top: 4px;">
                                    <textarea name="program3[]" id="" style="resize:none;border:1px solid #fff;outline:0;height:72px;width:144px;" readonly>
                                    <?php echo $program ?>
                                  </textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea name="office3[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;" readonly><?php echo $office ?></textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea class="ex__outputs" name="exp_outputs3[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;" readonly><?php echo $exp_outputs ?></textarea>
                                    </textarea>
                                  </td>
                                  <td class='x32' '>
															<input type="number" name="exp_mooe3[]" style=" height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;" value="<?php echo $exp_mooe ?>" readonly>
												    	</td>
														<td class=' x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="first_quart3[]" style="height: 51px;width:
																105px;outline:0;border:1px solid #fff;text-align:center;" value="<?php echo $first_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="second_quart3[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;" value="<?php echo $second_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="third_quart3[]" style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $third_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="fourth_quart3[]" style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $fourth_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class="x38">
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="remark_three" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;" readonly value="<?php echo $remarks ?>">
                                    </div>
                                  </td>
                                </tr>
                              <?php
                                $counter++;
                              }
                              ?>




                            </div>

                            <tr height='29' style='mso-height-source:userset;height:21.75pt;'>
                              <td height='29' style='height:21.75pt;border-left:1px solid #000;padding-left: 10px;padding-bottom: 3px;'>

                              </td>
                              <td colspan='3' class='x52' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>QUICK RESPONSE&nbsp;</td>
                              <td class='x43'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                            </tr>
                            <div class="response__row">
                              <?php
                              $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                              $query = mysqli_query($conn, "SELECT * FROM `tbl_genfund` WHERE `prog_type`= 'response' ");
                              while ($result = mysqli_fetch_array($query)) {
                                extract($result);
                              ?>
                                <tr height='67' style='mso-height-source:userset;height:50.25pt' id="respRow">
                                  <td height='65' class='x34' style='height:48.75pt;'>
                                    <input type="text" name="prog_no" value="<?php echo $counter ?>" style="height: 32px;width: 30px;border: 1px solid #fff;outline:0;text-align: center;font-size: 13px;">
                                  </td>
                                  <td class='x31' style="height: 5rem;padding-left: 8px;padding-top: 4px;text-align: left;">
                                    <textarea name="program4[]" id="" style="resize:none;border:1px solid #fff;outline:0;height:72px;width:100px;"readonly>
                                  <?php echo $program ?>
                                </textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea name="office4[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;" readonly><?php echo $office ?></textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea class="ex__outputs" name="exp_outputs4[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;" readonly><?php echo $exp_outputs ?></textarea>


                                  </td>
                                  <td class='x32' '>
															<input type="number" name="exp_mooe4[]" style=" height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;" value="<?php echo $exp_mooe ?>" readonly>
												    	</td>
														<td class=' x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="first_quart4[]" style="height: 51px;width:
																105px;outline:0;border:1px solid #fff;text-align:center;" value="<?php echo $first_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="second_quart4[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;"
                                        value="<?php echo $second_quart ?>" readonly>
                                    </div>
                                  </td>

                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="second_quart4[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;"
                                        value="<?php echo $third_quart ?>" readonly>
                                    </div>
                                  </td>

                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="second_quart4[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;"
                                        value="<?php echo $fourth_quart ?>" readonly>
                                    </div>
                                  </td>
                                  <td class="x38">
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="remark_four" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;" readonly value="<?php echo $remarks ?>">
                                    </div>
                                  </td>



                                </tr>
                              <?php
                                $counter++;
                              }
                              ?>
                            </div>
                            <tr height='25' style='mso-height-source:userset;height:18.75pt'>
                              <td colspan='2' height='23' class='x45' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:17.25pt;'>Grand Total</td>
                              <td class='x31'></td>
                              <td class='x31'></td>
                              <td class='x41'>
                                <input type="text" name="" id="" style="width: 5rem;border:unset;outline:0;font-size:9pt;text-align:center;font-weight:600;" value="<?php echo number_format($totalExpMooe, 2) ?>" readonly>
                              </td>
                              <td class='x38' style="padding-left:18px;"> <input type="text" name="" id="" style="width: 5rem;border:unset;outline:0;font-size:9pt;text-align:center;font-weight:600;" value="<?php echo number_format($totalFirstQuart, 2) ?>" readonly></td>
                              <td class='x38' style="padding-left:18px;"><input type="text" name="" id="" style="width: 5rem;border:unset;outline:0;font-size:9pt;text-align:center;font-weight:600;" value="<?php echo number_format($totalSecondQuart, 2) ?>" readonly></td>
                              <td class='x38' style="padding-left:18px;"><input type="text" name="" id="" style="width: 5rem;border:unset;outline:0;font-size:9pt;text-align:center;font-weight:600;" value="<?php echo number_format($totalThirdQuart, 2) ?>" readonly></td>
                              <td class='x38' style="padding-left:18px;"><input type="text" name="" id="" style="width: 5rem;border:unset;outline:0;font-size:9pt;text-align:center;font-weight:600;" value="<?php echo number_format($totalFourthQuart, 2) ?>" readonly></td>
                              <td class='x38' style="padding-left:3px;"><input type="text" name="" id="" style="width: 5rem;border:unset;outline:0;font-size:9pt;text-align:center;font-weight:600;" readonly value="<?php echo number_format($totalRemarks, 2) ?>" </td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='9' height='20' class='x22' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <tr height='0' style='display:none'>
                              <td colspan='9' height='0' class='x23' style='mso-ignore:colspan;height:0pt;'></td>
                            </tr>
                            <tr height='0' style='display:none'>
                              <td colspan='9' height='0' class='x25' style='mso-ignore:colspan;height:0pt;'></td>
                            </tr>
                            <tr height='0' style='display:none'>
                              <td colspan='9' height='0' class='x25' style='mso-ignore:colspan;height:0pt;'></td>
                            </tr>
                            <tr height='0' style='display:none'>
                              <td colspan='9' height='0' class='x26' style='mso-ignore:colspan;height:0pt;'></td>
                            </tr>
                            <tr height='0' style='display:none'>
                              <td colspan='9' height='0' class='x25' style='mso-ignore:colspan;height:0pt;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='9' height='20' class='x23' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='9' height='20' class='x25' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='9' height='20' class='x25' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='9' height='20' class='x25' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='9' height='20' class='x26' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='9' height='20' class='x25' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <![if supportMisalignedColumns]>
                            <tr height='0' style='display:none'>
                              <td width='35' style='width:26.25pt;'></td>
                              <td width='157' style='width:117.75pt;'></td>
                              <td width='86' style='width:64.5pt;'></td>
                              <td width='177' style='width:132.75pt;'></td>
                              <td width='95' style='width:71.25pt;'></td>
                              <td width='228' colspan='2' style='width:171pt;mso-ignore:colspan;'></td>
                              <td width='115' style='width:86.25pt;'></td>
                              <td width='114' style='width:85.5pt;'></td>
                            </tr>
                            <![endif]>
                          </table>

                        </body>

                      </div>
                    </div>

                  </body>
                 
                </div>
              </div>


             
            </div>

          </div>
        </section>

      </form>
    </div>
  </div>
  <?php include 'script.php' ?>




</body>

</html>