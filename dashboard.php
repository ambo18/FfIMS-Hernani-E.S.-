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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Dashboard - Fisher Folks Information Management System</title>
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
									<div class="card-header card-danger">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalDeworming['count']?$totalDeworming['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>DEWORMING RECORDS</strong>
										</h5>
										<p class="card-text">Total no. of deworming records in the barangay.</p>
										<a href="deworming.php" class="btn btn-danger btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3 " style="width: 15rem;">
									<div class="card-header card-warning">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalOperTim['count']?$totalOperTim['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>OPERATION TIMBANG RECORDS</strong>
										</h5>
										<p class="card-text">Total no. of operation timbang records in the barangay.</p>
										<a href="oper-timbang.php" class="btn btn-warning btn-sm">View Details</a>
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