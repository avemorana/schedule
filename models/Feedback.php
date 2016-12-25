<?php

require_once 'components/Database.php';

class Feedback
{
    public static function sendFeedbackToDb($name, $email, $message)
    {
        $db = Database::getConnection();
        $db->query("SET NAMES 'utf8'");
        $result = $db->query("INSERT INTO `feedback` (`name`, `email`, `comment`, `date`) 
                                  VALUES ('$name', '$email','$message','" . time() . "')");
        $db->close();
        return $result;
    }
}
