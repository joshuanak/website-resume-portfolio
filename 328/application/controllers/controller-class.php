<?php

class Controller
{
    //F3 object
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personalInfo()
    {
        // if the form has been posted
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $state = $_POST['state'];
            $phoneNum = $_POST['phoneNum'];

            // Validate the data. Store in session if valid
            if (Validate::validName($fname)) {
                $this->_f3->set('SESSION.fname', $fname);
            } else { // is not valid -> set an error variable
                $this->_f3->set('errors["fname"]', 'invalid first name');
            }
            if (Validate::validName($lname)) {
                $this->_f3->set('SESSION.lname', $lname);
            } else {
                $this->_f3->set('errors["lname"]', 'invalid last name');
            }
            if (Validate::validEmail($email)) {
                $this->_f3->set('SESSION.email', $email);
            } else {
                $this->_f3->set('errors["email"]', 'invalid email');
            }
            if (Validate::validPhone($phoneNum)) {
                $this->_f3->set('SESSION.phoneNum', $phoneNum);
            } else {
                $this->_f3->set('errors["phoneNum"]', 'invalid phoneNum');
            }
            if (isset($_POST['mailingLists'])) {
                $this->_f3->set('SESSION.mailingLists', true);
            } else {
                $this->_f3->set('SESSION.mailingLists', false);
            }

            $this->_f3->set('SESSION.email', $email);
            $this->_f3->set('SESSION.state', $state);

            // validate and redirect to experience.html route if values are correct
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('experience');
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/personalInformation.html');
    }

    function experience()
    {
        // if the form has been posted
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $biography = $_POST['biography'];
            $github = $_POST['github'];
            $yearsexp = $_POST['yearsexp'];
            $relocate = $_POST['relocate'];

            // Store the data in the session array
            $this->_f3->set('SESSION.yearsexp', $yearsexp);
            $this->_f3->set('SESSION.relocate', $relocate);
            if (Validate::validGitHub($github)) {
                $this->_f3->set('SESSION.github', $github);
            } else {
                $this->_f3->set('errors["github"]', 'invalid link');
            }
            if (Validate::validExperience($biography)) {
                $this->_f3->set('SESSION.biography', $biography);
            } else {
                $this->_f3->set('errors["biography"]', 'Go away, evildoer!');
            }

            // Redirect to mailingList.html route
            if (empty($this->_f3->get('errors'))) {
                if ($_SESSION['mailingLists']) {
                    $this->_f3->reroute('mailing-list');
                } else {
                    $this->_f3->reroute('summary');
                }
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/experience.html');
    }

    function subscriptions()
    {
        // if the form has been posted
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if (isset($_POST['jobMail'])) {
                $jobMail = $_POST['jobMail'];
                $jobMailStr = implode(", ", $jobMail);
                if (Validate::validSelectionsJobs($jobMail)) {
                    $this->_f3->set('SESSION["jobMail"]', $jobMail);
                    $this->_f3->set('SESSION.jobMailStr', $jobMailStr);
                } else {
                    $this->_f3->set('errors["jobMail"]', 'Go away, evildoer!');
                }
            } else {
                $this->_f3->set ('SESSION.jobMailStr', "");
            }
            if (isset($_POST['industryMail'])) {
                $industryMail = $_POST['industryMail'];
                $industryMailStr = implode (", ", $industryMail);
                if (Validate::validSelectionsVerticals($industryMail)) {
                    $this->_f3->set('SESSION["industryMail"]', $industryMail);
                    $this->_f3->set('SESSION.industryMailStr', $industryMailStr);
                } else {
                    $this->_f3->set('errors["industryMail"]', 'Go away, evildoer!');
                }
            } else {
                $this->_f3->set('SESSION.industryMailStr', "");
            }

            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('summary');
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/mailingList.html');
    }

    function summary()
    {
        // run fat free to access session
        $this->_f3->get('SESSION.mailingLists');

        if (!$_SESSION['mailingLists']) {
            $newApplicant = new Applicant($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'],
                $_SESSION['state'], $_SESSION['phoneNum']);
        } else {
            $newApplicant = new Applicant_SubscribedToLists($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'],
                $_SESSION['state'], $_SESSION['phoneNum'], $_SESSION['jobMail'], $_SESSION['industryMail'],
                $_SESSION['jobMailStr'], $_SESSION['industryMailStr']);
        }
        $newApplicant->setGithub($_SESSION['github']);
        $newApplicant->setExperience($_SESSION['yearsexp']);
        $newApplicant->setRelocate($_SESSION['relocate']);
        $newApplicant->setBio($_SESSION['biography']);

        $this->_f3->set('SESSION["applicants"]', $newApplicant);

        // Display a view page
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}