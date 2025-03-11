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
            <div class="col-sm-6">
              <h1>Employee Profiles</h1>
            </div>
            <div class="col-sm-6 flex flex-justify--end">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-employee">
                <i class="fa-solid fa-plus"></i>
                Add Employee
              </button>

              <div class="modal fade" id="modal-employee">
                <div class="modal-dialog" style="max-width: 550px !important;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Employee</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" id="employeeform">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Employee Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="employee_name" placeholder="Enter your name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Position</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="employee_position" placeholder="Enter your position">  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="employee_add" placeholder="Enter your address">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone</label>
                          <div class="col-sm-9">
                            <input type="tel" class="form-control" name="employee_phone" max="12" placeholder="Enter your no.">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" name="employee_email" placeholder="Enter your Email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Birthdate</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="employee_bd"  id="employee_bd" required>
                            <small id="error-message" class="text-danger" style="display:none;">Invalid birthdate. Must be 18+ years old above </small>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Attach a Photo</label>
                          <div class="col-sm-9">
                            <div class="custom-file">
                              <input type="file" accept=".jpeg, .png, .jpg" class="custom-file-input" id="exampleInputFile" name="employee_img">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
        </div>
      </section>
      <section class="content">
        <div class="card card-solid">
          <div class="card-body pb-0">
            <div class="row">
              <?php
              $conn = new mysqli('localhost', 'root', '', 'mdrsystem');
              $query = mysqli_query($conn, "SELECT * FROM `tbl_employee` WHERE `status` = 1");
              while ($result = mysqli_fetch_array($query)) {
                extract($result);
              ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">

                  <div class="card bg-light d-flex flex-fill" style="border: 2px solid #007bff;padding-top:2rem;">
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b><?php echo $employee_name ?></b></h2>
                          <p class="text-muted text-sm"><b>Position: </b> <?php echo $employee_position ?> </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?php echo $employee_add ?></li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?php echo $employee_phone ?></li>
                          </ul>
                        </div>
                        <div class="col-5 text-center" style="position: relative;">
                        <a class="btn btn-danger btn-sm removetenants" id="removetenants" href="#" data-employee-id="<?php echo $employee_id; ?>" style="position: absolute; right: 1px; border-radius: 50%;top: -15px;">
                              <i class="fas fa-trash">
                              </i>
                        
                          </a>
                          <img src="../profile/<?php echo $employee_img ?>" alt="user-avatars" style="height: 7rem;width:7rem;border:2px solid #007bff;" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer" style="background-color: #007bff;">
                      <div class="text-right">
                        <a href="employee-profile.php?employee_id=<?php echo $employee_id ?>" class="btn btn-sm " style="background-color: #31c9de;color:white;">
                          More details
                          <i class="fas fa-arrow-circle-right"></i>
                        </a>

                      </div>
                    </div>
                  </div>
                </div>
              <?php

              }
              ?>

            </div>
          </div>


        </div>


      </section>

    </div>
  </div>
  <?php include 'script.php' ?>
  <script>
     document.getElementById('employee_bd').addEventListener('change', function() {
    const input = this.value;
    const errorMessage = document.getElementById('error-message');
    const today = new Date();
    const selectedDate = new Date(input);
    
    // Calculate the age based on the selected date
    const age = today.getFullYear() - selectedDate.getFullYear();
    const monthDifference = today.getMonth() - selectedDate.getMonth();
    const dayDifference = today.getDate() - selectedDate.getDate();

    // Adjust age if birth month/day hasn't occurred yet this year
    const isAgeValid = monthDifference > 0 || (monthDifference === 0 && dayDifference >= 0) ? age >= 18 : age > 18;

    // Check if the selected date is in the future
    const isDateValid = selectedDate <= today;

    // Show error message if invalid
    if (!isAgeValid || !isDateValid) {
      errorMessage.style.display = 'block';
      this.value = ''; // Clear the input field
    } else {
      errorMessage.style.display = 'none';
    }
  });
</script>
</body>

</html>