<?php

/**
 * Created by JetBrains PhpStorm.
 * User: LANREWAJU
 * Date: 06/11/14
 * Time: 00:15
 * To change this template use File | Settings | File Templates.
 */
class QuestionController extends CController
{
    public function actionGetquestions()
    {
        $course_id = Yii::app()->request->getParam("course_id", null);

        if ($course_id == null) {
            $result = array("status" => "error", "error_message" => "Invalid course_id!");
        } else {
            $questions = QuestionModel::model()->getQuestions($course_id);
            $result = array("status" => "success", "data" => $questions);
        }

        header('Access-Control-Allow-Origin: *');
        echo json_encode($result);
    }

    public function actionAddquestion()
    {

        $request = Yii::app()->request;
        $course_id = $request->getPost("course_id", null);
        $question = $request->getPost("question", null);
        $options = $request->getPost("option", null);
        $answer = $request->getPost("answer", null);

        if (isset($course_id, $question, $options, $answer)) {
            /**
             * @var QuestionModel $questionModel
             */
            $questionModel = QuestionModel::model();
            $questionModel->addQuestion($course_id, $question, $options, $answer);
            echo "Question Saved!";
        } else {
            echo "Please fill all fields!";
        }

    }

    public function actionManage()
    {
        $courses = CourseModel::model()->getAllCourses();
        $this->render('manage', array('courses' => $courses));
    }

}