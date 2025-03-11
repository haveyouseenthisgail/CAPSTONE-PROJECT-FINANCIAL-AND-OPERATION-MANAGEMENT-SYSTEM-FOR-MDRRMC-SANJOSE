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
  <title>Non-Vat Dashboard</title>

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
              <h1>DV (Non-VAT) List </h1>
            </div>
            <div class="col-sm-6">

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
                    <li class="nav-item"><a class="nav-link active" href="#pending" data-toggle="tab">PENDING</a></li>
                    <li class="nav-item"><a class="nav-link" href="#approvedd" data-toggle="tab">APPROVED</a></li>
                    <li class="nav-item"><a class="nav-link" href="#rejected" data-toggle="tab">REJECTED</a></li>

                  </ul>
                </div><!-- /.card-header -->
                <div class="tab-content">
                  <div class="active tab-pane" id="pending">
                    <div class="card-header">
                      <h3 class="card-title">PENDING DISBURSEMENT VOUCHER (NON-VAT)</h3>


                    </div>
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped ">
                        <thead>
                          <tr>
                            <th style="width: 1%" class="text-center">
                              No.
                            </th>
                            <th>
                              Payee
                            </th>


                            <th class="text-center">
                              Status
                            </th>
                            <th class="text-center">
                              Action
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                          $no = 1;
                          $query = mysqli_query($conn, "SELECT * FROM `tbl_dvvat` WHERE `dv_type`='dvnvat' AND `dv_status`='pending' ORDER BY `dv_id` DESC");

                          while ($result = mysqli_fetch_array($query)) {
                            extract($result);


                          ?>
                            <tr>
                              <td class="text-center"><?php echo $no ?></td>
                              <td> <?php echo $dv_payee ?></td>


                              <td class="project-state text-center">
                                <span class="badge bg-blue">Ongoing</span>
                              </td>
                              <td class=" project-actions text-center">
                                <a class="btn btn-primary btn-sm" href="dvnvat-view.php?dv_id=<?php echo $dv_id; ?>&dv_type=<?php echo $dv_type; ?>&dv_status=<?php echo $dv_status; ?>">
                                  <i class="fas fa-folder"></i> View
                                </a>
                                <!-- <a class="btn btn-info btn-sm" href="dvnvat-edit.php?dv_id=<?php echo $dv_id; ?>&dv_type=<?php echo $dv_type; ?>&dv_status=<?php echo $dv_status; ?>">
                                  <i class="fas fa-pencil-alt"></i> Edit
                                </a> -->
                                <a class="btn btn-danger btn-sm disapproved" id="disapproved" href="#" data-dv-id="<?php echo $dv_id ?>">
                                  <i class="fas fa-thumbs-down"></i>
                                </a>
                                <a class="btn btn-success btn-sm approved" id="approved" href="#" data-dv-id="<?php echo $dv_id ?>">
                                  <i class="fas fa-thumbs-up"></i>
                                </a>
                              </td>


                            </tr>
                          <?php
                            $no++;
                          }
                          ?>

                        </tbody>
                      </table>
                    </div>

                  </div>
                  <div class="tab-pane" id="approvedd">
                    <div class="card-header">
                      <h3 class="card-title">APPROVED DISBURSEMENT VOUCHER (NON-VAT)</h3>
                    </div>
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-striped ">
                        <thead>
                          <tr>
                            <th style="width: 1%" class="text-center">
                              No.
                            </th>
                            <th>
                              Payee
                            </th>


                            <th class="text-center">
                              Status
                            </th>
                            <th class="text-center">
                              Action
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                          $no = 1;
                          $query = mysqli_query($conn, "SELECT * FROM `tbl_dvvat` WHERE `dv_type`='dvnvat' AND `dv_status`='Approved' ORDER BY `dv_id` DESC ");
                          while ($result = mysqli_fetch_array($query)) {
                            extract($result);


                          ?>
                            <tr>
                              <td class="text-center"><?php echo $no ?></td>
                              <td> <?php echo $dv_payee ?></td>


                              <td class="project-state text-center">
                                <span class="badge badge-success">Approved</span>
                              </td>
                              <td class=" project-actions text-center">
                                <a class="btn btn-primary btn-sm" href="dvnvat-view.php?dv_id=<?php echo $dv_id; ?>&dv_type=<?php echo $dv_type; ?>&dv_status=<?php echo $dv_status; ?>">
                                  <i class="fas fa-folder"></i> View
                                </a>

                              </td>


                            </tr>
                          <?php
                            $no++;
                          }
                          ?>

                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane" id="rejected">
                    <div class="card-header">
                      <h3 class="card-title">REJECTED DISBURSEMENT VOUCHER (NON-VAT)</h3>


                    </div>
                    <div class="card-body ">
                      <table id="example3" class="table table-bordered table-striped ">
                        <thead>
                          <tr>
                            <th style="width: 1%" class="text-center">
                              No.
                            </th>
                            <th>
                              Payee
                            </th>


                            <th class="text-center">
                              Status
                            </th>
                            <th class="text-center">
                              Action
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                          $no = 1;
                          $query = mysqli_query($conn, "SELECT * FROM `tbl_dvvat` WHERE `dv_type`='dvnvat' AND `dv_status`='Rejected' ORDER BY `dv_id` DESC ");
                          while ($result = mysqli_fetch_array($query)) {
                            extract($result);


                          ?>
                            <tr>
                              <td class="text-center"><?php echo $no ?></td>
                              <td> <?php echo $dv_payee ?></td>


                              <td class="project-state text-center">
                                <span class="badge  badge-danger">Rejected</span>
                              </td>
                              <td class=" project-actions text-center">
                                <a class="btn btn-primary btn-sm" href="dvnvat-view.php?dv_id=<?php echo $dv_id; ?>&dv_type=<?php echo $dv_type; ?>&dv_status=<?php echo $dv_status; ?>">
                                  <i class="fas fa-folder"></i> View
                                </a>

                              </td>


                            </tr>
                          <?php
                            $no++;
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
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </section>
    </div>
  </div>

</body>
<?php include 'script.php' ?>
<script>
  $(" #example1").DataTable({
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
          columns: ':not(:last-child)' // Exclude the last column
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
          columns: ':not(:last-child)' // Exclude the last column
        }
      }
    ]
  }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
</script>

</html>