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
  <title>AIP-STF LIST</title>

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
              <h1>AIP-STF List </h1>
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

                <div class="card-body">
                  <table id="example1" class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          No.
                        </th>
                        <th></th>
                        <th class="text-center">
                          Year
                        </th>
                        <th></th>
                        <th class="text-center">
                          Action
                        </th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                      $no = 1;
                      $query = mysqli_query($conn, "SELECT reference_id, MIN(stf_year) AS stf_year FROM `tbl_stf` GROUP BY reference_id ORDER BY reference_id DESC");



                      while ($result = mysqli_fetch_array($query)) {
                        extract($result);


                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td></td>
                          <td class="text-center"> <?php echo date('F d, Y', strtotime($stf_year)) ?></td>
                          <td></td>
                          <td class=" project-actions text-center">
                            <a class="btn btn-primary btn-sm" href="stfview.php?reference_id=<?php echo $reference_id ?>">
                              <i class="fas fa-folder"></i> View
                            </a>
                            <a class="btn btn-info btn-sm" href="stf-form-edit.php?stf_year=<?php echo $stf_year ?>&reference_id=<?php echo $reference_id ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
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
</script>


</html>