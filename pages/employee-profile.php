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
  <title>Employee Profiles</title>

  <?php include 'link.php' ?>

</head>

<body class="hold-transition sidebar-mini">


  <div class="wrapper">
    <?php include 'sidebar.php' ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6 ">
              <h1>Employee Profile</h1>
            </div>
            <div class="col-sm-6 flex flex-justify--end">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-seminar">
                <i class="fa-solid fa-plus"></i>
                Add Training Event
              </button>
              <div class="modal fade" id="modal-seminar">
                <div class="modal-dialog" style="max-width: 550px !important;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Training Event</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" id="seminarform">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Event Name:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="seminar_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Event Date:</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="seminar_date" id="seminar_date" required>
                            <small id="event-error-message" class="text-danger" style="display:none;">Event date cannot be in the future.</small>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Certificate:</label>
                          <div class="col-sm-9">
                            <div class="custom-file">
                              <input type="file" accept=".jpeg, .png, .jpg" class="custom-file-input" id="exampleInputFile" name="seminar_cert">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                          </div>
                       
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Event Type:</label>
                          <div class="col-sm-9">
                          <select id="inputStatus" name="event_type" class="form-control custom-select">
                              <option selected="" disabled="">Event Type </option>
                              <option>Seminar </option>
                              <option>Workshop </option>
                              <option>Seminar/Workshop </option>
                            </select>
                          </div>
                       
                        </div>

                    
                        <input type="hidden" name="employee_id" value="<?php echo $_GET['employee_id'] ?>">
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
        </div>
      </section>
      <section class="content">

        <div class="row">
          <?php
          if (isset($_GET['employee_id']))
            $query = mysqli_query($conn, "SELECT * FROM `tbl_employee` WHERE `employee_id`= {$_GET['employee_id']} ");
          $result = mysqli_fetch_array($query);
          extract($result);
          ?>
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img style="height:7rem; width:7rem;" class="profile-user-img img-fluid img-circle piedad"
                    src="../profile/<?php echo $employee_img ?>"
                    alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $employee_name ?></h3>

                <p class="text-muted text-center"> <?php echo $employee_position ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-right"><?php echo $employee_add ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right"><?php echo $employee_phone ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $employee_email ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Birthdate</b> <a class="float-right"><?php echo $employee_bd ?></a>
                  </li>

                </ul>
                <a href="#" data-toggle="modal" id="Updatedetailsbtn" data-employee-id="<?php echo $_GET['employee_id'] ?>" data-target="#modal-updatedetails" class="btn btn-primary btn-block"><b>Update Details</b></a>

              </div>
            </div>

          </div>

          <div class="col-md-9">

            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#Seminars" data-toggle="tab" style="font-size:1.4rem;">Seminars Attended</a></li>
                  <li class="nav-item"><a class="nav-link " href="#Workshops" data-toggle="tab" style="font-size:1.4rem;">Workshops Attended</a></li>
                  <li class="nav-item"><a class="nav-link " href="#Seminarworkshops" data-toggle="tab" style="font-size:1.4rem;">Seminar/Workshops Attended</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="Seminars">

                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                    $query =  mysqli_query($conn, "SELECT tbl_seminar.*, tbl_employee.* FROM tbl_seminar INNER JOIN tbl_employee ON tbl_seminar.employee_id = tbl_employee.employee_id WHERE tbl_employee.employee_id = $_GET[employee_id]  AND tbl_seminar.event_type='Seminar' ");
                    while ($result = mysqli_fetch_array($query)) {
                      extract($result);
                    ?>

                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title" style="font-size: 1.3rem;font-weight: 400;"> <?php echo $seminar_name ?> </h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body" style="display: block;">
                          <div class="main__wrap ">

                            <div class="seminar__date flex" style="gap: 1rem;">
                              <label for="seminardate" style="font-size:1.3rem; ">Date of Seminar: </label>
                              <p style="font-size:1.3rem;font-weight:600;color:#007bff;"><?php echo date('M d, Y', strtotime($seminar_date)) ?></p>
                            </div>
                            <div class="seminar__certificate">
                              <img style="max-width: 170px;" src="../seminar-certificates/<?php echo $seminar_cert ?>">
                            </div>
                          </div>
                        </div>
                      </div>




                    <?php } ?>

                  </div>
                  <div class="tab-pane " id="Workshops">

                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                    $query =  mysqli_query($conn, "SELECT tbl_seminar.*, tbl_employee.* FROM tbl_seminar INNER JOIN tbl_employee ON tbl_seminar.employee_id = tbl_employee.employee_id WHERE tbl_employee.employee_id = $_GET[employee_id] AND tbl_seminar.event_type='Workshop'  ");
                    while ($result = mysqli_fetch_array($query)) {
                      extract($result);
                    ?>

                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title" style="font-size: 1.3rem;font-weight: 400;"> <?php echo $seminar_name ?> </h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body" style="display: block;">
                          <div class="main__wrap ">

                            <div class="seminar__date flex" style="gap: 1rem;">
                              <label for="seminardate" style="font-size:1.3rem; ">Date of Seminar: </label>
                              <p style="font-size:1.3rem;font-weight:600;color:#007bff;"><?php echo date('M d, Y', strtotime($seminar_date)) ?></p>
                            </div>
                            <div class="seminar__certificate">
                              <img style="max-width: 170px;" src="../seminar-certificates/<?php echo $seminar_cert ?>">
                            </div>
                          </div>
                        </div>
                      </div>




                    <?php } ?>

                  </div>
                  <div class="tab-pane " id="Seminarworkshops">

                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
                    $query =  mysqli_query($conn, "SELECT tbl_seminar.*, tbl_employee.* FROM tbl_seminar INNER JOIN tbl_employee ON tbl_seminar.employee_id = tbl_employee.employee_id WHERE tbl_employee.employee_id = $_GET[employee_id] AND tbl_seminar.event_type='Seminar/Workshop'  ");
                    while ($result = mysqli_fetch_array($query)) {
                      extract($result);
                    ?>

                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title" style="font-size: 1.3rem;font-weight: 400;"> <?php echo $seminar_name ?> </h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body" style="display: block;">
                          <div class="main__wrap ">

                            <div class="seminar__date flex" style="gap: 1rem;">
                              <label for="seminardate" style="font-size:1.3rem; ">Date of Seminar: </label>
                              <p style="font-size:1.3rem;font-weight:600;color:#007bff;"><?php echo date('M d, Y', strtotime($seminar_date)) ?></p>
                            </div>
                            <div class="seminar__certificate">
                              <img style="max-width: 170px;" src="../seminar-certificates/<?php echo $seminar_cert ?>">
                            </div>
                          </div>
                        </div>
                      </div>




                    <?php } ?>

                  </div>
                </div>

              </div>
            </div>


          </div>

          <div class="modal fade" id="modal-updatedetails">
            <div class="modal-dialog" style="max-width: 550px !important;">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Employee</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" id="employeeformUpdate" method="POST" action="../inc/controller.php">
                    <div class="form-group row">
                      <input type="hidden" name="employee_id" id="employee_id">
                      <label class="col-sm-3 col-form-label">Employee Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Enter your name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Position</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="employee_position" id="employee_position" placeholder="Enter your possition">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="employee_add" id="employee_add" placeholder="Enter your address">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="tel" class="form-control" name="employee_phone" id="employee_phone" max="12" placeholder="Enter your no.">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="employee_email" value="<?php echo $employee_email ?>" id="employee_email" placeholder="Enter your Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Birthdate</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" name="employee_bd" id="employee_bd">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Attach a Photo</label>
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <?php
                          if (!empty($employee_img)) { ?>
                            <img src="../profile/<?php echo $employee_img ?>" style="display: none;" alt="">
                          <?php } ?>
                          <input type="file" accept=".jpeg, .png, .jpg" class="custom-file-input" id="employee_img" name="employee_img">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          <input type="hidden" name="current" value="<?php echo $employee_img ?>">
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" name="employeeformUpdate" class="btn btn-primary">Save Changes </button>
                    </div>
                  </form>
                </div>

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
  document.getElementById('seminar_date').addEventListener('change', function() {
    const input = this.value;
    const errorMessage = document.getElementById('event-error-message');
    const today = new Date();
    const selectedDate = new Date(input);
    
    if (selectedDate > today) {
      errorMessage.style.display = 'block';
      this.value = ''; 
    } else {
      errorMessage.style.display = 'none';
    }
  });
</script>
</body>

</html>