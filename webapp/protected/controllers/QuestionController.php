<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LANREWAJU
 * Date: 06/11/14
 * Time: 00:15
 * To change this template use File | Settings | File Templates.
 */

class QuestionController extends CController{
    public function actiongetquestions(){
        $questions=QuestionModel::model()->getQuestions();
        //foreach ($questions as &$question) {
        $question = $questions->attributes;
        echo json_encode($question);
        //}
    }

}