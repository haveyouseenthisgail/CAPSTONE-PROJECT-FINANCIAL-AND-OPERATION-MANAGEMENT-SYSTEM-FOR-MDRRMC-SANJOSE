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

      <form action="../inc/controller.php" method="POST" id="genfundForm">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-1">

              </div>
              <div class="col-md-10">
                <div class="" style="background-color: white;">

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
                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                                $query = mysqli_query($conn, "SELECT * FROM `tbl_fundallotment` WHERE `fund_type` = 'Genfund' AND `reference_id` IS NULL ");
                                while ($result = mysqli_fetch_array($query)) {
                                  extract($result); // This extracts columns like 'fallotment_id', 'fund_allotment', etc.
                                ?>
                                  <select class="form-control custom-select fund__allotment" name="fund_allotment" id="fund-allotment" onchange="updateFallotmentId(this)">
                                    <option selected disabled>Fund Allotment</option>
                                    <option value="<?php echo $fund_allotment; ?>" data-fallotment-id="<?php echo $fallotment_id; ?>">
                                      <?php echo $fallotment_year; ?>
                                    </option>
                                  </select>
                                  <!-- Hidden input for fallotment_id -->
                                  <input type="hidden" name="fallotment_id" id="fallotment-id" value="">
                                <?php
                                }
                                ?>
                              </td>

                              <td colspan='9' class='x46'>

                                <input type="date" name="genfund_year" style="text-align:center;" placeholder="Year" required>
                                ANNUAL INVESTMENT PROGRAM (AIP)
                              </td>
                              <td colspan='2' class='x22' style='mso-ignore:colspan;'></td>
                            </tr>
                            <tr height='20' style='mso-height-source:userset;height:15pt'>

                              <td colspan='3' height='20' class='x21' style='mso-ignore:colspan;height:15pt;'>
                                <input type="number" class="funds__remaining" id="remaining-funds" style="outline:0;border:1px solid #fff;text-align:center;" readonly name="funds_remaining" inputmode="numeric" pattern="[0-9]*">
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
                              <td class='x34'>Remarks</td>
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
                              <td class="x44"></td>
                            </tr>

                            <div class="prevmt__row" id="prevMt">

                              <tr height='54' style='mso-height-source:userset;height:40.5pt' id="prevMtRow">
                                <td height='52' class='x34' style='height:39pt;'>
                                  <input type="text" style="height: 32px;width: 30px;border: 1px solid #fff;outline:0;">
                                </td>

                                <td class='x31' style="padding-left:6px;">
                                  <textarea name="programone[]" id="" style="height: 51px;width:148px;border:1px solid #fff;outline:0;font-size:9pt;resize:none;"></textarea>

                                </td>
                                <td class='x31'>
                                  <textarea name="officeone[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;"></textarea>
                                </td>
                                <td class='x29'>
                                  <textarea class="ex__outputs" name="exp_outputsone[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;"></textarea>
                                </td>
                                <td class='x32'>
                                  <input type="number" class="fixval__one" name="exp_mooeone[]" style="    height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;">
                                </td>
                                <td class='x38' style="align-items: center;height: 5rem;padding-left: 8px; padding-bottom:15px;">
                                  <input type="number" class=" fval__one" name="first_quartone[]" style="height: 51px;width:
																100px;outline:0;border:1px solid #fff;text-align:center;">
                                </td>
                                <td class='x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                    <input type="number" class="sval__one " name="second_quartone[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;">
                                  </div>
                                </td>
                                <td class='x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                    <input type="number" class="tval__one" name="third_quartone[]" style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;">
                                  </div>
                                </td>
                                <td class='x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                    <input type="number" class="ftval__one" name="fourth_quartone[]" style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;">
                                  </div>
                                </td>
                                <td class="x38">
                                  <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                    <input type="number" class="remark__one" id="remark-one" name="remark_one[]" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;">
                                  </div>
                                </td>
                              </tr>
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
                              <td class='x38'></td>
                            </tr>
                            <div class="preparedness_row">
                              <tr height='67' style='mso-height-source:userset;height:50.25pt' id="prepRow">
                                <td height='65' class='x34' style='height:48.75pt;'>
                                  <input type="text" name="prog_id" style="height: 32px;width: 30px;border: 1px solid #fff;outline:0;">
                                </td>
                                <td class='x31' style="height: 5rem;padding-left: 8px;padding-top: 4px;">
                                  <textarea name="program2[]" id="" style="resize:none;border:1px solid #fff;outline:0;height:72px;width:144px;"></textarea>
                                </td>
                                <td class='x31'>
                                  <textarea name="office2[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;"></textarea>
                                </td>
                                <td class='x31'>
                                  <textarea class="ex__outputs" name="exp_outputs2[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;"></textarea>
                                </td>
                                <td class='x32' '>
															<input type="number" class="fixval__two" name="exp_mooe2[]" style=" height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;">
													</td>
														<td class=' x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                    <input type="number" class="fval__two" name="first_quart2[]" style="height: 51px;width:
																105px;outline:0;border:1px solid #fff;text-align:center;">
                                  </div>
                                </td>
                                <td class='x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                    <input type="number" class="sval__two" name="second_quart2[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;">
                                  </div>
                                </td>
                                <td class='x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                    <input type="number" class="tval__two" name="third_quart2[]" style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;">
                                  </div>
                                </td>
                                <td class='x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                    <input type="number" class="ftval__two" name="fourth_quart2[]" style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;">
                                  </div>
                                </td>
                                <td class="x38">
                                  <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                    <input type="number" class="remark__two" name="remark_two[]" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;">
                                  </div>
                                </td>
                                <tbody id="secondForm">

                                </tbody>
                              </tr>
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
                              <td class='x38'></td>
                            </tr>
                            <div class="support__row">
                              <tr height='67' style='mso-height-source:userset;height:50.25pt' id="supRow">
                                <td height='65' class='x34' style='height:48.75pt;'>
                                  <input type="text" name="prog_id" style="height: 32px;width: 30px;border: 1px solid #fff;outline:0;">
                                </td>
                                <td class='x31' style="height: 5rem;padding-left: 8px;padding-top: 4px;">
                                  <textarea name="program3[]" id="" style="resize:none;border:1px solid #fff;outline:0;height:72px;width:144px;"></textarea>
                                </td>
                                <td class='x31'>
                                  <textarea name="office3[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;"></textarea>
                                </td>
                                <td class='x31'>
                                  <textarea class="ex__outputs" name="exp_outputs3[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;"></textarea>
                                </td>
                                <td class='x32' '>
															<input type="number" class="fixval__three"  name="exp_mooe3[]" style=" height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;">
												    	</td>
														<td class=' x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                    <input type="number" class="fval__three" name="first_quart3[]" style="height: 51px;width:
																105px;outline:0;border:1px solid #fff;text-align:center;">
                                  </div>
                                </td>
                                <td class='x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                    <input type="number" class="sval__three" name="second_quart3[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;">
                                  </div>
                                </td>
                                <td class='x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                    <input type="number" class="tval__three" name="third_quart3[]" style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;">
                                  </div>
                                </td>
                                <td class='x38'>
                                  <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                    <input type="number" class="ftval__three" name="fourth_quart3[]" style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;">
                                  </div>
                                </td>
                                <td class="x38">
                                  <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                    <input type="number" class="remark__three" name="remark_three[]" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;">
                                  </div>
                                </td>
                                <tbody id="thirdForm">

                                </tbody>
                              </tr>





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
                              <td class='x38'></td>
                            </tr>

                            <tr height='67' style='mso-height-source:userset;height:50.25pt' id="respRow">
                              <td height='65' class='x34' style='height:48.75pt;'>
                                <input type="text" name="prog_id" style="height: 32px;width: 30px;border: 1px solid #fff;outline:0;">
                              </td>
                              <td class='x31' style="height: 5rem;padding-left: 8px;padding-top: 4px;">
                                <textarea name="program4[]" id="" style="resize:none;border:1px solid #fff;outline:0;height:72px;width:144px;"></textarea>
                              </td>
                              <td class='x31'>
                                <textarea name="office4[]" id="" style="display:flex;resize:none;height: 51px;width:85px;border:1px solid #fff;outline:0;text-align:center;"></textarea>
                              </td>
                              <td class='x31'>
                                <textarea class="ex__outputs" name="exp_outputs4[]" id="textInput" style="display: flex; height: 51px;width: 175px;resize: none;border: 1px solid #fff;outline:0;"></textarea>
                              </td>
                              <td class='x32' '>
															<input type="number" class="fixval__four" name="exp_mooe4[]" style=" height: 50px; width: 87px;font-size: 9pt;border:1px solid #fff;outline:0;text-align:center;">
												    	</td>
														<td class=' x38'>
                                <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                  <input type="number" class="fval__four" name="first_quart4[]" style="height: 51px;width:
																105px;outline:0;border:1px solid #fff;text-align:center;">
                                </div>
                              </td>
                              <td class='x38'>
                                <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                  <input type="number" class="sval__four" name="second_quart4[]" style="height: 51px; width: 100px;border: 1px solid #fff;outline: 0;text-align:center;">
                                </div>
                              </td>
                              <td class='x38'>
                                <div class="flex flex-justify--center flex-align--center" style="height: 5rem;">
                                  <input type="number" class="tval__four" name="third_quart4[]" style="height: 51px;width: 105px;border: 1px solid #fff;outline: 0;text-align: center;">
                                </div>
                              </td>
                              <td class='x38'>
                                <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                  <input type="number" class="ftval__four" name="fourth_quart4[]" style="height: 51px;width: 100px;border: 1px solid #fff;outline: 0;text-align: center;">
                                </div>
                              </td>
                              <td class="x38">
                                <div class="flex flex-justify--center flex-align--center" style="height:5rem">
                                  <input type="number" class="remark__four" name="remark_four[]" style="height: 51px;width: 80px;border: 1px solid #fff;outline: 0;text-align: center;">
                                </div>
                              </td>
                              <tbody id="fourthForm">

                              </tbody>
                            </tr>

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
                              <td class='x38'></td>
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
                  <button class="no-print" type="submit" name="genfundForm" style="display: none;">Submit</button>
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
    //bulleted textarea


    $(document).ready(function() {

      document.querySelector('form').addEventListener('submit', function(e) {
        document.querySelectorAll('.ex__outputs').forEach(textarea => {
          const value = textarea.value.trim();

          // Remove bullet if it's the only content or empty
          if (value === '•' || value === '') {
            textarea.value = ''; // Ensure no bullet is submitted
          }
        });
      });


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

    });

    //Whole table calculation

    $(document).ready(function() {
      var selectedFundAllotment = 0;

      $(document).on('change', '.fund__allotment', function() {
        selectedFundAllotment = parseFloat($(this).val()) || 0;

        $(this).prop('disabled', true);

        $('.funds__remaining').val(selectedFundAllotment.toFixed(2));
        updateRemainingFunds();
      });

      function updateRemainingFunds() {
        var remaining = selectedFundAllotment;

        $('.fixval__one').each(function() {
          var fixVal = parseFloat($(this).val()) || 0;
          remaining -= fixVal;
        });

        $('.fixval__two').each(function() {
          var fixVal = parseFloat($(this).val()) || 0;
          remaining -= fixVal;
        });

        $('.fixval__three').each(function() {
          var fixVal = parseFloat($(this).val()) || 0;
          remaining -= fixVal;
        });

        $('.fixval__four').each(function() {
          var fixVal = parseFloat($(this).val()) || 0;
          remaining -= fixVal;
        });

        if (remaining < 0) {
          remaining = 0;
        }

        $('.funds__remaining').val(remaining.toFixed(2));
      }

      $(document).on('input', '.fixval__one, .fixval__two, .fixval__three, .fixval__four', function() {
        updateRemainingFunds();
      });
    });


    $(document).ready(function() {
      function handleInput(suffix) {
        $(document).on('input', `.fval__${suffix}, .sval__${suffix}, .tval__${suffix}, .ftval__${suffix}`, function() {
          $('tr').each(function() {
            var fixVal = parseFloat($(this).find(`.fixval__${suffix}`).val()) || 0;
            var fval = parseFloat($(this).find(`.fval__${suffix}`).val()) || 0;
            var sval = parseFloat($(this).find(`.sval__${suffix}`).val()) || 0;
            var tval = parseFloat($(this).find(`.tval__${suffix}`).val()) || 0;
            var ftval = parseFloat($(this).find(`.ftval__${suffix}`).val()) || 0;

            var remaining = fixVal - fval;
            remaining -= sval;
            remaining -= tval;
            remaining -= ftval;

            var remarkField = $(this).find(`.remark__${suffix}`);
            remarkField.val(remaining < 0 ? '0' : remaining);
          });
        });
      }

      ['one', 'two', 'three', 'four'].forEach(handleInput);
    });

    function updateFallotmentId(select) {
      const fallotmentIdInput = document.getElementById('fallotment-id');
      const selectedOption = select.options[select.selectedIndex];
      fallotmentIdInput.value = selectedOption.getAttribute('data-fallotment-id');
    }



    function insertIntoDatabase(newFields, progType) {
      const reference_id = $("input[name='reference_id']").val(); // Get the reference ID

      const formData = {
        prog_type: progType,
        reference_id: reference_id // Include the reference ID
      };

      // Send AJAX request
      $.ajax({
        url: "../inc/insert_row.php",
        type: 'POST',
        data: formData,
        success: function(response) {
          location.reload();
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

  
  </script>
</body>

</html>