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

<div class="container mt-120">
    <span class="text-dark text-opacity-25"><a href="index.php" class="link-primary crumb">Forside</a> / <a href="activities.php" class="link-primary crumb">Aktiviteter</a> / <a href="#" class="link-primary crumb">Titel på aktiviteten</a></span>
</div>

<div class="container position-relative">
    <div class="row">
        <h2 class="mt-4">Aktiviteter</h2>
        <div class="col-12 col-lg-6 mt-3 pe-lg-4">
            <a href="#"><img src="img/image.webp" class="img-fluid w-100"></a>
        </div>
        <div class="col-12 col-lg-6 mt-3 ps-lg-4">
            <a href="#" class="link-dark"><h2>Titel på aktiviteten</h2></a>
            <span>23-06-2024</span>
            <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Ipsum passages, and more recently with desktop.</p>
            <a href="#">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 mt-5 pe-lg-4">
            <h2>Adresse</h2>
            <span>Kystvejen 88, 4300 Holbæk</span>
            <h2 class="mt-4">Priser</h2>
            <ul>
                <li>Voksen 110 kr.</li>
                <li>Barn 60 kr.</li>
                <li>Pensionist 60 kr.</li>
            </ul>
            <h2 class="mt-4">Arrangør</h2>
            <span>Foreningen for lange fingre</span>
        </div>
        <div class="col-12 col-lg-8 mt-2 mt-lg-5 ps-lg-4">
            <iframe class="map w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36045.52583598245!2d11.23087135!3d55.62210635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464d773ca97bb58b%3A0x9a1425e4c048ec8b!2sSuperBrugsen!5e0!3m2!1sda!2sdk!4v1716452078932!5m2!1sda!2sdk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<div class="container-fluid section-cataloge-description bg-secondary position-absolute mt-5"></div>

<div class="container position-relative">
    <div class="row mt-110">
        <div class="col-12 col-lg-6 mt-3 pe-lg-4">
            <h2>Beskrivelse</h2>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
            <p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
        </div>
        <div class="col-12 col-lg-6 mt-3 ps-lg-4">
            <img src="img/image.webp" class="img-fluid w-100">
            <img src="img/image.webp" class="img-fluid w-100 mt-4">
        </div>
    </div>
</div>

<div class="container info">
    <div class="row">
        <div class="col-12 col-lg-6">
            <h2>Information</h2>
            <p>Besøg aktivitetens hjemmeside for mere information, billet reservation, og lignende.</p>
            <img src="img/qr.webp">
        </div>
    </div>
</div>

<div class="container position-relative mt-5">
    <div class="row row-gap-5 gap row-gap-lg-4">
        <h2 class="mt-3">Andre gæster har også besøgt</h2>
        <div class="col-12 col-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <span>23-06-2024</span>
            <a href="#" class="stretched-link mt-1">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <span>23-06-2024</span>
            <a href="#" class="stretched-link mt-1">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <span>23-06-2024</span>
            <a href="#" class="stretched-link mt-1">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <span>23-06-2024</span>
            <a href="#" class="stretched-link mt-1">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <span>23-06-2024</span>
            <a href="#" class="stretched-link mt-1">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 d-flex flex-column position-relative">
            <img src="img/image.webp" class="img-fluid w-100">
            <h2 class="mt-3">Titel på aktiviteten</h2>
            <span>23-06-2024</span>
            <a href="#" class="stretched-link mt-1">Læs mere</a>
        </div>
    </div>
</div>

<footer>
    <?php include("footer.php"); ?>
</footer>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
