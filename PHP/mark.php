<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "gradesheet");
if ($_SESSION['role'] == 'faculty') {
    echo '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        />
        <link href="../assets/css/Login.css" rel="stylesheet" />
        <link
          href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
          rel="stylesheet"
        />
        <title>Faculty - Home</title>
      </head>
      <body>
        <section class="side">
          <img src="../assets/img/img.svg" alt="" />
        </section>
    
        <section class="main">
          <div class="login-container">
            <p class="title">Choose Subject</p>
            <div class="separator"></div>
            <p class="welcome-message">
              Choose Subject for Adding Marks
            </p>';
    if (isset($_POST['add'])) {
        echo '<form class="login-form" action="mark.php" method="post">';
        echo '<div class="myform-control"><input
        type="number"
        name="code"
        value=' . $_POST['scode'] . '
        readonly/><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
         <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
        <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
        </svg></i></div>';
        echo '<div class="myform-control"><div class="myform-control"><input
        type="number"
        name="no"
        value=' . $_POST['erno'] . '
        readonly/>';
        echo '<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
  <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
  <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
  </svg></i></div>';
        $sql = "SELECT Sem FROM student WHERE Enrollment_No='" . $_POST['erno'] . "'";
        $result = mysqli_query($cn, $sql);
        $options = '';
        while ($row = mysqli_fetch_array($result)) {
            $options .= "<option value='" . $row['Sem'] . "'>" . $row['Sem'] . "</option>";
        }
        echo " <div class='myform-control'><select name='sem' required>" . $options . "</select>";
        echo '<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
  <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
  <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
  </svg></i></div><div class="myform-control">
  <input
    type="number"
    name="m1"
    placeholder="Enter Marks"
    required
  />
  <i
    ><svg
      xmlns="http://www.w3.org/2000/svg"
      width="16"
      height="16"
      fill="currentColor"
      class="bi bi-person"
      viewBox="0 0 16 16"
    >
      <path
        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"
      /></svg
  ></i>
</div> 
  <button class="submit" name="submit" style="margin-left:70px;">Add Marks</button></form>
        <a class="btn" href="../index.php">Go to HomePage</a>
        <a class="btn" href="../HTML/Login_User.php">Go to Login</a>
</div>
</section>
</body></html>';
    } else if (isset($_POST['submit'])) {
        function grade($avg)
        {
            if ($avg >= 90 && $avg < 100)
                return "AA";
            elseif ($avg >= 80)
                return "AB";
            elseif ($avg >= 70)
                return "BB";
            elseif ($avg >= 60)
                return "BC";
            elseif ($avg >= 50)
                return "CC";
            elseif ($avg >= 23)
                return "DD";
            else return "FF";
        }

        $sql = "INSERT INTO grade VALUES ('" . $_POST['code'] . "','" . $_POST['no'] . "','" . $_POST['m1'] . "','" . grade($_POST['m1']) . "')";
        if (mysqli_query($cn, $sql)) {
            header('location: ../HTML/HomeFaculty.php?msg=Marks Added Successfully!');
        } else {
            header('location: ../HTML/HomeFaculty.php?msg=Marks Not Added Successfully!');
        }
    }
} else {
    header('location: ../index.php');
}
