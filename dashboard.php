<?php include 'server/server.php' ?>
<?php
    // total fisher records
    $stmtFisherTotal = "SELECT COUNT(*) AS count FROM tbl_fisher_info";
    $fisherTotal = $conn->query($stmtFisherTotal);
    $totalFisher = $fisherTotal->fetch_assoc();

	// total Non-motorized Boat records 
    $stmtNmbTotal = "SELECT COUNT(*) AS count FROM tbl_fisher_info WHERE f_boat_specification = 'Non-motorized Boat'";
    $nmbTotal = $conn->query($stmtNmbTotal);
    $totalNmb = $nmbTotal->fetch_assoc();

	// total Motorized Boat records 
    $stmtMbTotal = "SELECT COUNT(*) AS count FROM tbl_fisher_info WHERE f_boat_specification = 'Motorized Boat'";
    $mbTotal = $conn->query($stmtMbTotal);
    $totalMb = $mbTotal->fetch_assoc();

    // fetch address records
    $stmtAddressRecords = "SELECT address, COUNT(*) AS number_of_records FROM tbl_fisher_info GROUP BY address";
    $addressRecords = $conn->query($stmtAddressRecords);
    $addressData = array();

    while ($row = $addressRecords->fetch_assoc()) {
        $addressData[] = $row;
    }
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

                            <div class="card text-center mr-3" style="width: 15rem;">
                                <div class="card-header card-success">
                                    <span style="font-size: 65px; font-weight: bold;"><?php echo $totalFisher['count']?$totalFisher['count']:0 ?></span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <strong>RECORDS</strong>
                                    </h5>
                                    <p class="card-text">Total no. of records in the system.</p>
                                </div>
                            </div>

							<div class="card text-center mr-3" style="width: 15rem;">
                                <div class="card-header card-primary">
                                    <span style="font-size: 65px; font-weight: bold;"><?php echo $totalNmb['count']?$totalNmb['count']:0 ?></span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <strong>NON-MOTORIZED BOATS</strong>
                                    </h5>
                                    <p class="card-text">Total no. of non-motorized boats.</p>
                                </div>
                            </div>

							<div class="card text-center mr-3" style="width: 15rem;">
                                <div class="card-header card-secondary">
                                    <span style="font-size: 65px; font-weight: bold;"><?php echo $totalMb['count']?$totalMb['count']:0 ?></span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <strong>MOTORIZED BOATS</strong>
                                    </h5>
                                    <p class="card-text">Total no. of motorized boats.</p>
                                </div>
                            </div>

                        </div>
                    </div>	
                    <!-- end of analytics -->

                    <!-- Address Records Summary -->
                    <h2 class="mt-1 text-center card-header" style="background-color: #4f7e4f; color: #FFF;">Address Records Summary</h2>
                    <div class="card-warning">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Address</th>
                                        <th>Number of Records</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody id="addressTableBody">
                                    <!-- Table content will be dynamically added here using JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End of Address Records Summary -->

					

                </div>
            </div>
            <!-- Main Footer -->
            <?php include 'templates/main-footer.php' ?>
            <!-- End Main Footer -->
        </div>
        
    </div>
    <?php include 'templates/footer.php' ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Your custom JavaScript -->
    <script>
        var addressData = <?php echo json_encode($addressData); ?>;

        // Function to calculate the percentage
        function calculatePercentage(records, totalRecords) {
            return ((records / totalRecords) * 100).toFixed(2);
        }

        // Function to populate the table
        function populateTable(data) {
            var totalRecords = data.reduce((total, address) => total + parseInt(address.number_of_records), 0);

            // Sort data by number of records in descending order
            data.sort((a, b) => parseInt(b.number_of_records) - parseInt(a.number_of_records));

            // Reference to the table body
            var tableBody = document.getElementById('addressTableBody');

            // Clear existing table content
            tableBody.innerHTML = '';

            // Populate the table with data
            data.forEach(address => {
                var percentage = calculatePercentage(parseInt(address.number_of_records), totalRecords);
                var row = `<tr>
                                <td>${address.address}</td>
                                <td>${address.number_of_records}</td>
                                <td>${percentage}%</td>
                            </tr>`;
                tableBody.innerHTML += row;
            });
        }

        // Call the function to populate the table with data
        populateTable(addressData);
    </script>
</body>
</html>
