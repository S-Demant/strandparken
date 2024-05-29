<?php
require "settings/init.php";
?>

<?php
/* Følgende kode er for at hente relevant data fra activities i databasen */
$sqlAdd = "";
$bind = [];
if (!empty($_GET["activityId"])) { // Hvis activityId er tom, gør dette
    $sqlAdd = " AND activityId = :activityId"; // Sammensæt activityId
    $bind["activityId"] = $_GET["activityId"]; // Forbind ActivityId
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Aktiviteter & Attraktioner | Hotel Strandparken</title>

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
        <h1>
            <?php
            if ($lang == 'eng') {
                echo "WHAT ARE YOU GOING<br>TO EXPERIENCE TODAY?";
            } else if ($lang == 'de') {
                echo "WAS SOLLTEN SIE<br>HEUTE ERLEBEN?";
            } else {
                echo "HVAD SKAL DU<br>OPLEVE I DAG?";
            }
            ?>
        </h1>
        <p class="mt-4">
            <?php
            if ($lang == 'eng') {
                echo 'Get an overview of <a href="activities.php?eng" class="link-light link-opacity-75-hover">activities</a><br>and <a href="attractions.php?eng" class="link-light link-opacity-75-hover">attractions</a> for your stay';
            } else if ($lang == 'de') {
                echo 'Verschaffen Sie sich einen Überblick über die <a href="activities.php?de" class="link-light link-opacity-75-hover">aktivitäten</a><br>und <a href="attractions.php?de" class="link-light link-opacity-75-hover">attraktionen</a> für Ihren Aufenthalt';
            } else {
                echo 'Få overblik over <a href="activities.php" class="link-light link-opacity-75-hover">aktiviteter</a><br>og <a href="attractions.php" class="link-light link-opacity-75-hover">attraktioner</a> til dit ophold';
            }
            ?>
        </p>
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

<div class="container position-relative">
    <div class="row">
        <h2 class="mt-5">
            <?php
            if ($lang == 'eng') {
                echo "Attractions";
            } else if ($lang == 'de') {
                echo "Attraktionen";
            } else {
                echo "Attraktioner";
            }
            ?>
        </h2>
        <?php
        $attractions = $db->sql("SELECT * FROM attractions ORDER BY attractionId asc LIMIT 1 $sqlAdd", $bind); // Der hentes data fra tabellen attractions
        foreach ($attractions as $attraction) { // For hver værdi i activities tabellen skal kaldes attraction
            ?>
            <div class="col-12 col-lg-6 mt-3 pe-lg-4">
                <a href="attraction.php?attractionId=<?php echo $attraction->attractionId . '?' . $lang ?>"><img src="img/<?php echo $attraction->image1 ?>" class="img-fluid w-100"></a>
            </div>
            <div class="col-12 col-lg-6 mt-3 ps-lg-4">
                <a href="attraction.php?attractionId=<?php echo $attraction->attractionId . '?' . $lang ?>" class="link-dark"><h2><?php echo $attraction->attractionName; ?></h2></a>
                <p class="mt-2">
                    <?php
                    if ($lang == 'eng') {
                        echo $attraction->descShortEng . "...";
                    } else if ($lang == 'de') {
                        echo $attraction->descShortDe . "...";
                    } else {
                        echo $attraction->descShort . "...";
                    }
                    ?>
                </p>
                <a href="attraction.php?attractionId=<?php echo $attraction->attractionId . '?' . $lang ?>">
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
        $attractions = $db->sql("SELECT * FROM attractions ORDER BY attractionId asc LIMIT 1,3 $sqlAdd", $bind); // Der hentes data fra tabellen activities, og tager data fra 2 til 4
        foreach ($attractions as $attraction) { // For hver værdi i activities tabellen skal kaldes attraction
            ?>
            <div class="col-12 col-lg-4 mt-5 mt-lg-4 d-flex flex-column position-relative">
                <img src="img/<?php echo $attraction->image1 ?>" class="img-fluid w-100">
                <h2 class="mt-3"><?php echo $attraction->attractionName; ?></h2>
                <a href="attraction.php?attractionId=<?php echo $attraction->attractionId . '?' . $lang ?>" class="stretched-link mt-1">
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

<footer>
    <?php include("footer.php"); ?>
</footer>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>