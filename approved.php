<?php
require '/home/joshuana/db.php';
$sql = "SELECT * FROM guestbook ORDER BY guest_num DESC";
@mysqli_query($cnxn, $sql);

$sql = "UPDATE guestbook SET `is_active` = '1' WHERE `guestbook`.`guest_num` = ".$_GET['token'];
@mysqli_query($cnxn, $sql);

?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Approved!</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/carousel.css" rel="stylesheet">
    <!-- Personal custom styles ~ Josh -->
    <link rel="stylesheet" href="styles/joshProjectsStyles.css">
    <link rel="stylesheet" href="styles/joshResumeStyles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container container-fluid">
        <a class="navbar-brand active" href="https://joshuanakatani.greenriverdev.com/index.html"><strong>Joshua Nakatani</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://teamhexagon.greenriverdev.com/">Hexagon Team Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="https://www.linkedin.com/in/joshua-nakatani/">LinkedIn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="guestBook.php">Guest book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="projects.php">Projects</a>
                </li>
            </ul>
            <p class="d-flex contact-information">
                joshua.nakatani@gmail.com
                <br> 253-740-(0534)
            </p>
        </div>
    </div>
</nav>

<main>
    <div class="container">
        <div class="container marketing">
            <hr class="header-featurette-divider">

            <p>Return to guestbook: <a class="footer-nav-link active" href="guestBook.php">(click here)</a></p>

        </div><!-- /.container -->
    </div>
</main>

<hr class="footer-featurette-divider">
<!-- FOOTER -->
<footer class="container">
    <p class="float-end">
        <a class="footer-nav-link active" href="https://www.linkedin.com/in/joshua-nakatani/">LinkedIn</a>
        <a class="footer-nav-link" href="#">Back to top</a></p>
    <p>
        2023 Joshua Nakatani
    </p>
</footer>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>
