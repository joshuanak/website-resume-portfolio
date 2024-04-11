<?php

/**
 * The applicant class represents an person who's
 * filled out the application and subscribed to mailing lists
 * @author Joshua Nakatani
 * @date June 2, 2023
 * @version 1.1
 */

class Applicant_SubscribedToLists extends Applicant
{
    private $_selectionsJobs;
    private $_selectionsVerticals;
    private $_selectionsJobsStr;
    private $_selectionsVerticalsStr;

    /** paramaterized constructor
     * @param $fname
     * @param $lname
     * @param $email
     * @param $state
     * @param $phone
     * @param $selectionsJobs
     * @param $selectionsVerticals
     * @param $selectionsJobsStr
     * @param $selectionsVerticalsStr
     */
    public function __construct($fname, $lname, $email, $state, $phone, $selectionsJobs, $selectionsVerticals,
        $selectionsJobsStr, $selectionsVerticalsStr)
    {
        parent::__construct($fname, $lname, $email, $state, $phone);
        $this->_selectionsJobs = $selectionsJobs;
        $this->_selectionsVerticals = $selectionsVerticals;
        $this->_selectionsJobsStr = $selectionsJobsStr;
        $this->_selectionsVerticalsStr = $selectionsVerticalsStr;
    }

    // getters

    /**
     * @return mixed
     */
    public function getSelectionsJobs()
    {
        return $this->_selectionsJobs;
    }

    /**
     * @return mixed
     */
    public function getSelectionsVerticals()
    {
        return $this->_selectionsVerticals;
    }

    public function getSelectionsJobsStr()
    {
        return $this->_selectionsJobsStr;
    }

    /**
     * @return mixed
     */
    public function getSelectionsVerticalsStr()
    {
        return $this->_selectionsVerticalsStr;
    }

    // setters

    /**
     * @param mixed $selectionsJobs
     */
    public function setSelectionsJobs($selectionsJobs)
    {
        $this->_selectionsJobs = $selectionsJobs;
    }

    /**
     * @param mixed $selectionsVerticals
     */
    public function setSelectionsVerticals($selectionsVerticals)
    {
        $this->_selectionsVerticals = $selectionsVerticals;
    }

    /**
     * @param mixed $selectionsJobsStr
     */
    public function setSelectionsJobsStr($selectionsJobsStr)
    {
        $this->_selectionsJobsStr = $selectionsJobsStr;
    }

    /**
     * @param mixed $selectionsVerticalsStr
     */
    public function setSelectionsVerticalsStr($selectionsVerticalsStr)
    {
        $this->_selectionsVerticalsStr = $selectionsVerticalsStr;
    }
}