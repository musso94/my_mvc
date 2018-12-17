<?php
/**
 * Created by PhpStorm.
 * User: musso
 * Date: 14.11.2018
 * Time: 11:26
 */

namespace App\Core;


class Validate
{

    public static function validate($data, $type)
    {
        $error = "";
        if (empty($data)) {
            $error = "Field is required";
        }

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        if ($type == "text") {
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z0-9.-_ ]*$/",$data)) {
                $error = "Only latin letters and white space allowed";
            }
        }
        else if ($type == "email") {
            // check if e-mail address is well-formed
            if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email format";
            }
        }
        else if ($type == "phone") {
            // check if phone number is well-formed
            if (!preg_match("/^\(?\+?([0-9]{1,4})\)?[-\. ]?(\d{10})$/",$data)) {
                $error = "Please enter a valid phone number";
            }
        }
        return $error;
    }
}