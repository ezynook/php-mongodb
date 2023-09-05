<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
    <title>PHP-MongoDB</title>
</head>
<?php require 'api.php'; $m = $_GET['menu']; if (!isset($_GET['menu'])){header("location: index.php?menu=home");} ?>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">PHP-MongoDB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($m == 'home'){echo 'active';}else{echo '';} ?>" aria-current="page"
                            href="index.php?menu=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($m == 'add'){echo 'active';}else{'';} ?>" aria-current="page"
                            href="index.php?menu=add">Add</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <div class="container mt-5">
        <?php
            if ($m == 'home'){
                include 'home.php';
            }elseif ($m == 'add'){
                include 'add.php';
            }
        ?>
    </div>
</body>
</html>