<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $dateofdeworming = strtoupper($_POST['dateofdeworming']);
    $typeofdeworming = strtoupper($_POST['typeofdeworming']);
    $remarks = strtoupper($_POST['remarks']);


    $query = "INSERT INTO tbl_dewormingRecs (id,
                                    dateofdeworming,
                                    typeofdeworming,
                                    remarks)
                VALUES ('$d',
                        '$dateofdeworming',
                        '$typeofdeworming',
                        '$remarks')";

    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add record!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added record!';
        $_SESSION['success'] = 'success';
    }
    header('location: deworming-view.php');
?>