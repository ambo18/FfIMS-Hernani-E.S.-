<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $p_name = strtoupper($_POST['p_name']);
    $birthdate = strtoupper($_POST['birthdate']);
    $age = strtoupper($_POST['age']);
    $gender = strtoupper($_POST['gender']);
    $address = strtoupper($_POST['address']);
    $sbp = strtoupper($_POST['sbp']);
    $dbp = strtoupper($_POST['dbp']);
    $dateofbp = strtoupper($_POST['dateofbp']);
    $phone = strtoupper($_POST['phone']);
    $remarks = strtoupper($_POST['remarks']);


    $query = "INSERT INTO tbl_bp (p_name, 
                                        birthdate, 
                                        age, 
                                        gender, 
                                        address, 
                                        sbp,
                                        dbp,
                                        dateofbp,
                                        phone,
                                        remarks)
                VALUES ('$p_name',
                        '$birthdate',
                        '$age',
                        '$gender',
                        '$address',
                        '$sbp',
                        '$dbp',
                        '$dateofbp',
                        '$phone',
                        '$remarks')";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add record!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added record!';
        $_SESSION['success'] = 'success';
    }
    header('location: bp.php');
?>