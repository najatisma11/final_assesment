<?php
include "header.php";
include "db.php";

$id = $_GET['id'] ?? 0;

$sql = $conn->prepare("SELECT * FROM result WHERE id = $id");

$sql->execute();

$row = $sql->get_result()->fetch_assoc();

    $student_name = $row['student_name'];
    $matric_no = $row['matric_no'];
    $subject_name = $row['subject_name'];
    $subject_code = $row['subject_code'];
    $test1 = $row['test_1'];
    $test2 = $row['test_2'];
    $final = $row['final'];

    if (isset($_POST['submit'])) {
    $student_name = $_POST['student_name'];
    $matric_no = $_POST['matric_no'];
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $test1 = $_POST['test1'];
    $test2 = $_POST['test2'];
    $final = $_POST['final'];

    $total = $test1 + $test2 + $final;

    if ($total >= 80)
        $grade = 'A';
    elseif ($total >= 65)
        $grade = 'B';
    elseif ($total >= 50)
        $grade = 'C';
    elseif ($total >= 40)
        $grade = 'D';
    else
        $grade = 'E';

    $sql = $conn->prepare("UPDATE result SET 
    student_name = '$student_name',
    matric_no = '$matric_no',
    subject_name = '$subject_name',
    subject_code = '$subject_code',
    test_1 = $test1,
    test_2 = $test2,
    final = $final,
    total = $total,
    grade = '$grade'
    WHERE id = $id
    ");

    if ($sql->execute()) {
        header("Location: index.php");
    }
}
?>

<h2>Edit Result</h2>

<?php
include "form.php";
include "footer.php";
?>