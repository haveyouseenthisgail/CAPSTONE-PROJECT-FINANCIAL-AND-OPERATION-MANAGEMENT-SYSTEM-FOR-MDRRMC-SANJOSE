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
  <title>Fund Allotment</title>

  <?php include 'link.php' ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include 'sidebar.php' ?>
    <div class="content-wrapper">

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-md-6">
              <h1 style="text-transform: uppercase;">Fund Allotment</h1>
            </div>
            <div class="col-md-6 add_btn">

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-fundAllotment">
                <i class="fa-solid fa-plus"></i>
                Add Fund Allotment
              </button>
            </div>

            <div class="modal fade" id="modal-fundAllotment">
              <div class="modal-dialog" style="max-width:520px !important;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add Fund Allotment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" id="fundAllotmentform">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fund Type</label>
                        <div class="col-sm-9">
                          <select class="form-control custom-select" name="fund_type">
                            <option selected disabled>Fund Type</option>
                            <option>Genfund</option>
                            <option>Stf</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fund year</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" name="fallotment_year" id="fallotment-year">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fund Allotment</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" name="fund_allotment">
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>


            <div class="modal fade" id="modal-fundAllotment-edit">
              <div class="modal-dialog" style="max-width:520px !important;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Fund Allotment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <form class="form-horizontal" id="editfundAllotmentform">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fund Type</label>
                        <div class="col-sm-9">
                          <input type="hidden" name="fallotment_id" id="fallotment_id">
                          <select class="form-control custom-select" id="fund_type" name="fund_type">
                            <option selected disabled>Fund Type</option>
                            <option>Genfund</option>
                            <option>Stf</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fund year</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="fallotment_year" name="fallotment_year">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fund Allotment</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="fund_allotment" name="fund_allotment">
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="editfundAllotmentform" class="btn btn-primary">Save </button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#genfund" data-toggle="tab">GENFUND</a></li>
                    <li class="nav-item"><a class="nav-link" href="#stf" data-toggle="tab">STF</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="tab-content">
                  <div class="active tab-pane" id="genfund">
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Fund Allotment</th>

                            <th>Fund Year</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                          $query = mysqli_query($conn, "SELECT * FROM `tbl_fundallotment` WHERE `fund_type` = 'Genfund'");
                          while ($result = mysqli_fetch_array($query)) {
                            extract($result);
                          ?>
                            <tr>
                              <td><?php echo $fund_allotment ?></td>

                              <td><?php echo $fallotment_year ?></td>
                              <td class="project-actions text-center">
                                <a class="btn btn-info btn-sm" id="editfundBTNS"
                                  data-fallotment-id="<?php echo $fallotment_id ?>"
                                  data-fund-type-id="<?php echo $fund_type ?>"
                                  href="#" data-toggle="modal" data-target="#modal-fundAllotment-edit">
                                  <i class="fas fa-pencil-alt"></i> Edit
                                </a>

                              
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="stf">
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Fund Allotment</th>

                            <th>Fund Year</th>
                            <th></th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                          $query = mysqli_query($conn, "SELECT * FROM `tbl_fundallotment` WHERE `fund_type` = 'Stf'");
                          while ($result = mysqli_fetch_array($query)) {
                            extract($result);

                          ?>
                            <tr>
                              <td><?php echo $fund_allotment ?></td>

                              <td><?php echo $fallotment_year ?></td>
                              <td class="project-actions text-center">
                                <a class="btn btn-info btn-sm" id="editfundBTNS"
                                  data-fallotment-id="<?php echo $fallotment_id ?>"
                                  data-fund-type-id="<?php echo $fund_type ?>"
                                  href="#" data-toggle="modal" data-target="#modal-fundAllotment-edit">
                                  <i class="fas fa-pencil-alt"></i> Edit
                                </a>

                            
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>



                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <?php include 'script.php' ?>
  <script>
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "ordering": false,
      "buttons": [

        {
          extend: 'print',
          exportOptions: {
            columns: ':not(:last-child)' // Exclude the last column
          }
        }
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example3").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "ordering": false,
      "buttons": [

        {
          extend: 'print',
          exportOptions: {
            columns: ':not(:last-child)'
          }
        }
      ]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

    $("#example2").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "ordering": false,
      "buttons": [

        {
          extend: 'print',
          exportOptions: {
            columns: ':not(:last-child)'
          }
        }
      ]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');


    const today = new Date().toISOString().split('T')[0];
    const dateInput = document.getElementById('fallotment-year');
    dateInput.setAttribute('min', today);
    dateInput.setAttribute('max', today);
    dateInput.value = today;
  </script>
</body>

</html>