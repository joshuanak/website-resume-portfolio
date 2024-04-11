<?php


/* application/model/data-layer.php
    Contains functionality to validate data
    This is part of the MODEL
*/

class Validate
{
    static function validName($name) {
        return ctype_alpha($name);
    }

    static function validGitHub($github) {
        return (filter_var($github, FILTER_VALIDATE_URL) || $github == "");
    }

    static function validExperience($string) {
        return empty($string) || is_string($string);
    }

    static function validPhone($phoneNum) {
        return preg_match('/^[0-9]{10}+$/', $phoneNum);
    }

    static function validEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    static function validSelectionsJobs ($userJobs) {
        $validJobs = getJobsSelections();

        if ($userJobs == null) {
            return true;
        }

        foreach ($userJobs as $job){
            if (!in_array($job, $validJobs)) {
                return false;
            } else {
                return true;
            }
        }
    }

    static function validSelectionsVerticals($userVerticals) {
        $validVerticals = getVerticalsSelections();

        if ($userVerticals == null) {
            return true;
        }

        foreach ($userVerticals as $vertical){
            if (!in_array($vertical, $validVerticals)) {
                return false;
            } else {
                return true;
            }
        }
    }
}