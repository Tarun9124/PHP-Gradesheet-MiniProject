<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "gradesheet");
$pwd = md5($_POST['pwd']);
if (isset($_POST['login'])) {
    try {
        if ($cn) {
            $sql = "SELECT * FROM admin WHERE ID = '" . $_POST['uname'] . "'";
            $result = mysqli_query($cn, $sql);
            $row = mysqli_fetch_array($result);
            if (!$row) {
                header('Location: ../HTML/Login_Admin.php?msg=User Not Found!');
                exit;
            } else {
                if ($_POST['uname'] == $row['ID'] && $pwd === $row['Password']) {
                    header('Location: ../HTML/HomeAdmin.php');
                } else {
                    header('Location: ../HTML/Login_Admin.php?msg=Password is Incorrect!');
                }
            }
            mysqli_close($cn);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
