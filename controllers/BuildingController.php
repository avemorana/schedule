<?php

require_once 'models/Building.php';

class BuildingController
{
    public function actionIndex($id)
    {
        $result_set = Building::getScheduleForBuild($id);
        require_once 'views/building/index.php';
        return true;
    }
}
