<?php include 'server/server.php' ?>
<?php
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


    $query = "INSERT INTO tblresident (firstname, 
                                        middlename, 
                                        lastname, 
                                        age, 
                                        birthdate, 
                                        phone,
                                        gender,
                                        purok,
                                        medicalConditions,
                                        allergies,
                                        previousIllnesses,
                                        surgeries,
                                        medications)
                VALUES ('$first_name',
                        '$middle_name',
                        '$last_name',
                        '$age',
                        '$birthdate',
                        '$phone',
                        '$gender',
                        '$purok',
                        '$medicalConditions',
                        '$allergies',
                        '$previousIllnesses',
                        '$surgeries',
                        '$medications')";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add resident!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added resident!';
        $_SESSION['success'] = 'success';
    }
    header('location: resident.php');
?>