<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM tbl_operation_timbang ORDER BY id DESC";
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
	<title>Operatioin Timabang - Electronic Management Tool For HBW</title>
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
										<div class="card-title text-primary">
											<h1>RECORDS</h1>
										</div>

                                        <div class="card-tools">
											<?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
												<a href="oper-timbang-add.php" class="btn btn-primary mr-1">
													<i class="fa fa-plus mr-2"></i>
													Add Records
												</a>
												<button onclick="Export()" class="btn btn-default btn-default">
													<i class="fa fa-download mr-2"></i>
													Export to CSV
												</button>
											<?php endif?>
										</div>

									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="tblResident" class="display table">
											<thead>
												<tr class="text-primary">
													<th scope="col">Patient Name</th>
													<th scope="col">Parent Name</th>
													<th scope="col">Weight</th>
                                                    <th scope="col">Height</th>
													<th scope="col">Age</th>
													<th scope="col">Date</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($resident)): ?>
													<?php $no=1; foreach($resident as $row): ?>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar avatar-sm">
                                                                    <span class="avatar-title rounded-circle border border-white" style="background-color: lightseagreen"><?= ucwords(strtoupper($row['p_name'][0])) ?></span>
                                                                </div>
                                                                <?= ucwords(strtoupper($row['p_name'])) ?>
                                                            </td>
                                                            <td><?= $row['name_parent'] ?></td>
                                                            <td><?= $row['weight'] ?></td>
                                                            <td><?= $row['height'] ?></td>
                                                            <td><?= $row['age'] ?></td>
															<td><?= $row['dateofopertimbang'] ?></td>
                                                            <td>
																<a href="oper-timbang-update.php?id=<?= $row['id'] ?>" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Update">
																	<i class="fa fa-edit mr-2"></i>
																</a>
																<a href="remove_item.php?id=<?= $row['id'] ?>&tbl=tbl_operation_timbang&page=oper-timbang" class="btn btn-link btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="Remove">
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
			var conf = confirm("Export Operation Timbang Records to CSV?");
			var stmt = "SELECT p_name,name_parent,address,birthdate,age,gender,weight,height,nutritional_status, dateofopertimbang,phone,remarks FROM tbl_operation_timbang";
			var tblHeader = 'Patient Name,Parent Name,Address,Birth Date,Age,Gender,Weight,Height,Nutritional Status,Date,Contact Number,Remarks';
			var fileName = "Operation Timbang Records";
			if(conf){
				window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
			}
		}
    </script>
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