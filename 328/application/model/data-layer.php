<?php

function getJobsSelections() {
    return array("JavaScript", "PHP", "Java", "Python", "HTML", "CSS", "ReactJS", "NodeJS");
}

function getVerticalsSelections() {
    return array("SaaS", "Health Tech", "AG Tech", "HR Tech", "Industrial Tech", "Cybersecurity");
}

require_once($_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php');

class DataLayer
{
    /**
     * @var PDO The database connection object
     */
    private $_dbh;

    /**
     * DataLayer constructor
     */
    function __construct()
    {
        try {
            //Instantiate a database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo 'Connected to database!!';

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /** saveOrder saves an order from the Diner
     * @param $order An order from the Diner
     * @return int The orderID for the new order
     */
    function saveOrder($order)
    {

        //* PDO - Using Prepared Statements
        //1. Define the query (test first!)
        $sql = "INSERT INTO orders (experience, relocate, jobs, verticals)
                VALUES (:experience, :relocate, :jobs, :verticals)";
        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);
        //3. Bind the parameters

        $experience = $order->getExperience();
        $relocate = $order->getRelocate();
        $jobs = $order->getJobs();
        $verticals = $order->getVerticals();
        $statement->bindParam(':experience', $experience);
        $statement->bindParam(':relocate', $relocate);
        $statement->bindParam(':jobs', $jobs);
        $statement->bindParam(':verticals', $verticals);

        //4. Execute
        $statement->execute();

        //5. Capture the primary key
        $id = $this->_dbh->lastInsertID();
        return $id;


    }
}