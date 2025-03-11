<style>
	.nav-sidebar>.nav-item>.nav-link.active {
		background-color: rgba(255, 255, 255, .9) !important;
		color: #343a40 !important;

	}

	.nav-sidebar>.nav-item>.nav-link.active:hover {
		background-color: rgb(169 160 160 / 83%) !important;
	}

	.add_btn {
		justify-content: flex-end;
		display: flex;
		gap: 2rem;
	}

	.modal-dialog {
		max-width: 635px !important;
		margin: 1.75rem auto;
	}

	[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
		background-color: rgb(169 160 160 / 83%) !important;


	}

	.sidebar_field {
		background-color: #007bff;
	}

	[class*=sidebar-dark-] {
		background-color: #007bff !important;
	}

	[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:focus,
	[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:hover {
		background-color: rgb(201 191 190 / 50%);

	}

	[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
		color: #fff;
	}
</style>

<div class="preloader flex-column justify-content-center align-items-center">
	<img class="animation__shake" src="/dist/img/custom-img/logo.png" alt="Systemlogo" style="height: 10rem; width:12rem;"">
</div>
<nav class=" main-header navbar navbar-expand navbar-white navbar-light">

	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="dashboard.php" class="nav-link">Home</a>
		</li>

	</ul>
	<ul class="navbar-nav ml-auto">
		<a href="logout.php" class="btn btn-primary">
			LOGOUT
		</a>


	</ul>
	</nav>
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<div class="sidebar">

			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="/dist/img/custom-img/Screenshot 2024-10-07 072215.png" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block">Administrator</a>
				</div>
			</div>

			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

					<li class="nav-item menu-open">
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="dashboard.php" class="nav-link active">
									<i class="fa-solid fa-gauge nav-icon"></i>
									<p>Dashboard</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item menu-open">
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="employee-profiles.php" class="nav-link active">
									<i class="fa-solid fa-circle-user nav-icon"></i>
									<p>Employee Profiles</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="fa-solid fa-boxes-packing nav-icon"></i>
							<p>
								Manage Supplies
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">

							<li class="nav-item supplies_text">
								<a href="add-new-supply.php" class="nav-link" style="color:#fff;">
									<i class="fa-solid fa-plus nav-icon"></i>
									<p>Add New Supply</p>
								</a>
							</li>

							<li class="nav-item supplies_text">
								<a href="add-new-unit.php" class="nav-link" style="color:#fff;">
									<i class="fa-solid fa-plus nav-icon"></i>
									<p>Add New Unit</p>
								</a>
							</li>

							<?php
							$conn = new mysqli('localhost', 'root', '', 'mdrsystem');

							$query = mysqli_query($conn, "SELECT DISTINCT tbl_supply.supply_type AS supply_type_alias, tbl_supply.supply_id
							FROM tbl_supply
							LEFT JOIN tbl_product ON tbl_supply.supply_id = tbl_product.supply_id
							ORDER BY tbl_supply.supply_type ASC");

							while ($result = mysqli_fetch_array($query)) {
								extract($result);
							?>
								<li class="nav-item supplies_text">
									<a href="supplyview.php?supply_id=<?php echo $supply_id; ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p style="text-transform: uppercase;"><?php echo $supply_type_alias ?></p>
									</a>
								</li>
							<?php
							}
							?>



						</ul>
					</li>
					<li class="nav-item menu-open">
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="signatory-list.php" class="nav-link active">
									<i class="fa-solid fa-list nav-icon"></i>
									<p>Signatory List</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="fa-solid fa-list-ul"></i>
							<p>
								DV (Non VAT)
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item supplies_text">
								<a href="dvnonvat-form.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>DV (Non-VAT) Form</p>
								</a>

								<a href="dvnvat-list.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>DV (Non-VAT) List</p>
								</a>
							</li>


						</ul>
					</li>




					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="fa-solid fa-list-ul"></i>
							<p>
								DV (VATable)
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item supplies_text">
								<a href="dvvat-form.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>DV (VATable) Form</p>
								</a>

								<a href="dvvat-list.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>DV (VATable) List</p>
								</a>
							</li>


						</ul>
					</li>
					<li class="nav-item menu-open">
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="fundallotment.php" class="nav-link active">
									<i class="fa-solid fa-hand-holding-dollar nav-icon"></i>
									<p>Fund Allotment</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="fa-solid fa-list-ul"></i>
							<p>
								AIP-GENFUND
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item supplies_text">
								<a href="genfund-form.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>AIP-GENFUND Form</p>
								</a>

								<a href="genfundlist.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>AIP-GENFUND List</p>
								</a>
							</li>


						</ul>
					</li>


					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="fa-solid fa-list-ul"></i>
							<p>
								AIP-STF
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item supplies_text">
								<a href="stf-form.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>AIP-STF Form</p>
								</a>

								<a href="stflist.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>AIP-STFList</p>
								</a>
							</li>


						</ul>
					</li>



					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="fa-solid fa-list-ul"></i>
							<p>
								CAFOA
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item supplies_text">
								<a href="cafoa.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>CAFOA Form</p>
								</a>

								<a href="cafoa-list.php" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>CAFOA List</p>
								</a>
							</li>


						</ul>
					</li>


				</ul>
				</li>








				</ul>
			</nav>
		</div>
	</aside>