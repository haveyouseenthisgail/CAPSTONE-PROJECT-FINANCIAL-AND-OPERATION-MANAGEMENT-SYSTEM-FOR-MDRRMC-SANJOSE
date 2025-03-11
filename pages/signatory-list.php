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
  <title>Signatory LIST</title>

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
              <h1>Signatory List </h1>
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

                  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-authorizer">
                    <i class="fa-solid fa-plus"></i>
                    Add Signatory
                  </button>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 2%;">
                          No.
                        </th>
                        <th> </th>
                        <th>
                          Name
                        </th>
                        <th>Approval Level</th>
                        <th>

                        </th>
                        <th></th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                      $no = 1;
                      $query = mysqli_query($conn, "SELECT * FROM `tbl_authorizers`");
                      while ($result = mysqli_fetch_array($query)) {
                        extract($result);

                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td></td>
                          <td style="text-transform: uppercase;"> <?php echo $authorizer_name ?></td>
                          <td style="text-transform: uppercase;"> <?php echo $app_level ?></td>
                          <td></td>
                          <td class=" project-actions text-center">
                            <a class="btn btn-info btn-sm" id="authoupdate" data-authorizer-id="<?php echo $authorizer_id ?>" href="#" data-toggle="modal" data-target="#modal-authorizer-update">
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





                  <div class="modal fade" id="modal-authorizer">
                    <div class="modal-dialog" style="max-width: 520px !important;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Add Signatory</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" id="authorizerform">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Name:</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="authorizer_name">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Approval Level:</label>
                              <div class="col-sm-9">
                                <div class="form-group">
                                  <select class="form-control custom-select" style="width: 100%;" name="app_level">
                                    <option disabled selected="">Select one</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                    <option>F1</option>
                                    <option>F2</option>
                                  </select>
                                </div>
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


                  <div class="modal fade" id="modal-authorizer-update">
                    <div class="modal-dialog" style="max-width: 520px !important;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Add Signatory</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" id="authorizerformupdate">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Name:</label>
                              <div class="col-sm-9">
                                <input type="hidden" name="authorizer_id" id="authorizer_id">
                                <input type="text" class="form-control" name="authorizer_name" id="authorizer_name">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Approval Level:</label>
                              <div class="col-sm-9">
                                <div class="form-group">
                                  <select class="form-control custom-select" style="width: 100%;" name="app_level" id="app_level">
                                    <option disabled selected="">Select one</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                    <option>F1</option>
                                    <option>F2</option>
                                  </select>
                                </div>
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

  $(function() {
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>


</html>