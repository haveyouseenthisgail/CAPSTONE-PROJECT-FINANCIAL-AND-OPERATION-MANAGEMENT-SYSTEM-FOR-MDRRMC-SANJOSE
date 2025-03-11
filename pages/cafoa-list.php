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
  <title>AIP-GENFUND LIST</title>

  <?php include 'link.php' ?>

</head>

<body class="hold-transition sidebar-mini">

  <style>
    td {
      vertical-align: middle !important;
    }
  </style>
  <div class="wrapper">
    <?php include 'sidebar.php' ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>CAFOA LIST
              </h1>
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
                  <table id="example1" class="table table-striped  table-hover">
                    <thead>
                      <tr>
                        <th style="width: 2%;"> No.</th>
                        <th style="width:35%;"> Request</th>
                        <th style="width:35%;"> Payee</th>
                        <th> Date </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                      $no = 1;
                      $query = mysqli_query($conn, "SELECT cafoa_id,cafoa__request,cafoa__payee,date  FROM `tbl_cafoa` GROUP BY cafoa_id ORDER BY cafoa_id");
                      while ($result = mysqli_fetch_array($query)) {
                        extract($result);
                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td> <?php echo $cafoa__request ?></td>
                          <td> <?php echo $cafoa__payee ?></td>
                          <td> <?php echo date('M d, Y', strtotime($date)) ?></td>
                          <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="cafoaview.php?cafoa_id=<?php echo $cafoa_id  ?>">
                              <i class=" fas fa-folder">
                              </i>
                              View
                            </a>
                            <a class="btn btn-info btn-sm" href="edit-cafoa.php?cafoa_id=<?php echo $cafoa_id  ?>">
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