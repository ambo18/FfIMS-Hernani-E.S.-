<?php include 'server/server.php' ?>

<?php 
    $query = "SELECT 
            t1.*, 
            t2.dateofdeworming, 
            t2.typeofdeworming, 
            t2.remarks
          FROM tbl_deworming t1
          LEFT JOIN tbl_dewormingRecs t2
          ON t1.id = t2.id
          ORDER BY t1.id DESC";

    $result = $conn->query($query);

    $patients = array();
    while ($row = $result->fetch_assoc()) {
        $patient_id = $row['id'];
        if (!isset($patients[$patient_id])) {
            $patients[$patient_id] = $row;
            $patients[$patient_id]['records'] = array();
        }
        $patients[$patient_id]['records'][] = $row;
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
                                                <a href="deworming.php" class="text-primary">Back</a>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php foreach($patients as $patient): ?>
                                        <div>
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
                                                        <div><?= ucwords($patient['p_name']) ?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name_parent">Parent Name</label>
                                                        <div><?= ucwords($patient['name_parent']) ?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <div><?= ucwords($patient['address']) ?></div>
                                                    </div>
                                                    <!-- ... Other patient information fields ... -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <div><?= ucwords($patient['gender']) ?></div> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Contact No.</label>
                                                        <div><?= ucwords($patient['phone']) ?></div>
                                                    </div>
                                                    <!-- ... Other patient information fields ... -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Display records associated with the patient -->
                                        <div class="card-head-row">
                                            <div style="text-align: center;">
                                                <h2>
                                                    Records
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display table">
                                                    <thead>
                                                        <tr class="text-primary">
                                                            <th scope="col">Date Of Deworming</th>
                                                            <th scope="col">Type Of Deworming</th>
                                                            <th scope="col">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($patient['records'] as $record): ?>
                                                            <tr>
                                                                <td><?= $record['dateofdeworming'] ?></td>
                                                                <td><?= $record['typeofdeworming'] ?></td>
                                                                <td><?= $record['remarks'] ?></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>  
                                        <!-- End of displaying records -->
                                    <?php endforeach ?>
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
