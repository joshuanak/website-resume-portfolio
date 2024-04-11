<?php
// Connect to database
require '/home/joshuana/db.php';

// Define the SELECT query
$sql = "SELECT * FROM guestbook ORDER BY guest_num DESC";

// Send the query to the database
$result = @mysqli_query($cnxn, $sql);

$guestCount = 0;
$guestArray = array();
//Process the rows
while ($row = mysqli_fetch_assoc($result)) {
    $guest_num = $row['guest_num'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $message = $row['message'];
    $link = $row['link'];

    $guestArray[$guestCount] = array($guest_num, $first_name, $last_name, $message, $link);
    $guestCount++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guest Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"><link rel="stylesheet" href="styles/joshResumeStyles.css">
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

<!-- main page container -->
<div class="container">
    <div class="container-fluid">
        <hr class="featurette-divider" />
        <section class="section" id="section--1">
            <div class="row featurette justify-content-center">
                <h3 class="featurette-heading fw-normal lh-1 ">Welcome to the Guest Book!</h3>
            </div>
        </section>

        <hr class="featurette-divider" />

        <!--  Form content below  -->
        <section class="section" id="section--2">
            <form id="form" class="form justify-content-center" onsubmit="return validateForm()" action="send.php" method="get">
                <div class="row w-75 justify-content-center">
                    <div class="col">
                        <label for="fname">First name:</label><br>
                        <input type="text" id="fname" class="form-control" placeholder="First Name" name="first_name">
                    </div>
                    <div class="col">
                        <label for="lname">Last name:</label><br>
                        <input type="text" id="lname" class="form-control" placeholder="Last Name" name="last_name">
                    </div>
                </div>
                <div class="row w-75 justify-content-center">
                    <div class="col">
                        <label for="link">Link:</label><br>
                        <input type="text" class="form-control" placeholder="Link (not required)" id="link" name="link">
                    </div>
                </div>
                <div class="row w-75 justify-content-center">
                    <div class="col">
                        <label for="message">Message:</label><br>
                        <input type="text" class="form-control" placeholder="Type message here..." id="message" name="message">
                    </div>
                </div>
                <center><button type="submit" class="btn btn-primary">Submit</button></center>
            </form>
            
            <script>
                // Validate the form input for first name, last name, email, and message
                function validateForm() {

                    let w = document.forms["form"]["fname"].value;
                    let x = document.forms["form"]["lname"].value;
                    let m = document.forms["form"]["message"].value;

                    // Name validation
                    if (w === "") {
                        alert("First name must be filled out");
                        return false;
                    }
                    if (x === "") {
                        alert("Last name must be filled out");
                        return false;
                    }

                    // Message validation
                    if (m === "") {
                        alert("Message is empty");
                        return false;
                    }
                }
            </script>
        </section>

        <hr class="featurette-divider" />

        <section class="section">
            <div id="pastGuests">
                <h3 class="featurette-heading fw-normal lh-1 ">Messages from Previous Guests</h3>

                <hr class="featurette-divider" />

                <!--   php will pull past guests here from the database here   -->
                <?php
                $sql = "SELECT * FROM guestbook ORDER BY guest_num DESC";

                $result = @mysqli_query($cnxn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $guest_num = $row['guest_num'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $message = $row['message'];
                    $is_active = $row['is_active'];

                    $guestArray[$guestCount] = array($guest_num, $first_name, $last_name, $message, $is_active);
                    $guestCount++;

                    if ($is_active) {
                        echo '<div class="row">'.
                                '<h5 class="featurette-heading fw-normal lh-1 "><strong>'.$first_name.' '.$last_name.'</strong></h5>'.
                                '<p>'.$message.'</p>'.
                              '</div>';
                    }
                }
                ?>
            </div>
        </section>
    </div>
</div> <!-- end of main page -->

<hr class="featurette-divider" />

<footer class="container">
    <p class="float-end">
        <a class="footer-nav-link active" href="https://www.linkedin.com/in/joshua-nakatani/">LinkedIn</a>
        <a class="footer-nav-link" href="#">Back to top</a></p>
    <p>
        2023 Joshua Nakatani
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>