<?php
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Sigende titel</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Murecho:wght@100..900&display=swap" rel="stylesheet">

</head>

<body>

<header>
    <?php include("header.php"); ?>
</header>

<div class="hero d-flex align-items-center bg-primary">
    <div class="container text-light z-1">
        <h1>DEN GODE TITEL<br>PÅ SKÆRMEN HER</h1>
        <p class="mt-4">Få overblik over <a href="activities.php" class="link-light link-opacity-75-hover">aktiviteter</a><br>og <a href="attractions.php" class="link-light link-opacity-75-hover">attraktioner</a> til dit ophold</p>
    </div>
    <div class="position-absolute">
        <div class="position-absolute w-100 h-100 bg-primary bg-opacity-85"></div>
        <video autoplay muted loop>
            <source src="video.mp4" type="video/mp4">
        </video>
    </div>
</div>

<div class="container-fluid section-index bg-secondary position-absolute"></div>

<div class="container position-relative">
    <div class="row">
        <h2 class="mt-5">Aktiviteter</h2>
        <div class="col-12 col-lg-6 mt-3 pe-lg-4">
            <a href="activity.php"><img src="img/image.webp" class="img-fluid w-100"></a>
        </div>
        <div class="col-12 col-lg-6 mt-3 ps-lg-4">
            <a href="#" class="link-dark"><h2>Titel på aktiviteten</h2></a>
            <span>23-06-2024</span>
            <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Ipsum passages, and more recently with desktop.</p>
            <a href="activity.php">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 mt-5 mt-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <span>23-06-2024</span>
            <a href="activity.php" class="stretched-link mt-1">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 mt-5 mt-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <span>23-06-2024</span>
            <a href="activity.php" class="stretched-link mt-1">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 mt-5 mt-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <span>23-06-2024</span>
            <a href="activity.php" class="stretched-link mt-1">Læs mere</a>
        </div>
    </div>
</div>

<div class="container position-relative mt-5 mt-lg-3">
    <div class="row">
        <h2 class="mt-5">Attraktioner</h2>
        <div class="col-12 col-lg-6 mt-3 pe-lg-4">
            <a href="attraction.php"><img src="img/image.webp" class="img-fluid w-100"></a>
        </div>
        <div class="col-12 col-lg-6 mt-3 ps-lg-4">
            <a href="#" class="link-dark"><h2>Titel på aktiviteten</h2></a>
            <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Ipsum passages, and more recently with desktop.</p>
            <a href="attraction.php">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 mt-5 mt-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <a href="attraction.php" class="stretched-link">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 mt-5 mt-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <a href="attraction.php" class="stretched-link">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 mt-5 mt-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <a href="attraction.php" class="stretched-link">Læs mere</a>
        </div>
    </div>
</div>

<footer>
    <?php include("footer.php"); ?>
</footer>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>