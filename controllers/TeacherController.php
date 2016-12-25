<?php

require_once 'models/Teacher.php';

class TeacherController
{
    public function actionIndex($nameOfTeacher)
    {
        $nameOfTeacher = htmlspecialchars($nameOfTeacher);
        $result_set = Teacher::getScheduleForTeacher($nameOfTeacher);
        require_once 'views/teacher/index.php';
        return true;
    }
}
