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



    $query = "UPDATE tbl_bp 
                SET p_name  ='$p_name',
                    birthdate  ='$birthdate', 
                    age        ='$age',
                    gender     ='$gender',
                    address    ='$address',
                    sbp     ='$sbp',
                    dbp      ='$dbp',
                    dateofbp= '$dateofbp',
                    phone  ='$phone',
                    remarks='$remarks'
             WHERE id='$id'";
               
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update resident!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated resident!';
        $_SESSION['success'] = 'success';
    }
    header('location: bp.php');
?>