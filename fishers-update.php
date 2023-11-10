<?php include 'server/server.php' ?>
<?php 
    $id = $_GET["id"];
	$query = "SELECT * FROM tbl_fisher_info WHERE id='$id'";
    $result = $conn->query($query);

    $resident = array();
	while($row = $result->fetch_assoc()){
		$resident[] = $row; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Update Record - Fisher Folks Information Management System</title>
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
                                    <?php foreach($resident as $row): ?>
                                        <form method="POST" action="fishers-update-record.php" enctype="multipart/form-data">
                                            <div class="card-head-row">
                                                <div style="text-align: center;">
                                                    <h2>
                                                        Personal Information
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <img id="imageHolder" class="img-fluid mt-3" src="data:image/jpeg;base64,<?= base64_encode($row['f_image']) ?>" alt="Resident Image">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" id="f_image" name="f_image" onchange="previewImage(event)">
                                            </div>
                                            <input type="hidden" name="current_image" value="<?= base64_encode($row['f_image']) ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="f_name">Name</label>
                                                        <input type="text" class="form-control mb-1" id="f_name" name="f_name" placeholder="Enter name" value="<?= ucwords($row['f_name']) ?>" required>
                                                    </div>													
													<div class="form-group">
                                                        <label>Birthdate</label>
                                                        <input type="date" class="form-control" name="birthdate" id="date" value="<?= ucwords($row['birthdate']) ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="age">Age</label>
                                                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" value="<?= ucwords($row['age']) ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control mb-1" id="address" name="address" placeholder="Enter address" value="<?= ucwords($row['address']) ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Contact No.</label>
                                                        <input type="text" maxlength="11" onkeyup="numbersOnly(this)" class="form-control" id="phone" name="phone" placeholder="Enter contact number" value="<?= ucwords($row['phone']) ?>" required>
                                                    </div>                                                  											
                                                    <input type="hidden" name="id" value="<?= ucwords($row['id']) ?>">
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
                                                        <select class="form-control" id="gender" name="gender" value="<?= ucwords($row['gender']) ?>" required>
                                                            <option selected="true" disabled="disabled">--</option>
                                                            <option value="MALE" <?="MALE" == $row['gender'] ? ' selected="selected"' : '';?>>MALE</option>
                                                            <option value="FEMALE" <?="FEMALE" == $row['gender'] ? ' selected="selected"' : '';?>>FEMALE</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="height">Height</label>
                                                        <input type="number" class="form-control" id="height" name="height" placeholder="Enter height in cm" value="<?= ucwords($row['height']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="weight">Weight</label>
                                                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter weight in kg" value="<?= ucwords($row['weight']) ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bloodtype">Blood Type</label>
                                                        <input type="text" class="form-control" id="bloodtype" name="bloodtype" placeholder="Enter bloodtype" value="<?= isset($row['bloodtype']) ? ucwords($row['bloodtype']) : '' ?>">
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
                                                        <input type="number" class="form-control" id="monthly_income" name="monthly_income" placeholder="Enter monthly income" value="<?= ucwords($row['monthly_income']) ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="education_level">Educational Level</label>
                                                        <select class="form-control" id="education_level" name="education_level" value="<?= isset($row['education_level']) ? ucwords($row['education_level']) : '' ?>">
                                                            <option selected="true" disabled="disabled">--</option>
                                                            <option value="ELEMENTARY" <?="ELEMENTARY" == $row['education_level'] ? ' selected="selected"' : '';?>>ELEMENTARY</option>
                                                            <option value="HIGH SCHOOL" <?="HIGH SCHOOL" == $row['education_level'] ? ' selected="selected"' : '';?>>HIGH SCHOOL</option>
                                                            <option value="COLLEGE" <?="COLLEGE" == $row['education_level'] ? ' selected="selected"' : '';?>>COLLEGE</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="occupation">Occupation</label>
                                                        <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter occupation" value="<?= isset($row['occupation']) ? ucwords($row['occupation']) : '' ?>">
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
                                                        <input type="text" class="form-control" id="fishing_skill" name="fishing_skill" placeholder="Enter fishing skill" value="<?= isset($row['fishing_skill']) ? ucwords($row['fishing_skill']) : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="other_relevant_skill">Other Relevant Skill (Technical skills)</label>
                                                        <input type="text" class="form-control" id="other_relevant_skill" name="other_relevant_skill" placeholder="Enter other relevant skill" value="<?= isset($row['other_relevant_skill']) ? ucwords($row['other_relevant_skill']) : '' ?>">
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
                                                        <select class="form-control" id="f_boat_specification" name="f_boat_specification" value="<?= ucwords($row['f_boat_specification']) ?>">
                                                            <option selected="true" disabled="disabled">--</option>
                                                            <option value="Non-motorized Boat" <?="Non-motorized Boat" == $row['f_boat_specification'] ? ' selected="selected"' : '';?>>Non-motorized Boat</option>
                                                            <option value="Motorized Boat" <?="Motorized Boat" == $row['f_boat_specification'] ? ' selected="selected"' : '';?>>Motorized Boat</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="type_of_f_gear">Type of Fishing Gear (Traps, Nets, Hooks, etc)</label>
                                                        <input type="text" class="form-control" id="type_of_f_gear" name="type_of_f_gear" placeholder="Enter type of fishing gear" value="<?= isset($row['type_of_f_gear']) ? ucwords($row['type_of_f_gear']) : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
											<div class="card-head-row">
												<div style="text-align: center;">
													<div class="form-group">
                                                    	<button type="submit" class="btn btn-primary mt-2 mb-2">Update</button>
                                                	</div>
												</div>
											</div>
                                        </form>
                                    <?php endforeach ?>
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