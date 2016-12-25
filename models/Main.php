<?php


class Main
{
    public static function getNumberOfBuild()
    {
        $numOfBuild = null;
        for($i = 0; $i < 36; $i++){
            $i = (string) $i;
            if(isset($_POST[$i])){
                $numOfBuild = $i;
                break;
            }
        }
        return $numOfBuild;
    }

    public static function getNameOfTeacher()
    {
        $nameOfTeacher = null;
        if (isset($_POST["submitTeacher"])){
            $nameOfTeacher = $_POST['nameOfTeacher'];
        }
        return $nameOfTeacher;
    }

}