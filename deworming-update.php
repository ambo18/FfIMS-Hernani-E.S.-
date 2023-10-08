<?php include 'server/server.php' ?>
<?php 
    $id = $_GET["id"];
	$query = "SELECT * FROM tbl_deworming WHERE id='$id'";
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
	<title>Residents - Masili Health Service System</title>
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
                                            <a href="deworming.php" class="text-primary">RECORD</a> > <strong class="text-default">UPDATE</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <?php foreach($resident as $row): ?>
                                        <form method="POST" action="deworming-update-record.php">
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
                                                        <input type="text" class="form-control mb-1" id="p_name" name="p_name" value="<?= ucwords($row['p_name']) ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name_parent">Parent Name</label>
                                                        <input type="text" class="form-control mb-1" id="name_parent" name="name_parent" value="<?= ucwords($row['name_parent']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control mb-1" id="address" name="address" value="<?= ucwords($row['address']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label>Birthdate</label>
                                                        <input type="date" class="form-control" name="birthdate" id="date" value="<?= ucwords($row['birthdate']) ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="age">Age</label>
                                                        <input type="number" class="form-control" id="age" name="age" value="<?= ucwords($row['age']) ?>" required>
                                                    </div>
                                                </div>
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
                                                        <label for="dateofdeworming">Date</label>
                                                        <input type="date" class="form-control" id="phone" name="dateofdeworming" value="<?= ucwords($row['dateofdeworming']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="typeofdeworming">Type</label>
                                                        <input type="text" class="form-control mb-1" id="typeofdeworming" name="typeofdeworming" value="<?= ucwords($row['typeofdeworming']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="phone">Contact No.</label>
                                                        <input type="text" maxlength="11" onkeyup="numbersOnly(this)" class="form-control" id="phone" name="phone" value="<?= ucwords($row['phone']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="remarks">Remarks</label>
                                                        <input type="text" class="form-control mb-1" id="remarks" name="remarks" value="<?= ucwords($row['remarks']) ?>" required>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?= ucwords($row['id']) ?>">
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
	</style>
</body>
</html>