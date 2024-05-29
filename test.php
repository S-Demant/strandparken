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

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div id="divImg">
    <img id="img" src="img/nyvang-qr.webp" width="200px" height="200"" />
</div>

<div class="slidecontainer">
    <label for="myRangeZ">Zoom</label>
    <input type="range" min="1" max="100" value="20" class="slider" id="myRangeZ" oninput="jsZoom()">

<footer>
    <?php include("footer.php"); ?>
</footer>

<script>
    var z, zoom;
    function jsZoom() {
        z = document.getElementById("myRangeZ").value;
        img = document.getElementById("img");
        if (!img.dataset.width) {
            img.dataset.width = img.width;
            img.dataset.height = img.height;
        }

        const width = +img.dataset.width;
        const height = +img.dataset.height;

        img.style.width = (width * z/100 + width) + "px";
        img.style.height = (height * z/100 + height) + "px";
    }

    jsZoom();
</script>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>