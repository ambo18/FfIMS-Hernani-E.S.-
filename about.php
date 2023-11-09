<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'templates/header.php'; ?>
    <title>Fisher Folks Information Management System</title>
</head>
<style>
    .login {
        background-image: url('./assets/img/bglogin.jpg');
        background-color: #cccccc;
        height: 100vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body class="login">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#">Fisher Folks IMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h1><b>Fisher Folks Information Management System</b></h1>
                        <p class="card-text">The Fisher Folks Information Management System is a robust data management
                            tool specifically designed for the fishing community. It facilitates the organized collection,
                            storage, and analysis of crucial information related to the biodata, socioeconomic status,
                            skills, and materials used in fishing, thereby aiding in informed decision-making and
                            sustainable resource management.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h1 ><b>Mission</b></h1>
                        <p class="card-text">To empower the fishing community by efficiently collecting and storing
                            essential data including their biodata, socioeconomic status, fishing skills, and materials
                            used. We aim to streamline information management for sustainable and responsible fisheries
                            management.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h1 ><b>Vision</b></h1>
                        <p class="card-text">To create a comprehensive and accessible platform that supports fisher folks
                            in making informed decisions, promotes transparency in the fishing industry, and fosters a
                            collaborative environment for the conservation of marine resources and the improvement of
                            fishing communities' well-being.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'templates/footer.php'; ?>
</body>

</html>
