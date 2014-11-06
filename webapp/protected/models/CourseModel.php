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

    public function primaryKey()
    {
        return 'course_id';
    }

    public function getCourses($dept_id)
    {
        $command = $this->getDbConnection()->createCommand("select course_id as `id`,course_name as `name` from courses where dept_id = $dept_id");
        $courses = $command->queryAll();
        return $courses;
    }

    public function getDbConnection()
    {
        return Yii::app()->db;
    }

    public function getCourse($course_id)
    {
        $course = $this->findByPk($course_id);
        return $course;
    }

    public function getCourseByCode($course_code)
    {
//        $course = $this->findBySql("SELECT * from courses where course_code='CSC301'");
        $course = $this->findBySql("SELECT * from courses where course_code='$course_code'");
        return $course;
    }
} 