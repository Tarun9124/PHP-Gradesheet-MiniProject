<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="../assets/css/Login.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <title>Subject</title>
</head>

<body>
    <section class="side">
        <img src="../assets/img/img.svg" alt="" />
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">Subject</p>
            <div class="separator"></div>
            <p class="welcome-message">
                Please, provide details to credential to proceed and have access to
                all our services
            </p>

            <form class="login-form" action="SubjectAdd.php" method="post">
                <div class="myform-control">
                    <input type="number" name="scode" placeholder="Subject Code" required />
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg></i>
                </div>
                <div class="myform-control">
                    <input type="text" name="sname" placeholder="Subject Name" required />
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-font" viewBox="0 0 16 16">
                            <path d="M10.943 4H5.057L5 6h.5c.18-1.096.356-1.192 1.694-1.235l.293-.01v6.09c0 .47-.1.582-.898.655v.5H9.41v-.5c-.803-.073-.903-.184-.903-.654V4.755l.298.01c1.338.043 1.514.14 1.694 1.235h.5l-.057-2z" />
                            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                        </svg></i>
                </div>
                <?php
                $cn = mysqli_connect("localhost", "root", "", "gradesheet");
                $sql = "SELECT ID FROM faculty";
                $result = mysqli_query($cn, $sql);
                $options = '';
                while ($row = mysqli_fetch_array($result)) {
                    $options .= "<option value='" . $row['ID'] . "'>" . $row['ID'] . "</option>";
                }
                echo " <div class='myform-control'><select name='fid' required> <option value='' disabled selected hidden>Faculty ID</option>" . $options . "</select>";
                ?>
                <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                        <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                    </svg></i>
        </div>
        <button type="submit" class="submit" name="add">Add Subject</button>
        </form>
        <?php
        if (isset($_POST['add'])) {
            if ($cn) {
                try {
                    $sql = "INSERT INTO subject VALUES ('" . $_POST['scode'] . "','" . $_POST['sname'] . "','" . $_POST['fid'] . "')";
                    if (mysqli_query($cn, $sql)) {
                        echo '<div id="msg">
                        <h1 style="color:green">Subject Successfully Added!</h1></div>';
                        echo '<script>setTimeout(function(){ document.getElementById("msg").style.display = "none"; }, 2000);</script>';
                    } else {
                        echo '<div id="msg">
                        <h1 style="color:red">Subject Not Added</h1></div>';
                        echo '<script>setTimeout(function(){ document.getElementById("msg").style.display = "none"; }, 2000);</script>';
                    }
                } catch (Exception $e) {
                    echo '<div id="msg">
                        <h1 style="color:red">Subject Code Already Exists!</div>';
                    echo '<script>setTimeout(function(){ document.getElementById("msg").style.display = "none"; }, 2000);</script>';
                    // echo 'Error: ' . $e->getMessage();
                }
            }
        }
        ?>
        <a class='btn' href='../HTML/HomeAdmin.php'>Go to HomePage</a>
        <a class='btn' href='../HTML/Login_Admin.php'>Go to Admin Login</a>
        </div>
    </section>
</body>

</html>