<?php include 'server/server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Blood Pressure - Electronic Management Tool For HBW</title>
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
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">
											<h1>
                                            <a href="bp.php" class="text-primary">RECORD</a> > <strong class="text-default">ADD</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <form method="POST" action="bp-add-record.php">
										<div class="card-head-row">
											<div style="text-align: center;">
												<h2>
													Patient Information
												</h2>
											</div>
										</div>
                                        <div class="row">																			
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="p_name">Patient Name</label>
                                                    <input type="text" class="form-control mb-1" id="p_name" name="p_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Birthdate</label>
                                                    <input type="date" class="form-control" name="birthdate" id="date" required>
                                                </div>                                               
                                                <div class="form-group">
                                                    <label for="age">Age</label>
                                                    <input type="number" class="form-control" id="age" name="age" required>
                                                </div>
												<div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" id="gender" name="gender" required>
														<option selected="true" disabled="disabled">--</option>
														<option>MALE</option>
														<option>FEMALE</option>
                                                    </select>
                                                </div>
												<div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control mb-1" id="address" name="address" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">		
												<div class="form-group">
                                                    <label for="sbp">Systolic Blood Pressure</label>
                                                    <input type="number" class="form-control" id="sbp" name="sbp" required>
                                                </div>	
												<div class="form-group">
                                                    <label for="dbp">Diastolic Blood Pressure</label>
                                                    <input type="number" class="form-control" id="dbp" name="dbp" required>
                                                </div>
												<div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" class="form-control" name="dateofbp" id="dateofbp" required>
                                                </div>
												<div class="form-group">
                                                    <label for="phone">Contact No.</label>
                                                    <input type="text" maxlength="11" onkeyup="numbersOnly(this)" class="form-control" id="phone" name="phone" required>
                                                </div>	
												<div class="form-group">
                                                    <label for="remarks">Remarks</label>
                                                    <input type="text" class="form-control" id="remarks" name="remarks" required>
                                                </div>					
                                            </div>
                                        </div>
										<div class="card-head-row">
											<div style="text-align: center;">
												<div class="form-group">
                                                    <button type="submit" class="btn btn-primary mt-2 mb-2">Add</button>
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
	</style>
</body>
</html>