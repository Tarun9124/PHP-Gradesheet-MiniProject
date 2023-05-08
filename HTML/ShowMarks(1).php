<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <div class="container text-center">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 mx-auto h1">
                <h1><?php echo $_POST['erno'] ?> Marks</h1>
            </span>
        </nav>
        <table class="table table-hover table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col">SUBJECT CODE</th>
                    <th scope="col">ENROLLMENT NO</th>
                    <th scope="col">MARKS</th>
                    <th scope="col">GARDE</th>
                    <th scope="col">DELETE</th>
                    <th scope="col">UPDATE</th>
                </tr>
            </thead>
            <?php
            $cn = mysqli_connect("localhost", "root", "", "gradesheet");
            try {
                if ($cn) {
                    $selectsql = "select * from grade where Enrollment_No = '" . $_POST['erno'] . "'";;
                    $result = mysqli_query($cn, $selectsql);
                    while ($row = mysqli_fetch_array($result)) {
                        $scode = $row['Subject_Code'];
                        $erno = $row['Enrollment_No'];
                        $mark = $row['Marks'];
                        $grade = $row['Grade'];
                        echo "
                            <tr>
                            <form action='ShowMarks(1).php' method='post'>                        
                            <td><input type='number' name='scode' value=$scode readonly></td>
                            <td><input type='number' name='erno' value=$erno readonly></td>
                            <td><input type='number' name='mark' value=$mark></td>
                            <td><input type='text' name='grade' value='$grade'></td>
                            <td><a href='ShowMarks(1).php?fid=$row[1]'>Delete</a></td>
                            <td><input type='submit' name='update' value='Update'></td>
                            </form>
                            </tr>";
                    }
                    if (isset($_GET['fid'])) {
                        $deletesql = "DELETE FROM grade WHERE Enrollment_No ='" . $_GET['fid'] . "'";
                        if (mysqli_query($cn, $deletesql)) {
                            header('location: ShowMarks(1).php?msg=Deleted Sucessfully');
                        } else {
                            header('location: ShowMarks(1).php?msg=Not Deleted Sucessfully');
                        }
                    } else  if (isset($_POST['update'])) {
                        try {
                            $cn = mysqli_connect("localhost", "root", "", "gradesheet");
                            if ($cn) {
                                $c1 = $_POST['erno'];
                                $c2 = $_POST['mark'];
                                $c3 = $_POST['grade'];

                                echo $id1 . ' ' . $c1 . ' ' . $c2;
                                $updatesql = "update grade set Marks=$c2,Grade='$c3' where Enrollment_No = $c1";
                                echo $updatesql;
                                if (mysqli_query($cn, $updatesql)) {
                                    header('location: ShowMarks(1).php?msg=Updated Sucessfully');
                                } else {
                                    header('location: ShowMarks(1).php?msg=Not Updated Sucessfully');
                                }
                            }
                        } catch (Exception $e1) {
                            echo "Error: " . $e1->getMessage();
                        }
                        mysqli_close($cn);
                    }
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
    <div class="fixed-bottom container text-center bg-dark">
        <a class='btn btn-link bg-light' href='../HTML/HomeAdmin.php'>Go to HomePage</a>
        <a class='btn btn-link bg-light' href='../HTML/Login_Admin.php'>Go to Admin Login</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>