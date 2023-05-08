<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "gradesheet");
$pwd = md5($_POST['pwd']);
if (isset($_POST['login'])) {
    try {
        if ($cn) {
            $sql = "SELECT * FROM user WHERE ID = '" . $_POST['uname'] . "'";
            $result = mysqli_query($cn, $sql);
            $row = mysqli_fetch_array($result);
            if (!$row) {
                header('Location: ../HTML/Login_User.php?msg=User Not Found!');
                exit;
            } else {
                if ($_POST['uname'] == $row['ID'] && $pwd === $row['Password']) {
                    if ($row['Role'] == 'student') {
                        $_SESSION['role'] = 'student';
                        $_SESSION['ID'] = $row['ID'];
                        header('location: ../HTML/HomeStudent.php');
                    } else if ($row['Role'] == 'faculty') {
                        $_SESSION['role'] = 'faculty';
                        $_SESSION['ID'] = $row['ID'];
                        header('location: ../HTML/Faculty.php');
                    }
                } else {
                    echo $pwd;
                    echo '<br /><br />';
                    echo $hashpwd;
                    header('Location: ../HTML/Login_User.php?msg=Password is Incorrect!');
                }
            }
            mysqli_close($cn);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
