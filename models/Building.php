<?php

require_once 'components/Database.php';

class Building
{
    public static function getScheduleForBuild($numOfBuild)
    {
        $day = date('N');
        if (date('W', mktime(0, 0, 0, 9, 1, 2016)) % 2 == date('W') % 2) {
            $week = 1;
        } else {
            $week = 2;
        }

        $db = Database::getConnection();
        $db->query("SET NAMES 'utf8'");
        $query = "SELECT * FROM `lessons` WHERE `building`= $numOfBuild AND `day` = $day 
              AND `week`= $week ORDER BY `lessons`.`day` ASC, `lessons`.`lesson_number` ASC";
        $result_set = mysqli_query($db, $query);
        $db->close();
        return $result_set;
    }


}
