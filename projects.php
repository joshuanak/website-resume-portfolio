<?php


// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to database
require '/home/joshuana/db.php';

// Define the SELECT query
$sql = "SELECT * FROM projects";

// Send the query to the database
$result = @mysqli_query($cnxn, $sql);

$projectCount = 0;
//Process the rows
while ($row = mysqli_fetch_assoc($result)) {
    // var_dump($row);
    $title = $row['title'];
    $bullet1 = $row['bullet1'];
    $bullet2 = $row['bullet2'];
    $bullet3 = $row['bullet3'];
    $link = $row['link'];

    ${'project'.$projectCount} = array($title, $bullet1, $bullet2, $bullet3, $link);
    $projectCount++;

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Projects</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/carousel.css" rel="stylesheet">
    <!-- Personal custom styles ~ Josh -->
    <link rel="stylesheet" href="styles/joshProjectsStyles.css">
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
                    <a class="nav-link active" aria-current="page" href="https://soundry.ai/">Soundry AI Page</a>
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

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container">
    <div class="container marketing">
        <hr class="header-featurette-divider">

        <section class="section" id="section--1">
            <div class="row featurette justify-content-center">
                <div class="col-md-9 about-me">
                    <h3 class="featurette-heading fw-normal lh-1">Meet Josh</h3>
                    <p class="lead">
                        Future junior engineer eager to diversify and expand upon my 1 year of coding experience by applying my
                        skills in a professional work environment. I hope to apply my college coding knowledge of data structures,
                        web development, and database fundamentals to my future roles as a junior software engineer.
                    </p>
                </div>
                <div class="col-md-3">
                    <img
                        class="rounded-circle"
                        alt="portrait of joshua"
                        src="img/spaceNeedleSquare.jpeg"
                        width="180"
                        height="180"
                        aria-label="Placeholder: 400x400"
                    />
                </div>
            </div>
        </section>

        <hr class="header-featurette-divider-bottom" />

        <div class="row">
            <div class="col-lg-4">
                <h2 class="fw-normal"><?php echo "$project0[0]"; ?></h2>
                <p>Created new landing page for my internship company Soundry AI</p>
                <p><a class="btn btn-primary" href="#section--1">View more &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2 class="fw-normal"><?php echo "$project1[0]"; ?></h2>
                <p>RESTful API project created with HTTP method functionality to manipulate data</p>
                <p><a class="btn btn-primary" href="#section--2">View more &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2 class="fw-normal"><?php echo "$project2[0]"; ?></h2>
                <p>Conway's game of life! Watch the generations shift over time depending on their neighbors
                    cell's status</p>
                <p><a class="btn btn-primary" href="#section--3">View more &raquo;</a></p>
            </div>
        </div>



        <hr class="featurette-divider">

        <section id="section--1">
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="project-heading fw-normal lh-1">Soundry AI <span class="text-muted">Landing Page</span></h2>
                    <ul>
                        <li><?php echo "$project0[1]"; ?></li>
                        <li><?php echo "$project0[2]"; ?></li>
                        <li><?php echo "$project0[3]"; ?></li>
                    </ul>
                    <a class="btn btn-primary" href="<?php echo "$project0[4]"; ?>" role="button">Website Link</a>
                </div>
                <div class="col-md-5">
                </div>
            </div>
        </section>

        <hr class="featurette-divider">

        <section id="section--2">
            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="project-heading fw-normal lh-1">CRUD API <span class="text-muted">Project</span></h2>
                    <ul>
                        <li><?php echo "$project1[1]"; ?></li>
                        <li><?php echo "$project1[2]"; ?></li>
                        <li><?php echo "$project1[3]"; ?></li>
                    </ul>
                    <a class="btn btn-primary" href="<?php echo "$project1[4]"; ?>" role="button">GitHub Link</a>
                </div>
                <div class="col-md-5 order-md-1">
                </div>
            </div>
        </section>

        <hr class="featurette-divider">

        <section id="section--3">
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="project-heading fw-normal lh-1">Conway's <span class="text-muted">Game of Life</span></h2>
                    <ul>
                        <li><?php echo "$project2[1]"; ?></li>
                        <li><?php echo "$project2[2]"; ?></li>
                        <li><?php echo "$project2[3]"; ?></li>
                    </ul>
                    <a class="btn btn-primary" href="<?php echo "$project2[4]"; ?>" role="button">Replit Link</a>
                </div>
                <div class="col-md-5">
                </div>
            </div>
        </section>

        <!-- /END THE FEATURETTES -->
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