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
  <title>VATable Dashboard</title>

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
              <h1>DV (VATable) Form </h1>
            </div>
            <div class="col-sm-6">

            </div>
          </div>
        </div>
      </section>

      <form id="dvvatform" action="../inc/controller.php" method="POST">
        <input type="hidden" name="dvtype" value="dvvat">
        <section class="content">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title">Disbursement Voucher (VATable)</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="bs-stepper">
                      <div class="bs-stepper-header" role="tablist">
                        <!-- your steps here -->
                        <div class="step" data-target="#logins-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">DV Details</span>
                          </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#information-part">
                          <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Certified</span>
                          </button>
                        </div>
                      </div>
                      <div class="bs-stepper-content">
                        <!-- your steps content here -->
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                          <div class="form-group">
                            <label for="fundType">Fund: </label>
                            <select class="form-control" name="dv_fund">
                              <option selected="" disabled="">Select one</option>

                              <option>GENFUND </option>
                              <option>STF</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="dvNo">DV No.:</label>
                            <input type="text" name="dv_no" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="dvDate">Date :</label>
                            <input type="date" name="dv_date" class="form-control" id="dv-date">
                          </div>
                          <div class="form-group">
                            <label for="idNo">ID No./TIN:</label>
                            <input type="text" name="dv_tin" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="idNo">CAFOA No.:</label>
                            <input type="text" name="dv_cafoa" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="rCenter">Responsibility Center:</label>
                            <input type="text" name="dv_rcenter" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="payee">Payee:</label>
                            <input type="text" name="dv_payee" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="dv_add" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Particulars</label>
                            <select class="form-control select2bs4" id="particularsSelect" name="particularsSelect" style="width: 100%;">
                              <option selected="" disabled="">Select one</option>
                              <?php
                              $query = mysqli_query($conn, "SELECT dv_particulars AS particulars  FROM `tbl_dvvat`");
                              while ($result = mysqli_fetch_array($query)) {
                                extract($result)
                              ?>
                                <option value="<?php echo $particulars ?>"><?php echo $particulars ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group mt-2">
                            <label for="newParticulars">Type a new Particular (if not in the list)</label>
                            <input type="text" id="newParticulars" name="newParticulars" class="form-control" placeholder="Type here...">
                          </div>
                          <div class="form-group">
                            <label for="totalAmount">Amount:</label>
                            <input type="number" name="dv_amnt" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="amountDue">Amount Due:</label>
                            <input type="number" name="dv_amntdue" class="form-control">
                          </div>

                          <button class="btn btn-primary" type="button" onclick="stepper.next()">Next</button>
                        </div>
                        <?php
                        $conn = new mysqli('localhost', 'root', '', 'mdrsystem');

                        // Check the connection
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }

                        // Query for each value
                        $sql_A = "SELECT authorizer_id AS AID , authorizer_name AS A FROM `tbl_authorizers` WHERE `app_level` = 'A'";
                        $result_A = $conn->query($sql_A);
                        $row_A = $result_A->fetch_assoc();
                        $A = $row_A['A'] ?? '';
                        $AID = $row_A['AID'] ?? '';

                        $sql_B = "SELECT authorizer_id AS BID , authorizer_name AS B FROM `tbl_authorizers` WHERE `app_level` = 'B'";
                        $result_B = $conn->query($sql_B);
                        $row_B = $result_B->fetch_assoc();
                        $B = $row_B['B'] ?? '';
                        $BID = $row_B['BID'] ?? '';

                        $sql_C = "SELECT authorizer_id AS CID , authorizer_name AS C FROM `tbl_authorizers` WHERE `app_level` = 'C'";
                        $result_C = $conn->query($sql_C);
                        $row_C = $result_C->fetch_assoc();
                        $C = $row_C['C'] ?? '';
                        $CID = $row_C['CID'] ?? '';

                        $sql_D = "SELECT authorizer_id AS DID , authorizer_name AS D FROM `tbl_authorizers` WHERE `app_level` = 'D'";
                        $result_D = $conn->query($sql_D);
                        $row_D = $result_D->fetch_assoc();
                        $D = $row_D['D'] ?? '';
                        $DID = $row_D['DID'] ?? '';

                        $sql_E = "SELECT authorizer_id AS EID , authorizer_name AS E FROM `tbl_authorizers` WHERE `app_level` = 'E'";
                        $result_E = $conn->query($sql_E);
                        $row_E = $result_E->fetch_assoc();
                        $E = $row_E['E'] ?? '';
                        $EID = $row_E['EID'] ?? '';

                        $sql_F1 = "SELECT authorizer_id AS F1ID , authorizer_name AS F1 FROM `tbl_authorizers` WHERE `app_level` = 'F1'";
                        $result_F1 = $conn->query($sql_F1);
                        $row_F1 = $result_F1->fetch_assoc();
                        $F1 = $row_F1['F1'] ?? '';
                        $F1ID = $row_F1['F1ID'] ?? '';

                        $sql_F2 = "SELECT authorizer_id AS F2ID , authorizer_name AS F2 FROM `tbl_authorizers` WHERE `app_level` = 'F2'";
                        $result_F2 = $conn->query($sql_F2);
                        $row_F2 = $result_F2->fetch_assoc();
                        $F2 = $row_F2['F2'] ?? '';
                        $F2ID = $row_F2['F2ID'] ?? '';




                        $conn->close();
                        ?>
                        <input type="hidden" name="a_name" value="<?php echo $AID ?>">
                        <input type="hidden" name="b_name" value="<?php echo $BID ?>">
                        <input type="hidden" name="c_name" value="<?php echo $CID ?>">
                        <input type="hidden" name="d_name" value="<?php echo $DID ?>">
                        <input type="hidden" name="e_name" value="<?php echo $EID ?>">
                        <input type="hidden" name="f_name1" value="<?php echo $F1ID ?>">
                        <input type="hidden" name="f_name2" value="<?php echo $F2ID ?>">

                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                          <div class="form-group flex">
                            <label for="aName" class="col-md-2"> A. Local DRRM Officer -II</label>
                            <input type="text" class="form-control" name="" readonly value="<?php echo htmlspecialchars($A); ?>">
                          </div>
                          <div class="form-group flex">
                            <label for="bName" class="col-md-2"> B. Municipal Accountant</label>
                            <input type="text" class="form-control" name="" readonly value="<?php echo htmlspecialchars($B); ?>">
                          </div>
                          <div class="form-group flex">
                            <label for="cName" class="col-md-2"> C. Municipal Treasurer</label>
                            <input type="text" class="form-control" name="" readonly value="<?php echo htmlspecialchars($C); ?>">
                          </div>
                          <div class="form-group flex">
                            <label for="dName" class="col-md-2"> D. Municipal Mayor</label>
                            <input type="text" class="form-control" name="" readonly value="<?php echo htmlspecialchars($D); ?>">
                          </div>
                          <div class="form-group flex" style="margin-bottom:unset;">
                            <label for="eName" class="col-md-2"> E.Signature Over Printed Name/Position</label>
                            <input type="text" class="form-control" name="" readonly value="<?php echo htmlspecialchars($E); ?>">
                          </div>
                          <div class="form-group">
                            <label for="fName" style="margin-left: 8px;">F.</label>
                            <div class="flex" style="margin-bottom: 1rem;">
                              <label for="preparedBy" class="col-md-2">1.Admin Assistant-1</label>
                              <input type="text" class="form-control" name="" readonly value="<?php echo htmlspecialchars($F1); ?>">
                            </div>
                            <div class="flex">
                              <label for="mAccountant" class="col-md-2">2.Municipal Accountant </label>
                              <input type="text" class="form-control" name="" readonly value="<?php echo htmlspecialchars($F2); ?>">
                            </div>
                          </div>
                          <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                          <button type="submit" name="dvvatform" class="btn btn-primary">Submit</button>
                        </div>


                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </section>
      </form>
    </div>
  </div>

</body>
<?php include 'script.php' ?>

<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  const today = new Date();
  const formattedDate = today.toISOString().split('T')[0];
  const dateInput = document.getElementById('dv-date');

  dateInput.value = formattedDate;
  dateInput.addEventListener('click', function(e) {
    e.preventDefault();
  });

  $(document).ready(function() {
    $('#particularsSelect').on('change', function() {
      const selectedValue = $(this).val();
      $('#newParticulars').val(selectedValue);
    });
  });
</script>

</html>