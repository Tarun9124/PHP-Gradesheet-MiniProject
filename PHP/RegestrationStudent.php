<?php
$conn = mysqli_connect('localhost', 'root', '', 'gradesheet');
if (isset($_POST['sem'])) {
    $sql = "INSERT INTO student VALUES ('" . $_POST['id'] . "', '" . $_POST['sem'] . "','" . $_POST['dpt'] . "')";
    if (mysqli_query($conn, $sql)) {
        echo '<div id="message"><h1 style="color:green";>Record Inserted in Student Table!<h1></div>';
        echo "<script>setTimeout(function(){ window.location.href = '../HTML/Regestration.html'; }, 2000);</script>";
        exit;
    } else {
        echo '<div id="message"><h1 style="color:red";>Record Not Inserted in Student Table!<h1></div>';
        echo "<script>setTimeout(function(){ window.location.href = '../HTML/Regestration.html'; }, 2000);</script>";
        exit;
    }
}
