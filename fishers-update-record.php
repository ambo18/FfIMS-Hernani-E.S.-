<?php include 'server/server.php' ?>
<?php
    if (isset($_POST['gender'])) {
        $gender = strtoupper($_POST['gender']);
    } else {
        $gender = "";
    }

    if (isset($_POST['education_level'])) {
        $education_level = strtoupper($_POST['education_level']);
    } else {
        $education_level = "";
    }

    if (isset($_POST['f_boat_specification'])) {
        $f_boat_specification = strtoupper($_POST['f_boat_specification']);
    } else {
        $f_boat_specification = "";
    }

    $id = $_POST['id'];
    $f_name = strtoupper($_POST['f_name']);
    $address = strtoupper($_POST['address']);
    $phone = strtoupper($_POST['phone']);
    $birthdate = strtoupper($_POST['birthdate']);
    $age = strtoupper($_POST['age']);
    $height = strtoupper($_POST['height']);
    $weight = strtoupper($_POST['weight']);
    $bloodtype = strtoupper($_POST['bloodtype']);
    $monthly_income = strtoupper($_POST['monthly_income']);
    $occupation = strtoupper($_POST['occupation']);
    $fishing_skill = strtoupper($_POST['fishing_skill']);
    $other_relevant_skill = strtoupper($_POST['other_relevant_skill']);
    $type_of_f_gear = strtoupper($_POST['type_of_f_gear']);

    $query = "UPDATE tbl_fisher_info 
                SET f_name  ='$f_name',
                    address = '$address',
                    phone      ='$phone',
                    birthdate  ='$birthdate',
                    age        ='$age', 
                    gender     ='$gender',
                    height  ='$height',
                    weight ='$weight',
                    bloodtype ='$bloodtype',
                    monthly_income ='$monthly_income',
                    education_level ='$education_level',
                    occupation ='$occupation',
                    fishing_skill ='$fishing_skill',
                    other_relevant_skill ='$other_relevant_skill',
                    f_boat_specification ='$f_boat_specification',
                    type_of_f_gear ='$type_of_f_gear'";

    if (isset($_FILES['f_image']['tmp_name']) && $_FILES['f_image']['tmp_name'] != '') {
        $f_image = addslashes(file_get_contents($_FILES['f_image']['tmp_name']));
        $query .= ", f_image = '$f_image'";
    }

    $query .= " WHERE id='$id'";

    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update record!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated record!';
        $_SESSION['success'] = 'success';
    }
    header('location: fishers.php');
?>
