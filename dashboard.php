<?php include 'server/server.php' ?>
<?php 	
	// total deworming records
	$stmtDewormingTotal 	= "SELECT COUNT(*) AS count FROM tbl_deworming";
    $dewormingTotal 	= $conn->query($stmtDewormingTotal);
	$totalDeworming = $dewormingTotal->fetch_assoc();

	// total operation timbang records
	$stmtOperTimTotal 	= "SELECT COUNT(*) AS count FROM tbl_operation_timbang";
    $OperTimTotal 	= $conn->query($stmtOperTimTotal);
	$totalOperTim = $OperTimTotal->fetch_assoc();

	// total medicine available
	$stmtMedinceAvailableTotal 	= "SELECT SUM(quantity) AS med_count FROM tbl_medicine";
    $resMedicineAvailableTotal 	= $conn->query($stmtMedinceAvailableTotal);
	$totalMedicineAvailable = $resMedicineAvailableTotal->fetch_assoc();

	// total medical supply available
	$stmtMedicalSupplyAvailable 	= "SELECT SUM(quantity) AS supply_count FROM tbl_medical_supply";
    $resMedicalSupplyAvailable 	= $conn->query($stmtMedicalSupplyAvailable);
	$totalMedicalSupplyAvailable = $resMedicalSupplyAvailable->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Dashboard - Electronic Management Tool For Barangay Health Workers</title>
</head>
<body>
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>
		
		<div class="main-panel">
			<div class="content">
				<div class="page-inner mt--2">
					
					<!-- login alert -->
					<?php if(isset($_SESSION['message'])): ?>
						<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
							<?php echo $_SESSION['message']; ?>
						</div>
					<?php unset($_SESSION['message']); ?>
					<?php endif ?>
					<!-- end of login alert -->
					
					
					<!-- analytics -->
						<div class="row">
							<div class="d-flex p-3 flex-row ">
								<div class="card text-center mr-3 " style="width: 15rem;">
									<div class="card-header card-success">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalDeworming['count']?$totalDeworming['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>DEWORMING RECORDS</strong>
										</h5>
										<p class="card-text">Total no. of deworming records in the barangay.</p>
										<a href="deworming.php" class="btn btn-success btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3 " style="width: 15rem;">
									<div class="card-header card-danger">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalOperTim['count']?$totalOperTim['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>OPERATION TIMBANG RECORDS</strong>
										</h5>
										<p class="card-text">Total no. of operation timbang records in the barangay.</p>
										<a href="oper-timbang.php" class="btn btn-success btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3" style="width: 15rem;">
									<div class="card-header card-info">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalMedicineAvailable['med_count']?$totalMedicineAvailable['med_count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>MEDICINE</strong>
										</h5>
										<p class="card-text">Total no. of medicines available in the barangay.</p>
										<a href="medicine.php" class="btn btn-info btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3" style="width: 15rem;">
									<div class="card-header card-warning">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalMedicalSupplyAvailable['supply_count']>0?$totalMedicalSupplyAvailable['supply_count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title text-default">
											<strong>MEDICAL SUPPLY</strong>
										</h5>
										<p class="card-text">Total no. of consumables available in the barangay.</p>
										<a href="supplies.php" class="btn btn-warning btn-sm">View Details</a>
									</div>
								</div>
							</div>
						</div>					
					<!-- end of analytics -->


				</div>
			</div>
			<!-- Main Footer -->
				<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
		</div>
		
	</div>
	<?php include 'templates/footer.php' ?>
</body>
</html>