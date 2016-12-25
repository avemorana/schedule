<?php

require_once 'models/Main.php';

class MainController
{
    public function actionMain()
    {
        $numOfBuild = Main::getNumberOfBuild();
        $nameOfTeacher = Main::getNameOfTeacher();

        if (isset($numOfBuild)) {
            header('Location: building/' . $numOfBuild);
            exit();
        } elseif (isset($nameOfTeacher)) {
            header('Location: teacher/' . $nameOfTeacher);
            exit();
        }
        require_once 'views/main/index.php';
        return true;
    }


}
