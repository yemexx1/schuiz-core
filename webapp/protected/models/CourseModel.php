<?php

/**
 * Created by PhpStorm.
 * User: yemex4god
 * Date: 11/1/14
 * Time: 2:37 AM
 */
class CourseModel extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'courses';
    }

    public function getDbConnection()
    {
        return Yii::app()->db;
    }

    public function primaryKey()
    {
        return 'course_id';
    }

    public function getCourses($dept_id)
    {
        $faculties = $this->findAll("dept_id=:dept_id", array("dept_id" => $dept_id));
        return $faculties;
    }

    public function getCourse($course_id)
    {
        $course = $this->findByPk($course_id);
        return $course;
    }

} 