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

<?php
/* Følgende kode er for at aktivere forskellig rækkefølge */
$url = 'http://' . $_SERVER['REQUEST_URI'];
$order = 'date';
if (str_contains($url, '?order=a-z') == true) {
    $order = 'a-z';
} else if (str_contains($url, '?order=z-a') == true) {
    $order = 'z-a';
} else if (str_contains($url, '?order=rand') == true) {
    $order = 'rand';
} else {
    $order = 'date';
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Aktiviteter | Hotel Strandparken</title>

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
            <li><a class="dropdown-item text-primary px-3" href="?<?php echo $lang ?>?order=date">Dato</a></li>
            <li><a class="dropdown-item text-primary px-3" href="?<?php echo $lang ?>?order=rand">Tilfældigt</a></li>
            <li><a class="dropdown-item text-primary px-3" href="?<?php echo $lang ?>?order=a-z" id="a-z">Navn A-Z</a></li>
            <li><a class="dropdown-item text-primary px-3" href="?<?php echo $lang ?>?order=z-a" id="z-a">Navn Z-A</a></li
        </ul>
    </div>
</div>

<div class="container position-relative">
    <h2>
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
    $alist = 0;
    /* Følgende kode er for at ændre rækkefølgen for visning */
    if ($order == 'a-z') {
        $activities = $db->sql("SELECT * FROM activities ORDER BY activityName asc $sqlAdd", $bind);
    } else if ($order == 'z-a') {
        $activities = $db->sql("SELECT * FROM activities ORDER BY activityName desc $sqlAdd", $bind);
    } else if ($order == 'rand') {
        $activities = $db->sql("SELECT * FROM activities ORDER BY RAND() $sqlAdd", $bind);
    } else {
        $activities = $db->sql("SELECT * FROM activities ORDER BY dateBegin asc $sqlAdd", $bind);
    }
    foreach ($activities as $activity) { // For hver værdi i activities tabellen skal kaldes activity
        $alist++; // Tilføjer et nummer til hvert id, for opstilling korrekt
        ?>
    <div class="row mb-4 mb-lg-5">
        <div class="col-12 col-lg-6 mt-3 <?php if (in_array($alist, array("2", "4", "6", "8"))) { echo "ps-lg-4 order-0 order-lg-1"; } else { echo "pe-lg-4"; } // Ændring i class med if ?>">
            <a href="activity.php?activityId=<?php echo $activity->activityId . '?' . $lang ?>"><img src="img/<?php echo $activity->image1 ?>" class="img-fluid w-100"></a>
        </div>
        <div class="col-12 col-lg-6 mt-3 <?php if (in_array($alist, array("2", "4", "6", "8"))) { echo "pe-lg-4 order-1 order-lg-0"; } else { echo "ps-lg-4"; } // Ændring i class med if ?>">
            <a href="activity.php?activityId=<?php echo $activity->activityId . '?' . $lang ?>" class="link-dark">
                <h2>
                    <?php
                    if ($lang == 'eng') {
                        echo $activity->activityNameEng;
                    } else if ($lang == 'de') {
                        echo $activity->activityNameDe;
                    } else {
                        echo $activity->activityName;
                    }
                    ?>
                </h2></a>
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
    </div>
        <?php
    }
    ?>
</div>

<footer>
    <?php include("footer.php"); ?>
</footer>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
