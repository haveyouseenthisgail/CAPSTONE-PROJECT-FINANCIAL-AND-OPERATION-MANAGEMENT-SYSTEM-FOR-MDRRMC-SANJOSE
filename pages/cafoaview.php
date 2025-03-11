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
  <link rel="stylesheet" href="../dist/css/cafoa.css">
  <?php include 'link.php' ?>
</head>

<body class="hold-transition sidebar-mini">


  <div class="wrapper">
    <?php include 'sidebar.php' ?>
    <div class="content-wrapper">
      <style>
        .elunmask {
          border: none !important;
        }

        .elunmasks {
          border-right: none;
          border-bottom: none;
          border-top: none;

        }
      </style>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-1">
            </div>
            <?php


            if (isset($_GET['cafoa_id'])) {
              $cafoaID = $_GET['cafoa_id'];
              $query = mysqli_query($conn, "SELECT tbl_cafoajoin.*, tbl_cafoa.* FROM tbl_cafoajoin INNER JOIN tbl_cafoa ON tbl_cafoajoin.cafoa_id = tbl_cafoa.cafoa_id WHERE tbl_cafoa.cafoa_id = '$cafoaID'");
              while ($result = mysqli_fetch_array($query)) {
                extract($result);
              }
            }

            ?>

            <div class="col-md-10" style="display:flex;justify-content:center;">
              <form>


                <div class="" style="background-color: white;padding:2rem 2rem 2rem 6rem;">

                  <body link='blue' vlink='purple' class='x21'>

                    <table border='0' cellpadding='0' cellspacing='0'  width='706' style='border-collapse:collapse;
                          table-layout:fixed;width:529pt;margin:auto;'>
                      <col class='x21' width='88' span='4' style='mso-width-source:userset;background:none;width:66pt' />
                      <col class='x21' width='8' style='mso-width-source:userset;background:none;width:6pt' />
                      <col class='x21' width='141' span='2' style='mso-width-source:userset;background:none;width:105.75pt' />
                      <col width='64' style='width:48pt' />
                      <?php include 'includes/cafoa.php' ?>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='7' height='20' class='x51' style='height:15pt;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='8' height='20' class='x22' style='mso-ignore:colspan;height:15pt;'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='8' height='20' class='x22' style='mso-ignore:colspan;height:15pt;'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='20' width='88' style='text-align: left;height:15pt;width:66pt;vertical-align:top;' align='left'>
                          <span style="display:inline-block; width:40rem;border:2px solid #000;"></span>
                          <span style='mso-ignore:vglayout2'>

                          </span>
                        </td>
                        <td colspan='7' class='x22' style='mso-ignore:colspan;'></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='7' height='21' class='x52' style='height:15.75pt;'>CERTIFICATION ON APPROPRIATIONS, FUNDS AND OBLIGATION</td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='7' height='21' class='x52' style='height:15.75pt;'>OF ALLOTMENT</td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='8' height='20' class='x22' style='mso-ignore:colspan;height:15pt;'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='19' class='x23' style='height:14.25pt;'></td>
                        <td colspan='4' rowspan='4' height='80' class='x53' style='border-right:1px solid windowtext;height:60pt;    padding: 15px 6px;'>
                          <textarea rows="3" readonly name="cafoa__request" style="border: unset; outline: 0;text-align:center;overflow:hidden;font-size:13px; width:100%;resize:none;"
                            class="form-control"><?php echo $cafoa__request ?></textarea>


                        </td>
                        <td colspan='2' class='x23' style='mso-ignore:colspan;border-right:1px solid windowtext;'>Obligation No.:

                        </td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='20' class='x25' style='height:15pt;'></td>
                        <td colspan='2' class='x26' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td height='21' class='x28' style='height:15.75pt;'>Request</td>
                        <td class='x23'>Approved Amount:</td>
                        <td class='x24'> </td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='20' class='x25' style='height:15pt;'></td>
                        <td colspan='2' class='x26' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='20' class='x25' style='height:15pt;'>Payee</td>
                        <td colspan='3' rowspan='2' height='40' class='x60' style='border-bottom:1px solid windowtext;height:30pt;    padding: 15px 0;'>
                          <textarea name="cafoa__payee" readonly id="" oninput="textLimit(event, 120)" style="width: 100%;border: unset;outline:0;font-weight: bold;font-size: 13px;resize:none;height:5rem;text-align:center;overflow:hidden;" class="form-control"><?php echo $cafoa__payee ?> </textarea>
                        </td>
                        <td class='x29'></td>
                        <td colspan='2' class='x23' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='20' class='x25' style='height:15pt;'></td>
                        <td class='x29'></td>
                        <td class='x31'>Certification:</td>
                        <td class='x29'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='19' class='x32' style='height:14.25pt;'>Function</td>
                        <td class='x32'>Allotment</td>
                        <td class='x32'>Expense</td>
                        <td class='x32'>Amount</td>
                        <td class='x33'></td>
                        <td colspan='2' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='19' class='x34' style='height:14.25pt;'></td>
                        <td class='x34' style="vertical-align: baseline;">Class</td>
                        <td class='x34' style="vertical-align: baseline;">Code</td>
                        <td class='x34'></td>
                        <td class='x33'></td>
                        <td colspan='2' class='x42' style='mso-ignore:colspan;border-right:1px solid windowtext;position:relative;'>
                          <p style="font-size: 14px;margin-left:5px;position:absolute;bottom: -38px;">
                            I hereby certify as to the existence of <br>
                            appropriations for the expenditures in the <br>
                            amount specified herein:
                          </p>
                        </td>
                        <td class='x21'></td>
                      </tr>
                      <?php

                      $query = mysqli_query($conn, "SELECT * FROM `tbl_cafoajoin` WHERE `cafoa_id` = '$cafoaID' LIMIT 7 ");
                      while ($result = mysqli_fetch_array($query)) {
                        extract($result);


                      ?>

                        <tr height='20' style='mso-height-source:userset;height:15pt;'>
                          <td height='18' class='x35' style='height:13.5pt;'><input readonly type="text" value="<?php echo $function ?>" name="function[]" placeholder="f1" style="    width: 85px;height: 20px; font-size: 13px;border: unset;outline: 0;"></td>
                          <td class='x35'><input readonly type="text" placeholder="Allotment1" value="<?php echo $allotment ?>" name="allotment[]" style="    width: 85px;height: 20px; font-size: 13px;border: unset;outline: 0;"></td>
                          <td class='x35'><input readonly type="text" placeholder="Expense1" value="<?php echo $expense ?>" name="expense[]" style="    width: 85px;height: 20px; font-size: 13px;border: unset;outline: 0;"></td>
                          <td class='x35'><input readonly type="number" name="amount[]" value="<?php echo $amount ?>" placeholder="Amount1" style="    width: 85px;height: 20px; font-size: 13px;border: unset;outline: 0;"></td>
                          <td class='x29'></td>
                          <td colspan='2' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>

                        </tr>
                      <?php } ?>



                      <tr height='20' style='mso-height-source:userset;height:15pt'>

                        <td height='18' class='x35 elunmasks' style='height:13.5pt;'></td>
                        <td class='x35 elunmask'></td>
                        <td class='x35 elunmask'></td>
                        <td class='x35 elunmask'></td>
                        <td class='x29 elunmask'></td>

                        <td colspan='2' class='x45' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                          <input readonly type="text" name="cafoa__budget" value="<?php echo $cafoa__budget ?>" maxlength="28" style="border:unset;outline:0;width:17rem;text-align:center;font-weight:bold;font-size:15px;height:18px;">
                        </td>

                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='18' class='x35 elunmasks' style='height:13.5pt;'></td>
                        <td class='x35 elunmask'></td>
                        <td class='x35 elunmask'></td>
                        <td class='x35 elunmask'></td>
                        <td class='x29 elunmask'></td>
                        <td colspan='2' class='x47' style='border-right:1px solid windowtext;'>&nbsp;Municipal Budget Officer</td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <div class="hide" style="display: none;">
                          <td height='18' class='x35 elunmasks' style='height:13.5pt;'></td>
                          <td class='x35 elunmask'></td>
                          <td class='x35 elunmask'></td>
                          <td class='x35 elunmask'></td>
                          <td class='x29 elunmask'></td>
                        </div>
                        <td class='x37'>Date:</td>
                        <td class='x27'></td>
                        <td class='x21'></td>
                      </tr>




                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='20' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td class='x31'>Certification:</td>
                        <td class='x29'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='2' height='20' class='x25' style='mso-ignore:colspan;height:15pt;'>Total amount requested</td>
                        <td colspan='2' class='x57' style='border-bottom:1px solid windowtext;border:unset;'>
                          <input readonly type="number" id="cafoa__amountreq" name="cafoa__amountreq" value="<?php echo $cafoa__amountreq ?>"
                            style="width: 11rem; border: unset; border-bottom: 1px solid; outline: 0; text-align: center; font-size: 14px;text-align:center">
                        </td>
                        <td class='x29'></td>
                        <td colspan='2' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='20' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='2' class='x25' style='mso-ignore:colspan;border-right:1px solid'>
                          <p style="font-size: 14px;margin-left:5px;">
                            I hereby certify as to the availability of funds <br>
                            for the expenditures in the amount specified <br>
                            herein:

                          </p>
                        </td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='2' height='20' class='x25' style='mso-ignore:colspan;height:15pt;'>Amount in Words:</td>
                        <td colspan='2' class='x38' style='mso-ignore:colspan;'>

                        </td>
                        <td class='x29'></td>
                        <td colspan='2' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;' ;</td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='4' height='19' class='x58' style='border-bottom:1px solid windowtext;height:14.25pt;'>
                          <input readonly type="text" id="cafoa__amountwords" name="cafoa__amountwords" value="<?php echo $cafoa__amountwords ?>"
                            style="height: 19px; width: 21rem; border: unset; outline: 0; font-size: 13px; text-align:center;">
                        </td>
                        <td class='x29'></td>
                        <td class='x25'></td>
                        <td class='x29'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='2' height='20' class='x25' style='mso-ignore:colspan;height:15pt;'></td>
                        <td class='x30'>`</td>
                        <td colspan='2' class='x30' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td colspan='2' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='2' height='20' class='x25' style='mso-ignore:colspan;height:15pt;'>Requesting Official:</td>
                        <td colspan='3' class='x30' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td colspan='2' class='x45' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                          <input readonly type="text" name="cafoa__tresurer" value="<?php echo $cafoa__tresurer ?>" style="font-weight:bold;text-align:center;font-size:15px;width:16rem;border:unset;outline:0;height:17px;">
                        </td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='20' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='2' class='x47' style='border-right:1px solid windowtext;'>&nbsp;Municipal Treasurer</td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='20' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td class='x37'>&nbsp;Date:</td>
                        <td class='x27'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='3' height='20' class='x43' style='mso-ignore:colspan;height:15pt;border-bottom:unset;'>
                          <input readonly type="text" name="cafoa__requesting" value="<?php echo $cafoa__requesting ?>" placeholder="efe" style="    width: 13rem;border: unset;   border-bottom: 1px solid; outline: 0;">
                        </td>
                        <td class='x38' style="border:unset;">
                          <input readonly type="date" name="cafoa__requestingdate" value="<?php echo $cafoa__requestingdate ?>" style="width:94px;border:unset;border-bottom:1px solid">
                        </td>
                        <td class='x29'></td>
                        <td colspan='2' class='x23' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='2' height='20' class='x49' style='height:15pt;'>
                          <p style="margin: unset;">Head Of Requesting Division
                          </p>
                        </td>
                        <td class='x30'></td>
                        <td class='x30'>Date</td>
                        <td class='x29'></td>
                        <td class='x31'>Certification:</td>
                        <td class='x29'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='20' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='2' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='20' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='2' class='x42' style='mso-ignore:colspan;border-right:1px solid windowtext;'>
                          <p style="font-size: 14px;margin-left:5px;">I hereby certify that the allotments are <br>available for obligation in the amount <br> specified herein:
                          </p>
                        </td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='20' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='2' class='x42' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='20' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='2' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='20' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='2' class='x45' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;'>
                          <input readonly type="text" name="cafoa__accountant" value="<?php echo $cafoa__accountant ?>" style="font-weight:bold;text-align:center;font-size:15px;width:16rem;border:unset;outline:0;height:17px;" class="general_update">
                        </td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='20' class='x25' style='mso-ignore:colspan;border-right:1px solid windowtext;height:15pt;'></td>
                        <td colspan='2' class='x49' style='border-right:1px solid windowtext;'>Municipal Accountant</td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td colspan='5' height='19' class='x26' style='mso-ignore:colspan;border-right:1px solid windowtext;height:14.25pt;'></td>
                        <td class='x37'>Date:</td>
                        <td class='x27'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='9' style='mso-height-source:userset;height:6.75pt'>
                        <td colspan='7' height='8' class='x23' style='mso-ignore:colspan;border-right:1px solid windowtext;height:6pt;'>
                          <div style='display:block;overflow:hidden'></div>
                        </td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='21' style='mso-height-source:userset;height:15.75pt'>
                        <td colspan='7' height='21' class='x62' style='border-right:1px solid windowtext;height:15.75pt;'>Subsidiary Ledger</td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='9' style='mso-height-source:userset;height:6.75pt'>
                        <td colspan='7' height='8' class='x26' style='mso-ignore:colspan;border-right:1px solid windowtext;height:6pt;'>
                          <div style='display:block;overflow:hidden'></div>
                        </td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='19' class='x32' style='height:14.25pt;'>Date</td>
                        <td colspan='2' class='x47' style='border-right:1px solid windowtext;'>Particulars/Reference</td>
                        <td colspan='2' class='x47' style='border-right:1px solid windowtext;'>Liquidations</td>
                        <td class='x32'>Obligation Increase</td>
                        <td class='x32'>Balance</td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td height='19' class='x34' style='height:14.25pt;'></td>
                        <td class='x39'></td>
                        <td class='x41'></td>
                        <td class='x39'></td>
                        <td class='x41'></td>
                        <td class='x34'>(Decrease)</td>
                        <td class='x34'></td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td rowspan='5' height='99' class='x64' style='border-bottom:1px solid windowtext;height:74.25pt;vertical-align:middle;'>

                        </td>
                        <td colspan='2' rowspan='5' height='99' class='x47' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:74.25pt;'>

                        </td>
                        <td colspan='2' rowspan='5' height='99' class='x47' style='border-right:1px solid windowtext;border-bottom:1px solid windowtext;height:74.25pt;'>

                        </td>
                        <td rowspan='5' height='99' class='x64' style='border-bottom:1px solid windowtext;height:74.25pt;'>

                        </td>
                        <td rowspan='5' height='99' class='x64' style='border-bottom:1px solid windowtext;height:74.25pt;'>

                        </td>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td class='x21'></td>
                      </tr>
                      <tr height='20' style='mso-height-source:userset;height:15pt'>
                        <td class='x21'></td>
                      </tr>
                      <![if supportMisalignedColumns]>
                      <tr height='0' style='display:none'>
                        <td width='352' colspan='4' style='width:264pt;mso-ignore:colspan;'></td>
                        <td width='8' style='width:6pt;'></td>
                        <td width='282' colspan='2' style='width:211.5pt;mso-ignore:colspan;'></td>
                        <td width='64' style='width:48pt;'></td>
                      </tr>
                      <![endif]>
                    </table>

                  </body>


                </div>


              </form>
            </div>



            <div class="col-md-1">

            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <?php include 'script.php' ?>

  <!-- text limit function -->
  <script>
    function textLimit(event, limit) {
      const textarea = event.target;
      if (textarea.value.length > limit) {
        textarea.value = textarea.value.substring(0, limit);
      }
    }
  </script>
</body>

</html>