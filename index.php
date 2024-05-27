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
        <h2 class="mt-5">
            <?php
            if ($lang == 'eng') {
                echo "Activities";
            } else if ($lang == 'de') {
                echo "Aktivitäten";
            } else {
                echo "Aktiviteter";
            }
            ?>
            </h2>
        <?php
        /* Følgende kode er for at hente relevant data fra activities i databasen */
        $sqlAdd = "";
        $bind = [];
        if (!empty($_GET["activityId"])) { // Hvis activityId er tom, gør dette
            $sqlAdd = " AND activityId = :activityId"; // Sammensæt activityId
            $bind["activityId"] = $_GET["activityId"]; // Forbind ActivityId
        }
        ?>

        <?php
        $activities = $db->sql("SELECT * FROM activities ORDER BY dateBegin asc LIMIT 1 $sqlAdd", $bind); // Der hentes data fra tabellen activities
        foreach ($activities as $activity) { // For hver værdi i activities tabellen skal kaldes activity
        ?>
        <div class="col-12 col-lg-6 mt-3 pe-lg-4">
            <a href="activity.php?activityId=<?php echo $activity->activityId . '?' . $lang ?>"><img src="img/<?php echo $activity->image1 ?>" class="img-fluid w-100"></a>
        </div>
        <div class="col-12 col-lg-6 mt-3 ps-lg-4">
            <a href="activity.php?activityId=<?php echo $activity->activityId . '?' . $lang ?>" class="link-dark"><h2><?php echo $activity->activityName; ?></h2></a>
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
            <p class="mt-2">
                <?php
                if ($lang == 'eng') {
                    echo $activity->descShortEng . "...";
                } else if ($lang == 'de') {
                    echo $activity->descShortDe . "...";
                } else {
                    echo $activity->descShort . "...";
                }
                ?>
            </p>
            <a href="activity.php?activityId=<?php echo $activity->activityId . '?' . $lang ?>">
                <?php
                if ($lang == 'eng') {
                    echo "Read more";
                } else if ($lang == 'de') {
                    echo "Mehr lesen";
                } else {
                    echo "Læs mere";
                }
                ?>
            </a>
        </div>
            <?php
        }
        ?>

        <?php
        $activities = $db->sql("SELECT * FROM activities ORDER BY dateBegin asc LIMIT 1,3 $sqlAdd", $bind); // Der hentes data fra tabellen activities, og tager data fra 2 til 4
        foreach ($activities as $activity) { // For hver værdi i activities tabellen skal kaldes activity
        ?>
        <div class="col-12 col-lg-4 mt-5 mt-lg-4 d-flex flex-column position-relative">
            <img src="img/<?php echo $activity->image1 ?>" class="img-fluid w-100">
            <h2 class="mt-3"><?php echo $activity->activityName; ?></h2>
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
            <a href="activity.php?activityId=<?php echo $activity->activityId . '?' . $lang ?>" class="stretched-link mt-1">
                <?php
                if ($lang == 'eng') {
                    echo "Read more";
                } else if ($lang == 'de') {
                    echo "Mehr lesen";
                } else {
                    echo "Læs mere";
                }
                ?>
            </a>
        </div>
            <?php
        }
        ?>
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