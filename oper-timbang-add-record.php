<?php include 'server/server.php' ?>
<?php
    $p_name = strtoupper($_POST['p_name']);
    $name_parent = strtoupper($_POST['name_parent']);
    $address = strtoupper($_POST['address']);
    $birthdate = strtoupper($_POST['birthdate']);
    $age = strtoupper($_POST['age']);
    $gender = strtoupper($_POST['gender']);
    $weight = strtoupper($_POST['weight']);
    $height = strtoupper($_POST['height']);
    $nutritional_status = strtoupper($_POST['nutritional_status']);
    $dateofopertimbang = strtoupper($_POST['dateofopertimbang']);
    $phone = strtoupper($_POST['phone']);
    $remarks = strtoupper($_POST['remarks']);


    $query = "INSERT INTO tbl_operation_timbang (p_name, 
                                        name_parent, 
                                        address, 
                                        birthdate, 
                                        age, 
                                        gender,
                                        weight,
                                        height,
                                        nutritional_status,
                                        dateofopertimbang,
                                        phone,
                                        remarks)
                VALUES ('$p_name',
                        '$name_parent',
                        '$address',
                        '$birthdate',
                        '$age',
                        '$gender',
                        '$weight',
                        '$height',
                        '$nutritional_status',
                        '$dateofopertimbang',
                        '$phone',
                        '$remarks')";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add record!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added record!';
        $_SESSION['success'] = 'success';
    }
    header('location: oper-timbang.php');
?>