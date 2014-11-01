<?php

/**
 * Created by PhpStorm.
 * User: yemex4god
 * Date: 11/1/14
 * Time: 2:37 AM
 */
class FacultyModel extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'faculties';
    }

    public function getDbConnection()
    {
        return Yii::app()->db;
    }

    public function primaryKey()
    {
        return 'faculty_id';
    }

    public function getAllFaculties()
    {
        $faculties = $this->findAll();
        return $faculties;
    }

    public function getFaculty($faculty_id)
    {
        $faculty = $this->findByPk($faculty_id);
        return $faculty;
    }

} 