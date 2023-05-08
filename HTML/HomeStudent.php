<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "gradesheet");
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
        <title>Student - Home</title>
      </head>
      <body>
        <section class="myside">';
if (isset($_POST['erno'])) {
  echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
  echo '<div class="container text-center">
  <nav class="navbar navbar-light bg-light">
      <span class="navbar-brand mb-0 mx-auto h1">
          <h1>Marks</h1>
      </span>
  </nav>
  <table class="table table-hover table-bordered mt-5">
      <thead>
          <tr>
              <th scope="col">SUBJECT CODE</th>
              <th scope="col">ENROLLMENT NO</th>
              <th scope="col">MARKS</th>
              <th scope="col">GARDE</th>
          </tr>
      </thead>';
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
                      <td>$scode</td>
                      <td>$erno</td>
                      <td>$mark</td>
                      <td>$grade</td>
                      </tr>";
      }
    }
  } catch (Exception $e) {
    echo "Error : " . $e->getMessage();
  }
  echo '</table></section>';
}
echo '<section class="main">
          <div class="login-container">
            <p class="title">Choose Student</p>
            <div class="separator"></div>
            <p class="welcome-message">
              Choose Subject for Adding Marks
            </p>
            <form class="login-form" action="HomeStudent.php" method="post">';
$sql = "SELECT Enrollment_No FROM student";
$result = mysqli_query($cn, $sql);
$options = '';
while ($row = mysqli_fetch_array($result)) {
  $options .= "<option value='" . $row['Enrollment_No'] . "'>" . $row['Enrollment_No'] . "</option>";
}
echo " <div class='myform-control'><select name='erno' required> <option value='' disabled selected hidden>Enrollment No</option>" . $options . "</select>";
echo '<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
  <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
  <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
  </svg></i></div><button class="submit" name="Search">Search</button></form>';
echo  '<a class="btn" href="../index.php">Go to HomePage</a>
  <a class="btn" href="../HTML/Login_User.php">Go to Login</a>
</div>
</section>
</body></html>';
