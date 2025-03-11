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
  <title>Supply View</title>

  <?php include 'link.php' ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include 'sidebar.php' ?>
    <div class="content-wrapper">
      <style>
        .warning {
          background-color: #ffeb3b;
          /* Light yellow background for items expiring soon */
          color: #f44336;
          /* Dark red text color */
        }
      </style>
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-md-6">
              <h1 style="text-transform: uppercase;">
                <?php
                if (isset($_GET['supply_id'])) {
                  $supply_id = (int) $_GET['supply_id']; // Ensure supply_id is sanitized
                  // Query to get the supply type
                  $query = mysqli_query($conn, "SELECT supply_type FROM tbl_supply WHERE supply_id = $supply_id");

                  if ($query && mysqli_num_rows($query) > 0) {
                    $result = mysqli_fetch_array($query);
                    echo htmlspecialchars($result['supply_type']) . " SUPPLIES";
                  } else {
                    echo "Supply type not found";
                  }
                } else {
                  echo "Supply ID not set in the URL";
                }
                ?>
              </h1>
            </div>
            <div class="col-md-6 add_btn">

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-product">
                <i class="fa-solid fa-plus"></i>
                Add New Item
              </button>
            </div>


            <div class="modal fade" id="modal-product">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add New Item </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" id="productform" method="POST" action="../inc/controller.php">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Item Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="item_name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="item_quantity">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Unit</label>
                        <div class="col-sm-10">
                          <select class="form-control custom-select" name="unit_id">
                            <option selected disabled>Unit</option>
                            <?php
                            $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                            $query = mysqli_query($conn, "SELECT * FROM `tbl_unit`");
                            while ($result = mysqli_fetch_array($query)) {
                              extract($result);
                            ?>
                              <option value="<?php echo $unit_id ?>"><?php echo $unit_name ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Condition</label>
                        <div class="col-sm-10">
                          <select class="form-control custom-select" name="item_condition">
                            <option selected disabled>Condition</option>
                            <option>Serviceable</option>
                            <option>Unserviceable</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Remarks</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="item_remarks">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Expiration</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="item_expdate">
                        </div>
                      </div>
                      <input type="hidden" name="supply_id" value="<?php echo $_GET['supply_id'] ?>">
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="" class="btn btn-primary">Save </button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal fade" id="modal-product-edit">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" id="editproductform">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Item Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="item_name" id="item_names">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="item_quantity" id="item_quantitys">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Unit</label>
                        <div class="col-sm-10">
                          <select class="form-control custom-select" name="unit_id" id="unit_ids">
                            <option selected disabled>Unit</option>
                            <?php
                            $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                            $query = mysqli_query($conn, "SELECT * FROM `tbl_unit`");
                            while ($result = mysqli_fetch_array($query)) {
                              extract($result);
                            ?>
                              <option value="<?php echo $unit_id ?>"><?php echo $unit_name ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Condition</label>
                        <div class="col-sm-10">
                          <select class="form-control custom-select" name="item_condition" id="item_conditions">
                            <option selected disabled>Condition</option>
                            <option>Serviceable</option>
                            <option>Unserviceable</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Remarks</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="item_remarks" id="item_remarkss">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Expiration</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="item_expdate" id="item_expdates">
                        </div>
                      </div>
                      <input type="hidden" name="supply_id" value="<?php echo $_GET['supply_id'] ?>" id="supply_ids">
                      <input type="hidden" name="product_id" id="product_ids">
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
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Condition</th>
                        <th>Remarks</th>
                        <th>Started</th>
                        <th>Expiration</th>
                        <th></th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                      if (isset($_GET['supply_id'])) {
                        $query = mysqli_query($conn, "SELECT tbl_supply.*, tbl_product.*, tbl_unit.* 
                        FROM tbl_product 
                        INNER JOIN tbl_supply ON tbl_supply.supply_id = tbl_product.supply_id 
                        INNER JOIN tbl_unit ON tbl_unit.unit_id = tbl_product.unit_id 
                        WHERE tbl_product.supply_id = {$_GET['supply_id']} ORDER BY tbl_product.item_name");

                        while ($result = mysqli_fetch_array($query)) {
                          extract($result);

                          // Skip expired items
                          $current_date = new DateTime();

                          if (!empty($item_expdate)) {
                            $exp_date = new DateTime($item_expdate);

                            // Check if the expiration date is within 3 days
                            $interval = $current_date->diff($exp_date);
                            $is_warning = $interval->days <= 3 && $exp_date > $current_date; // Expiring in 3 days

                            // If the expiration date is in the past, skip the item
                            if ($exp_date < $current_date) {
                              continue; // Skip displaying this row if the item is expired
                            }
                          } else {
                            $is_warning = false; // No expiration date means no warning
                          }

                          // Add a class for warning if the condition is met
                          $warning_class = $is_warning ? 'badge-warning' : 'badge-warning';
                      ?>
                          <tr>
                            <td><?php echo $item_name ?></td>
                            <td><?php echo $item_quantity ?></td>
                            <td><?php echo $unit_name ?></td>
                            <td><?php echo $item_condition ?></td>
                            <td><?php echo $item_remarks ?></td>
                            <td class="project-state">
                              <span class="badge badge-success" style="color:white;"><?php echo date('M d, Y', strtotime($item_started)) ?></span>
                            </td>
                            <td class="project-state">
                              <span class="badge <?php echo $warning_class; ?>" style="color:white;">
                                <?php
                                if (!empty($item_expdate)) {
                                  echo date('M d, Y', strtotime($item_expdate));
                                } else {
                                  echo "No Expiration";
                                }
                                ?>
                              </span>
                            </td>

                            <td class="project-actions text-center">
                              <a class="btn btn-info btn-sm editproduct" id="editproduct" href="#" data-product-id=<?php echo $product_id ?> data-toggle="modal" data-target="#modal-product-edit">
                                <i class="fas fa-pencil-alt"></i> Edit
                              </a>
                              <a class="btn btn-danger btn-sm deleteproduct" href="#" id="deleteproduct" data-product-id=<?php echo $product_id ?>>
                                <i class="fas fa-trash"></i> Delete
                              </a>
                            </td>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                    </tbody>

                  </table>


                </div>
              </div>
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
  </script>
</body>

</html>