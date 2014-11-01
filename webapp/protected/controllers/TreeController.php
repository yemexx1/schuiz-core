<?php

/**
 * Created by PhpStorm.
 * User: yemex4god
 * Date: 11/1/14
 * Time: 1:42 AM
 */
class TreeController extends CController
{


    public function actionGettree()
    {
        $faculties = FacultyModel::model()->getAllFaculties();

        foreach ($faculties as &$faculty) {
            $departments = DepartmentModel::model()->getDepartments($faculty['faculty_id']);
            foreach ($departments as &$department) {
                $department = $department->attributes;
                $courses = CourseModel::model()->getCourses($department['dept_id']);
                foreach ($courses as &$course) {
                    $course = $course->attributes;
                }
                $department['courses'] = $courses;
            }
            $faculty = $faculty->attributes;
            $faculty['departments'] = $departments;
        }

        echo json_encode($faculties);
    }

} 