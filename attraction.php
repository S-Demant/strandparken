<?php
require "settings/init.php";
?>

<?php
/* Følgende kode er for at hente relevant data fra attractions i databasen */
$sqlAdd = "";
$bind = [];
if (!empty($_GET["attractionId"])) { // Hvis attractionId ikke er tom, gør dette
    $sqlAdd = " AND attractionId = :attractionId"; // Sammensæt attractionId
    $bind["attractionId"] = $_GET["attractionId"]; // Forbind attractionId
} else {
    header("Location: /strandparken/index.php"); // Hvis attractionId er tom, gå til forside
    exit();
}
?>
<?php
$attractions = $db->sql("SELECT * FROM attractions WHERE 1=1 $sqlAdd", $bind); // Der hentes data fra tabellen attractions
foreach ($attractions as $attraction) { // For hver værdi i attractions tabellen skal kaldes attraction
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title><?php echo $attraction->attractionName; ?> | Aktiviteter | Hotel Strandparken</title>

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
    <span class="text-dark text-opacity-25"><a href="index.php" class="link-primary crumb">
            <?php
            if ($lang == 'eng') {
                echo "Front page";
            } else if ($lang == 'de') {
                echo "Titelseite";
            } else {
                echo "Forside";
            }
            ?>
        </a> / <a href="attractions.php?<?php echo $lang ?>" class="link-primary crumb">
            <?php
            if ($lang == 'eng') {
                echo "Attractions";
            } else if ($lang == 'de') {
                echo "Attraktionen";
            } else {
                echo "Attraktioner";
            }
            ?>
        </a> / <a href="attraction.php?attractionId=<?php echo $attraction->attractionId ?>" class="link-primary crumb"><?php echo $attraction->attractionName; ?></a></span>
</div>

<div class="container position-relative">
    <div class="row">
        <h2 class="mt-4">
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
        <div class="col-12 col-lg-6 mt-3 pe-lg-4">
            <img src="img/<?php echo $attraction->image1 ?>" class="img-fluid w-100">
        </div>
        <div class="col-12 col-lg-6 mt-3 ps-lg-4">
            <h2><?php echo $attraction->attractionName; ?></h2>
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
            <a href="#beskrivelse">
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
        <div class="col-12 col-lg-4 mt-5 pe-lg-4">
            <h2>
                <?php
                if ($lang == 'eng') {
                    echo "Address";
                } else if ($lang == 'de') {
                    echo "Adresse";
                } else {
                    echo "Adresse";
                }
                ?>
            </h2>
            <span><?php echo $attraction->adress ?></span>
            <h2 class="mt-4">
                <?php
                if ($lang == 'eng') {
                    echo "Prices";
                } else if ($lang == 'de') {
                    echo "Preise";
                } else {
                    echo "Priser";
                }
                ?>
            </h2>
            <span>
                <?php
                if ($lang == 'eng') {
                    echo $attraction->priceEng;
                } else if ($lang == 'de') {
                    echo $attraction->priceDe;
                } else {
                    echo $attraction->price;
                }
                ?>
                </span>
        </div>
        <div class="col-12 col-lg-8 mt-2 mt-lg-5 ps-lg-4">
            <iframe class="map w-100" src="<?php echo $attraction->map ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<div class="container-fluid section-cataloge-description bg-secondary position-absolute mt-5"></div>

<div class="container position-relative">
    <div class="row mt-110">
        <div class="col-12 col-lg-6 mt-3 pe-lg-4">
            <h2 id="beskrivelse">
                <?php
                if ($lang == 'eng') {
                    echo "Description";
                } else if ($lang == 'de') {
                    echo "Beschreibung";
                } else {
                    echo "Beskrivelse";
                }
                ?>
            </h2>
            <p>
                <?php
                if ($lang == 'eng') {
                    echo $attraction->descLongEng;
                } else if ($lang == 'de') {
                    echo $attraction->descLongDe;
                } else {
                    echo $attraction->descLong;
                }
                ?>
            </p>
        </div>
        <div class="col-12 col-lg-6 mt-3 ps-lg-4">
            <img src="img/<?php echo $attraction->image2 ?>" class="img-fluid w-100">
            <img src="img/<?php echo $attraction->image3 ?>" class="img-fluid w-100 mt-4">
        </div>
    </div>
</div>

<div class="container info">
    <div class="row">
        <div class="col-12 col-lg-6">
            <h2>Information</h2>
            <p>
                <?php
                if ($lang == 'eng') {
                    echo "Visit the attraction's website for more information, ticket booking, etc.";
                } else if ($lang == 'de') {
                    echo "Besuchen Sie die Website der Attraktionen für weitere Informationen, Ticketbuchung usw.";
                } else {
                    echo "Besøg attraktionens hjemmeside for mere information, billet reservation, og lignende.";
                }
                ?>
            </p>
            <div class="w-100">
                <a href="<?php echo $attraction->link ?>" target="_blank"><img id="img" src="img/<?php echo $attraction->qr ?>"></a>
                <br>
                <input type="range" min="1" max="100" value="0" class="slider" id="slider" oninput="qrZoom()">
                <label for="slider"><i class="fa-solid fa-magnifying-glass-plus fa-sm text-secondary"></i></label>
            </div>
        </div>
    </div>
</div>

<?php
}
?>

<div class="container position-relative mt-5">
    <div class="row row-gap-5 gap row-gap-lg-4">
        <h2 class="mt-3">
            <?php
            if ($lang == 'eng') {
                echo "Other guests have also visited";
            } else if ($lang == 'de') {
                echo "Auch andere Gäste waren zu Besuch";
            } else {
                echo "Andre gæster har også besøgt";
            }
            ?>
        </h2>
        <?php
        $attractions = $db->sql("SELECT * FROM attractions ORDER BY RAND() LIMIT 6"); // Der hentes data fra tabellen attractions
        foreach ($attractions as $attraction) { // For hver værdi i attractions tabellen skal kaldes attraction
            ?>
            <div class="col-12 col-lg-4 d-flex flex-column position-relative">
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

<script>
    var z;
    function qrZoom() {
        z = document.getElementById("slider").value; // Henter elementet id slider, samt dets value
        img = document.getElementById("img"); // Henter elementet id img
        if (!img.dataset.width) { // Hvis der ikke er hentet størrelses data fra bredde, hent det og sæt det på
            img.dataset.width = img.width;
            img.dataset.height = img.height;
        }

        const width = +img.dataset.width; // Data sættes på const width
        const height = +img.dataset.height; // Data sættes på const height

        img.style.width = (width * z/100 + width) + "px"; // Regnes ud til at img højde skal passe med sliden
        img.style.height = (height * z/100 + height) + "px"; // Regnes ud til at img bredde skal passe med sliden
    }
    qrZoom();
</script>

<script src="https://kit.fontawesome.com/73a430866d.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
