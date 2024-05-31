<?php
require "settings/init.php";
?>

<?php
/* Følgende kode er for at hente relevant data fra activities i databasen */
$sqlAdd = "";
$bind = [];
if (!empty($_GET["attractionId"])) { // Hvis attractionId ikke er tom, gør dette
    $sqlAdd = " AND attractionId = :attractionId"; // Sammensæt attractionId
    $bind["attractionId"] = $_GET["attractionId"]; // Forbind attractionId
}
?>

<?php
/* Følgende kode er for at aktivere forskellig rækkefølge */
$url = 'http://' . $_SERVER['REQUEST_URI'];
$order = 'rand';
if (str_contains($url, '?order=a-z') == true) {
    $order = 'a-z';
} else if (str_contains($url, '?order=z-a') == true) {
    $order = 'z-a';
} else {
    $order = 'rand';
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Attraktioner | Hotel Strandparken</title>

    <meta name="robots" content="noindex">
    <meta name="author" content="Silje Wagner Andersson, Christina Nagel, Jacob Kaas Nielsen, Sebastian Demant Christensen">
    <meta name="copyright" content="Alle rettigheder med undtagelse af billedmateriale tilfalder: Silje Wagner Andersson, Christina Nagel, Jacob Kaas Nielsen, Sebastian Demant Christensen">

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
            <?php
            if ($lang == 'eng') {
                echo "Sort by";
            } else if ($lang == 'de') {
                echo "Sortiere nach";
            } else {
                echo "Sortér efter";
            }
            ?>
        </button>
        <ul class="dropdown-menu position-absolute bg-secondary border-primary border-1 rounded-0">
            <li><a class="dropdown-item text-primary px-3" href="?<?php echo $lang ?>?order=rand">
                    <?php
                    if ($lang == 'eng') {
                        echo "Random";
                    } else if ($lang == 'de') {
                        echo "Zufällig";
                    } else {
                        echo "Tilfældigt";
                    }
                    ?>
                </a></li>
            <li><a class="dropdown-item text-primary px-3" href="?<?php echo $lang ?>?order=a-z" id="a-z">
                    <?php
                    if ($lang == 'eng') {
                        echo "Name A-Z";
                    } else if ($lang == 'de') {
                        echo "Name A-Z";
                    } else {
                        echo "Navn A-Z";
                    }
                    ?>
                </a></li>
            <li><a class="dropdown-item text-primary px-3" href="?<?php echo $lang ?>?order=z-a" id="z-a">
                    <?php
                    if ($lang == 'eng') {
                        echo "Name Z-A";
                    } else if ($lang == 'de') {
                        echo "Name Z-A";
                    } else {
                        echo "Navn Z-A";
                    }
                    ?>
                </a></li>
        </ul>
    </div>
</div>

<div class="container position-relative">
    <h2>
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
    $alist = 0;
    /* Følgende kode er for at ændre rækkefølgen for visning */
    if ($order == 'a-z') {
        $attractions = $db->sql("SELECT * FROM attractions ORDER BY attractionName asc $sqlAdd", $bind);
    } else if ($order == 'z-a') {
        $attractions = $db->sql("SELECT * FROM attractions ORDER BY attractionName desc $sqlAdd", $bind);
    } else {
        $attractions = $db->sql("SELECT * FROM attractions ORDER BY RAND() $sqlAdd", $bind);
    }
    foreach ($attractions as $attraction) { // For hver værdi i activities tabellen skal kaldes attraction
        $alist++; // Tilføjer et nummer til hvert id, for opstilling korrekt
    ?>
        <div class="row mb-4 mb-lg-5">
            <div class="col-12 col-lg-6 mt-3 <?php if (in_array($alist, array("2", "4", "6", "8"))) { echo "ps-lg-4 order-0 order-lg-1"; } else { echo "pe-lg-4"; } // Ændring i class med if ?>">
                <a href="attraction.php?attractionId=<?php echo $attraction->attractionId . '?' . $lang ?>"><img src="img/<?php echo $attraction->image1 ?>" class="img-fluid w-100"></a>
            </div>
            <div class="col-12 col-lg-6 mt-3 <?php if (in_array($alist, array("2", "4", "6", "8"))) { echo "pe-lg-4 order-1 order-lg-0"; } else { echo "ps-lg-4"; } // Ændring i class med if ?>">
                <a href="attraction.php?attractionId=<?php echo $attraction->attractionId . '?' . $lang ?>" class="link-dark">
                    <h2>
                        <?php
                        if ($lang == 'eng') {
                            echo $attraction->attractionNameEng;
                        } else if ($lang == 'de') {
                            echo $attraction->attractionNameDe;
                        } else {
                            echo $attraction->attractionName;
                        }
                        ?>
                    </h2></a>
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