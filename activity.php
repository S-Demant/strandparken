<?php
require "settings/init.php";
?>

<?php
/* Følgende kode er for at hente relevant data fra activities i databasen */
$sqlAdd = "";
$bind = [];
if (!empty($_GET["activityId"])) { // Hvis activityId ikke er tom, gør dette
    $sqlAdd = " AND activityId = :activityId"; // Sammensæt activityId
    $bind["activityId"] = $_GET["activityId"]; // Forbind ActivityId
} else {
    header("Location: /strandparken/index.php"); // Hvis activityId er tom, gå til forside
    exit();
}
$activities = $db->sql("SELECT * FROM activities WHERE 1=1 $sqlAdd", $bind); // Der hentes data fra tabellen activities
foreach ($activities as $activity) { // For hver værdi i activities tabellen skal kaldes activity
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title><?php echo $activity->activityName; ?> | Aktiviteter | Hotel Strandparken</title>

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
    <span class="text-dark text-opacity-25"><a href="index.php" class="link-primary crumb">Forside</a> / <a href="activities.php" class="link-primary crumb">Aktiviteter</a> / <a href="activity.php?activityId=<?php echo $activity->activityId ?>" class="link-primary crumb"><?php echo $activity->activityName; ?></a></span>
</div>

<div class="container position-relative">
    <div class="row">
        <h2 class="mt-4">
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
        <div class="col-12 col-lg-6 mt-3 pe-lg-4">
            <img src="img/<?php echo $activity->image1 ?>" class="img-fluid w-100">
        </div>
        <div class="col-12 col-lg-6 mt-3 ps-lg-4">
            <h2><?php echo $activity->activityName; ?></h2>
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
                $url = 'http://' . $_SERVER['REQUEST_URI'];
                if (str_contains($url, '1') !== false) {
                    echo $activity->descShort . "...";
                } else {
                    echo 'No cars.';
                }
                ?>
            </p>
            <a href="#beskrivelse">Læs mere</a>
        </div>
        <div class="col-12 col-lg-4 mt-5 pe-lg-4">
            <h2>Adresse</h2>
            <span><?php echo $activity->adress ?></span>
            <h2 class="mt-4">Priser</h2>
            <span><?php echo $activity->price ?></span>
            <h2 class="mt-4">Arrangør</h2>
            <span><?php echo $activity->organizer ?></span>
        </div>
        <div class="col-12 col-lg-8 mt-2 mt-lg-5 ps-lg-4">
            <iframe class="map w-100" src="<?php echo $activity->map ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<div class="container-fluid section-cataloge-description bg-secondary position-absolute mt-5"></div>

<div class="container position-relative">
    <div class="row mt-110">
        <div class="col-12 col-lg-6 mt-3 pe-lg-4">
            <h2 id="beskrivelse">Beskrivelse</h2>
            <p><?php echo $activity->descLong; ?></p>
        </div>
        <div class="col-12 col-lg-6 mt-3 ps-lg-4">
            <img src="img/<?php echo $activity->image2 ?>" class="img-fluid w-100">
            <img src="img/<?php echo $activity->image3 ?>" class="img-fluid w-100 mt-4">
        </div>
    </div>
</div>

<div class="container info">
    <div class="row">
        <div class="col-12 col-lg-6">
            <h2>Information</h2>
            <p>Besøg aktivitetens hjemmeside for mere information, billet reservation, og lignende.</p>
            <a href="<?php echo $activity->link ?>" target="_blank"><img src="img/<?php echo $activity->qr ?>"></a>
        </div>
    </div>
</div>

<?php
}
?>

<div class="container position-relative mt-5">
    <div class="row row-gap-5 gap row-gap-lg-4">
        <h2 class="mt-3">Andre gæster har også besøgt</h2>
        <?php
        $activities = $db->sql("SELECT * FROM activities ORDER BY RAND() LIMIT 6"); // Der hentes data fra tabellen activities
        foreach ($activities as $activity) { // For hver værdi i activities tabellen skal kaldes activity
        ?>
        <div class="col-12 col-lg-4 d-flex flex-column position-relative">
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
            <a href="activity.php?activityId=<?php echo $activity->activityId ?>" class="stretched-link mt-1">Læs mere</a>
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
