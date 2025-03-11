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
  <title>AIP-GENFUND FORM</title>
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

      <form action="../inc/controller.php" method="POST" id="EDitstfForm">
        <?php

        $genID = $_GET['reference_id'];

        ?>
        <input type="hidden" name="reference_id" value="<?php echo $genID ?>">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-1">

              </div>
              <div class="col-md-10">
                <div class="whole__page" id="whole__page" style="background-color: white;">

                  <body link='blue' vlink='purple' bgcolor='white'>
                    <div id='section'>
                      <div id='table_0' sheetName='AIP 2024 (3)'>

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
                              <td colspan='9' class='x46'>OFFICE OF THE MUNICIPAL MAYOR</td>
                              <td colspan='2' class='x22' style='mso-ignore:colspan;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
                              <td colspan='9' class='x46'>MUNICIPAL DISASTER RISK REDUCTION AND MANAGEMENT COUNCIL</td>
                              <td colspan='2' class='x22' style='mso-ignore:colspan;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='14' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'></td>
                              <td colspan='9' class='x46'>

                                <input type="date" name="stf_year" value="<?php echo $_GET['stf_year'] ?>" style="text-align:center;" placeholder="Year" required>
                                ANNUAL INVESTMENT PROGRAM (AIP)
                              </td>
                              <td colspan='2' class='x22' style='mso-ignore:colspan;'></td>
                            </tr>

                            <tr height='20' style='mso-height-source:userset;height:15pt'>
                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'>
                                <?php



                                $conn = new mysqli('localhost', 'root', '', 'mdrsystem');

                                // Fetch the first fund allotment
                                $query = mysqli_query($conn, "SELECT * FROM `tbl_fundallotment` WHERE `reference_id` = '$genID' ");
                                $result = mysqli_fetch_array($query);
                                $selectedFundAllotment = isset($result['fund_allotment']) ? $result['fund_allotment'] : '';  // Default value if there's a result
                                $theref = $result['reference_id'];
                                ?>

                                <input type="number" id="remaining-funds" style="outline:0;border:1px solid #fff;text-align:center;" readonly name="funds_remaining" inputmode="numeric" pattern="[0-9]*" value="<?php echo $selectedFundAllotment; ?>"
                                  class="funds__remaining general_update remaining<?php echo $result['reference_id'] ?>"
                                  data-table_db="tbl_fundallotment"
                                  data-column_up="fund_allotmentbal"
                                  data-condition="reference_id"
                                  data-identifier="<?php echo $result['reference_id']; ?>">




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
                              <td class="x34">Remarks</td>
                            </tr>

                            <tr height='29' style='mso-height-source:userset;height:21.75pt'>
                              <td height='27' class='x34' style='height:20.25pt; cursor: pointer;'>
                                <i class="fa-solid fa-plus no-print " id="addFormOne"></i>
                              </td>
                              <td colspan='3' class='x48' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>PREVENTION AND MITIGATION</td>
                              <td class='x34'></td>
                              <td class='x44'>1ST QUARTER</td>
                              <td class='x44'>2nd QUARTER</td>
                              <td class='x44'>3rd QUARTER</td>
                              <td class='x44'>4th QUARTER</td>
                              <td class="x44 no-print"></td>
                            </tr>

                            <div class="prevmt__row" id="prevMt">
                              <?php
                              $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                              $query = mysqli_query($conn, "SELECT * FROM `tbl_stf` WHERE `prog_type` = 'prevention' AND `reference_id` = $genID");
                              while ($result = mysqli_fetch_array($query)) {
                                extract($result);
                              ?>
                                <tr height='54' style='mso-height-source:userset;height:40.5pt' id="prevMtRow">
                                  <td height='52' class='x34' style='height:39pt;'>
                                  <button data-ref-id="<?php echo $reference_id?>" data-prog-id="<?php echo $prog_id ?>" id="deleterows" class="deleterows" style="border:none;outline:none;background:none"><i class="fa-solid fa-minus"></i></button>
                                  </td>

                                  <td class='x31' style="padding-left:6px;">
                                    <textarea name="programone[]" id="" class="general_update" style="height: 51px;width:148px;border:1px solid #fff;outline:0;font-size:9pt;resize:none;"
                                      data-table_db="tbl_stf"
                                      data-column_up="program"
                                      data-condition="prog_id"
                                      data-remarksid=""
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"><?php echo $program ?> </textarea>

                                  </td>
                                  <td class='x31'>
                                    <textarea name="officeone[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;"
                                      class="general_update"
                                      data-table_db="tbl_stf"
                                      data-column_up="office"
                                      data-condition="prog_id"
                                      data-remarksid=""
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"> <?php echo $office ?> </textarea>
                                  </td>
                                  <td class='x29'>
                                    <!-- class ex__outputs -->
                                    <textarea class="general_update ex__outputs" name="exp_outputsone[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;"
                                      data-table_db="tbl_stf"
                                      data-column_up="exp_outputs"
                                      data-condition="prog_id"
                                      data-remarksid=""
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"> <?php echo $result['exp_outputs'] ?> </textarea>
                                  </td>
                                  <td class='x32'>
                                    <input type="number" id="fix-val" name="exp_mooeone[]" style="    height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;" value="<?php echo $exp_mooe ?>"
                                      class="general_update fixval__one"
                                      data-table_db="tbl_stf"
                                      data-column_up="exp_mooe"
                                      data-condition="prog_id"
                                      data-remarksid=""
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>">
                                  </td>
                                  <td class='x38' style="align-items: center;height: 5rem;padding-left: 8px; padding-bottom:15px;">
                                    <input type="number" id="fval-one" name="first_quartone[]" style="height: 51px;width:
                                    100px;outline:0;border:1px solid #fff;text-align:center;" value="<?php echo $first_quart ?>"
                                      class="general_update fval__one"
                                      data-table_db="tbl_stf"
                                      data-column_up="first_quart"
                                      data-condition="prog_id"
                                      data-remarksid=""
                                      data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>">
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" id="sval-one" name="second_quartone[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;" value="<?php echo $second_quart ?>"
                                        class="general_update sval__one"
                                        data-table_db="tbl_stf"
                                        data-column_up="second_quart"
                                        data-condition="prog_id"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" id="tval-one" name="third_quartone[]" style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $third_quart ?>"
                                        class="general_update tval__one"
                                        data-table_db="tbl_stf"
                                        data-column_up="third_quart"
                                        data-condition="prog_id"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" id="ftval-one" name="fourth_quartone[]" style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $fourth_quart ?>"
                                        class="general_update ftval__one"
                                        data-table_db="tbl_stf"
                                        data-column_up="fourth_quart"
                                        data-condition="prog_id"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class="x38">
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" id="remark-one" name="remark_one[]" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $remarks ?>" readonly
                                        id="remarks<?php echo $result['prog_id'] ?>"
                                        class="general_update remark__one test<?php echo $result['prog_id'] ?>"
                                        data-table_db="tbl_stf"
                                        data-column_up="remarks"
                                        data-condition="prog_id"
                                        data-remarksid=""
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                </tr>
                              <?php
                              }
                              ?>
                              <tbody id="firstForm">

                              </tbody>


                            </div>
                            <tr height='29' style='mso-height-source:userset;height:21.75pt'>
                              <td height='29' style='height:21.75pt;border-left:1px solid #000;padding-left:11px;padding-bottom: 3px;cursor:pointer;'>
                                <i class="fa-solid fa-plus no-print" id="addFormTwo" style="font-size:13px;"></i>
                              </td>
                              <td colspan='3' class='x52' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>PREPAREDNESS</td>
                              <td class='x42'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class="x38"></td>
                            </tr>

                            <div class="preparedness_row">
                              <?php
                              $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                              $query = mysqli_query($conn, "SELECT * FROM `tbl_stf` WHERE `prog_type` = 'preparedness' AND `reference_id` = $genID");
                              while ($result = mysqli_fetch_array($query)) {
                                extract($result);
                              ?>
                                <tr height='67' style='mso-height-source:userset;height:50.25pt' id="prepRow">
                                  <td height='52' class='x34' style='height:39pt;'>
                                  <button data-ref-id="<?php echo $reference_id?>" data-prog-id="<?php echo $prog_id ?>" id="deleterows" class="deleterows" style="border:none;outline:none;background:none"><i class="fa-solid fa-minus"></i></button>
                                  </td>
                                  <td class='x31' style="height: 5rem;padding-left: 8px;padding-top: 4px;">
                                    <textarea name="program2[]" style="resize:none;border:1px solid #fff;outline:0;height:72px;width:144px;"
                                      class="general_update"
                                      data-table_db="tbl_stf"
                                      data-column_up="program"
                                      data-remarksid=""
                                      data-condition="prog_id"
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"><?php echo $program ?></textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea name="office2[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;"
                                      class="general_update"
                                      data-table_db="tbl_stf"
                                      data-remarksid=""
                                      data-column_up="office"
                                      data-condition="prog_id"
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"><?php echo $office ?></textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea name="exp_outputs2[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;"
                                      class="general_update ex__outputs"
                                      data-table_db="tbl_stf"
                                      data-column_up="exp_outputs"
                                      data-remarksid=""
                                      data-condition="prog_id"
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"><?php echo $exp_outputs ?></textarea>
                                  </td>
                                  <td class='x32'>
                                    <input type="number" name="exp_mooe2[]" style="height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;" value="<?php echo $exp_mooe ?>"
                                      class="general_update fixval__two"
                                      data-table_db="tbl_stf"
                                      data-column_up="exp_mooe"
                                      data-remarksid=""
                                      data-condition="prog_id"
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>">
                                  </td>
                                  <td class='x38'>
                                    <div class=" flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="first_quart2[]" style="height: 51px;width: 105px;outline:0;border:1px solid #fff;text-align:center;" value="<?php echo $first_quart ?>"
                                        class="general_update fval__two"
                                        data-table_db="tbl_stf"
                                        data-column_up="first_quart"
                                        data-condition="prog_id"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="second_quart2[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;" value="<?php echo $second_quart ?>"
                                        class="general_update sval__two"
                                        data-table_db="tbl_stf"
                                        data-column_up="second_quart"
                                        data-condition="prog_id"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="third_quart2[]" style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $third_quart ?>"
                                        class="general_update tval__two"
                                        data-table_db="tbl_stf"
                                        data-column_up="third_quart"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-condition="prog_id"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="fourth_quart2[]" style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $fourth_quart ?>"
                                        class="general_update ftval__two"
                                        data-table_db="tbl_stf"
                                        data-column_up="fourth_quart"
                                        data-condition="prog_id"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class="x38">
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="remark_two[]" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $remarks ?>"
                                        class="general_update remark__two test<?php echo $result['prog_id'] ?>"
                                        data-table_db="tbl_stf"
                                        data-column_up="remarks"
                                        data-condition="prog_id"
                                        data-remarksid=""
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                </tr>
                              <?php
                              }
                              ?>
                              <tbody id="secondForm"></tbody>
                            </div>

                            <tr height='29' style='mso-height-source:userset;height:21.75pt'>
                              <td height='29' style='height:21.75pt;border-left:1px solid #000;padding-left: 11px;padding-bottom: 3px;cursor:pointer;'>
                                <i class="fa-solid fa-plus no-print" id="addFormThree" style="font-size:13px;"></i>
                              </td>
                              <td colspan='3' class='x55' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>PROVISION OF SUPPORT ON DRR/OPCEN OPERATIONS</td>
                              <td class='x43'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class="x38"></td>

                            </tr>
                            <div class="support__row">
                              <?php
                              $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                              $query =  mysqli_query($conn, "SELECT * FROM `tbl_stf` WHERE `prog_type` = 'support' AND `reference_id` = $genID ");
                              while ($result = mysqli_fetch_array($query)) {
                                extract($result);
                              ?>
                                <tr height='67' style='mso-height-source:userset;height:50.25pt' id="supRow">
                                  <td height='52' class='x34' style='height:39pt;'>
                                  <button data-ref-id="<?php echo $reference_id?>" data-prog-id="<?php echo $prog_id ?>" id="deleterows" class="deleterows" style="border:none;outline:none;background:none"><i class="fa-solid fa-minus"></i></button>
                                  </td>
                                  <td class='x31' style="height: 5rem;padding-left: 8px;padding-top: 4px;">
                                    <textarea name="program3[]" id="" style="resize:none;border:1px solid #fff;outline:0;height:72px;width:144px;"
                                      class="general_update"
                                      data-table_db="tbl_stf"
                                      data-remarksid=""
                                      data-column_up="program"
                                      data-condition="prog_id"
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"><?php echo $program ?></textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea name="office3[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;"
                                      class="general_update"
                                      data-table_db="tbl_stf"
                                      data-column_up="office"
                                      data-condition="prog_id"
                                      data-remarksid=""
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"><?php echo $office ?></textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea name="exp_outputs3[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;"
                                      class="general_update ex__outputs"
                                      data-table_db="tbl_stf"
                                      data-column_up="exp_outputs"
                                      data-remarksid=""
                                      data-condition="prog_id"
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"><?php echo $exp_outputs ?></textarea>
                                  </td>
                                  <td class='x32' '>
															<input type="number"  name="exp_mooe3[]" style=" height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;" value="<?php echo $exp_mooe ?>"
                              class="general_update fixval__three"
                                      data-table_db="tbl_stf"
                                      data-column_up="exp_mooe"
                                        data-remarksid=""
                                      data-condition="prog_id"
                                       data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>" >
												    	</td>
														<td class=' x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="first_quart3[]" style="height: 51px;width:
																105px;outline:0;border:1px solid #fff;text-align:center;" value="<?php echo $first_quart ?>"
                                        class="general_update fval__three"
                                        data-table_db="tbl_stf"
                                        data-column_up="first_quart"
                                        data-condition="prog_id"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="second_quart3[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;" value="<?php echo $second_quart ?>"
                                        class="general_update sval__three"
                                        data-table_db="tbl_stf"
                                        data-column_up="second_quart"
                                        data-condition="prog_id"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="third_quart3[]" style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $third_quart ?>"
                                        class="general_update tval__three"
                                        data-table_db="tbl_stf"
                                        data-column_up="third_quart"
                                        data-condition="prog_id"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="fourth_quart3[]" style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $fourth_quart ?>"
                                        class="general_update ftval__three"
                                        data-table_db="tbl_stf"
                                        data-column_up="fourth_quart"
                                        data-condition="prog_id"
                                        data-remarksid="remarks<?php echo $result['prog_id'] ?>"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class="x38">
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="remark_three[]" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $remarks ?>"
                                        class="general_update remark__three test<?php echo $result['prog_id'] ?>"
                                        data-table_db="tbl_stf"
                                        data-column_up="remarks"
                                        data-remarksid=""
                                        data-condition="prog_id"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>

                                </tr>
                              <?php
                              }
                              ?>
                              <tbody id="thirdForm">

                              </tbody>




                            </div>

                            <tr height='29' style='mso-height-source:userset;height:21.75pt;'>
                              <td height='29' style='height:21.75pt;border-left:1px solid #000;padding-left: 10px;padding-bottom: 3px;cursor:pointer;'>
                                <i class="fa-solid fa-plus no-print" id="addFormFour" style="font-size: 13px;"></i>
                              </td>
                              <td colspan='3' class='x52' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>QUICK RESPONSE&nbsp;</td>
                              <td class='x43'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class="x38"></td>
                            </tr>
                            <div class="response__row">
                              <?php
                              $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                              $query =  mysqli_query($conn, "SELECT * FROM `tbl_stf` WHERE `prog_type` = 'response' AND `reference_id` = $genID ");
                              while ($result = mysqli_fetch_array($query)) {
                                extract($result);
                              ?>
                                <tr height='67' style='mso-height-source:userset;height:50.25pt' id="respRow">
                                  <td height='52' class='x34' style='height:39pt;'>
                                  <button data-ref-id="<?php echo $reference_id?>" data-prog-id="<?php echo $prog_id ?>" id="deleterows" class="deleterows" style="border:none;outline:none;background:none"><i class="fa-solid fa-minus"></i></button>
                                  </td>
                                  <td class='x31' style="height: 5rem;padding-left: 8px;padding-top: 4px;">
                                    <textarea name="program4[]" id="" style="resize:none;border:1px solid #fff;outline:0;height:72px;width:144px;"
                                      data-table_db="tbl_stf"
                                      data-column_up="program"
                                      data-condition="prog_id"
                                      data-remarksid=""
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"><?php echo $program ?></textarea>
                                  </td>
                                  <td class='x31'>
                                    <textarea name="office4[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;"
                                      class="general_update"
                                      data-table_db="tbl_stf"
                                      data-column_up="office"
                                      data-remarksid=""
                                      data-condition="prog_id"
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"><?php echo $office ?></textarea>
                                  </td>

                                  <td class='x31'>



                                    <textarea name="exp_outputs4[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;"
                                      class="general_update ex__outputs"
                                      data-table_db="tbl_stf"
                                      data-column_up="exp_outputs"
                                      data-remarksid=""
                                      data-condition="prog_id"
                                      data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>"><?php echo $exp_outputs ?></textarea>

                                  </td>
                                  <td class='x32' '>
														  	<input type="number" name="exp_mooe4[]" style=" height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;" value="<?php echo $exp_mooe ?>"
                                class="general_update fixval__four"
                                      data-table_db="tbl_stf"
                                      data-column_up="exp_mooe"
                                      data-condition="prog_id"
                                        data-remarksid=""
                                       data-reff_id="<?php echo $result['reference_id'] ?>"
                                      data-identifier="<?php echo $result['prog_id']; ?>">
												        </td>
														      <td class=' x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="first_quart4[]" style="height: 51px;width:
																105px;outline:0;border:1px solid #fff;text-align:center;" value="<?php echo $first_quart ?>"
                                        class="general_update fval__four"
                                        data-table_db="tbl_stf"
                                        data-column_up="first_quart"
                                        data-condition="prog_id"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="second_quart4[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;" value="<?php echo $second_quart ?>"
                                        class="general_update sval__four"
                                        data-table_db="tbl_stf"
                                        data-column_up="second_quart"
                                        data-condition="prog_id"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                      <input type="number" name="third_quart4[]" style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $third_quart ?>"
                                        class="general_update tval__four"
                                        data-table_db="tbl_stf"
                                        data-column_up="third_quart"
                                        data-condition="prog_id"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class='x38'>
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="fourth_quart4[]" style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $fourth_quart ?>"
                                        class="general_update ftval__four"
                                        data-table_db="tbl_stf"
                                        data-column_up="fourth_quart"
                                        data-condition="prog_id"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>
                                  <td class="x38">
                                    <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                      <input type="number" name="remark_four[]" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;" value="<?php echo $remarks ?>"
                                        lass="general_update remark__four test<?php echo $result['prog_id'] ?>"
                                        data-table_db="tbl_stf"
                                        data-column_up="remarks"
                                        data-remarksid=""
                                        data-condition="prog_id"
                                        data-reff_id="<?php echo $result['reference_id'] ?>"
                                        data-identifier="<?php echo $result['prog_id']; ?>">
                                    </div>
                                  </td>

                                </tr>
                              <?php
                              }
                              ?>
                              <tbody id="fourthForm">

                              </tbody>
                            </div>

                            <tr height='25' style='mso-height-source:userset;height:18.75pt'>
                              <td colspan='2' height='23' class='x45' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:17.25pt;'>Grand Total</td>
                              <td class='x31'></td>
                              <td class='x31'></td>
                              <td class='x41'>
                                <input type="text" name="" id="" style="width: 5rem;border:unset;outline:0;font-size:9pt;">
                              </td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class='x38'></td>
                              <td class="x38"></td>
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
                  <button class="no-print" type="submit" name="editGenfundForm" style="display: none;">Submit</button>
                </div>
              </div>


              <div class="col-md-1">

              </div>
            </div>

          </div>
        </section>

      </form>
    </div>
  </div>
  <?php include 'script.php' ?>
  <script>
    $(document).ready(function() {
      // Function to handle the bulleted textarea
      function attachListeners(textarea) {


        textarea.on('input', function() {
          const value = textarea.val();


        });
      }

      // Function to clone and append new rows for each form type
      function cloneAndAppendRow(rowId, formId, progType) {
        const newFields = $(rowId).clone();

        newFields.removeAttr('id');
        newFields.find('input, textarea').val('');
        newFields.find('.prog_type').val(progType); // Set the program type
        $(formId).append(newFields);

        // Attach bullet functionality to newly added textareas
        newFields.find('.ex__outputs').each(function() {
          attachListeners($(this));
        });

        // Optionally, send AJAX request to insert the row into the database
        insertIntoDatabase(newFields, progType);
      }

      // Add row for Prevention
      $('#addFormOne').click(function() {
        cloneAndAppendRow('#prevMtRow', '#firstForm', 'prevention');
      });

      // Add row for Preparedness
      $('#addFormTwo').click(function() {
        cloneAndAppendRow('#prepRow', '#secondForm', 'preparedness');
      });

      // Add row for Support
      $('#addFormThree').click(function() {
        cloneAndAppendRow('#supRow', '#thirdForm', 'support');
      });

      // Add row for Response
      $('#addFormFour').click(function() {
        cloneAndAppendRow('#respRow', '#fourthForm', 'response');
      });

      // Column Calculation: Update remaining funds
      function updateRemainingFunds() {
        let totalRemaining = parseFloat($('.funds__remaining').data('original')) || 0;

        $('.fixval__one, .fixval__two, .fixval__three, .fixval__four').each(function() {
          const fixVal = parseFloat($(this).val()) || 0;
          totalRemaining -= fixVal;
        });

        if (totalRemaining < 0) {
          totalRemaining = 0;
        }

        $('.funds__remaining').val(totalRemaining.toFixed(2));
      }

      // Initialize remaining funds on page load
      $('.funds__remaining').each(function() {
        const initialFunds = parseFloat($(this).val()) || 0;
        $(this).data('original', initialFunds);
      });

      // Attach input listener to update remaining funds
      $(document).on('input', '.fixval__one, .fixval__two, .fixval__three, .fixval__four', function() {
        updateRemainingFunds();
      });

      // Initial update for remaining funds
      updateRemainingFunds();

      // Row Calculation: Calculate remarks for each row
      function handleInput(suffix) {
        $(document).on('input', `.fval__${suffix}, .sval__${suffix}, .tval__${suffix}, .ftval__${suffix}, .fixval__${suffix}`, function() {
          $('tr').each(function() {
            const fixVal = parseFloat($(this).find(`.fixval__${suffix}`).val()) || 0;
            const fval = parseFloat($(this).find(`.fval__${suffix}`).val()) || 0;
            const sval = parseFloat($(this).find(`.sval__${suffix}`).val()) || 0;
            const tval = parseFloat($(this).find(`.tval__${suffix}`).val()) || 0;
            const ftval = parseFloat($(this).find(`.ftval__${suffix}`).val()) || 0;

            let remaining = fixVal - fval - sval - tval - ftval;

            const remarkField = $(this).find(`.remark__${suffix}`);
            if (!fixVal && !fval && !sval && !tval && !ftval) {
              remarkField.val('0'); // Set remarks to 0 if all values are empty
            } else {
              remarkField.val(remaining < 0 ? '0' : remaining);
            }
          });
        });
      }

      // Apply row calculations for suffixes: one, two, three, four
      ['one', 'two', 'three', 'four'].forEach(handleInput);

      // Function to insert data into the database using AJAX
      function insertIntoDatabase(newFields, progType) {
        const reference_id = $("input[name='reference_id']").val(); // Get the reference ID

        const formData = {
          prog_type: progType,
          reference_id: reference_id // Include the reference ID
        };

        // Send AJAX request
        $.ajax({
          url: "../inc/insert_rowstf.php",
          type: 'POST',
          data: formData,
          success: function(response) {
            // location.reload();
            console.log('Row inserted successfully', response);
          },
          error: function(error) {
            console.log('Error inserting row', error);
          }
        });
      }

      // Attach bullet functionality to existing textareas on page load
      $('.ex__outputs').each(function() {
        attachListeners($(this));
      });
    });
  </script>

</body>

</html>