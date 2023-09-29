<?php include 'server/server.php' ?>
<?php 
	// announcement
	$getAnnouncement = "SELECT * FROM tbl_announcement WHERE status=1 ORDER BY id DESC";
    $announcement = $conn->query($getAnnouncement);
	
	// total residents
	$stmtResidentTotal 	= "SELECT COUNT(*) AS count FROM tblresident";
    $resResidentTotal 	= $conn->query($stmtResidentTotal);
	$totalResident = $resResidentTotal->fetch_assoc();

	// total female
	$stmtFemaleResidentTotal 	= "SELECT COUNT(*) AS count FROM tblresident WHERE gender='Female'";
    $resFemaleResidentTotal 	= $conn->query($stmtFemaleResidentTotal);
	$totalFemaleResident = $resFemaleResidentTotal->fetch_assoc();

	// total male
	$stmtMaleResidentTotal 	= "SELECT COUNT(*) AS count FROM tblresident WHERE gender='Male'";
    $resMaleResidentTotal 	= $conn->query($stmtMaleResidentTotal);
	$totalMaleResident = $resMaleResidentTotal->fetch_assoc();

	// total medicine available
	$stmtMedinceAvailableTotal 	= "SELECT SUM(quantity) AS med_count FROM tbl_medicine";
    $resMedicineAvailableTotal 	= $conn->query($stmtMedinceAvailableTotal);
	$totalMedicineAvailable = $resMedicineAvailableTotal->fetch_assoc();

	// total medical supply available
	$stmtMedicalSupplyAvailable 	= "SELECT SUM(quantity) AS supply_count FROM tbl_medical_supply";
    $resMedicalSupplyAvailable 	= $conn->query($stmtMedicalSupplyAvailable);
	$totalMedicalSupplyAvailable = $resMedicalSupplyAvailable->fetch_assoc();

	// total appointments today
	$date_today 			= date("Y-m-d");
	$stmtAppointmentsToday 	= "SELECT COUNT(*) AS total_appointment FROM tbl_appointment WHERE appointment_date = '$date_today'";
    $resAppointmentsToday 	= $conn->query($stmtAppointmentsToday);
	$totalAppointmentsToday = $resAppointmentsToday->fetch_assoc();
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
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalResident['count']?$totalResident['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>RECORDS</strong>
										</h5>
										<p class="card-text">Total no. of records in the municipality.</p>
										<a href="resident.php" class="btn btn-success btn-sm">View Details</a>
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