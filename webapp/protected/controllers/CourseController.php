<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LANREWAJU
 * Date: 06/11/14
 * Time: 00:07
 * To change this template use File | Settings | File Templates.
 */

class CourseController extends CController{
    public function actiongetquery(){

        $course_code = Yii::app()->request->getParam('course_code', 'csc201');

//        if(is_null($course_code)) {
//
//        }
        $courses = CourseModel::model()->getCourseByCode($course_code);

        $course = $courses->attributes;

        echo json_encode($course);
//        }

//    }


    }

}