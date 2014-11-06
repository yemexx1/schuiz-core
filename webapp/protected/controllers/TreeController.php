<?php

/**
 * Created by PhpStorm.
 * User: yemex4god
 * Date: 11/1/14
 * Time: 1:42 AM
 */
class TreeController extends CController
{


    public function actiongettree()
    {
        $faculties = FacultyModel::model()->getAllFaculties();
        foreach ($faculties as &$faculty) {
            $departments = DepartmentModel::model()->getDepartments($faculty['id']);
            foreach ($departments as &$department) {
                $courses = CourseModel::model()->getCourses($department['id']);
                $department['num_childs'] = count($courses);
                $department['childs'] = $courses;
            }
            $faculty['num_childs'] = count($departments);
            $faculty['childs'] = $departments;
        }

        echo json_encode($faculties);

   }


} 