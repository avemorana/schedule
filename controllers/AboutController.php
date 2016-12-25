<?php

/**
 * Created by PhpStorm.
 * User: Anastasia Shurkina
 * Date: 12.12.2016
 * Time: 11:21
 */
class AboutController
{
    public function actionIndex()
    {
        require_once 'views/about/index.php';
        return true;
    }

}
