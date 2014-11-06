<?php

/**
 * Created by PhpStorm.
 * User: yemex4god
 * Date: 11/1/14
 * Time: 2:37 AM
 */
class DepartmentModel extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'departments';
    }

    public function getDbConnection()
    {
        return Yii::app()->db;
    }

    public function primaryKey()
    {
        return 'dept_id';
    }

    public function getDepartments($faculty_id)
    {
//        $departments = $this->findAll("faculty_id=:faculty_id", array("faculty_id" => $faculty_id));
        $command = $this->getDbConnection()->createCommand("select dept_id as `id`,dept_name as `name` from departments where faculty_id = $faculty_id");
        $departments = $command->queryAll();
        return $departments;
    }

    public function getDepartment($dept_id)
    {
        $department = $this->findByPk($dept_id);
        return $department;
    }

} 