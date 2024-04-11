<?php
    // Connect to database
    require '/home/joshuana/db.php';

    // Define the SELECT query
    $sql = "SELECT * FROM student";

    // Send the query to the database
    $result = @mysqli_query($cnxn, $sql);

    //Process the rows
    while ($row = mysqli_fetch_assoc($result)) {
        $sid = $row['sid'];
        $first = $row['first'];
        $last = $row['last'];
        $birthdate = $row['birthdate'];

        echo  "<p>$sid - $first $last, $birthdate</p>";
    }
?>
