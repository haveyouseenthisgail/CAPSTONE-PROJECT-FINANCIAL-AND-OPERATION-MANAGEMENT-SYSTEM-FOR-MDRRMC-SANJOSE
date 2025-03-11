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
  <title>Expired Supplies</title>

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
              <h1>Expired Supplies</h1>
            </div>
            <div class="col-sm-6">

            </div>
          </div>
        </div>
      </section>

      <style>

      </style>
      <section class="content expiered">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills" id="nav-pills">
                    <?php
                    // Count all expired items across all supply types
                    $count_all_query = mysqli_query($conn, "
  SELECT COUNT(*) AS total_expired 
  FROM tbl_product 
  WHERE item_expdate < NOW()");
                    $count_all_result = mysqli_fetch_assoc($count_all_query);
                    $total_expired = $count_all_result['total_expired'] ?? 0; // Default to 0 if no expired items
                    ?>
                    <li class="nav-item">
                      <a class="nav-link" href="expired-supplies.php">ALL <span class="badge bg-danger float-right ml--1"><?php echo $total_expired; ?></span></a>
                    </li>

                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                    $query = mysqli_query($conn, "
										SELECT DISTINCT tbl_supply.supply_type AS supply_type_alias, tbl_supply.supply_id
										FROM tbl_supply
										LEFT JOIN tbl_product ON tbl_supply.supply_id = tbl_product.supply_id
										ORDER BY tbl_supply.supply_type ASC");

                    while ($result = mysqli_fetch_array($query)) {
                      extract($result);

                      // Count expired items for the current supply type
                      $count_query = mysqli_query($conn, "
											SELECT COUNT(*) AS expired_count 
											FROM tbl_product 
											WHERE supply_id = $supply_id 
												AND item_expdate < NOW()");
                      $count_result = mysqli_fetch_assoc($count_query);
                      $expired_count = $count_result['expired_count'] ?? 0; // Default to 0 if no expired items
                    ?>
                      <!-- Supply Type Tabs -->
                      <li class="nav-item">
                        <a style="text-transform: uppercase;"
                          class="nav-link <?php echo (isset($_GET['supply_id']) && $_GET['supply_id'] == $supply_id) ? 'active' : ''; ?>"
                          href="expired-supplies-view.php?supply_id=<?php echo $supply_id; ?>">
                          <?php echo $supply_type_alias; ?>
                          <span class="badge bg-danger float-right ml--1"><?php echo $expired_count; ?></span>
                        </a>
                      </li>
                    <?php } ?>
                  </ul>

                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane">
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
                            <!-- <th></th> -->
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
														ORDER BY tbl_product.item_name");

													while ($result = mysqli_fetch_array($query)) {
														extract($result);

														// Check if item_expdate is NULL or empty
														if (empty($item_expdate)) {
															continue; // Skip rows with no expiration date
														}

														// Skip non-expired items (Show only expired items)
														$current_date = new DateTime();
														$exp_date = new DateTime($item_expdate);

														// Only display expired items (expiration date is in the past)
														if ($exp_date >= $current_date) {
															continue; // Skip non-expired items
														}

														// Display expired item
													?>

                              <tr>
                                <td><?php echo $item_name ?></td>
                                <td><?php echo $item_quantity ?></td>
                                <td><?php echo $unit_name ?></td>
                                <td><?php echo $item_condition ?></td>
                                <td>Expired</td>
                                <td class="project-state">
                                  <span class="badge badge-success" style="color:white;"><?php echo date('M d, Y', strtotime($item_started)) ?></span>
                                </td>
                                <td class="project-state">
                                  <span class="badge badge-danger" style="color:white;"><?php echo date('M d, Y', strtotime($item_expdate)) ?></span>
                                </td>
                                <!-- <td class="project-actions text-center">
																<a class="btn btn-info btn-sm" id="editproduct" href="#" data-product-id=<?php echo $product_id ?> data-toggle="modal" data-target="#modal-product-edit">
																	<i class="fas fa-pencil-alt"></i> Edit
																</a>
																<a class="btn btn-danger btn-sm" href="#" id="deleteproduct" data-product-id=<?php echo $product_id ?>>
																	<i class="fas fa-trash"></i> Delete
																</a>
															</td> -->
                              </tr>
                          <?php
                            }
                          }
                          ?>
                        </tbody>

                      </table>
                    </div>

                  </div>

                </div><!-- /.card-body -->
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
  <?php include 'script.php' ?>
  <script>
    $(document).ready(function() {

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


    });
  </script>
</body>

</html>