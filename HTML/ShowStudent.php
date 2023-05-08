<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Student</title>
</head>

<body>
    <div class="container text-center">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 mx-auto h1">
                <h1>STUDENT LIST</h1>
            </span>
        </nav>
        <table class="table table-hover table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">SEM</th>
                    <th scope="col">DEPARTEMENT</th>
                    <th scope="col">DELETE</th>
                    <th scope="col">UPDATE</th>
                </tr>
            </thead>
            <?php
            $cn = mysqli_connect("localhost", "root", "", "gradesheet");
            try {
                if ($cn) {
                    $sql = "select * from student";
                    $result = mysqli_query($cn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $er = $row['Enrollment_No'];
                        $sem = $row['Sem'];
                        $dpt = $row['Department'];
                        echo "
                            <tr>
                            <form action='ShowStudent.php' method='post'>                        
                            <td><input type='text' name='id' value='$er' readonly></td>
                            <td><input type='text' name='sem' value=$sem ></td>
                            <td><input type='text' name='dpt' value='$dpt' ></td>
                            <td><a href='ShowStudent.php?fid=$row[0]'>Delete</a></td>
                            <td><input type='submit' name='update'  value='Update'></td>
                            </form>
                            </tr>";
                    }
                    if (isset($_GET['fid'])) {
                        $sql = "DELETE FROM student WHERE Enrollment_No ='" . $_GET['fid'] . "'";
                        if (mysqli_query($cn, $sql)) {
                            $sql1 = "DELETE FROM user WHERE  ID ='" . $_GET['fid'] . "'";
                            if (mysqli_query($cn, $sql1)) {
                                header('location: ShowStudent.php?msg=Deleted Sucessfully');
                            }
                        } else {
                            header('location: ShowStudent.php?msg=Not Deleted Sucessfully');
                        }
                    } else  if (isset($_POST['update'])) {
                        try {
                            $cn = mysqli_connect("localhost", "root", "", "gradesheet");
                            if ($cn) {
                                $id1 = $_POST['id'];
                                $c1 = $_POST['sem'];
                                $c2 = $_POST['dpt'];

                                $updatesql = "update student set Enrollment_No='$id1',Sem=$c1,Department='$c2' where Enrollment_No='$id1'";
                                echo $updatesql;
                                if (mysqli_query($cn, $updatesql)) {
                                    $updateuser = "update user set Department='$c2' where ID='$id'";
                                    if (mysqli_query($cn, $updateuser)) {
                                        header('location: ShowStudent.php?msg=Updated Sucessfully');
                                    }
                                } else {
                                    header('location: ShowStudent.php?msg=Not Updated Sucessfully');
                                }
                            }
                        } catch (Exception $e1) {
                            echo "Error: " . $e1->getMessage();
                        }
                    }
                    mysqli_close($cn);
                } else {
                }
            } catch (Exception $e) {
                echo "Error : " . $e->getMessage();
            }
            ?>
        </table>
        <?php
        if (isset($_GET['msg'])) {
            echo '<div id="msg">
                <h1 style="color:red">' . $_GET['msg'] .
                '</h1></div>';
            echo '<script>setTimeout(function(){ document.getElementById("msg").style.display = "none"; }, 2000);</script>';
        }
        ?>
    </div>
    <div class="fixed-bottom container text-center">
        <a class='btn btn-link' href='../HTML/HomeAdmin.php'>Go to HomePage</a>
        <a class='btn btn-link' href='../HTML/Login_Admin.php'>Go to Admin Login</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>