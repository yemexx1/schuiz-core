<?php

class SiteController extends Controller
{
    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        echo "Welcome to SCHUIZ!";
    }

    public function actionGetTree()
    {
        $connection = Yii::app()->db;

        $command = $connection->createCommand("SELECT * FROM faculties");

        $result = $command->queryAll();

        var_dump($result);

    }


}