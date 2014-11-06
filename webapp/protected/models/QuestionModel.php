<?php

/**
 * Created by JetBrains PhpStorm.
 * User: LANREWAJU
 * Date: 04/11/14
 * Time: 22:30
 * To change this template use File | Settings | File Templates.
 */
class QuestionModel extends CActiveRecord
{
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

    public function getQuestions($course_id)
    {
        $command = $this->getDbConnection()->createCommand("select question_id, question, options, correct_answer as answer from questions where course_id = $course_id");
        $questions = $command->queryAll();
        return $questions;
    }

    public function addQuestion($course_id, $question, $options, $answer)
    {
        $questionModel = new QuestionModel();
        $questionModel->course_id = $course_id;
        $questionModel->question = $question;
        $questionModel->options = json_encode($options);
        $questionModel->correct_answer = intval($answer);
        return $questionModel->save();
    }

}