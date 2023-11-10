<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM tbl_fisher_info ORDER BY id DESC";
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
	<title>Records - Fisher Folks Information Management System</title>
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
						<!-- action alert -->
						<?php if(isset($_SESSION['message'])): ?>
							<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
								<?php echo $_SESSION['message']; ?>
							</div>
						<?php unset($_SESSION['message']); ?>
						<?php endif ?>
						<!-- end of action alert -->
                        <?php include 'templates/loading_screen.php' ?>
                            <div class="card">
                                <div class="card-header">
									<div class="card-head-row">
                                        <div class="card-tools">
											<?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
												<a href="fishers-add.php" class="btn btn-primary mr-1">
													<i class="fa fa-plus mr-2"></i>
													Add Records
												</a>
											<?php endif?>
										</div>

									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="tblResident" class="display table">
											<thead>
												<tr class="text-primary">
													<th scope="col">Name</th>
													<th scope="col">Age</th>
													<th scope="col">Address</th>
													<th scope="col">Gender</th>
													<th scope="col">Contact No.</th>
													<th scope="col">Skill</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php if(!empty($resident)): ?>
												<?php $no=1; foreach($resident as $row): ?>
													<tr>
														<td><?= ucwords(strtoupper($row['f_name'])) ?></td>
														<td><?= $row['age'] ?></td>
														<td><?= $row['address'] ?></td>
														<td><?= $row['gender'] ?></td>
														<td><?= $row['phone'] ?></td>
														<td><?= $row['fishing_skill'] ?></td>
														<td>
															<a href="fishers-update.php?id=<?= $row['id'] ?>" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Update">
																<i class="fa fa-edit mr-2"></i>
															</a>
															<a href="remove_item.php?id=<?= $row['id'] ?>&tbl=tbl_fisher_info&page=fishers" class="btn btn-link btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="Remove">
																<i class="fa fa-trash"></i>
															</a>
														</td>
													</tr>
												<?php $no++; endforeach ?>
											<?php endif ?>

											</tbody>
										</table>
									</div>
								</div>
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
    <script>
        $(document).ready(function() {
            $('#tblResident').DataTable();
        });

        function Export(){
			// should have policy like 2 weeks retention of records and scope for export to csv
			var conf = confirm("Export fisher Records to CSV?");
			var stmt = "SELECT f_name,name_parent,address,birthdate,age,gender,dateoffisher,typeoffisher,phone,remarks FROM tbl_fisher";
			var tblHeader = 'Patient Name,Parent Name,Address,Birth Date,Age,Gender,Date Of fisher,Type Of fisher,Contact Number,Remarks';
			var fileName = "fisher Records";
			if(conf){
				window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
			}
		}
    </script>
</body>
</html>