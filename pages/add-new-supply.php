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
  <title>Supplies LIST</title>

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
              <h1>Supplies List </h1>
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
                <div class="card-header">

                  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-supply">
                    <i class="fa-solid fa-plus"></i>
                    Add New Supply
                  </button>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 2%;">
                          No.
                        </th>
                        <th></th>
                        <th>
                          Supplies Type
                        </th>
                        <th></th>
                        <th>

                        </th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                      $no = 1;
                      $query = mysqli_query($conn, "SELECT * FROM `tbl_supply`");
                      while ($result = mysqli_fetch_array($query)) {
                        extract($result);


                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td></td>
                          <td style="text-transform: uppercase;"> <?php echo $supply_type ?></td>
                          <td></td>
                          <td class=" project-actions text-center">
                            <a class="btn btn-info btn-sm" id="supplyupdatebtn" data-supply-id="<?php echo $supply_id ?>" href="#" data-toggle="modal" data-target="#modal-supply-update">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                            </a>

                            <a class="btn btn-danger btn-sm deletesupply" href="#" id="deletesupply" data-supply-id=<?php echo $supply_id ?>>
                              <i class="fas fa-trash"></i> Delete
                            </a>
                          </td>

                        </tr>
                      <?php
                        $no++;
                      }
                      ?>

                    </tbody>
                  </table>

                  <div class="modal fade" id="modal-supply">
                    <div class="modal-dialog" style="max-width: 465px !important;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Add New Supply</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" id="supplyform" novalidate>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Supply Name</label>
                              <div class="col-sm-9">
                                <input name="supply_type" type="text" class="form-control" required>
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


                  <div class="modal fade" id="modal-supply-update">
                    <div class="modal-dialog" style="max-width: 465px !important;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Update Supply</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" id="Updatesupplyform" novalidate>
                            <div class="form-group row">
                              <input type="hidden" name="supply_id" id="supply_id">
                              <label class="col-sm-3 col-form-label">Supply Name</label>
                              <div class="col-sm-9">
                                <input name="supply_type" id="supply_type" type="text" class="form-control" required>
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