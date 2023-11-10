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

    $f_image = addslashes(file_get_contents($_FILES['f_image']['tmp_name']));
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


    $query = "INSERT INTO tbl_fisher_info (f_image,
                                    f_name, 
                                    address, 
                                    phone,
                                    birthdate, 
                                    age, 
                                    gender,
                                    height,
                                    weight,
                                    bloodtype,
                                    monthly_income,
                                    education_level,
                                    occupation,
                                    fishing_skill,
                                    other_relevant_skill,
                                    f_boat_specification,
                                    type_of_f_gear)
                VALUES ('$f_image',
                        '$f_name',
                        '$address',
                        '$phone',
                        '$birthdate',
                        '$age',
                        '$gender',
                        '$height',
                        '$weight',
                        '$bloodtype',
                        '$monthly_income',
                        '$education_level',
                        '$occupation',
                        '$fishing_skill',
                        '$other_relevant_skill',
                        '$f_boat_specification',
                        '$type_of_f_gear')";

    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add record!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added record!';
        $_SESSION['success'] = 'success';
    }

    if (!$result) {
        printf("Error: %s\n", $conn->error); // Display the specific database error
        exit();
    }
    
    header('location: fishers.php');
?>