<?php include 'server/server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Add Record - Fisher Folks Information Management System</title>
</head>
<body>
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row mt--2">
						<div class="col-md-12">
							<?php include 'templates/loading_screen.php' ?>
							<div class="card">
								<div class="card-body">
                                    <form method="POST" action="fishers-add-record.php" enctype="multipart/form-data">
										<div class="card-head-row">
											<div style="text-align: center;">
												<h2>
													Personal Information
												</h2>
											</div>
										</div>										
										<div class="form-group">
											<img id="imageHolder" class="img-fluid mt-3">
										</div>
										<div class="form-group">
											<label for="f_image">Image</label>
											<input type="file" class="form-control-file" id="f_image" name="f_image" onchange="previewImage(event)" required>
										</div>
                                        <div class="row">																			
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="f_name">Name</label>
                                                    <input type="text" class="form-control mb-1" id="f_name" name="f_name" placeholder="Enter name" required>
                                                </div>
												<div class="form-group">
                                                    <label>Birthdate</label>
                                                    <input type="date" class="form-control" name="birthdate" id="date" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="age">Age</label>
                                                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">										
												<div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control mb-1" id="address" name="address" placeholder="Enter address" required>
                                                </div>	
												<div class="form-group">
                                                    <label for="phone">Contact No.</label>
                                                    <input type="text" maxlength="11" onkeyup="numbersOnly(this)" class="form-control" id="phone" name="phone" placeholder="Enter contact number" required>
                                                </div>	
                                            </div>
                                        </div>

										<div class="card-head-row">
											<div style="text-align: center;">
												<h2>Bio Data</h2>										
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="gender">Gender</label>
                                                    <select class="form-control" id="gender" name="gender">
														<option selected="true" disabled="disabled">--</option>
														<option>MALE</option>
														<option>FEMALE</option>
                                                    </select>
												</div>
												<div class="form-group">
													<label for="height">Height</label>
													<input type="number" class="form-control" id="height" name="height" placeholder="Enter height in cm">
												</div>												
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="weight">Weight</label>
													<input type="number" class="form-control" id="weight" name="weight" placeholder="Enter weight in kg">
												</div>
												<div class="form-group">
													<label for="bloodtype">Blood Type</label>
													<input type="text" class="form-control" id="bloodtype" name="bloodtype" placeholder="Enter bloodtype">
												</div>
											</div>
										</div>

										<div class="card-head-row">
											<div style="text-align: center;">
												<h2>Socioeconomic Status</h2>										
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="monthly_income">Monthly Income</label>
													<input type="number" class="form-control" id="monthly_income" name="monthly_income" placeholder="Enter monthly income">
												</div>
												<div class="form-group">
													<label for="education_level">Educational Level</label>
													<select class="form-control" id="education_level" name="education_level">
														<option selected="true" disabled="disabled">--</option>
														<option>ELEMENTARY</option>
														<option>HIGH SCHOOL</option>
														<option>COLLEGE</option>
                                                    </select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="occupation">Occupation</label>
													<input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter occupation">
												</div>
											</div>
										</div>

										<div class="card-head-row">
											<div style="text-align: center;">
												<h2>Skills</h2>										
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="fishing_skill">Fishing Skill (Trap fishing, Net casting, etc)</label>
													<input type="text" class="form-control" id="fishing_skill" name="fishing_skill" placeholder="Enter fishing skill">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="other_relevant_skill">Other Relevant Skill (Technical skills)</label>
													<input type="text" class="form-control" id="other_relevant_skill" name="other_relevant_skill" placeholder="Enter other relevant skill">
												</div>
											</div>
										</div>

										<div class="card-head-row">
											<div style="text-align: center;">
												<h2>Materials Used in Fishing</h2>										
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="f_boat_specification">Fishing Boat Specifications</label>
													<select class="form-control" id="f_boat_specification" name="f_boat_specification">
														<option selected="true" disabled="disabled">--</option>
														<option>Non-motorized Boat</option>
														<option>Motorized Boat</option>
                                                    </select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="type_of_f_gear">Type of Fishing Gear (Traps, Nets, Hooks, etc)</label>
													<input type="text" class="form-control" id="type_of_f_gear" name="type_of_f_gear" placeholder="Enter type of fishing gear">
												</div>
											</div>
										</div>

										<div class="card-head-row">
											<div style="text-align: center;">
												<div class="form-group">
                                                    <button type="submit" class="btn btn-primary mt-2 mb-2">Add Record</button>
                                                </div>
											</div>
										</div>
                                    </form>
								</div>
								<!-- end of medicine table -->
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
			
		</div>
	</div>
	
	<?php include 'templates/footer.php' ?>
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
	<style>
		.text-primary, .text-primary a{
			color: #1c9790 !important;
		}

		.btn-primary, .btn-primary:hover, .btn-primary:focus, .btn-primary:disabled{
			background: #1c9790 !important;
			border-color: #1c9790 !important;
		}

        .text-primary:hover, .text-primary a:hover{
			color: #1c9790 !important;
		}

		#imageHolder {
			max-width: 300px; /* Adjust the max-width as needed */
			max-height: 200px; /* Adjust the max-height as needed */
			width: auto;
			height: auto;
		}
	</style>
	
	<script>
		function previewImage(event) {
			var imageHolder = document.getElementById('imageHolder');
			imageHolder.src = URL.createObjectURL(event.target.files[0]);
			imageHolder.style.display = 'block';
		}
	</script>

	<script>
		function validateForm() {
			var fileInput = document.getElementById('f_image');
			var file = fileInput.files[0];
			var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
			var maxSize = 2 * 1024 * 1024; // 2MB in bytes

			if (!file) {
				alert('Please select an image file.');
				return false;
			}

			if (!allowedTypes.includes(file.type)) {
				alert('Invalid file type. Only JPEG, PNG, and GIF files are allowed.');
				return false;
			}

			if (file.size > maxSize) {
				alert('The image size is too large. Please upload an image smaller than 2MB.');
				return false;
			}

			// If the image passes all the checks, you can submit the form
			return true;
		}

		document.getElementById('form').onsubmit = function() {
			return validateForm();
		};
	</script>

</body>
</html>