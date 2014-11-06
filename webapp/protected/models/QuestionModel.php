<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LANREWAJU
 * Date: 04/11/14
 * Time: 22:30
 * To change this template use File | Settings | File Templates.
 */

class QuestionModel extends CActiveRecord{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'questions';
    }

    public function getDbConnection()
    {
        return Yii::app()->db;
    }

    public function primaryKey()
    {
        return 'question_id';
    }

    public function getQuestions()
    {
      //  $questions = $this->findAll();
        $course = $this->findBySql("SELECT * from courses where course_code='$course_code'");
        return $questions;
    }

    public function getDepartment($dept_id)
    {
//        $department = $this->findByPk($dept_id);
       // return $department;
    }
}