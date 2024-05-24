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

<div class="container-fluid section-cataloge bg-secondary position-absolute mt-90"></div>

<div class="container d-flex justify-content-end">
    <div class="dropdown mt-110">
        <button class="btn border-primary bg-secondary link-primary rounded-0 px-4 py-3 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sortér efter
        </button>
        <ul class="dropdown-menu position-absolute bg-secondary border-primary border-1 rounded-0">
            <li><a class="dropdown-item text-primary px-3" href="#">Dato</a></li>
            <li><a class="dropdown-item text-primary px-3" href="#">Afstand</a></li>
            <li><a class="dropdown-item text-primary px-3" href="#">Navn A-Z</a></li>
            <li><a class="dropdown-item text-primary px-3" href="#">Navn Z-A</a></li>
        </ul>
    </div>
</div>


<div class="container position-relative">
    <?php
    /* Følgende kode er for at hente relevant data fra activities i databasen */
    $sqlAdd = "";
    $bind = [];
    if (!empty($_GET["activityId"])) { // Hvis activityId er tom, gør dette
        $sqlAdd = " AND activityId = :activityId"; // Sammensæt activityId
        $bind["activityId"] = $_GET["activityId"]; // Forbind ActivityId
    }
    $activities = $db->sql("SELECT * FROM activities$sqlAdd", $bind); // Der hentes data fra tabellen activities
    foreach ($activities as $activity) { // For hver værdi i activities tabellen skal kaldes activity
    ?>
    <div class="row">
        <h2>Aktiviteter</h2>
        <div class="col-12 col-lg-6 mt-3 pe-lg-4">
            <a href="activity.php?activityId=<?php echo $activity->activityId ?>"><img src="img/<?php echo $activity->image ?>" class="img-fluid w-100"></a>
        </div>
        <div class="col-12 col-lg-6 mt-3 ps-lg-4">
            <a href="activity.php?activityId=<?php echo $activity->activityId ?>" class="link-dark"><h2><?php echo $activity->activityName; ?></h2></a>
            <span>
                <?php
                /* Følgende kode er for aktivitetens start dato */
                $newDateFormat = date("d/m/Y", strtotime($activity->dateBegin)); // Dato format ændres
                echo $newDateFormat;
                ?>

                <?php
                /* Følgende kode er for aktivitetens slut dato */
                $newDateFormat = date("d/m/Y", strtotime($activity->dateEnd)); // Dato format ændres
                if (empty($activity->dateEnd)) { // Hvis der ikke er en slut dato, vis intet
                    echo '';
                }
                else {
                    echo " - " . $newDateFormat; // Ellers vis dato
                }
                ?>
            </span>
            <p class="mt-2"><?php echo $activity->descShort . "..."; ?></p>
            <a href="activity.php?activityId=<?php echo $activity->activityId ?>">Læs mere</a>
        </div>
    </div>
        <?php
    }
    ?>
    <div class="row mt-lg-4">
        <div class="col-12 col-lg-6 mt-5 ps-lg-4 order-0 order-lg-1">
            <a href="#"><img src="img/image.webp" class="img-fluid w-100"></a>
        </div>
        <div class="col-12 col-lg-6 mt-3 mt-lg-5 pe-lg-4 order-1 order-lg-0">
            <a href="#" class="link-dark"><h2>Titel på aktiviteten 2</h2></a>
            <span>23-06-2024</span>
            <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Ipsum passages, and more recently with desktop.</p>
            <a href="#">Læs mere</a>
        </div>
    </div>
    <div class="row mt-lg-4">
        <div class="col-12 col-lg-6 mt-5 pe-lg-4">
            <a href="#"><img src="img/image.webp" class="img-fluid w-100"></a>
        </div>
        <div class="col-12 col-lg-6 mt-3 mt-lg-5 ps-lg-4">
            <a href="#" class="link-dark"><h2>Titel på aktiviteten 3</h2></a>
            <span>23-06-2024</span>
            <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Ipsum passages, and more recently with desktop.</p>
            <a href="#">Læs mere</a>
        </div>
    </div>
    <div class="row mt-lg-4">
        <div class="col-12 col-lg-6 mt-5 ps-lg-4 order-0 order-lg-1">
            <a href="#"><img src="img/image.webp" class="img-fluid w-100"></a>
        </div>
        <div class="col-12 col-lg-6 mt-3 mt-lg-5 pe-lg-4 order-1 order-lg-0">
            <a href="#" class="link-dark"><h2>Titel på aktiviteten 4</h2></a>
            <span>23-06-2024</span>
            <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Ipsum passages, and more recently with desktop.</p>
            <a href="#">Læs mere</a>
        </div>
    </div>
    <div class="row mt-lg-4">
        <div class="col-12 col-lg-6 mt-5 pe-lg-4">
            <a href="#"><img src="img/image.webp" class="img-fluid w-100"></a>
        </div>
        <div class="col-12 col-lg-6 mt-3 mt-lg-5 ps-lg-4">
            <a href="#" class="link-dark"><h2>Titel på aktiviteten 5</h2></a>
            <span>23-06-2024</span>
            <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Ipsum passages, and more recently with desktop.</p>
            <a href="#">Læs mere</a>
        </div>
    </div>
</div>

<footer>
    <?php include("footer.php"); ?>
</footer>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
