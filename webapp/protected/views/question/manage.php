<?php
/**
 * Created by PhpStorm.
 * User: yemex4god
 * Date: 11/6/14
 * Time: 4:29 AM
 */

?>


<form action="/question/addquestion" method="post">
    <label for="course_id">Course ID</label>
    <select id="course_id" name="course_id">
        <?php foreach ($courses as $course): ?>
            <option value="<?php echo $course['id'] ?>"><?php echo $course['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <br/><br/>
    <label for="question">Question</label>
    <input type="text" name="question" id="question"/>
    <br/><br/>
    <label for="option">Options</label>
    <input type="text" name="option[]" id="option"/>
    <input type="text" name="option[]" id="options"/>
    <input type="text" name="option[]" id="options"/>
    <input type="text" name="option[]" id="options"/>
    <br/><br/>
    <label for="answer">Answer</label>
    <input type="text" name="answer" id="answer"/>
    <br/><br/>
    <button type="submit">Add Question</button>
</form>
