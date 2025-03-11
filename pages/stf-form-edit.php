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
  <title>Genfund Form</title>

  <?php include 'link.php' ?>

</head>

<body class="hold-transition sidebar-mini">


  <div class="wrapper">
    <?php include 'sidebar.php' ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1> AIP-STF Form </h1>
            </div>
            <div class="col-sm-6">

            </div>
          </div>
        </div>
      </section>

      <form action="../inc/controller.php" method="POST" id="UpdatestfForm">
        <?php

        $genID = $_GET['reference_id'];

        ?>
        <input type="hidden" name="reference_id" value="<?php echo $genID ?>">
        <section class="content">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header flex gp--2">
                    <h3 class="card-title" style="align-self: center;">General Fund</h3>
                    <input type="date" name="stf_year" value="<?php echo $_GET['stf_year'] ?>" readonly style="text-align:center;outline:0;border:none;" placeholder="Year">

                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'mdrsystem');

                    $queryFund = $conn->query("SELECT * FROM `tbl_fundallotment` WHERE `reference_id` = '$genID' AND `fund_type` = 'Stf'");
                    $resultFund = $queryFund->fetch_assoc();
                    $fundAllotment = $resultFund['fund_allotmentbal'] ?? 0;
                    $theref = $resultFund['reference_id'] ?? '';

                    $getid = $conn->query("SELECT `fallotment_id` FROM `tbl_stf` WHERE `reference_id` = '$genID'");
                    $resultgetid = $getid->fetch_assoc();
                    $getnow = $resultgetid['fallotment_id'] ?? '';
                    ?>
                    <input type="hidden" name="reference_id" value="<?php echo $genID ?>">
                    <input type="hidden" name="fallotment_id" value="<?php echo $getnow ?>">


                    <input type="number" id="remaining-funds" style="outline:0;border:1px solid #fff;text-align:center;" readonly name="funds_remaining" value="<?php echo $fundAllotment; ?>"
                      class="funds__remaining">


                  </div>
                  <div class="card-body p-0">
                    <div class="bs-stepper">
                      <div class="bs-stepper-header" role="tablist">
                        <div class="step" data-target="#pmt-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="pmt-part" id="pmt-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label"> PREVENTION AND MITIGATION </span>
                          </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#preparedness-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="preparedness-part" id="preparedness-part-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">PREPAREDNESS </span>
                          </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#support-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="support-part" id="support-part-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">PROVISION OF SUPPORT ON DRR/OPCEN OPERATIONS </span>
                          </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#response-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="response-part" id="response-part-trigger">
                            <span class="bs-stepper-circle">4</span>
                            <span class="bs-stepper-label">QUICK RESPONSE </span>
                          </button>
                        </div>
                      </div>
                      <div class="bs-stepper-content">

                        <div id="pmt-part" class="content" role="tabpanel" aria-labelledby="pmt-part-trigger">
                          <div class="wrap">
                            <i class="fa-solid fa-plus add-icon" style="font-size: 20px;color:#007bff;cursor:pointer;" id="addFormOne"></i>
                            <?php
                            $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                            $query = mysqli_query($conn, "SELECT * FROM `tbl_stf` WHERE `prog_type` = 'prevention' AND `reference_id` = $genID");
                            while ($result = mysqli_fetch_array($query)) {
                              extract($result);
                            }
                            ?>

                            <div class="pmtRow" style="display:flex;">
                              <div class="row">
                                <div class="col-md-7">
                                  <div class="d-flex" style="gap: 5px;">
                                    <div class="form-group">
                                      <label>Program/Activities</label>
                                      <textarea name="programone[]" style="overflow: hidden;" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label>Implementing Office</label>
                                      <textarea name="officeone[]" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label>Expected Outputs</label>
                                      <textarea name="exp_outputsone[]" class=" form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label for="expenses"> Expenses(MOOE)</label>
                                      <input type="number" name="exp_mooeone[]" class="form-control fixval__one" style="height:61px;">
                                    </div>
                                  </div>

                                </div>
                                <div class="col-md-5">
                                  <div class="d-flex" style="gap: 5px;">
                                    <div class="form-group ">
                                      <label>1ST QUARTER </label>
                                      <input type="number" name="first_quartone[]" class="form-control fval__one " style="height:61px;">
                                    </div>
                                    <div class="form-group">
                                      <label>2ND QUARTER </label>
                                      <input type="number" name="second_quartone[]" class="form-control sval__one" style="height:61px;">
                                    </div>
                                    <div class="form-group ">
                                      <label>3RD QUARTER </label>
                                      <input type="number" name="third_quartone[]" class="form-control tval__one" style="height:61px;">
                                    </div>
                                    <div class="form-group ">
                                      <label>4TH QUARTER </label>
                                      <input type="number" name="fourth_quartone[]" class="form-control ftval__one" style="height:61px;">
                                    </div>
                                    <div class="form-group " style="padding:unset;">

                                      <label>REMARKS</label>
                                      <input type="number" name="remark_one[]" class="form-control remark__one" readonly style="height:61px;">
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>


                          </div>
                          <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div id="preparedness-part" class="content" role="tabpanel" aria-labelledby="preparedness-part-trigger">

                          <div class="wrap">
                            <i class="fa-solid fa-plus add-icon" style="font-size: 20px;color:#007bff;cursor:pointer;" id="addFormTwo"></i>
                            <?php
                            $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                            $query = mysqli_query($conn, "SELECT * FROM `tbl_stf` WHERE `prog_type` = 'preparedness' AND `reference_id` = $genID");
                            while ($result = mysqli_fetch_array($query)) {
                              extract($result);
                            }
                            ?>
                            <div class="preparednessRow" style="display:flex;">
                              <div class="row">
                                <div class="col-md-7">

                                  <div class="d-flex" style="gap: 5px;">
                                    <div class="form-group">

                                      <label>Program/Activities</label>
                                      <textarea name="program2[]" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">

                                      <label>Implementing Office</label>
                                      <textarea name="office2[]" class="form-control "></textarea>
                                    </div>
                                    <div class="form-group">

                                      <label>Expected Outputs</label>
                                      <textarea name="exp_outputs2[]" class=" form-control "></textarea>
                                    </div>
                                    <div class="form-group">

                                      <label for="expenses"> Expenses(MOOE)</label>
                                      <input type="text" name="exp_mooe2[]" class="form-control fixval__two " style="height:61px;">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="d-flex" style="gap: 5px;">

                                    <div class="form-group ">

                                      <label>1ST QUARTER </label>
                                      <input type="text" name="first_quart2[]" class="form-control fval__two " style="height:61px;">
                                    </div>
                                    <div class="form-group">

                                      <label>2ND QUARTER </label>
                                      <input type="text" name="second_quart2[]" class="form-control sval__two " style="height:61px;">
                                    </div>
                                    <div class="form-group ">
                                      <label>3RD QUARTER </label>
                                      <input type="text" name="third_quart2[]" class="form-control tval__two " style="height:61px;">
                                    </div>
                                    <div class="form-group ">

                                      <label>4TH QUARTER </label>
                                      <input type="text" name="fourth_quart2[]" class="form-control ftval__two " style="height:61px;">
                                    </div>
                                    <div class="form-group " style="padding:unset;">
                                      <label>REMARKS</label>
                                      <input type="text" name="remark_two[]" class="form-control  remark__two" readonly style="height:61px;">
                                    </div>
                                  </div>

                                </div>
                              </div>




                            </div>


                          </div>

                          <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                          <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div id="support-part" class="content" role="tabpanel" aria-labelledby="support-part-trigger">

                          <div class="wrap">
                            <i class="fa-solid fa-plus add-icon" style="font-size: 20px;color:#007bff;cursor:pointer;" id="addFormThree"></i>
                            <?php
                            $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                            $query = mysqli_query($conn, "SELECT * FROM `tbl_stf` WHERE `prog_type` = 'support' AND `reference_id` = $genID");
                            while ($result = mysqli_fetch_array($query)) {
                              extract($result);
                            }
                            ?>
                            <div class="supportRow" style="display:flex;">

                              <div class="row">
                                <div class="col-md-7">
                                  <div class="d-flex" style="gap: 5px;">
                                    <div class="form-group">
                                      <label>Program/Activities</label>
                                      <textarea name="program3[]" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">

                                      <label>Implementing Office</label>
                                      <textarea name="office3[]" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">

                                      <label>Expected Outputs</label>
                                      <textarea name="exp_outputs3[]" class=" form-control"></textarea>
                                    </div>
                                    <div class="form-group">

                                      <label for="expenses"> Expenses(MOOE)</label>
                                      <input type="text" name="exp_mooe3[]" class="form-control fixval__three " style="height:61px;">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="d-flex" style="gap: 5px;">
                                    <div class="form-group ">

                                      <label>1ST QUARTER </label>
                                      <input type="text" name="first_quart3[]" class="form-control  fval__three " style="height:61px;">
                                    </div>
                                    <div class="form-group">

                                      <label>2ND QUARTER </label>
                                      <input type="text" name="second_quart3[]" class="form-control sval__three " style="height:61px;">
                                    </div>
                                    <div class="form-group ">
                                      <label>3RD QUARTER </label>
                                      <input type="text" name="third_quart3[]" class="form-control tval__three " style="height:61px;">
                                    </div>
                                    <div class="form-group ">

                                      <label>4TH QUARTER </label>
                                      <input type="text" name="fourth_quart3[]" class="form-control ftval__three  " style="height:61px;">
                                    </div>
                                    <div class="form-group " style="padding:unset;">

                                      <label>REMARKS</label>
                                      <input type="text" name="remark_three[] " class="form-control  remark__three" readonly style=" height:61px;">
                                    </div>
                                  </div>
                                </div>
                              </div>



                            </div>


                          </div>

                          <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                          <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div id="response-part" class="content" role="tabpanel" aria-labelledby="response-part-trigger">

                          <div class="wrap">
                            <i class="fa-solid fa-plus add-icon" style="font-size: 20px;color:#007bff;cursor:pointer;" id="addFormFour"></i>
                            <?php
                            $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                            $query = mysqli_query($conn, "SELECT * FROM `tbl_stf` WHERE `prog_type` = 'support' AND `reference_id` = $genID");
                            while ($result = mysqli_fetch_array($query)) {
                              extract($result);
                            }
                            ?>
                            <div class="responseRow" style="display:flex;">

                              <div class="row">
                                <div class="col-md-7">
                                  <div class="d-flex" style="gap: 5px;">
                                    <div class="form-group">

                                      <label>Program/Activities</label>
                                      <textarea name="program4[]" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">

                                      <label>Implementing Office</label>
                                      <textarea name="office4[]" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">

                                      <label>Expected Outputs</label>
                                      <textarea name="exp_outputs4[]" class=" form-control"></textarea>
                                    </div>
                                    <div class="form-group">

                                      <label for="expenses"> Expenses(MOOE)</label>
                                      <input type="text" name="exp_mooe4[]" class="form-control fixval__four " style="height:61px;">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="d-flex" style="gap: 5px;">
                                    <div class="form-group ">

                                      <label>1ST QUARTER </label>
                                      <input type="text" name="first_quart4[]" class="form-control fval__four " style="height:61px;">
                                    </div>
                                    <div class="form-group">

                                      <label>2ND QUARTER </label>
                                      <input type="text" name="second_quart4[]" class="form-control sval__four " style="height:61px;">
                                    </div>
                                    <div class="form-group ">
                                      <label>3RD QUARTER </label>
                                      <input type="text" name="third_quart4[]" class="form-control tval__four " style="height:61px;">
                                    </div>
                                    <div class="form-group ">

                                      <label>4TH QUARTER </label>
                                      <input type="text" name="fourth_quart4[]" class="form-control ftval__four " style="height:61px;">
                                    </div>
                                    <div class="form-group " style="padding:unset;">

                                      <label>REMARKS</label>
                                      <input type="text" name="remark_four[]" class="form-control  remark__four" readonly style="height:61px;">
                                    </div>

                                  </div>
                                </div>
                              </div>



                            </div>


                          </div>
                          <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                          <button type="submit" name="UpdatestfForm" class="btn btn-primary">Submit</button>
                        </div>

                      </div>


                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

              </div>
            </div>

          </div>
        </section>
      </form>
    </div>


  </div>
  </div>

</body>
<?php include 'script.php' ?>

<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script>
  // Stepper
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // Append Fields
  document.addEventListener("DOMContentLoaded", function() {
    const rowMapping = {
      addFormOne: "pmtRow",
      addFormTwo: "preparednessRow",
      addFormThree: "supportRow",
      addFormFour: "responseRow"
    };

    for (const [buttonId, rowClass] of Object.entries(rowMapping)) {
      const addButton = document.getElementById(buttonId);
      if (addButton) {
        addButton.addEventListener("click", function() {
          const originalRow = document.querySelector(`.${rowClass}`);
          if (originalRow) {
            const clonedRow = originalRow.cloneNode(true);

            clonedRow.querySelectorAll("textarea, input").forEach(input => input.value = "");

            originalRow.parentNode.appendChild(clonedRow);
          } else {
            console.error(`Row template with class .${rowClass} not found.`);
          }
        });
      }
    }
  });

  // Expenses
  $(document).ready(function() {
    // Define the initial fund allotment balance
    var selectedFundAllotment = parseFloat($('#remaining-funds').val()) || 0;

    function updateRemainingFunds() {
      // Reset remaining to the initial fund allotment balance
      var remaining = selectedFundAllotment;

      // Subtract values from each input field
      $('.fixval__one, .fixval__two, .fixval__three, .fixval__four').each(function() {
        var fixVal = parseFloat($(this).val()) || 0; // Default to 0 if input is empty or invalid
        remaining -= fixVal;
      });

      // Prevent negative values and display error if exceeded
      if (remaining < 0) {
        $('.error-message').text('The total exceeds the available funds!').show();
        remaining = 0;
      } else {
        $('.error-message').hide();
      }

      // Update the remaining funds input field
      $('.funds__remaining').val(remaining.toFixed(2));
    }

    // Trigger the update function on input
    $(document).on('input', '.fixval__one, .fixval__two, .fixval__three, .fixval__four', function() {
      updateRemainingFunds();
    });
  });


  //Deduct Per-quarter
  $(document).ready(function() {
    function handleInput(suffix) {
      $(document).on('input', `.fval__${suffix}, .sval__${suffix}, .tval__${suffix}, .ftval__${suffix}`, function() {
        $(`.pmtRow, .preparednessRow, .supportRow, .responseRow`).each(function() {
          // Parse input values as floats or default to 0
          var fixVal = parseFloat($(this).find(`.fixval__${suffix}`).val()) || 0;
          var fval = parseFloat($(this).find(`.fval__${suffix}`).val()) || 0;
          var sval = parseFloat($(this).find(`.sval__${suffix}`).val()) || 0;
          var tval = parseFloat($(this).find(`.tval__${suffix}`).val()) || 0;
          var ftval = parseFloat($(this).find(`.ftval__${suffix}`).val()) || 0;

          // Calculate remaining value
          var remaining = fixVal - fval - sval - tval - ftval;

          // Update the remark field
          var remarkField = $(this).find(`.remark__${suffix}`);
          remarkField.val(remaining < 0 ? '0' : remaining.toFixed(2));
        });
      });
    }

    // Handle input for each suffix
    ['one', 'two', 'three', 'four'].forEach(handleInput);
  });

  // Fund Allotment
  // function updateFallotmentId(select) {
  //   const fallotmentIdInput = document.getElementById('fallotment-id');
  //   const selectedOption = select.options[select.selectedIndex];
  //   fallotmentIdInput.value = selectedOption.getAttribute('data-fallotment-id');
  // }


  //Date 
</script>

</html>