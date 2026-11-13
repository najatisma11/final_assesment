

<form method="post">
    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name" value="<?php echo $student_name ?>"><br><br>

    <label for="matric_no">Matric No.:</label>
    <input type="text" id="matric_no" name="matric_no" value="<?php echo $matric_no ?>"><br><br>

    <label for="subject_name">Subject Name:</label>
    <input type="text" id="subject_name" name="subject_name" value="<?php echo $subject_name ?>"><br><br>

    <label for="subject_code">Subject Code:</label>
    <input type="text" id="subject_code" name="subject_code" value="<?php echo $subject_code ?>"><br><br>

    <label for="test1">Test 1 (20%):</label>
    <input type="number" id="test1" name="test1" min="0" max="20" value="<?php echo $test1 ?>"><br><br>

    <label for="test2">Test 2 (30%):</label>
    <input type="number" id="test2" name="test2" min="0" max="30" value="<?php echo $test2 ?>"><br><br>

    <label for="final">Final (50%):</label>
    <input type="number" id="final" name="final" min="0" max="50" value="<?php echo $final ?>"><br><br>

    <input type="submit" name="submit" value="Submit">


</form>