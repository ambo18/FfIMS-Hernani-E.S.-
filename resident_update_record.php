<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $first_name = strtoupper($_POST['first_name']);
    $middle_name = strtoupper($_POST['middle_name']);
    $last_name = strtoupper($_POST['last_name']);
    $age = strtoupper($_POST['age']);
    $birthdate = strtoupper($_POST['birthdate']);
    $phone = strtoupper($_POST['phone']);
    $gender = strtoupper($_POST['gender']);
    $purok = strtoupper($_POST['purok']);
    $first_name = strtoupper($_POST['first_name']);
    $medicalConditions = strtoupper($_POST['medicalConditions']);
    $allergies = strtoupper($_POST['allergies']);
    $previousIllnesses = strtoupper($_POST['previousIllnesses']);
    $surgeries = strtoupper($_POST['surgeries']);
    $medications = strtoupper($_POST['medications']);



    $query = "UPDATE tblresident 
                SET firstname  ='$first_name',
                    middlename ='$middle_name',
                    lastname   ='$last_name',
                    age        ='$age', 
                    birthdate  ='$birthdate',
                    phone      ='$phone',
                    gender     ='$gender',
                    purok      ='$purok',
                    medicalConditions='$medicalConditions',
                    allergies  ='$allergies',
                    previousIllnesses='$previousIllnesses',
                    surgeries  ='$surgeries',
                    medications='$medications'
             WHERE id='$id'";
               
            $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update resident!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated resident!';
        $_SESSION['success'] = 'success';
    }
    header('location: resident.php');
?>