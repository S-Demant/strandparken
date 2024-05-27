<?php
/* Følgende kode er for at aktivere forskellige sprog */
$url = 'http://' . $_SERVER['REQUEST_URI'];
$lang = 'da';
if (str_contains($url, '?eng') == true) {
    $lang = 'eng';
} else if (str_contains($url, '?de') == true) {
    $lang = 'de';
} else {
    $lang = 'da';
}
?>

<nav class="navbar navbar-expand-lg fixed-top bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo-header.webp" alt="Hotel Strandparken logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="d-none d-lg-flex navbar-nav position-absolute start-50 translate-middle-x">
                <li class="nav-item border-start border-end border-secondary border-2 px-4 py-1">
                    <a class="nav-link" href="activities.php">Aktiviteter</a>
                </li>
                <li class="nav-item border-end border-secondary border-2 px-4 py-1">
                    <a class="nav-link" href="attractions.php">Attraktioner</a>
                </li>
            </ul>
            <ul class="d-flex d-lg-none navbar-nav position-relative mt-3">
                <li class="nav-item ps-2 py-1">
                    <a class="nav-link" href="activities.php">Aktiviteter</a>
                </li>
                <li class="nav-item ps-2 py-1">
                    <a class="nav-link" href="attractions.php">Attraktioner</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-lg-auto mb-3 mb-lg-0">
                <li class="nav-item dropdown p-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="
                        <?php
                        if ($lang == 'eng') {
                            echo "img/uk.webp";
                        } else if ($lang == 'de') {
                            echo "img/de.webp";
                        } else {
                            echo "img/dk.webp";
                        }
                        ?>
                        " class="pb-1">&ensp;
                        <?php
                        if ($lang == 'eng') {
                            echo "English";
                        } else if ($lang == 'de') {
                            echo "Deutsch";
                        } else {
                            echo "Dansk";
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu position-absolute bg-light rounded-0 shadow">
                        <li><a class="dropdown-item text-primary px-3" href="index.php?da"><img src="img/dk.webp" class="pb-1">&ensp;
                                <?php
                                if ($lang == 'eng') {
                                    echo "Danish";
                                } else if ($lang == 'de') {
                                    echo "Dänisch";
                                } else {
                                    echo "Dansk";
                                }
                                ?>
                            </a></li>
                        <li><a class="dropdown-item text-primary px-3" href="index.php?eng"><img src="img/uk.webp" class="pb-1">&ensp;
                                <?php
                                if ($lang == 'eng') {
                                    echo "English";
                                } else if ($lang == 'de') {
                                    echo "Englisch";
                                } else {
                                    echo "Engelsk";
                                }
                                ?>
                            </a></li>
                        <li><a class="dropdown-item text-primary px-3" href="index.php?de"><img src="img/de.webp" class="pb-1">&ensp;
                                <?php
                                if ($lang == 'eng') {
                                    echo "German";
                                } else if ($lang == 'de') {
                                    echo "Deutsch";
                                } else {
                                    echo "Tysk";
                                }
                                ?>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>