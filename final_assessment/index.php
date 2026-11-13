<?php
include "db.php";
include "header.php";
include "auth.php";


$search = $_GET['search'] ?? "";

$like = "%$search%";

$sql = $conn->prepare("SELECT * FROM result WHERE student_name LIKE ? OR matric_no LIKE ? OR subject_name LIKE ? OR subject_code LIKE ?");

//S = String, I = Integer, D = Double, B = Blob
$sql->bind_param("ssss", $like, $like, $like, $like);
$sql->execute();
$result = $sql->get_result();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Assessment-Student Grading System</title>
</head>

<body>


    <h2>Student Records</h2>

    <a href="add.php">+ Add Result</a>
    <br><br>

    <form method="GET">
        <input type="text" name="search" style="width: 430px;" placeholder="Search by student name, matric number, or subject"
        value="<?php echo $search ?>">
        <button type="submit">Search</button>
        <a href="index.php">Show all</a>
    </form>
    <br><br>

    <table border="1">
        <tr>
            <th>No.</th>
            <th>Student Name</th>
            <th>Matric No.</th>
            <th>Subject</th>
            <th>Test 1 (20%)</th>
            <th>Test 2 (30%)</th>
            <th>Final (50%)</th>
            <th>Total</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>

        <?php
        $no = 1;

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['matric_no'] . "</td>";
            echo "<td>" . $row['subject_name'] . " (" . $row['subject_code'] . ") " . "</td>";
            echo "<td>" . $row['test_1'] . "</td>";
            echo "<td>" . $row['test_2'] . "</td>";
            echo "<td>" . $row['final'] . "</td>";
            echo "<td>" . $row['total'] . "</td>";
            echo "<td>" . $row['grade'] . "</td>";
            echo "<td>";
            echo "<button><a href='edit.php?id=" . $row['id'] . "'>Edit</a></button>";
            echo "<form method='post' action='delete.php' onsubmit='return confirm(\"Are you sure you want to delete this record?\")'>";
            echo "<input type='hidden' name='delete' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Delete'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";

        }
        ?>
    </table>

</body>

</html>

<?php
include "footer.php";

?>